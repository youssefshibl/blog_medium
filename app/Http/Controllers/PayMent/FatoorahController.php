<?php

namespace App\Http\Controllers\PayMent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\FatoorahServices;
use App\Models\Payment;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

class FatoorahController extends Controller
{
    //

    private $fatoorahServices ;
    private $request ;

    public function __construct(Request $request, FatoorahServices $fatoorahServices){
        $this->request = $request;
        $this->fatoorahServices = $fatoorahServices;
        $this->Middleware('auth')->except('success');
    }

    public function payorder(){

        $success_url = env('FATOORAH_SUCCESS_URL') . '/' . Auth::user()->id;
        $postFields = [
            //Fill required data
            'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
            'InvoiceValue'       => '50',
            'CustomerName'       => 'fname lname',
                //Fill optional data
                'DisplayCurrencyIso' => 'USD',
                //'MobileCountryCode'  => '+965',
                //'CustomerMobile'     => '1234567890',
                //'CustomerEmail'      => 'email@example.com',
                'CallBackUrl'        => $success_url,
                //'ErrorUrl'           => 'https://example.com/callback.php', //or 'https://example.com/error.php'
                //'Language'           => 'en', //or 'ar'
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
        ];

        $response =  $this->fatoorahServices->sendPayment($postFields);
        $invoice_id = $response->Data->InvoiceId;
        $invoic_url =  $response->Data->InvoiceURL;
        Payment::updateOrCreate([
            'user_id' => Auth::user()->id,
        ] , [
            'invoice_id' => $invoice_id,
        ]);
        //return $response ;
        return view('pages_.payment' , compact('invoice_id' , 'invoic_url'));
    }

    public function success( Request $request , $id){
       $payment_id = $request->paymentId;
       $response =  $this->fatoorahServices->getPaymentstatus($payment_id);
       $status = $response->Data->InvoiceStatus ;
       if($status == 'Pending'){
           $InvoiceId = $response->Data->InvoiceId;
           $invoice_data = Payment::where('invoice_id' , $InvoiceId)->first();
           $user = User::find($invoice_data->user_id);
           $user->premium = 1;
            $user->save();
            $payment = 'Payment transferred successfully' ;
            return view('pages_.payment_success' , compact('payment'));
            //return $response ;
       }
       $paymentFailed = 'Payment transferred Failed' ;
       return view('pages_.payment_success' , compact('paymentFailed'));
    }
    
}



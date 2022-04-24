<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Facade\FlareClient\View;

class PdfController extends Controller
{
    //
    public function postpdf($id)
    {

        $name = 'pdf_' . $id . '.pdf';
        $path = public_path() . '/data/pdf/' . $name ;
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $post->date = Carbon::parse($post->created_at)->format('M d');

        $pdf = PDF::loadView('pdf.post' , compact('post' , 'user'));
        if(file_exists($path)){
            unlink($path);

        }
         $pdf->save(public_path() . '/data/pdf/' . $name);
        // //return $pdf->download('itsolutionstuff.pdf');
         return response()->file($path);
        //return response()->file(public_path() . '/data/pdf/' . 'pdf_22.pdf');
        //return View('pdf.post', compact('post', 'user'));
    }
}

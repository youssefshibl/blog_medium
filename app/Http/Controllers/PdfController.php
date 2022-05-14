<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Carbon\Carbon;

class PdfController extends Controller
{
    //
    public function postpdf($id)
    {

        $name = 'pdf_' . $id . '.pdf';
        $path = public_path() . '\data\pdf\\' . $name;
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $post->date = Carbon::parse($post->created_at)->format('M d');
        if (file_exists($path)) {
            unlink($path);
            //return response()->file($path);
        }
        $pdf = PDF::loadView('pdf.post', compact('post', 'user'));
        $pdf->setOptions([
            'footer-center' => 'Page [page] of [topage]',
        ]);
        $pdf->save($path);
        return response()->file($path , [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $name . '"',
        ]);
    }

    public function testpdf($id)
    {
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $post->date = Carbon::parse($post->created_at)->format('M d');
        return view('pdf.post', compact('post', 'user'));
    }
}

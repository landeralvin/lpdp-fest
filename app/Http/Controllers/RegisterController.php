<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantEmail;
use App\Models\Participant;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'nik' => 'required|min:16|unique:participants',
            'name' => 'required|max:15',
            'phone' => 'required',
            'email' => 'required|email:dns|unique:participants',
            'education' => 'required',
            'occupation' => 'required',
            'instance' => 'required'
        ]);

        

        $url = sprintf("%s/validate/%s",env('APP_URL') ,$request->nik);
        $pathLoc = sprintf('storage/participants/%s.png', $request->nik);
        
        QrCode::format('png')->size(300)->generate($url, public_path($pathLoc));
        $image = Image::make(public_path('storage/utils/card.png'));
        $barcodeImage = Image::make(public_path(sprintf('storage/participants/%s.png', $request->nik)));
        $topImage = intval($image->height() * 0.6);  // 70% from the top
        $leftImage = intval(($image->width() - $barcodeImage->width()) / 2);  // center horizontally
        // Insert the barcode into the original image
        $image->insert($barcodeImage, 'top-left', $leftImage, $topImage);
        // Calculate the position for the text
        $topName = $image->height() * 0.4;  // 20% from the top
        $image->text($request->name, $image->width() / 2, $topName, function($font) {
            $font->file(public_path('font/OpenSans-Bold.ttf'));
            $font->size(150);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('top');
        });
        // Save the image
        $image->save(sprintf('storage/card/%s.png', $request->nik));
        $data = [
            'nik' => $request->nik,
            'name'=> $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'education'=> $request->education,
            'job_type' => $request->occupation,
            'institution' => $request->instance,
            'attend' => 0,
            'barcode' => sprintf('card/%s.png', $request->nik)
        ];
        Mail::to($request->email)->send(new ParticipantEmail($request->all(), $request->nik));
        Participant::create($data);
        return redirect()->back()->with('success', 'Selamat anda berhasil mendaftar!');
    }
}

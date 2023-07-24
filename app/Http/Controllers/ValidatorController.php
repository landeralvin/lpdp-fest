<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ValidatorController extends Controller
{
    public function qrvalidate($slug){
        $participant = Participant::where('nik',$slug);
        dd($participant);
    }
}

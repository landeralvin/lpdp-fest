<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ValidatorController extends Controller
{

    
    public function qrvalidate($slug){
        $participant = Participant::where('nik',$slug)->first();
        return view('admin.detail',['data' => $participant]);
    }

    public function qrvalidateupdate($id){
        $participant = Participant::where('nik',$id)->first();
        if ($participant) {
            $participant->update(['attend' => 1]);
        }
        return redirect()->back()->with('success', 'Attendance updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){
        return view('career.index');
    }

    public function regonref($ref){
        $friend_id = Career::where('ref', $friend_id);
        Cookie::put('friend_id', $friend_id);
        return redirect('/');

    }
}

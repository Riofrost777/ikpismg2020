<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait checkRegisterNumber
{
    public function checkIfEmailRegistered(Request $request)
    {
    	$check = DB::table('registermember')->where('email', '=', $request->email)->where('registerFlag', '=', 0);
    }
}
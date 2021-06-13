<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function covid(){
        $covid =  Http::get('https://api.apify.com/v2/key-value-stores/EaCBL1JNntjR3EakU/records/LATEST?disableRedirect=true');
        return view('home')->with(compact('covid'));
    }
}

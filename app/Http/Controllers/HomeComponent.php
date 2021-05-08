<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class HomeComponent extends HttpKernel
{
    public function render(){

        return view('liveware.home-component')->layout("layouts.base");
    }
}

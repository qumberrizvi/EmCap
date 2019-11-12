<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function submit()
    {
      return redirect()->back();
    }
}

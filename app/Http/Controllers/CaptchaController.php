<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use IntlChar;
use Image;

class CaptchaController extends Controller
{

    public function request()
    {
      $emojis = [];
      for($i=0; $i<4; $i++){
        $hex = random_int(128513, 128591);
        $em = IntlChar::chr($hex);
        array_push($emojis, $em);
      }
      $em_orig = implode($emojis, '');
      Session::forget('emo');
      Session::put('emo', $em_orig);
      //Image creation begins
      $img = Image::canvas(220, 60, '#fff');
      $img->save('foo.png');
      $img = Image::make('foo.png');
      $img->text($em_orig, 110, 30, function($font) {
          $font->file(public_path('OpenSansEmoji.ttf'));
          $font->size(36);
          $font->align('center');
          $font->valign('center');
      });
      $img->save('foo.png');
      // Image saved
      shuffle($emojis); //Shuffled emojis for captcha
      return view('captcha', compact('emojis','img'));
    }

    public function submit()
    {
      $cap_entered = request('cap_entered');
      $emojis = Session::get('emo');
      $sweet = IntlChar::chr(128147);
      $sour = IntlChar::chr(128148);
      if ($cap_entered == $emojis) {
        $img = Image::make('foo.png');
        $img->destroy();
        return "Sweet! $sweet <br> <a href='/'>Return</a>";
      } else {
        $img = Image::make('foo.png');
        $img->destroy();
        return "Nope $sour <br> <a href='/'>Return</a>";
      }
    }
}

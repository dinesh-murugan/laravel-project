<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function aboutUs() {
    if (true) {
        return redirect()->route('world');
    }
    return 'hello bye';
  }
}

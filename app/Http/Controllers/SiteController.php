<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function about(): View
    {
        return view('about');
    }
}

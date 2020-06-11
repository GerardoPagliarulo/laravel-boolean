<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    // HOME PAGE
    public function index() {
        return view('static-page.index');
    }
    // PRIVACY PAGE
    public function privacy() {
        return view('static-page.privacy');
    }
    // FAQ PAGE
    public function faq() {
        return view('static-page.faq');
    }
}

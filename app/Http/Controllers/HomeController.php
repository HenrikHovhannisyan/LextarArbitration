<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function faq()
    {
        return view('pages.faq');
    }
    public function rulesForms()
    {
        $files = File::where('show', '1')->get();
        return view('pages.rules-forms', compact('files'));
    }
}

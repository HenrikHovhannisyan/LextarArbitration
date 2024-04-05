<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function home()
    {
        $userCount = count(User::all());
        $caseManagerCount = count(User::where('is_admin', 3)->get());
        $rulesCount = count(Rule::all());
        $formsCount = count(Form::all());
        return view('admin.home', compact('userCount', 'caseManagerCount', 'rulesCount', 'formsCount'));
    }
}

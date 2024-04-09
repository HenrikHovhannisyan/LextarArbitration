<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     * @throws Exception
     */
    public function index()
    {
        $cases = Contract::all();
        return view('pages.partner.dashboard', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        // Generate case number
        $case_number = 'CASE-' . random_int(100000, 999999);

        // Validate the incoming request data
        $request->validate([
            'claimant' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:2048',
            'filing' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = 'pdf/case/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $filePath = $destinationPath . $fileName;
        }

        // Store the contract in the database
        $contract = new Contract();
        $contract->claimant = $request->input('claimant');
        $contract->email = $request->input('email');
        $contract->phone = $request->input('phone');
        $contract->subject = $request->input('subject');
        $contract->message = $request->input('message');
        $contract->number = $case_number;
        $contract->file = $filePath;
        $contract->filing = $request->input('filing');

        $contract->save();

        // Redirect to a success page or route
        return redirect()->route('cases.index')->with('success', 'Contract created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $case = Contract::findOrFail($id);
        return view('pages.partner.single', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}

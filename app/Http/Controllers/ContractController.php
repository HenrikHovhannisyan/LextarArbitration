<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\File;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     * @throws Exception
     */
    public function adminIndex()
    {
        $cases = Contract::all();
        $partners = User::whereIn('id', $cases->pluck('partner'))->get();
        return view('admin.cases.index', compact('cases', 'partners'));
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user()->id;
            $cases = Contract::where('user_id', $user)->get();
            return view('pages.user.dashboard', compact('cases'));
        } else {
            return redirect()->route('login')->with('error', 'You need to be logged in to view this page.');
        }
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

        // Get the authenticated user
        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = 'pdf/case/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $filePath = $destinationPath . $fileName;

            // Create contract record
            $contract = new Contract();
            $contract->user_id = $user->id;
            $contract->claimant = $request->input('claimant');
            $contract->email = $request->input('email');
            $contract->phone = $request->input('phone');
            $contract->subject = $request->input('subject');
            $contract->message = $request->input('message');
            $contract->number = $case_number;
            $contract->filing = $request->input('filing');
            $contract->save();

            // Create file record and associate with contract
            $fileRecord = new File();
            $fileRecord->filename = $filePath;
            $fileRecord->user_id = $user->id; // Set user_id using authenticated user's ID
            $fileRecord->contract_id = $contract->id; // Set contract_id
            $fileRecord->save();
        }

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
        $partners = User::where('is_admin', 4)->get();
        $partner = User::where('id', $case->partner)->first();
        $files = File::where('contract_id', $case->id)->get();
        return view('pages.user.single', compact('case', 'partners', 'partner', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'respondent' => 'required|string',
            'arbitrator' => 'required|string',
            'partner' => 'required|string',
        ]);

        // Find the case by ID
        $case = Contract::findOrFail($id);

        // Update the case properties
        $case->respondent = $request->input('respondent');
        $case->arbitrator = $request->input('arbitrator');
        $case->partner = $request->input('partner');
        $case->status = 'active';

        // Save the updated case details
        $case->save();

        // Redirect back to the case details page or any other desired route
        return redirect()->route('cases.show', ['case' => $case->id])->with('success', 'Case updated successfully.');
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


    public function reactivate(Request $request, Contract $case)
    {
        $request->validate([
            'reactivate' => 'required',
        ]);

        $case->reactivate = $request->input('reactivate');
        $case->save();

        return redirect()->route('cases.adminIndex')->with('success', 'Case status updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $rules = Rule::all();
        return view('admin.pages.rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.pages.rules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $input = $request->except('_token');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = 'pdf/rules/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['file'] = $destinationPath . $fileName;
        }

        Rule::create($input);

        return redirect()->route('rules.index')->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Rule $rule
     * @return void
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rule $rule
     * @return Factory|View
     */
    public function edit(Rule $rule)
    {
        return view('admin.pages.rules.edit', compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rule $rule
     * @return RedirectResponse
     */
    public function update(Request $request, Rule $rule)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $input = $request->except(['_method', '_token']);

        if ($request->hasFile('file')) {
            $fileUpload = $request->file('file');
            $destinationPath = 'pdf/rules/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $fileUpload->getClientOriginalExtension();
            $fileUpload->move($destinationPath, $fileName);
            $input['file'] = $destinationPath . $fileName;

            // Delete the old file if it exists
            if ($rule->file && file_exists(public_path($rule->file))) {
                unlink(public_path($rule->file));
            }
        }

        $rule->update($input);

        return redirect()->route('rules.index')->with('success', 'File updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Rule $rule
     * @return RedirectResponse
     */
    public function destroy(Rule $rule)
    {
        if ($rule->file && file_exists(public_path($rule->file))) {
            unlink(public_path($rule->file));
        }

        $rule->delete();
        return redirect()->route('rules.index')->with('success', 'File deleted successfully.');
    }
}

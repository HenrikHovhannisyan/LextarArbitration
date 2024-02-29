<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $forms = Form::all();
        return view('admin.pages.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.pages.forms.create');
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
            $destinationPath = 'pdf/forms/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['file'] = $destinationPath . $fileName;
        }

        Form::create($input);

        return redirect()->route('forms.index')->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Form $form
     * @return void
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Form $form
     * @return Factory|View
     */
    public function edit(Form $form)
    {
        return view('admin.pages.forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Form $form
     * @return RedirectResponse
     */
    public function update(Request $request, Form $form)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $input = $request->except(['_method', '_token']);

        if ($request->hasFile('file')) {
            $fileUpload = $request->file('file');
            $destinationPath = 'pdf/forms/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $fileUpload->getClientOriginalExtension();
            $fileUpload->move($destinationPath, $fileName);
            $input['file'] = $destinationPath . $fileName;

            // Delete the old file if it exists
            if ($form->file && file_exists(public_path($form->file))) {
                unlink(public_path($form->file));
            }
        }

        $form->update($input);

        return redirect()->route('forms.index')->with('success', 'File updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Form $form
     * @return RedirectResponse
     */
    public function destroy(Form $form)
    {
        if ($form->file && file_exists(public_path($form->file))) {
            unlink(public_path($form->file));
        }

        $form->delete();
        return redirect()->route('forms.index')->with('success', 'File deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $files = File::all();
        return view('admin.pages.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.pages.file.create');
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
            'rules' => 'nullable|file|mimes:pdf|max:2048',
            'forms' => 'nullable|file|mimes:pdf|max:2048',
            'fees' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $input = $request->except('_token');

        if ($request->hasFile('rules')) {
            $file = $request->file('rules');
            $destinationPath = 'pdf/rules/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['rules'] = $destinationPath . $fileName;
        }

        if ($request->hasFile('forms')) {
            $forms = $request->file('forms');
            $destinationPath = 'pdf/forms/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $forms->getClientOriginalExtension();
            $forms->move($destinationPath, $fileName);
            $input['forms'] = $destinationPath . $fileName;
        }

        if ($request->hasFile('fees')) {
            $fees = $request->file('fees');
            $destinationPath = 'pdf/fees/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $fees->getClientOriginalExtension();
            $fees->move($destinationPath, $fileName);
            $input['fees'] = $destinationPath . $fileName;
        }

        File::create($input);

        return redirect()->route('files.index')->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return void
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @return Factory|View
     */
    public function edit(File $file)
    {
        return view('admin.pages.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param File $file
     * @return RedirectResponse
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'name' => 'required',
            'rules' => 'nullable|file|mimes:pdf|max:2048',
            'forms' => 'nullable|file|mimes:pdf|max:2048',
            'fees' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $input = $request->except(['_method', '_token']);

        if ($request->hasFile('rules')) {
            $fileUpload = $request->file('rules');
            $destinationPath = 'pdf/rules/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $fileUpload->getClientOriginalExtension();
            $fileUpload->move($destinationPath, $fileName);
            $input['rules'] = $destinationPath . $fileName;

            // Delete the old file if it exists
            if ($file->rules && file_exists(public_path($file->rules))) {
                unlink(public_path($file->rules));
            }
        }

        if ($request->hasFile('forms')) {
            $formsUpload = $request->file('forms');
            $destinationPath = 'pdf/forms/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $formsUpload->getClientOriginalExtension();
            $formsUpload->move($destinationPath, $fileName);
            $input['forms'] = $destinationPath . $fileName;

            // Delete the old file if it exists
            if ($file->forms && file_exists(public_path($file->forms))) {
                unlink(public_path($file->forms));
            }
        }

        if ($request->hasFile('fees')) {
            $feesUpload = $request->file('fees');
            $destinationPath = 'pdf/fees/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $feesUpload->getClientOriginalExtension();
            $feesUpload->move($destinationPath, $fileName);
            $input['fees'] = $destinationPath . $fileName;

            // Delete the old file if it exists
            if ($file->fees && file_exists(public_path($file->fees))) {
                unlink(public_path($file->fees));
            }
        }

        $file->update($input);

        return redirect()->route('files.index')->with('success', 'File updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param File $file
     * @return RedirectResponse
     */
    public function destroy(File $file)
    {
        if ($file->rules && file_exists(public_path($file->rules))) {
            unlink(public_path($file->rules));
        }
        if ($file->forms && file_exists(public_path($file->forms))) {
            unlink(public_path($file->forms));
        }
        if ($file->fees && file_exists(public_path($file->fees))) {
            unlink(public_path($file->fees));
        }
        $file->delete();
        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }
}

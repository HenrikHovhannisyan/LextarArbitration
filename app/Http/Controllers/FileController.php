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
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = 'pdf/files/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $input['file'] = $destinationPath . $fileName;
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
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $fileUpload = $request->file('file');
            $destinationPath = 'pdf/files/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . "." . $fileUpload->getClientOriginalExtension();
            $fileUpload->move($destinationPath, $fileName);
            $input['file'] = $destinationPath . $fileName;

            // Delete the old file if it exists
            if ($file->file && file_exists(public_path($file->file))) {
                unlink(public_path($file->file));
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
        if ($file->file && file_exists(public_path($file->file))) {
            unlink(public_path($file->file));
        }
        $file->delete();
        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }
}

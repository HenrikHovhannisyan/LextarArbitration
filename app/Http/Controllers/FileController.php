<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
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
     */
    public function store(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:2048',
            'contract_id' => 'required|exists:contracts,id',
        ]);

        // Получение аутентифицированного пользователя
        $user = Auth::user();

        // Обработка загрузки файла
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = 'pdf/case/';
            $fileName = date('YmdHis') . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $filePath = $destinationPath . $fileName;

            // Создание записи о файле и связывание с контрактом
            $fileRecord = new File();
            $fileRecord->filename = $filePath;
            $fileRecord->user_id = $user->id;
            $fileRecord->contract_id = $request->input('contract_id');
            $fileRecord->save();
        }

        // Перенаправление с успешным сообщением
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
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

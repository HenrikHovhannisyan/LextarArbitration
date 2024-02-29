<?php


namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Rule;
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

    public function rulesApi()
    {
        try {
            $files = Rule::where('show', '1')->get();
            $pdf = [];
            foreach ($files as $file) {
                $pdf[] = [
                    'name' => $file->name,
                    'file' => asset($file->file),
                ];
            }

            if (empty($pdf)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'No files found'
                ], 404);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved files',
                'data' => $pdf
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }

    public function formsApi()
    {
        try {
            $files = Form::where('show', '1')->get();
            $pdf = [];
            foreach ($files as $file) {
                $pdf[] = [
                    'name' => $file->name,
                    'file' => asset($file->file),
                ];
            }

            if (empty($pdf)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'No files found'
                ], 404);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved files',
                'data' => $pdf
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }

}

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

    public function rulesFormsApi()
    {
        try {
            $files = File::where('show', '1')->get();
            $pdf = [];
            foreach ($files as $file) {
                $pdf[] = [
                    'name' => $file->name,
                    'rules-pdf' => asset($file->rules),
                    'forms-pdf' => asset($file->forms),
                    'fees-pdf' => asset($file->fees),
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

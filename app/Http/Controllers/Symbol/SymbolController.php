<?php

namespace App\Http\Controllers\Symbol;

use App\Http\Controllers\Controller;
use App\Imports\SymbolsImport;
use App\Models\Symbol;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class SymbolController extends Controller
{
    /**
     * @return view
     */
    public function index()
    {
        // symbols
        $symbols = Cache::remember('symbols', 60, function () {
            return Symbol::paginate();
        });

        return view('symbols', compact('symbols'));
    }

    /**
     * @param Request $request
     *
     * @return redirect
     */
    public function store(Request $request)
    {
        // Validation Request
        $this->validate($request, [
            'file_excel' => 'required|mimes:xls,xlsx',
        ]);

        // Insert Excel File
        Excel::import(new SymbolsImport, $request->file('file_excel'));
        // Cache
        Cache::forget('symbols');

        //TODO:: response body false
        $response = Http::post('https://paraf.app/quiz/job/log.php', [
            'message'  => 'success',
            'datetime' => Carbon::now(),
            'data'     => [],
        ]);
        // $response->body();

        // Message Session
        return back()->with('success', 'Request done');
    }
}

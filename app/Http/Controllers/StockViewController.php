<?php

namespace App\Http\Controllers;

use App\Models\StockEntry;
use App\Models\StockOutput;
use Illuminate\Http\Request;

class StockViewController extends Controller
{

    public function getMonthlyStockData(Request $request)
    {
        $entries = StockEntry::selectRaw('EXTRACT(MONTH FROM entry_date) as month, entry_type, COUNT(*) as total')
            ->groupByRaw('EXTRACT(MONTH FROM entry_date), entry_type')
            ->where('status', '=', 'completed')
            ->get();

        $outputs = StockOutput::selectRaw('EXTRACT(MONTH FROM output_date) as month, output_type, COUNT(*) as total')
            ->groupByRaw('EXTRACT(MONTH FROM output_date), output_type')
            ->where('status', '=', 'completed')
            ->get();

        return response()->json([
            'entries' => $entries,
            'outputs' => $outputs
        ]);
    }

}

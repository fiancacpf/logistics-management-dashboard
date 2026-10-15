<?php

namespace App\Http\Controllers;

use App\Models\StockEntry;

class InboundsController extends Controller
{

    public function show($id) {
        $entry = StockEntry::with([
            'warehouse',
            'supplier',
            'user',
            'items.product',
            'items.state',
            'stageHistories.user'
        ])->findOrFail($id);

        if (request()->ajax()) {
            return response()->json([
                'html' => view('inbounds.partials.details', compact('entry'))->render()
            ]);
        }
    }

}

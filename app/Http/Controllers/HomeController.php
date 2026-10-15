<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Beneficiary;
use App\Models\Campaign;
use App\Models\Province;
use App\Models\StockEntry;
use App\Models\StockInventory;
use App\Models\StockOutput;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     *
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root() {
        $stock_entries = StockEntry::where('status', '=','completed')->orderBy('id', 'desc')->limit(10)->get();
        $stock_entries_pending = StockEntry::where('status', '=','draft')->orderBy('id', 'desc')->limit(10)->get();
        $total_stock_entries = StockEntry::where('status', '=','completed')->count();
        $total_stock_entries_pending = StockEntry::where('status', '=','draft')->count();
        $total_stock_entries_in_validation = StockEntry::where('status', '=','in_validation')->count();
        $total_stock_entries_in_approval = StockEntry::where('status', '=','in_approval')->count();
        $total_stock_entries_in_line = StockEntry::where('status','in_approval')->count(); 
        $total_stock_entries_donation = StockEntry::where('entry_type', 'donation')->count();
        $total_stock_output = StockOutput::where('status', '=','completed')->count();
        $total_stock_output_approved = StockOutput::where('status', '=','approved')->count();
        $total_stock_output_pending = StockOutput::where('status', '=','draft')->count();
        $total_stock_output_in_line = StockOutput::where('status', 'approved')->count();
        $total_stock_output_validated = StockOutput::where('status', '=','validated')->count();
        $total_stock_output_executed = StockOutput::where('status', '=','executed')->count();
        $total_beneficiaries = Beneficiary::count();
        $campaign = Campaign::all();
        $warehouses = Warehouse::all();
        $suppliers = Supplier::all();
        $inventories_pending = StockInventory::where('status', '=','draft')->count();

        $beneficiariesByProvince = Beneficiary::select('id_province', DB::raw('COUNT(*) as total'))
        ->groupBy('id_province')
        ->orderByDesc('total')
        ->take(3)
        ->get();

        $topProvince = $beneficiariesByProvince->first();
        $topProvinceName = 'Desconhecida';
        if ($topProvince) {
            $province = Province::find($topProvince->id_province);
            if ($province) {
                $topProvinceName = $province->name;
            }
        }


        $beneficiariesByProvince->transform(function ($item) {
            $province = Province::find($item->id_province);
            $item->province_name = $province->name ?? 'Unknown';
            return $item;
        });

        $stock = DB::table('stock_movements as sm')
            ->select(
                'sm.product_id',
                'p.name as product_name',
                DB::raw('SUM(sm.quantity) as current_stock')
            )
            ->join('products as p', 'p.id', '=', 'sm.product_id')
            ->groupBy('sm.product_id', 'p.name')
            ->havingRaw('SUM(sm.quantity) > 0')
            ->orderBy('p.name')
            ->get();

        $stock_by_warehouse = DB::table('stock_movements as sm')
            ->select(
                'sm.product_id',
                'p.name as product_name',
                'p.min_stock as product_min',
                'sm.warehouse_id',
                'w.name as warehouse_name',
                DB::raw('SUM(sm.quantity) as current_stock')
            )
            ->join('products as p', 'p.id', '=', 'sm.product_id')
            ->join('warehouses as w', 'w.id', '=', 'sm.warehouse_id')
            ->groupBy('sm.product_id', 'p.name', 'p.min_stock', 'sm.warehouse_id', 'w.name')
            ->havingRaw('SUM(sm.quantity) <= p.min_stock')
            ->orderBy('w.name')
            ->count();

        $total_cleaning = Batch::with('product', 'warehouse')
            ->where('quantity', '>', 0)
            ->whereDate('expiration_date', '<=', now()->addYear())
            ->orderBy('expiration_date')
            ->count();

        $crowded_warehouses = DB::table('warehouses as w')
            ->join(DB::raw('(
                SELECT
                    sm.warehouse_id,
                    SUM(sm.quantity) as total_stock
                FROM stock_movements sm
                GROUP BY sm.warehouse_id, sm.product_id
                HAVING SUM(sm.quantity) > 0
            ) as stock'), 'w.id', '=', 'stock.warehouse_id')
            ->select('w.id', 'w.total_capacity', DB::raw('SUM(stock.total_stock) as used_capacity'))
            ->groupBy('w.id', 'w.total_capacity')
            ->havingRaw('SUM(stock.total_stock) >= w.total_capacity')
            ->count();


        return view('index', compact('stock', 'stock_entries', 'total_stock_entries',
            'total_stock_output', 'total_stock_output_approved', 'total_stock_output_pending', 'total_stock_output_in_line',
            'total_stock_output_validated', 'total_stock_output_executed', 'total_stock_entries_donation', 'total_cleaning',
            'total_beneficiaries', 'crowded_warehouses', 'inventories_pending', 'campaign', 'warehouses', 'suppliers', 'beneficiariesByProvince',
            'topProvince', 'topProvinceName', 'stock_by_warehouse', 'total_stock_entries_pending',
            'total_stock_entries_in_validation', 'total_stock_entries_in_approval', 'total_stock_entries_in_line'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopBilling;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShopBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashboard.shop-billing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::all();
        return view('dashboard.shop-billing.create', compact('shops'));
    }

    function calculate(Request $request) {
        $request->validate([
            'shop' => ['required', 'exists:shops,id'],
            'current_unit' => ['required', 'numeric'],
            'date' => ['required']
        ]);
        $entryDate = $request->date;

        $shop = Shop::find($request->shop);
        $lastMonthEntry = ShopBilling::where('shop_id', $request->shop)->orderBy('id', 'desc')->first();

        // check if this month's entry already exists

        $usedUnits = $request->current_unit - ($lastMonthEntry ? $lastMonthEntry->current_unit : $request->current_unit);

        $unitCalculation = [
            'per_unit_cost' => $shop->per_unit_cost,
            'current_unit' => $request->current_unit,
            'previous_unit' => $lastMonthEntry ? $lastMonthEntry->current_unit : 0,
            'total_used_unit' => $usedUnits,
            'total_charge' => ($usedUnits * $shop->per_unit_cost),
        ];

        $payableAmount = $shop->shop_rent + $unitCalculation['total_charge'];
        $view = view('dashboard.shop-billing.components.calculation-table', compact('shop', 'unitCalculation', 'payableAmount', 'entryDate'));
        session()->flash('success', 'Calculation done successfully!');
        return response($view)->header('HX-Retarget', '#calculation-card');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entryDate = $request->entry_date;
        $shop = Shop::find($request->shop_id);
        $lastMonthEntry = ShopBilling::where('shop_id', $request->shop_id)
            ->whereYear('created_at', date('Y', strtotime($entryDate)))
            ->whereMonth('created_at', date('m', strtotime($entryDate)))
            ->first();

        if ($lastMonthEntry) {
            session()->flash('alert-error', 'This month\'s entry already exists! for : ' . $shop->name);
            return response()->json([], 200, ['HX-Location' => url()->previous()]);
        }

        ShopBilling::create($request->all());

        return response()->json([], 200, ['HX-Location' => route('shop-billings.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

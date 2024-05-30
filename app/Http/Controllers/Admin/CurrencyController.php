<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/currency/index');
    }
    public function getData()
    {
        $currency = Currency::all();
        
        return DataTables::of($currency)
            ->addColumn('action',function($row){
                return '<button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button>';
            })
            ->addColumn('status',function($row){
                
                return '<div class="custom-control custom-switch">
                <input type="checkbox"  class="custom-control-input toggle-active" id="customSwitch' . $row->id . '" data-id="' . $row->id . '" ' . ($row->status == 'active' ? 'checked' : '') . '>
                <label class="custom-control-label" for="customSwitch' . $row->id . '"></label>
            </div>';
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }
    public function toggleActive(Request $request,$currencyId)
    {
        $currency = Currency::find($currencyId);
        $currency->status = $request->active;
        $currency->save();
        // $product->save();

        // return response()->json(['success' => true, 'active' => $product->active]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Http\Services\FlashSaleService;
use Illuminate\Http\Request;
use App\Http\Requests\FlashSaleRequest;

class FlashSaleController extends Controller
{
    public $flashSaleService;
    public function __construct(FlashSaleService $flashSaleService)
    {
        $this->flashSaleService = $flashSaleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = $this->flashSaleService->getPaginate();
        return view('flashSale.index',compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flashSale.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlashSaleRequest $request)
    {
        $this->flashSaleService->create($request->validated());
        return redirect()->back()->withErrors(['success'=>'Create new flash sale success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $sale = $this->flashSaleService->findOrFail($id);
          dd($sale);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = $this->flashSaleService->findOrFail($id);
        return view('flashSale.edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlashSaleRequest $request, string $id)
    {
        $this->flashSaleService->update($id,$request->validated());
        return redirect()->back()->withErrors(['success'=>'Update flash sale success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->flashSaleService->deletedSoft($id);
        return redirect()->back();
    }
}

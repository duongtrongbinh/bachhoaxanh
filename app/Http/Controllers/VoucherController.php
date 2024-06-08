<?php

namespace App\Http\Controllers;

use App\Http\Services\VoucherService;
use App\Http\Requests\VoucherRequest;
class VoucherController extends Controller
{

    public $voucherService;
    public function __construct(VoucherService $voucherService)
    {
        $this->voucherService = $voucherService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = $this->voucherService->getPaginate();
        return view('voucher.index',compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('voucher.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoucherRequest $request)
    {
       $this->voucherService->create($request->validated());
       return redirect()->back()->withErrors(['success'=>'Create new voucher successs']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = $this->voucherService->findOrFail($id);
        dd($author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voucher = $this->voucherService->findOrFail($id);
        return view('voucher.edit',compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoucherRequest $request, string $id)
    {
        $this->voucherService->update($id,$request->validated());
        return redirect()->back()->withErrors(['success'=>'Update voucher successs']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $this->voucherService->deletedSoft($id);
      return redirect()->back();
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Services\BrandService;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    const PATH_VIEW = 'dashboard.brands.';
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->getPaginate(5);

        return view(self::PATH_VIEW . __FUNCTION__, compact('brands'));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(BrandCreateRequest $request)
    {   
        $this->brandService->create($request->validated());

        return redirect()
            ->route('brands.index')
            ->with('status', 'Success');
    }

    public function show(Brand $brand)
    {
        $this->brandService->findOrFail($brand->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('brand'));
    }

    public function edit(Brand $brand)
    {
        $this->brandService->findOrFail($brand->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('brand'));
    }

    public function update(BrandCreateRequest $request, Brand $brand)
    {
        $this->brandService->update($brand->id, $request->validated());

        return back()
            ->with('status', 'Success');
    }

    public function destroy(Brand $brand)
    {
        $this->brandService->destroy($brand->id);

        return back()->with(['status' => 'Success']);
    }
}

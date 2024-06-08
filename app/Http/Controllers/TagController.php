<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Http\Services\ProductService;
use App\Http\Services\TagService;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    const PATH_VIEW = 'tags.';
    protected $tagService;
    protected $productService;

    public function __construct(TagService $tagService, ProductService $productService)
    {
        $this->tagService = $tagService;
        $this->productService = $productService;
    }

    public function index()
    {
        $tags = $this->tagService->getAll();

        return view(self::PATH_VIEW . __FUNCTION__, compact('tags'));
    }

    public function create()
    {   
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(TagCreateRequest $request)
    {
        $this->tagService->create($request->validated());

        return redirect()
            ->route('tags.index')
            ->with('status', 'Success');
    }

    public function show(Tag $tag)
    {
        $this->tagService->findOrFail($tag->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $this->tagService->findOrFail($tag->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('tag'));
    }

    public function update(TagCreateRequest $request, Tag $tag)
    {
        $this->tagService->update($tag->id, $request->validated());

        return back()
            ->with('status', 'Success');
    }

    public function destroy(tag $tag)
    {
        $this->tagService->destroy($tag->id);

        return back()->with(['status' => 'Success']);
    }
}

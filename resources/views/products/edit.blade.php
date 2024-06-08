@extends('dashboard.layout.master')
@section('title', 'Product Edit')
@section('content')
    <div class="pagetitle">
      <h1>Product Edit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Product</h5>
                <!-- General Form Elements -->
                <form action="{{ route('products.update', $product) }}" method="POST" data-toggle="validator" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                      @error('name')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                      <input type="button" id="lfm" data-input="thumbnail" data-preview="holder" value="Upload">
                      <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $product->image }}">
                      <div class="col-sm-10">
                        <img src="{{ $product->image }}" class="img-fluid">
                      </div>
                      @error('image')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="brand_id" aria-label="Default select example">
                        <option value="" selected>Open this select menu</option>
                        @foreach ($brands as $brand)
                          @if ($product->brand_id == $brand->id)
                            <option selected value="{{ $product->brand_id }}">{{ $product->brands->name }}</option>
                          @else
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('brand_id')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <select class="form-select" name="category_id" aria-label="Default select example">
                        <option value="" selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @if ($product->category_id == $category->id)
                            <option selected value="{{ $product->category_id }}">{{ $product->categories->name }}</option>
                          @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endif
                        @endforeach
                      </select>
                      @error('category_id')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Excerpt</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="excerpt" value="{{ $product->excerpt }}">
                      @error('except')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Cost</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cost" value="{{ $product->cost }}">
                      @error('cost')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                      @error('price')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                      @error('price.gte')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Price Sale</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="price_sale" value="{{ $product->price_sale }}">
                      @error('price_sale')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                      @error('quantity')
                        <div style="color: red">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form>
                <!-- End General Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

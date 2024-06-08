@extends('dashboard.layout.master')
@section('title', 'Brand Edit')
@section('content')
    <div class="pagetitle">
      <h1>Brand Update</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Brand</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Brand Update</h5>
                <!-- Form -->
                <form action="{{ route('brands.update', $brand) }}" method="post" data-toggle="validator" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
                            @error('name')
                              <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="button" id="lfm" data-input="thumbnail" data-preview="holder" value="Upload">
                          <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $brand->image }}">
                          @error('image')
                            <div style="color: red">{{ $message }}</div>
                          @enderror
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                        <div class="col-md-3">
                          <img src="{{ $brand->image }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

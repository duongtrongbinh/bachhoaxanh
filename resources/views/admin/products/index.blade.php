@extends('layout.master')
@section('title', 'Product List')
@section('content')
    <div class="pagetitle">
      <h1>Product List</h1>
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
              <h5 class="card-title">
                  <a href="{{ route('products.create') }}">
                  <i class="bi bi-plus-circle"></i>
                  Create Product
                </a>
              </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $key => $product)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $product->name }}</td>
                      <td>
                        <div class="col-md-3">
                          <img src="{{ $product->image }}" class="img-fluid">
                        </div>
                      </td>
                      <td>{{ $product->brands->name }}</td>
                      <td>{{ $product->categories->name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>
                        <a href="">
                          <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                            <button class="btn btn-light" type="submit" onclick="return confirm('Bạn có muốn xóa không?')">
                              <i class="bi bi-trash"></i>
                            </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

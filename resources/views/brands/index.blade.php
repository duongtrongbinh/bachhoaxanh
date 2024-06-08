@extends('dashboard.layout.master')
@section('title', 'Brand List')
@section('content')
    <div class="pagetitle">
      <h1>Brand List</h1>
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
              <h5 class="card-title">
                <a href="{{ route('brands.create') }}">
                  <i class="bi bi-plus-circle"></i>
                  Create Brand
                </a>
              </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($brands as $key => $brand)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $brand->name }}</td>
                      <td>
                        <div class="col-md-3">
                          <img src="{{ $brand->image }}" class="img-fluid">
                        </div>
                      </td>
                      <td>
                        <a href="">
                          <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('brands.edit', $brand) }}">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('brands.destroy', $brand) }}" method="post">
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

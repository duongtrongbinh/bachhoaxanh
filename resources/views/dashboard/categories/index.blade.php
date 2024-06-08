@extends('layout.master')
@section('title', 'Category List')
@section('content')
    <div class="pagetitle">
      <h1>Category List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Category</li>
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
                  <a href="{{ route('categories.create') }}">
                  <i class="bi bi-plus-circle"></i>
                  Create Category
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
                  @foreach ($categories as $key => $category)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $category->name }}</td>
                      <td>
                        <div class="col-md-3">
                          <img src="{{ $category->image }}" class="img-fluid">
                        </div>
                      </td>
                      <td>
                        <a href="">
                          <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('categories.edit', $category) }}">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="post">
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

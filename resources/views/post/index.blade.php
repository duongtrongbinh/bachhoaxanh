@extends('dashboard.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách Bài viết</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">title</th>
                                <th scope="col">image</th>
                                <th scope="col">content</th>
                                <th scope="col">Tháo tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($PostService as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>{{ $row->title }}</td>
                                    <td>
                                        @if ($row->image)
                                            <img src="{{ asset('storage/' . $row->image) }}" width="80px">
                                        @else
                                            <span class="text-muted">Không có ảnh</span>
                                        @endif
                                    </td>
                                    <td>{{ $row->content }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start mt-1">
                                            <a href="{{ route('post.edit', $row) }}" class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i> Sửa
                                            </a>
                                            <form action="{{ route('post.destroy', $row) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    <i class="fas fa-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

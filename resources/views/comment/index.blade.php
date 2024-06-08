@extends('dashboard.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách bình luận</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Name Product</th>
                                <th scope="col">content</th>
                                <th scope="col">ratting</th>
                                <th scope="col">Tháo tác</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($CommentService as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>{{ $row->user->name }}</td>
                                    <td>
                                    @foreach($row->product as $product)
                                            {{ $product->name }}<br>
                                    @endforeach
                                    </td>
                                    <td>{{ $row->content }}</td>
                                    <td>{{ $row->ratting }}</td>
                                    <td>
                                        <form action="{{ route('comment.destroy', $row) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

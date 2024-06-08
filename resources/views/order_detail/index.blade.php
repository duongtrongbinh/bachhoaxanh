@extends('dashboard.layout.master')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Flash Sale</h5>
                        <p>title</p>
{{--                        <a href="/orders">--}}
{{--                            <button type="button" class="btn btn-success">Create new flash sale </button>--}}
{{--                        </a>--}}
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price_regular</th>
                                <th scope="col">Price_sale</th>
                                <th scope="col">quantity</th>
{{--                                <th scope="col">Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetail as $items)
                                <tr>
                                    <td>{{ $items->name }}</td>
                                    <td><img src="{{ $items->image }}"></td>
                                    <td>{{ $items->price_regular }}</td>
                                    <td>{{ $items->price_sale }}</td>
                                    <td>
                                        {{ $items->quantity}}
                                    </td>
{{--                                    <td>--}}
{{--                                        <div class="d-flex" style="gap: 10px">--}}
{{--                                            <a href=""><button class="btn btn-warning">Order Detail</button></a>--}}
{{--                                            <form action="" method="post" onclick="return confirm('Bạn có muốn khóa trường này ?')">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-outline-danger">--}}
{{--                                                    thay đổi trạng thái--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        <div class="pagination justify-content-center">
                            @if(isset($orderDetail))
                                {{ $orderDetail->links('vendor.pagination.bootstrap-5') }} <!-- Sử dụng blade phân trang của trang index -->
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

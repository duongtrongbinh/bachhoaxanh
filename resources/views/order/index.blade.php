@extends('dashboard.layout.master')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Flash Sale</h5>
                        <p>title</p>
                        <a href="/orders">
                            <button type="button" class="btn btn-success">Create new flash sale </button>
                        </a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>Order code</th>
                                <th scope="col">Before total amount</th>
                                <th scope="col">Shipping</th>
                                <th scope="col">After_total_amount</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $items)
                                <tr>
                                    <td>{{ $items->order_code }}</td>
                                    <td>{{ $items->before_total_amount }}</td>
                                    <td>{{ $items->shipping }}</td>
                                    <td>{{ $items->after_total_amount }}</td>
                                    <td> @if($items->status == 1)
                                            <span class="text-success">is active</span>
                                        @else
                                            <span class="text-danger">in active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <a href="/detail/{{ $items->id }}/orders"><button class="btn btn-warning">Order Detail</button></a>
                                            <form action="/f/{{$items->id}}" method="post" onclick="return confirm('Bạn có muốn khóa trường này ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    thay đổi trạng thái
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        <div class="pagination justify-content-center">
                            @if(isset($orders))
                                {{ $orders->links('vendor.pagination.bootstrap-5') }} <!-- Sử dụng blade phân trang của trang index -->
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

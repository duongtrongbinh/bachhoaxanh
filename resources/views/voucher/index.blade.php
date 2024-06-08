@extends('dashboard.layout.master')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vouchers</h5>
                        <p>title</p>
                       <a href="/vouchers/create">
                           <button type="button" class="btn btn-success">add new voucher</button>
                       </a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vouchers as $items)
                                <tr>
                                    <th>{{ $items->title }}</th>
                                    <td>{{ $items->quantity }}</td>
                                    <td>{{ $items->amount }}</td>
                                    <td>{{ $items->start_date}}</td>
                                    <td>{{ $items->end_date}}</td>
                                    <td> @if($items->status == 1)
                                        <span class="text-success">is active</span>
                                    @else
                                        <span class="text-danger">in active</span>
                                    @endif
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <a href="/vouchers/{{ $items->id }}/edit"><button class="btn btn-warning">edit</button></a>
                                            <form action="/vouchers/{{$items->id}}" method="post" onclick="return confirm('Bạn có muốn khóa trường này ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    Xóa
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
                            @if(isset($vouchers))
                                {{ $vouchers->links('vendor.pagination.bootstrap-5') }} <!-- Sử dụng blade phân trang của trang index -->
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

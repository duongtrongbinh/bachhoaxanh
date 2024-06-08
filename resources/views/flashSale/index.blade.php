@extends('dashboard.layout.master')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Flash Sale</h5>
                        <p>title</p>
                       <a href="/flash-sales/create">
                           <button type="button" class="btn btn-success">Create new flash sale </button>
                       </a>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                            <tr>

                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sale as $items)
                                <tr>
                                    <td>{{ $items->start_date }}</td>
                                    <td>{{ $items->end_date }}</td>
                                    <td> @if($items->status == 1)
                                            <span class="text-success">is active</span>
                                        @else
                                            <span class="text-danger">in active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <a href="/flash-sales/{{ $items->id }}/edit"><button class="btn btn-warning">edit</button></a>
                                            <form action="/flash-sales/{{$items->id}}" method="post" onclick="return confirm('Bạn có muốn khóa trường này ?')">
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
                            @if(isset($sale))
                                {{ $sale->links('vendor.pagination.bootstrap-5') }} <!-- Sử dụng blade phân trang của trang index -->
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

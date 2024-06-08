@extends('dashboard.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách khách hàng</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">User code</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tháo tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>
                                        @if ($row->avatar)
                                            <img style="width: 50px;" src="{{ asset("storage/$row->avatar") }}" alt="">
                                        @else
                                            <span class="text-muted">Không có ảnh</span>
                                        @endif
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone_number }}</td>
                                    <td>{{ $row->user_code }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input {{ $row->status == 1 ? 'bg-success' : 'bg-danger' }}" type="checkbox" id="flexSwitchCheckDefault-{{ $row->id }}" {{ $row->status == 1 ? 'checked' : '' }} onchange="toggleStatus({{ $row->id }}, this)">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('user.edit',$row) }}" class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i> Sửa
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-end mt-1">
                                            <form action="{{route('user.destroy',$row)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                    <i class="fas fa-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
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


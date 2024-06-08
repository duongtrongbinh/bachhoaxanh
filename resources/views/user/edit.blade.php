@extends('dashboard.layout.master')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Avatar</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="avatar" value="{{$user->avatar}}">
                                    <img style="width: 100px;" src="{{ asset("storage/$user->avatar") }}" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="phone_number" value="{{$user->phone_number}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">User code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="user_code" value="{{$user->user_code}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">remember token</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="remember_token" value="{{$user->remember_token}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Tích cực</option>
                                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Bị chặn</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection

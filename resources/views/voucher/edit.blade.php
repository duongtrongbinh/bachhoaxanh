@extends('dashboard.layout.master')
@section('content')

    <section class="container-fluid mt-3ct">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="text-center">Create Voucher</h4>
            </div>
            <div class="card-body">
                @error('success')
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <form action="/vouchers/{{ $voucher->id }}" method="post" id="form">
                    @csrf
                    @method('PUT')
                    <div class="row mt-5">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter voucher..." value="{{  $voucher->title }}">
                                @error('title')
                                <small id="title" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" aria-describedby="quantity" placeholder="Enter quantity..." value="{{  $voucher->quantity }}">
                                @error('quantity')
                                <small id="quantity" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" aria-describedby="amount" placeholder="Enter amount..." value="{{  $voucher->amount }}">
                                @error('amount')
                                <small id="amount" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="start_date">Start date</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" aria-describedby="start_date" placeholder="Enter start date voucher..." value="{{  $voucher->start_date }}">
                                @error('start_date')
                                <small id="start_date" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="end_date">End date</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" aria-describedby="end_date" placeholder="Enter end date voucher..." value="{{  $voucher->end_date }}">
                                @error('end_date')
                                <small id="end_date" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div  class="row mt-5">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $voucher->description }}</textarea>
                            @error('description')
                            <small id="description" class="form-text  text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                    <div class="row mt-3">
                        <div class="col-xl-3">
                            <div class="form-check mt-3">
                                <label class="form-check-label" for="exampleCheck1">Status </label>
                                <select class="form-control" aria-label="Default select example" name="status">
                                    @if($voucher->status == 1)
                                        <option value="1" selected>active</option>
                                        <option value="0">in active</option>
                                    @else
                                    <option value="1" >active</option>
                                    <option value="0" selected>in active</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-3">
                        <div class="form-check">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/vouchers"><button type="button" class="btn btn-warning">Back</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

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
                <form action="/orders" method="post" id="form">
                    <input type="hidden" name="user_id" value="1">
                    <input type="hidden" name="voucher_id" value="13">
                    <input type="hidden" name="address_detail_id" value="1">
                    <input type="hidden" name="payment_id" value="1">
                    @csrf
                    @method('POST')
                    <div class="row mt-5">
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="before_total_amount">before_total_amount</label>
                                <input type="number" class="form-control" id="before_total_amount" name="before_total_amount" aria-describedby="before_total_amount" placeholder="Enter before_total_amount...">
                                @error('before_total_amount')
                                <small id="before_total_amount" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="quantity">Shipping</label>
                                <input type="number" class="form-control" id="shipping" name="shipping" aria-describedby="shipping" placeholder="Enter Shipping...">
                                @error('shipping')
                                <small id="shipping" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="amount">after_total_amount</label>
                                <input type="number" class="form-control" id="amount" name="after_total_amount" aria-describedby="amount" placeholder="Enter amount...">
                                @error('after_total_amount')
                                <small id="amount" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="start_date">order_code</label>
                                <input type="text" class="form-control" id="start_date" name="order_code" aria-describedby="start_date" placeholder="Enter start date voucher...">
                                @error('order_code')
                                <small id="start_date" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div  class="row mt-5">
                        <div class="form-group">
                            <label for="description">Note</label>
                            <textarea class="form-control" id="description" name="note" rows="3"></textarea>
                            @error('description')
                            <small id="description" class="form-text  text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->
                    <div class="row mt-3">
                        <div class="col-xl-3">
                            <div class="form-check mt-3">
                                <label class="form-check-label" for="exampleCheck1">Status</label>
                                <select class="form-control" aria-label="Default select example" name="status">
                                    <option value="1" selected>active</option>
                                    <option value="0">in active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <div class="form-check">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="admin/orders"><button type="button" class="btn btn-warning">Back</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

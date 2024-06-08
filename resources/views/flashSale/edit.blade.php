@extends('dashboard.layout.master')
@section('content')

    <section class="container-fluid mt-3ct">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="text-center">Create Flash Sale</h4>
            </div>
            <div class="card-body">
                @error('success')
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @enderror
                <form action="/flash-sales/{{ $sale->id }}" method="post" id="form">
                    @csrf
                    @method('PUT')
                    <div class="row mt-5">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="start_date">Start date</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" aria-describedby="start_date" placeholder="Enter start date voucher..." value="{{ $sale->start_date }}">
                                @error('start_date')
                                <small id="start_date" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="end_date">End date</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" aria-describedby="end_date" placeholder="Enter end date voucher..." value="{{ $sale->end_date }}">
                                @error('end_date')
                                <small id="end_date" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-xl-3">
                            <div class="form-check mt-3">
                                <label class="form-check-label" for="exampleCheck1">Status </label>
                                <select class="form-control" aria-label="Default select example" name="status">
                                    @if($sale->status == 1)
                                        <option value="1" selected>active</option>
                                        <option value="0">in active</option>
                                    @else
                                        <option value="1">active</option>
                                        <option value="0" selected>in active</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="form-check">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="/flash-sales"><button type="button" class="btn btn-warning">Back</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

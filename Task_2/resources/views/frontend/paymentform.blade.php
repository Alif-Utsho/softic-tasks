@extends('frontend.master')

@section('content')
<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p>
        <form action="{{ route('payment.submit') }}" method="POST">
            @csrf
            <div class="row gx-3">
                <!-- <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">E-mail</p>
                        <input class="form-control mb-3" type="email" min="1" name="email" placeholder="Enter Your Email" required>
                    </div>
                </div> -->
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">User ID</p>
                        <input class="form-control mb-3" type="text" min="1" name="user_id" pattern="[0-9]+(\.[0-9]+)?" placeholder="Enter User ID" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Amount</p>
                        <input class="form-control mb-3" type="text" min="1" name="amount" pattern="[0-9]+(\.[0-9]+)?" placeholder="Enter Payment Amount" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Currency</p>
                        <select class="form-control mb-3"  name="currency">
                            <option value="usd" selected>$ USD</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mb-3">
                        <span class="ps-3"> Pay</span>
                        <span class="fas fa-arrow-right"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
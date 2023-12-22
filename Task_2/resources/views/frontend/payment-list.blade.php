@extends('frontend.master')

@section('content')
<div class="container p-0">
    <div class="card px-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $key=>$payment)
                <tr>
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $payment->user_id }}</td>
                    <td>{{ $payment->transaction_id }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>
                        @if($payment->status=='SUCCESS') <span class="badge badge-pill badge-success bg-success">{{ $payment->status }}</span>
                        @elseif($payment->status=='CANCELLED') <span class="badge badge-pill badge-danger bg-danger">{{ $payment->status }}</span>
                        @elseif($payment->status=='PENDING') <span class="badge badge-pill badge-secondary bg-secondary">{{ $payment->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="btn btn-danger mb-3">Make a new Payment</a>
        
    </div>
</div>
@endsection
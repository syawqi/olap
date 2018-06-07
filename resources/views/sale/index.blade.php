@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sale</div>

                    <div class="card-body">
                        <div class="container">
                            <h2>Sale Table</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Price</th>
                                    <th>Profit</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Province</th>
                                    <th>Customer</th>
                                    <th>Product</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($sale as $index => $item)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>Rp {{ $item->sale }}</td>
                                            <td>Rp {{ $item->profit }}</td>
                                            <td>{{ $item->period->month }}</td>
                                            <td>{{ $item->period->year }}</td>
                                            <td>{{ $item->location->province }}</td>
                                            <td>{{ $item->customer->description }}</td>
                                            <td>{{ $item->product->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @guest
                            @else
                                <div class="btn-group pull-right">
                                    <a href="{{ url('sale/import') }}"
                                       class="btn btn-primary">import</a>
                                    <a href="{{ url('sale/export') }}"
                                       class="btn btn-primary">export</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

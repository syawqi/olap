@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer</div>

                    <div class="card-body">
                        <div class="container">
                            <h2>Customer Table</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer as $index => $item)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $item->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @guest
                            @else
                                <div class="btn-group pull-right">
                                    <a href="{{ url('customer/import') }}"
                                       class="btn btn-primary">import</a>
                                    <a href="{{ url('customer/export') }}"
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

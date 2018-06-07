@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <div class="container">
                            <h2>Product Table</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Ingredient Price</th>
                                    <th>Production Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $index => $item)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Rp {{ $item->ingredient }}</td>
                                            <td>Rp {{ $item->production }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @guest
                            @else
                                <div class="btn-group pull-right">
                                    <a href="{{ url('product/import') }}"
                                       class="btn btn-primary">import</a>
                                    <a href="{{ url('product/export') }}"
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

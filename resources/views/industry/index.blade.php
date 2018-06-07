@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Industry</div>

                    <div class="card-body">
                        <div class="container">
                            <h2>Industry Table</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($industries as $index => $item)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $item->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @guest
                            @else
                                <div class="btn-group pull-right">
                                    <a href="{{ url('industry/import') }}"
                                       class="btn btn-primary">import</a>
                                    <a href="{{ url('industry/export') }}"
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

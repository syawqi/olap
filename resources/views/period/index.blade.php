@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Period</div>

                    <div class="card-body">
                        <div class="container">
                            <h2>Period Table</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($period as $index => $item)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $item->month }}</td>
                                            <td>{{ $item->year }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @guest
                            @else
                                <div class="btn-group pull-right">
                                    <a href="{{ url('period/import') }}"
                                       class="btn btn-primary">import</a>
                                    <a href="{{ url('period/export') }}"
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

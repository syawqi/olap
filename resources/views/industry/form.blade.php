@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Industry</div>

                    <div class="card-body">
                        <div class="container">
                            <form enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="btn-group pull-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

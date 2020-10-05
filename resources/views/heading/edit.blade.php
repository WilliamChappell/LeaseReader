@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="/heading/{{ $heading->id}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="heading_name" class="col-md-4 control-label">Heading Name</label>

                            <div class="col-md-6">
                                <input id="heading_name" type="text" class="form-control" name="heading_name" value="{{ $heading->heading_name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" value="{{ $heading->description }}" name="description" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <button type="cancel" class="btn btn-primary">
                                    Cancel
                                </button>


                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

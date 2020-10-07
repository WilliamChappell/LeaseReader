@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="text-center">Create Phrase</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="/word/create/{{ $headingID}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="word" class="col-md-4 control-label">Phrase</label>

                            <div class="col-md-6">
                                <input id="word" type="text" class="form-control" name="word" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                                <a href="/heading/{{ $headingID }}/">
                                    <button class="btn btn-danger">
                                        Cancel
                                    </button>
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

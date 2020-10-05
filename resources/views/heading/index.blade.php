@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if(isset($headings) && !empty($headings))
            <table class="col-md-12 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Heading Name</th>
                        <th>Description</th>
                        <th>Actions <a href='heading/create'><button class="btn btn-success"><div class="glyphicon glyphicon-plus"></div></button></a></th>
                    </tr>
                </thead>
                @foreach($headings as $heading)
                <tr>
                    <td>{{ $heading->heading_name }}</td>
                    <td>{{ $heading->description }}</td>
                    <td>
                        <a href='heading/{{ $heading->id }}'><button class="btn btn-default"><div class="glyphicon glyphicon-search"></div></button></a>
                        <a href='heading/{{ $heading->id}}/edit'><button class="btn btn-default"><div class="glyphicon glyphicon-pencil"></div></button></a>
                        <a href='heading/{{ $heading->id}}/delete'><button class="btn btn-danger"><div class="glyphicon glyphicon-trash"></div></button></a>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
                No headings found..
            @endif

        </div>
    </div>
</div>
@endsection

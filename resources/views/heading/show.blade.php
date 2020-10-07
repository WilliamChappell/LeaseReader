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
            @if(isset($heading) && !empty($heading->WordsRelation))
            <table class="col-md-12 table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Phrase Name</th>
                        <th>Actions <a href='/word/create/{{ $heading->id }}'><button class="btn btn-success">Create</button></a></th>
                    </tr>
                </thead>
                @foreach($heading->WordsRelation as $word)
                <tr>
                    <td>{{ $word->word }}</td>
                    <td>
                        <a href='/word/{{ $word->id}}/edit'><button class="btn btn-default">Edit</button></a>
                        <a href='/word/{{ $word->id}}/delete'><button class="btn btn-danger">Delete</button></a>
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

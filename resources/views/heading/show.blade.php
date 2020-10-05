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
                <tr>
                    <thead>
                        <th>Word Name</th>
                        <th>Actions <a href='word/create'><button class="btn btn-success"><div class="glyphicon glyphicon-plus"></div></button></a></th>
                    </thead>
                </tr>
                @foreach($heading->WordsRelation as $word)
                <tr>
                    <td>{{ $word->word }}</td>
                    <td>
                        <a href='/word/{{ $word->id}}/edit'><button class="btn btn-default"><div class="glyphicon glyphicon-pencil"></div></button></a>
                        <a href='/word/{{ $word->id}}/delete'><button class="btn btn-danger"><div class="glyphicon glyphicon-trash"></div></button></a>
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

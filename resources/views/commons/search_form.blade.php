{!! Form::open(['route' => 'search.post']) !!}
    <div class="form-group">
        {!! Form::label('searchText', 'search_word') !!}
        {!! Form::text('searchText', old('searchText'), ['class' => 'form-control']) !!}
        {!! Form::submit('Search', ['class' => 'btn btn-primary btn-sm']) !!}
    </div>
{!! Form::close() !!}
{!! Form::open(['route' => 'search.index','method' => 'get']) !!}
    <div class="row">
        <div class="form-group col-8 search-box">
            {!! Form::label('searchText', 'search_word') !!}
            {!! Form::text('searchText', old('searchText'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-3 pt-4 submit-btn">
            {!! Form::submit('Search', ['class' => 'btn btn-primary btn-sm']) !!}
        </div>
    </div>
{!! Form::close() !!}
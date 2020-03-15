@if(!Auth::user()->is_shared($note->id))
    <div class="share/protect-button">
        {!! Form::open(['route' => ['notes.share', $note->id]]) !!}
            {!! Form::submit('Share', ['class' => "btn btn-success btn-sm mt-3"]) !!}
        {!! Form::close() !!}
    </div>
@else
    <div class="share/protect-button">
        {!! Form::open(['route' => ['notes.protect', $note->id], 'method' => 'delete']) !!}
            {!! Form::submit('Protect', ['class' => "btn btn-primary btn-sm mt-3"]) !!}
        {!! Form::close() !!}
    </div>
@endif
@extends('master')

@section('body')
    {{ Form::open(['url' => 'quote']) }}
    <legend>New Quote</legend>
    @include('_quote-form')
    <div class="form-group mt-4">
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
@endsection

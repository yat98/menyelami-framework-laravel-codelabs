@extends('master')

@section('body')
    {{ Form::model($quote, ['url' => 'quote/' . $quote->id . '/edit', 'method' => 'put']) }}
    <legend>Update Quote</legend>
    @include('_quote-form')
    <div class="form-group mt-4">
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    </div>
    {{ Form::close() }}
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Show lead № {{$lead->id}}</h1>
        <h5>Name:</h5>
        <p>{{$lead->name}}</p>
        <h5>Email:</h5>
        <p>{{$lead->email}}</p>
        <h5>Phone:</h5>
        <p>{{$lead->phone}}</p>
        <h5>Message:</h5>
        <p>{{$lead->message}}</p>
        <h5>Lead Closed:</h5>
        <p>@if ($lead->is_closed === 0) {{'No'}} @else {{'Yes'}} @endif</p>
    </div>
@endsection

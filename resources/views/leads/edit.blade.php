@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('leads.update', [$lead->id])}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name" value="{{$lead->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="email" class="form-control" id="email" value="{{$lead->email}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input name="phone" type="tel" class="form-control" id="phone" value="{{$lead->phone}}">
            </div>
            <div class="form-group">
                <label for="message">Comment:</label>
                <textarea name="message" class="form-control" rows="5" id="message">{{$lead->message}}</textarea>
            </div>
            <div class="form-group">
                <label for="closed">Lead Closed:</label>
                <select name="closed" id="closed">
                    <option value="0" @if($lead->is_closed === 0) selected @endif>No</option>
                    <option value="1" @if($lead->is_closed === 1) selected @endif>Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
@endsection

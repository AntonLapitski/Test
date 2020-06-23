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

        <form action="{{route('leads.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input name="phone" type="tel" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <label for="message">Comment:</label>
                <textarea name="message" class="form-control" rows="5" id="message"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <h2 class="mt-5 text-center">Leads</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Lead Closed</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leads as $lead)
                <tr>
                    <td>{{$lead->id}}</td>
                    <td>{{$lead->name}}</td>
                    <td>{{$lead->email}}</td>
                    <td>{{$lead->phone}}</td>
                    <td>{{$lead->message}}</td>
                    <td>@if ($lead->is_closed === 0) {{'No'}} @else {{'Yes'}} @endif</td>
                    <td><a href="{{ route('leads.edit', ['leads' => $lead->id]) }}" class="btn btn-default">Edit</a></td>
                    <td><a href="{{ route('leads.show', ['leads' => $lead->id]) }}" class="btn btn-primary">Show</a></td>
                    <td>
                        <form action="{{ route('leads.destroy', ['leads'=>$lead->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="Delete">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

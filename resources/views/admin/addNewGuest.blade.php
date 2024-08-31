@extends('components.admin.adminLayout')
@section('title', 'Admin - New Guest')

@section('content')
    <h1>Adding new Guest for weddingId: {{$wedding->id}}</h1>
    <p>{{$wedding->groom_name}} and {{$wedding->bride_name}}</h1>
        <form action="{{ route('admin.addNewGuest', $wedding->id) }}" method="POST">
            @csrf
            <input type="text" name="guestName">
        </form>
@endsection
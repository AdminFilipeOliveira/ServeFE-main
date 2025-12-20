@extends('layouts.main_layout')
@section('content')
<h6>View</h6>
<p>Name: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>
<p>NIF: {{$user->nif}}</p>
    @endsection

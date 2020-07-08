@extends('layouts.app')

@section('content')
    @auth
    <router-view></router-view>
    @endauth
@endsection

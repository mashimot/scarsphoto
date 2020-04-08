@extends('layouts.app-scars')
@section('content')
    <div class="row">
        @foreach($categories as $category)
            <div class="col-4">
                <a href="{{ route('galleries.show', $category->category_id) }}" class="text-white">{{ $category->category_name }}</a>
            </div>
        @endforeach
    </div>
@endsection    
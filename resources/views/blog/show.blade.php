@extends('layouts.blog')



@section('content')
    <div class="container my-5">
        {!!$post->content!!}
    </div>
@endsection


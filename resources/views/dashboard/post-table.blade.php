@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ __('All Post') }}</h5>
                    <a class="btn btn-primary" href="{{route('post.create')}}">Create</a>
                </div>


                <div class="card-body">

                    <x-form-success :message="session('message')"/>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Featured Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Publish Date</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th class="text-center">{{ $post->id }}</th>
                                        <th class="text-center">{{ $post->title }}</th>
                                        <td class="text-center">
                                            <img class="img-fluid" src="{{asset('/storage/'.$post->featured_image)}}" type="image/webp" alt=""  height="48px" width="48px">
                                        </td>
                                        <th class="text-center">{{ $post->status}}</th>
                                        <th class="text-center">
                                            {{ $post->created_at }}
                                        </th>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a  class="btn btn-secondary btn-sm mr-2 d-inline-block"
                                                    href="{{route('post.edit', ['post' => $post])}}"

                                                >Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ __('All Brands') }}</h5>
                    <a class="btn btn-primary" href="{{route('brand.create')}}">Create</a>
                </div>


                <div class="card-body">

                    <x-form-success :message="session('message')"/>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Url</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td class="text-center">{{ $brand->id }}</td>
                                        <td class="text-center">{{ $brand->name }}</td>
                                        <td class="text-center">
                                            <img class="img-fluid" src="{{ $brand->image_url}}" type="image/webp" alt="" >
                                        </td>
                                        <td class="text-center">{{ $brand->website_url }}</td>
                                        <td class="text-center">{{ $brand->country->name }}</td>

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">

                                                <a  class="btn btn-secondary btn-sm mr-2 d-inline-block"
                                                    href="{{route('brand.edit',$brand)}}"

                                                >Edit</a>

                                                {{-- <form action="{{route('brand.destroy', ['brand' => $brand->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm mr-2 d-inline-block"  onclick="return confirm('Are you sure you want to delete {{$brand->name}}?')" type="submit">Delete</a>
                                                </form> --}}

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

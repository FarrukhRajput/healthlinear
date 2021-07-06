@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>{{ __('All Medicines') }}</h5>
                    <a class="btn btn-primary" href="{{route('medicine.create')}}">Create</a>
                </div>


                <div class="card-body">

                    <x-form-success :message="session('message')"/>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Salt</th>
                                <th class="text-center">Symptoms</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicines as $medicine)
                                    <tr>


                                        <th class="text-center">{{ $medicine->id }}</th>
                                        <td class="text-center">
                                            <img class="img-fluid" src="{{asset('/storage/'.$medicine->image_url)}}" type="image/webp" alt=""  height="48px" width="48px">
                                        </td>
                                        <th class="text-center">{{ $medicine->name }}</th>
                                        <th class="text-center">{{ $medicine->salt->name }}</th>
                                        <th class="text-center">
                                            @foreach ($medicine->symptoms as $item)
                                                <span class="badge badge-light text-capitalize">{{ $item->name }},</span>
                                            @endforeach
                                        </th>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a  class="btn btn-secondary btn-sm mr-2 d-inline-block"
                                                    href="{{route('medicine.edit', ['medicine' => $medicine])}}"

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

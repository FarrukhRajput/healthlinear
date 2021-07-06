@extends('layouts.dashboard')


@php
    if($brand->id){
        $formTitle =  "Edit Brand";
        $formUrl = route('brand.update' , ['brand' => $brand]);
    }
    else{
        $formTitle =  "Create Brand";
        $formUrl = route('brand.store');
    }
@endphp




@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        {{ $formTitle }}

                    </div>

                    <div class="card-body">

                        <x-form-success :message="session('message')"/>
                        <x-form-errors :errors="$errors"/>

                        <form action="{{$formUrl}}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            @if($brand->id)
                                <input type="hidden" name="_method" value="PATCH">
                            @endif

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="d-block">Brand Name</label>
                                        <input name="name" type="text" class="form-control" required value="{{@$brand->name??''}}" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="d-block">Country</label>
                                        <select name="country_id" class="form-control" required>
                                            <option selected disabled>Select ..</option>
                                            @foreach ($countries as $country)
                                                <option {{@$brand->country_id == $country->id ?'selected' : ''}}  value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="d-block">Website Url</label>
                                        <input name="website_url" value="{{@$brand->website_url??''}}" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="d-block">Description</label>
                                        <div id="summernote"></div>
                                        <textarea  id="mytextarea" name="description" class="form-control" cols="30" rows="1">{!!$brand->description??''!!}</textarea>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="logo" class="d-inline-block" >
                                            <img src="{{asset($brand->image_url)}}" alt="" height="50px" width="50px">
                                        </label>
                                        <input name="logo" id="logo" value="{{@$brand->image_url??''}}" type="file" class="form-control d-inline-block w-50" accept="image/jpg, image/jpeg, image/png" {{@$brand->image_url? '':'required'}}>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="mt-5 px-3">
                                    <button class="btn btn-primary" type="submit" > {{$brand->id ? 'Update' : 'Submit'}} </button>
                                    <button class="btn btn-success" type="reset" > Clear </button>
                                    <a href="{{route('brand.index')}}" class="btn btn-danger" > Cancel </a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        tinymce.init({
          selector: '#tinyEditor'
        });
    </script>
@endsection

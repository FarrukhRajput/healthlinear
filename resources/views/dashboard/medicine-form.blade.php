@extends('layouts.dashboard')


@section('css')
    <link href="{{ asset('utils/select2/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('utils/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@php

    $selectedSymptoms = [];

    if($medicine->id){
        $formTitle =  "Edit Medicine";
        $formUrl = route('medicine.update' , ['medicine' => $medicine]);

        foreach($medicine->symptoms as $symptom){
            array_push($selectedSymptoms, $symptom->id);
        }
    }
    else{
        $formTitle =  "Create Medicine";
        $formUrl = route('medicine.store');
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

                            @if($medicine->id)
                                <input type="hidden" name="_method" value="PATCH">
                            @endif

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="d-block">Brand Name</label>
                                        <input name="name" type="text" class="form-control" required value="{{@$medicine->name}}" >
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="" class="d-block">Salt Name</label>
                                        <select name="salt_id" class="form-control" required>
                                            <option selected disabled>Select ..</option>
                                            @foreach ($salts as $salt)
                                                <option {{@$medicine->salt_id == $salt->id ?'selected' : ''}}  value="{{ $salt->id }}">{{ $salt->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" class="d-block">Website Url</label>
                                        <input name="website_url" value="{{@$medicine->website_url??''}}" class="form-control" />
                                    </div>
                                </div>


                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="" class="d-block">Country</label>
                                        <select name="country_id" class="form-control" required>
                                            <option selected disabled>Select ..</option>
                                            @foreach ($countries as $country)
                                                <option {{@$medicine->country_id == $country->id ?'selected' : ''}}  value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group w-100">
                                        <label for="image" class="d-block" >
                                            @if(@$medicine->id)
                                                <img src="{{asset('/storage/'.$medicine->image_url)}}" alt="" height="50px" width="50px">

                                                @else
                                                Image
                                            @endif
                                        </label>
                                        <input name="image" id="image" value="{{@$medicine->image??''}}" type="file" class="form-control d-inline-block w-50" accept="image/jpg, image/jpeg, image/png"  >
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="" class="d-block">Symptoms List</label>

                                    <select name="symptoms[]" class="form-control" id="symptomTag" multiple>
                                        @foreach ($symptoms as $symptom)
                                            <option value="{{$symptom->id}}">{{$symptom->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <label for="" class="d-block">Description</label>
                                        <div id="summernote"></div>
                                        <textarea  id="tinyEditor" name="description" class="form-control" cols="30" rows="15">{!!$medicine->description!!}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-end">
                                <div class="mt-5 px-3">
                                    <button class="btn btn-primary" type="submit" > {{$medicine->id ? 'Update' : 'Submit'}} </button>
                                    <button class="btn btn-success" type="reset" > Clear </button>
                                    <a href="{{route('medicine.index')}}" class="btn btn-danger" > Cancel </a>
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
    <script src="{{asset('/utils/select2/js/select2.full.min.js')}}"></script>


    <script>

        tinymce.init({
          selector: '#tinyEditor'
        });

        $("#symptomTag").select2({
            tags: true
        });

        $("#symptomTag").on('select2:unselect'  , function (e) {
            var data = e.params.data;
        });

        var data  = {{ json_encode($selectedSymptoms)}}
        $("#symptomTag").val(data);
        $("#symptomTag").trigger('change');
    </script>
@endsection

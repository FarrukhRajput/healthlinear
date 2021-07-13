@extends('layouts.dashboard')


@section('css')
    <link href="{{ asset('utils/select2/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('utils/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@php

    $selectedSymptoms = [];

    if($post->id){
        $formTitle =  "Edit Post";
        $formUrl = route('post.update' , ['post' => $post]);

    }
    else{
        $formTitle =  "Create Post";
        $formUrl = route('post.store');
    }

@endphp


@section('content')
    <div class="container">
        <form action="{{$formUrl}}" method="POST" enctype="multipart/form-data" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card  rounded-0">
                    <div class="card-header">
                        {{ $formTitle }}
                    </div>

                    <div class="card-body">

                        <x-form-success :message="session('message')"/>
                        <x-form-errors :errors="$errors"/>

                            @csrf

                            @if($post->id)
                                <input type="hidden" name="_method" value="PATCH">
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="d-block">Title</label>
                                        <input placeholder="Add title (required)" name="title" type="text" class="form-control rounded-0" required value="{{@$post->title}}" >
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="" class="d-block">Tag Line</label>
                                        <input placeholder="Tag Line (required)" name="tag_line" type="text" class="form-control rounded-0" required value="{{@$post->tag_line}}" >
                                    </div>
                                </div>


                                <div class="col-12 mt-3">
                                    <div class="form-group">
                                        <div id="summernote"></div>
                                        <textarea id="tinyEditor" name="content" class="form-control" >{!!$post->content!!}</textarea>
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="row justify-content-end">
                                <div class="mt-5 px-3">
                                    <button class="btn btn-primary" type="submit" > {{$post->id ? 'Update' : 'Submit'}} </button>
                                    <button class="btn btn-success" type="reset" > Clear </button>
                                    <a href="{{route('post.index')}}" class="btn btn-danger" > Cancel </a>
                                </div>
                            </div> --}}

                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <button class="btn btn-large btn-primary w-100 rounded-0  mb-4" type="submit" >  Publish  Post </button>
                <div class="card rounded-0">
                    <div class="card-header">
                        Featured Image
                    </div>
                    <div class="card-body pb-0">
                        <img id="previewImg" class="{{@$post->featured_image == null ? 'd-none' : 'd-block' }} "  src="{{@$post->featured_image? '/storage/'.$post->featured_image :''}}" />
                        <label for="" class="link" id="postImage"> {{@$post->featured_image? 'Remove featured image'  : 'Set featured image'}}</label>
                        <input name="featured_image" style="visibility: hidden;" id="featureImage" type="file" onchange="previewFile(this);">
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection


@section('script')

    <script>


    $('#postImage').click(  function(e){

        if(e.target.innerHTML == "Set featured image"){
            e.target.nextElementSibling.click();
        }else{
            e.target.nextElementSibling.value = '';
            removeImage(e);
        }
    });




    function removeImage(e){
        $("#previewImg").attr("src", '');
        $("#previewImg").addClass('d-none');
        e.target.innerHTML = "Set featured image";
    }

    function previewFile(e){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                $("#previewImg").removeClass('d-none');
            }
            reader.readAsDataURL(file);
        }
        e.previousElementSibling.innerHTML = 'Remove featured Image';

    }

    var editor_config = {
          selector: '#tinyEditor',
          height: 500,
          end_container_on_empty_block: true,
          skin: 'bootstrap',
          verify_css_classes : true,
          setup: function(editor){
            editor.on('init change ' , function(){
                editor.save();
            });
          },
          plugins: 'advlist image charmap preview lists insertdatetime hr anchor code media table paste searchreplace visualblocks fullscreen contextmenu imagetools',
          toolbar: 'insertfile undo redo | styleselect | bold italice | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          image_title: true,
          automatic_uploads : true,
          file_picker_types: 'image',
          images_upload_handler : function(blobinfo, success , failure){
            var xhr , formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('post' , '{{ route("admin.image_upload")}}');
            var token = '{{ csrf_token() }}';
            xhr.setRequestHeader('X-CSRF-Token' , token);
            xhr.onload = function(){
                var json;


                console.log('lets replaede');

                if(xhr.status != 200){
                    failure('Http Error: ' + xhr.responseText);
                    return ;
                }

                json = JSON.parse(xhr.responseText);

                if(!json || typeof json.location != 'string'){
                    failure('Invalid Json: ' + xhr.responseText);
                    return ;
                }

                success(json.location);
            };
            formData = new FormData();
            formData.append('file' ,blobinfo.blob(), blobinfo.filename());
            xhr.send(formData);
        },
    };

    tinymce.init(editor_config);

    </script>
@endsection

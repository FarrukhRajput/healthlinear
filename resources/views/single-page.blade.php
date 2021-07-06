@extends('layouts.website')



@section('content')

<div class="container-fluid single-page py-5">
    <div class="container ">
        <div class="row">
            <div class="col-12 col-lg-2">
                <div class="single-page__logo ">
                    <a href="{{route('single-page' , ['medicine' => $medicine])}}">
                        <img src="{{asset('/storage/'.$medicine->image_url)}}" class="img-fluid" >
                    </a>
                </div>
                {{-- <div class="text-primary">{{$medicine->salt->name}}</div> --}}
            </div>

            <div class="col-12 col-lg-9">
                <div class="single-page__content">
                    <a href="{{route('single-page' , ['medicine' => $medicine])}}">
                        <h2 class="mt-4">{{$medicine->name}}</h2>
                    </a>
                    {!! $medicine->description !!}
                    <div class="bottom-blur fadeout"></div>
                </div>
                <div class="text-center mt-2 read-more">⥥ Read More</div>
            </div>
        </div>

        <div class="row mt-3">
           <div class="col-12">
            <h5 class="font-weight-bold">Symptoms</h5>
              <ul class="m-0 p-0">
                @foreach ($medicine->symptoms as $item)
                   <li class="d-inline">
                       <a href="" class="btn btn-secondary text-capitalize">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul>
           </div>

        </div>

    </div>

</div>


<h2 class="text-center single-page__alternative-title py-4 mt-5 w-100"> <b>{{ $medicine->name }}</b> Alternatives</h2>

    @foreach ($altMedicines as $item)

        <div class="w-100 single-page__alternative-item my-5">
            <div class="container-fluid ">
                <div class="container p-3">
                    <div class="d-flex justify-content-center">
                        <a href="{{route('single-page' , ['medicine' => $item])}}" class="text-center py-2 font-weight-bold">
                            <h2  >{{$item->name}}</h2>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-2">
                            <div class="single-page__logo">
                                <a href="{{route('single-page' , ['medicine' => $item])}}">
                                    <img src="{{asset('/storage/'.$item->image_url)}}" class="img-fluid" >
                                </a>
                            </div>
                            {{-- <div class="text-primary">{{$item->salt->name}}</div> --}}
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="single-page__content mt-3">
                                {!! $item->description !!}
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{route('single-page' , ['medicine' => $item])}}" class="btn btn-primary text-uppercase border-0 rounded-0">Show Details</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endforeach


@endsection


@section('script')
    <script>
        $('.read-more').click((e)=>{
            sibling = e.target.previousElementSibling;

            if(sibling.classList.contains('show')){
                jQuery(sibling).removeClass( "show");
                jQuery(e.target).html('⥥ Read More');

                jQuery('.bottom-blur').addClass('fadeout');

            }else{
                jQuery(sibling).addClass("show");
                jQuery(e.target).html('⥣ Read Less');
                jQuery('.bottom-blur').removeClass('fadeout');

            }

        });
    </script>
@endsection

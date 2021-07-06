@extends('layouts.website')

@section('content')
<div class="surface__dark">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 search-box">
            <div class="search-box__title">Find Best Software Alternatives</div>
            <p class="search-box__subtitle">Search and choose the right software alternative with our crowdsourced software recommendation engine</p>
            <form method="get" action="https://www.topbestalternatives.com/">
                <div class="form-group">
                    <input class="form-control" type="text" name="s" value="" placeholder="Find alternatives to..." autocomplete="off">
                </div>
            </form>
        </div>
    </div>
</div>


<div class="section section-a">
    <div class="section-popular">

        <div class="row">
            <div class="col-12">
                <h3 class="mt-3">Popular Medicines</h3>
            </div>
        </div>

        <div class="row px-5">
            @foreach ($medicines as $medicine)
                <div class="col-lg-3 mt-2">
                    <div class="item">
                        <img class="d-inline-block" src="{{'/storage/'.($medicine->image_url)}}" alt="">
                        <div class="meta">

                            <a class="item--title" href="{{route('single-page' , [ 'medicine' =>  $medicine ] )}}">{{$medicine->name}}</a>
                            <div class="item--subtitle">{{$medicine->salt->name}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</div>

{{-- <div class="section section-b">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mt-3">Popular Software</h3>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-title">Camloo</div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

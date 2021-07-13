@extends('layouts.blog')



@section('content')


    <div class="container mt-5">

        <div class="blog-section-heading">
            Recent Posts
        </div>

        <div class="row">


            <div class="col-lg-6 pr-lg-5 mb-4">
                <img class="img-fluid mb-4" src="storage/{{$latestPost[0]->featured_image}}" alt="">

                <a class="blog-latest-heading" href="{{route('blog.show' , ['id' => $latestPost[0]])}}" >
                    {{$latestPost[0]->title}}
                </a>

                <p class="css-dx2vkh">
                    <a class="blog-sub-heading" href="" >
                        {{substr($latestPost[0]->tag_line, 0, 140).'...' }}
                    </a>
                </p>
                <a href="#" class="d-lg-none btn btn-danger">READ MORE<span class=""></span></a>

            </div>


            <div class="col-lg-6 mt-sm-4 mt-md-0">

                @foreach ($latestPost as $key => $item)
                    @if($key)
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-5">
                                <img class="img-fluid" src="{{'storage/'.$item->featured_image}}" alt="" class="css-1u8c2i8">
                            </div>

                            <div class="col-sm-12 col-md-7">
                                <div>
                                    <a class="blog-heading" href="" >{{$item->title}}</a>
                                    <p class="mt-4">
                                        <a class="blog-sub-heading" href="">
                                            {{substr($item->tag_line, 0, 140).'...' }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach



            </div>


        </div>

        <div class="blog-section-heading mt-4">
            More On Cornona
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="row mb-4 ">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading">The Definitive Guide to Healthy Eating in Real Life</a>
                            <p class="css-dx2vkh">
                                <a class="blog-sub-heading">You may hear a lot of talk about how to eat healthy, but getting started is another matter.</a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading">I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                            <p class="css-dx2vkh">
                                <a class="blog-sub-heading">READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                                </a>
                            </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading">I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                            <p class="css-dx2vkh">
                                <a class="blog-sub-heading">READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                                </a>
                            </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="row mb-4 ">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading">The Definitive Guide to Healthy Eating in Real Life</a>
                            <p class="css-dx2vkh">
                                <a class="blog-sub-heading">You may hear a lot of talk about how to eat healthy, but getting started is another matter.</a>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading">I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                            <p class="css-dx2vkh">
                                <a class="blog-sub-heading">READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                                </a>
                            </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading">I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                            <p class="css-dx2vkh">
                                <a class="blog-sub-heading">READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                                </a>
                            </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="blog-section-heading mt-5">
            COVID-19 Vaccines
        </div>

        <div class="row mb-5">
            <div class="col-lg-9">
                <div class="row mb-4 ">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div>
                            <a class="blog-heading" >I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                            <p class="blog-sub-heading">
                                <a>Food is a cornerstone of culture. Let’s start honoring both.</a>
                            </p>
                            <a>READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                            </a></div>
                    </div>
                </div>


                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div><a class="css-wj7osy" data-event="Landing Page Engagement|Link Click_Featured_Hero Listing_2|/health/food-nutrition/black-dietician-food-and-racism" data-element-event="INTERNALLINK|SECTION|Landing Page Engagement|Hero Listing - Featured|LINK|I’m a Black Dietitian — Here’s What I Want You to Know About Food and…|lp2" href="/health/food-nutrition/black-dietician-food-and-racism" data-testid="title-link">I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a><p class="css-dx2vkh"><a class="css-2fdibo" data-event="Landing Page Engagement|Link Click_Featured_Hero Listing_2|/health/food-nutrition/black-dietician-food-and-racism" data-element-event="INTERNALLINK|SECTION|Landing Page Engagement|Hero Listing - Featured|LINK|I’m a Black Dietitian — Here’s What I Want You to Know About Food and…|lp2" href="/health/food-nutrition/black-dietician-food-and-racism" data-testid="text-link" aria-hidden="true" tabindex="-1">Food is a cornerstone of culture. Let’s start honoring both.</a></p><a class="css-0 css-1xfwvje" data-event="Landing Page Engagement|Link Click_Featured_Hero Listing_2|/health/food-nutrition/black-dietician-food-and-racism" data-element-event="INTERNALLINK|SECTION|Landing Page Engagement|Hero Listing - Featured|LINK|I’m a Black Dietitian — Here’s What I Want You to Know About Food and…|lp2" href="/health/food-nutrition/black-dietician-food-and-racism">READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span></a></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <div><a class="css-wj7osy" data-event="Landing Page Engagement|Link Click_Featured_Hero Listing_2|/health/food-nutrition/black-dietician-food-and-racism" data-element-event="INTERNALLINK|SECTION|Landing Page Engagement|Hero Listing - Featured|LINK|I’m a Black Dietitian — Here’s What I Want You to Know About Food and…|lp2" href="/health/food-nutrition/black-dietician-food-and-racism" data-testid="title-link">I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a><p class="css-dx2vkh"><a class="css-2fdibo" data-event="Landing Page Engagement|Link Click_Featured_Hero Listing_2|/health/food-nutrition/black-dietician-food-and-racism" data-element-event="INTERNALLINK|SECTION|Landing Page Engagement|Hero Listing - Featured|LINK|I’m a Black Dietitian — Here’s What I Want You to Know About Food and…|lp2" href="/health/food-nutrition/black-dietician-food-and-racism" data-testid="text-link" aria-hidden="true" tabindex="-1">Food is a cornerstone of culture. Let’s start honoring both.</a></p><a class="css-0 css-1xfwvje" data-event="Landing Page Engagement|Link Click_Featured_Hero Listing_2|/health/food-nutrition/black-dietician-food-and-racism" data-element-event="INTERNALLINK|SECTION|Landing Page Engagement|Hero Listing - Featured|LINK|I’m a Black Dietitian — Here’s What I Want You to Know About Food and…|lp2" href="/health/food-nutrition/black-dietician-food-and-racism">READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span></a></div>
                    </div>
                </div>
            </div>

        </div>


        <div class="blog-section-heading mt-5">
            Something New
        </div>

        <div class="row mb-5">

            <div class="col-lg-4">
                <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">

                <div>
                    <a class="blog-heading" >I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                    <p class="blog-sub-heading">
                        <a>Food is a cornerstone of culture. Let’s start honoring both.</a>
                    </p>
                    <a>READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">

                <div>
                    <a class="blog-heading" >I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                    <p class="blog-sub-heading">
                        <a>Food is a cornerstone of culture. Let’s start honoring both.</a>
                    </p>
                    <a>READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <img class="img-fluid" src="https://post.healthline.com/wp-content/uploads/2021/04/1044185-Im-a-Black-RD.-I-Want-to-Educate-White-People-on-Respecting-Cultural-Foodways_Thumbnail-1.jpg" alt="" class="css-1u8c2i8">

                <div>
                    <a class="blog-heading" >I’m a Black Dietitian — Here’s What I Want You to Know About Food and…</a>
                    <p class="blog-sub-heading">
                        <a>Food is a cornerstone of culture. Let’s start honoring both.</a>
                    </p>
                    <a>READ MORE<span class="css-15xqzls icon-hl-arrow-right css-0"></span>
                    </a>
                </div>
            </div>
        </div>





    </div>
@endsection


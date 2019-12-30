@extends('layouts.frontend')
@section('page')

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{$first_post->featured_img}}" alt=" {{$first_post->title}}" style="width:100%; height:300px;">
                        <div class="overlay"></div>
                        <a href="app/img/post1.jpg" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="{{route('post.single',['slug'=>$first_post->slug])}}">{{$first_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $first_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="#">{{$first_post->category->name}}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src=" {{$second_post->featured_img}} " alt=" {{$second_post->title}}" style="width:100%; height:300px;">
                        <div class="overlay"></div>
                        <a href="app/img/2.png" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="{{route('post.single',['id'=>$second_post->id]) }}"> {{$second_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $second_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="#">{{$second_post->category->name}}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="{{route('post.single',['id'=>$post->id]) }}"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{$third_post->featured_img}}" alt="{{$third_post->title}}" style="width:100%; height:300px;">
                        <div class="overlay"></div>
                        <a href="app/img/3.jpg" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="#" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="{{route('post.single',['id'=>$third_post->id]) }}">{{$third_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $third_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="#">{{$third_post->category->name}}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
        <div class="container">
            <div class="col-lg-12">

            <div class="offers">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="heading">
                            <h4 class="h1 heading-title"> {{$first_category->name }} </h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="case-item-wrap">
                        @foreach($first_category->posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src=" {{$post->featured_img}} " alt="{{$post->title}}" style="width:100%; height:200px;">
                                </div>
                                <h6 class="case-item__title"><a href="{{route('post.single',['id'=>$post->id]) }}"> {{$post->title}} </a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="padded-50"></div>


            <div class="offers">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="heading">
                            <h4 class="h1 heading-title"> {{$second_category->name}} </h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="case-item-wrap">
                        @foreach($second_category->posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src=" {{$post->featured_img}} " alt=" {{$post->title}}" style="width:100%; height:200px;" >
                                </div>
                                <h6 class="case-item__title"><a href="{{route('post.single',['id'=>$post->id]) }}">{{$post->title}}</a></h6>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="app/img/3.jpg" alt="our case">
                                </div>
                                <h6 class="text-center case-item__title">Claritas est etiam processus dynamicus</h6>
                            </div>
                        </div>

                        <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                    <img src="app/img/4.jpg" alt="our case">
                                </div>
                                <h6 class="case-item__title">quod mazim placerat facer possim assum</h6>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="padded-50"></div>
        </div>
        </div>
    </div>
</div>

@endsection

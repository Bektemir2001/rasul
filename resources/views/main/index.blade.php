@extends('layouts.main_main')
@section('content')
<div class="banner">


    {{-- header --}}
    @include('includes.header_for_main')
    {{-- header --}}


    <div class="carousel slide" id="carouselExampleCaptions" data-bs-ride="true">
        <div class="carousel-indicators">
          <button class="active" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-item-img d-block"></div>
            <div class="carousel-caption d-md-block">
              <h5>  @lang('lang.banner_title')</h5>
              <p>@lang('lang.banner_text') </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-item-img1 d-block"></div>
            <div class="carousel-caption d-md-block">
              <h5>  @lang('lang.banner_title')</h5>
              <p>@lang('lang.banner_text')</p>
          </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-item-img2 d-block"></div>
            <div class="carousel-caption d-md-block">
              <h5> @lang('lang.banner_title')</h5>
              <p>@lang('lang.banner_text')</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
      </div></div>
    <section class="section__content">
      <div class="container-lg">
        <div class="section__base">
          <div class="section__base__left">
            <div class="card section__content__card" style="max-width: 750px;">
              <div class="card-body">
                <ul class="card__list">
                  <li><a class="link__item" href="{{route('teacher')}}"><i class="fa-solid fa-graduation-cap"></i>
                      <h6>@lang('lang.teachers')</h6></a></li>
                  <li><a class="link__item" href="{{route('event')}}"><i class="fa-solid fa-calendar-day"></i>
                      <h6>@lang('lang.events')</h6></a></li>
                  <li><a class="link__item" href="{{route('distance_learn')}}"><i class="fa-solid fa-check"></i>
                      <h6> @lang('lang.distance_learning')</h6></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="section__base__right">
            <h3>@lang('lang.last_news')</h3>
            @foreach($events as $event)
            <div class="card mb-3 section__content__Newscard" style="max-width: 774px;">
              <div class="row g-0">
                <div class="col-md-4"><img class="img-fluid" src="{{asset($event->image_preview)}}" alt="#"></div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{$event->name}}</h5>
                    <p class="card-text">{{$event->created_at->toDateString()}}</p>
                    <div class="card-text">
                      <p class="text-muted">date</p>
                      <p class="text-muted"> <a href="{{route('news_details', $event->id)}}">узнать больше...</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    @endsection


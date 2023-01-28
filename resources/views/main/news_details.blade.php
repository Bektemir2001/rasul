@extends('layouts.main_main')
@section('content')
    <section class="section__banner">

        {{-- header --}}
        @include('includes.header_for_main')
        {{-- header --}}

      <div class="container-lg pt-5">
        <div class="section__news__card mb-5">
          <h3>{{$event->name}}</h3>
          <div class="section__news__card__img"></div>
          <p>{!!$event->content!!}</p>
        </div>
      </div>

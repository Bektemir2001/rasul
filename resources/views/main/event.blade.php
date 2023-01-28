@extends('layouts.main_main')
@section('content')
    <section class="section__banner">

        {{-- header --}}
        @include('includes.header_for_main')
        {{-- header --}}

      <div class="section__events__content">
        <div class="container">
          @for($i = 0; $i < count($events); $i += 2)
          <div class="row">
            <div class="col-md">
              <div class="section__events__content__card"><img src="{{asset($events[$i]->image_preview)}}" alt="">
                <div class="section__events__content__card__title">
                  <h4> <a href="{{route('news_details', $events[$i]->id)}}">{{$events[$i]->name}}</a></h4>
                </div>
              </div>
            </div>
            @if(array_key_exists($i+1, $events))
            <div class="col-md">
              <div class="section__events__content__card"><img src="{{asset($events[$i+1]->image_preview)}}" alt="">
                <div class="section__events__content__card__title">
                  <h4> <a href="{{route('news_details', $events[$i+1]->id)}}">{{$events[$i+1]->name}}</a></h4>
                </div>
              </div>
            </div>
            @endif
          </div>
          @endfor
        </div>
      </div>
    </section>
@endsection

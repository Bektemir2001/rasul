@extends('layouts.main_profil')
@section('content')
      <div class="container p-5">
        @for(; $i<$count; $i+=3)
        <div class="row">
          @if(array_key_exists($i,$lessons))
          <div class="col-md-4">
            <div class="section__user-items__card" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset($lessons[$i]->image)}});">
              <div class="section__user-items__card__text">
                <h4>{{$lessons[$i]->name}}</h4><a href="{{route('items_details', $lessons[$i]->id)}}">
                  <p>Подробнее</p></a>
              </div>
            </div>
          </div>
          @endif
          @if(array_key_exists($i+1,$lessons))
          <div class="col-md-4">
            <div class="section__user-items__card" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset($lessons[$i+1]->image)}});">
              <div class="section__user-items__card__text">
                <h4>{{$lessons[$i+1]->name}}</h4><a href="{{route('items_details', $lessons[$i+1]->id)}}">
                  <p>Подробнее</p></a>
              </div>
            </div>
          </div>
          @endif
          @if(array_key_exists($i+2,$lessons))
          <div class="col-md-4">
            <div class="section__user-items__card" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset($lessons[$i+2]->image)}});">
              <div class="section__user-items__card__text">
                <h4>{{$lessons[$i+2]->name}}</h4><a href="{{route('items_details', $lessons[$i+2]->id)}}">
                  <p>Подробнее</p></a>
              </div>
            </div>
          </div>
          @endif
        </div>
        @endfor
      </div>
 @endsection

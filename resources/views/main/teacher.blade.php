@extends('layouts.main_main')
@section('content')
    <section class="section__banner">

        {{-- header --}}
        @include('includes.header_for_main')
        {{-- header --}}

      <div class="container-md p9">
        <div class="section__teachers__list__cards">
          @foreach($teachers as $teacher)
            <div class="section__teachers__list__card">
              <div class="section__teachers__list__card__img"><img src="{{asset($teacher->image)}}" alt="#"></div>
              <div class="section__teachers__list__card__title mt-5">
                <h4>{{$teacher->name}} {{$teacher->surname}}</h4>
                <h6>{{Illuminate\Support\Str::limit($teacher->content, 100)}}</h6><span type="text" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$teacher->id}}">Подробнее</span>
                <div class="modal fade" id="exampleModalCenter{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-cont" style="width: auto; height: auto;">
                      <div class="modal-header">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h4>{{$teacher->name}} {{$teacher->surname}}</h4>
                        <h6>{{$teacher->job}}</h6>
                        <p>{{$teacher->content}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
@endsection

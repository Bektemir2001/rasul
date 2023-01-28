@extends('layouts.main_profil')
@section('content')
      <section class="section__item-details__content">
        <div class="container-lg">
          <div class="row p-5">
            <div class="col-md-4">
              <div class="section__item-details__content-img"><img src="{{asset($lesson->image)}}" alt="#"></div>
            </div>
            <div class="col-md-8">
              <h4>{{$lesson->name}}</h4>
              <p class="info__sub-title">{!!$lesson->content!!}</p>
              <p class="item-download"><a class="btnItems" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Посмотреть материал<i class="fa-solid fa-arrow-down ms-2"></i></a>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    @foreach($lesson_files as $file)
                    <span class="colapSpan">
                      <a href="{{route('file.download', $file->id)}}">{{$file->name}} 
                      </a>
                    </span>
                    @endforeach
                  </div>
                </div>
              </p>
            </div>
          </div>
        </div>
@endsection

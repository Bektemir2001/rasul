@extends('layouts.main_main')
@section('content')
    <section class="section__banner">

        {{-- header --}}
        @include('includes.header_for_main')
        {{-- header --}}

      <div class="section__distance__learning__content">
        <div class="container-md">
          <div class="row section__distance__learning__content__row">
            <div class="col-lg-4">
              <div class="section__distance__learning__content__first">
                <h5>Наша методика</h5><a href="{{route('our.items')}}">Подробнее</a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="section__distance__learning__content__first">
                <h5>Наши курсы</h5><a href="{{route('our.items')}}">Подробнее</a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="section__distance__learning__content__first">
                <h5>Наши курсы</h5><a href="{{route('our.items')}}">Подробнее</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

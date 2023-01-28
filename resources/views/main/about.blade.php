@extends('layouts.main_main')
@section('content')
{{-- header --}}
      @include('includes.header_for_main')
      {{-- header --}}
    <div class="banner__content-about-us">\

      

      <div class="banner__content-about-us__title container-lg">
        <p class="banner__content-about-us__title__sub-title"> @lang('lang.about_banner')</p>
      </div>
    </div>
    <section class="section__content">
      <div class="container-lg">
        <div class="section__content__text">
          <div class="section__content__text__first">
            <h4>@lang('lang.about_title')</h4>
            <p>@lang('lang.about_body')</p>
          </div>
        
        </div>
      </div>
    </section>
@endsection

@extends('layouts.main_main')
@section('content')
<div class="section__banner">


    {{-- header --}}
    @include('includes.header_for_main')
    {{-- header --}}
    <div class="container-lg">
        <div class="section__devouring mt-5 mb-5">
          <h5 class="text-center">@lang('lang.devouringT')</h5>
          <div class="section__devouring__text">
            @lang('lang.devouring')
          </div>
        </div>
      </div>

    @endsection


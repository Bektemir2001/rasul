
@extends('layouts.main_main')
@section('content')

    <section class="section__banner">

        {{-- header --}}
        @include('includes.header_for_main')
        {{-- header --}}


      <div class="section__contacts__content container">
        <div class="row">
          <div class="col">
            <div class="section__contacts__content__form m-5">
            @lang('lang.contact_header')
              <form class="form__body" action="{{route('feedback')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput1"> @lang('lang.contact_form_name')*</label>
                  <input class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" type="text" name="name" required autocomplete="name" autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  @if(session('notification') !== "ErrorWithRegistration" && session('notification') !== "ErrorWithAuthentication")
                  @error('name')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  @endif
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput2"> @lang('lang.contact_form_email')* </label>
                  <input name="email" class="form-control" id="exampleFormControlInput2" type="email" required autocomplete="email" autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  @if(session('notification') !== "ErrorWithRegistration" && session('notification') !== "ErrorWithAuthentication")
                  @error('email')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  @endif
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlInput3"> @lang('lang.contact_form_tema')</label>
                  <input name="title" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput3" type="text" required autocomplete="title" autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  @if(session('notification') !== "ErrorWithRegistration" && session('notification') !== "ErrorWithAuthentication")
                  @error('title')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  @endif
                </div>
                <div class="mb-3">
                  <label class="form-label" for="exampleFormControlTextarea4"> @lang('lang.contact_form_text')*</label>
                  <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="exampleFormControlTextarea4" rows="3" required autocomplete="message" autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')"></textarea>
                  @if(session('notification') !== "ErrorWithRegistration" && session('notification') !== "ErrorWithAuthentication")
                  @error('message')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  @endif
                </div>
                <div class="mb-3">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::renderJs('ru', true, 'recaptchaCallback') !!}
                    {!! NoCaptcha::display() !!}
                  </div>
                <div class="form__btn">
                  <button type="submit" class="form__btn__btnSend text-white"> @lang('lang.contact_form_btn')</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col">
            <div class="section__contacts__content__navigate m-5">
              <div class="section__contacts__content__navigate__map">
                <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/10309/bishkek/?utm_medium=mapframe&amp;utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">&Bcy;&icy;&shcy;&kcy;&iecy;&kcy;</a><a href="https://yandex.ru/maps/10309/bishkek/house/Y00YcA5hSEIOQFpofXR2cH1lYg==/?ll=74.685764%2C42.870803&amp;utm_medium=mapframe&amp;utm_source=maps&amp;z=14.27" style="color:#eee;font-size:12px;position:absolute;top:14px;">&Ucy;&lcy;&icy;&tscy;&acy; &Kcy;&acy;&zcy;&acy;&ncy;-&Bcy;&ucy;&lcy;&acy;&kcy;, 1/1&Acy; &mdash; &YAcy;&ncy;&dcy;&iecy;&kcy;&scy;&nbsp;&Kcy;&acy;&rcy;&tcy;&ycy;</a>
                  <iframe src="https://yandex.ru/map-widget/v1/-/CCUFqLF9SB" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
              </div>
              <div class="section__contacts__content__navigate__adress">
              @lang('lang.contact_contact')
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

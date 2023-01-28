@extends('layouts.main_main')
@section('content')
    <section class="section__banner">

        {{-- header --}}
        @include('includes.header_for_main')
        {{-- header --}}

      <div class="section__application__form container-lg">
      @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif
        
        <h5>Для зачисление в наш институт  можете  оставить <br>заявку и мы с вами свяжемся!</h5>
        <form class="section__application__form__body" action="{{route('feedback')}}" method="POST">
            @csrf
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Имя*</label>
            <input class="form-control" id="exampleFormControlInput1" type="text" name="name" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
          </div>
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Фамилия*</label>
            <input class="form-control" id="exampleFormControlInput1" type="text" name="surname" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
          </div>
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Номер телефона*</label>
            <input class="form-control" id="exampleFormControlInput1" type="text" name="phone_number" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
          </div>
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Ваш адрес электроной почты* </label>
            <input class="form-control" id="exampleFormControlInput1" type="email" name="email" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
          </div>
          <div class="mb-3">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::renderJs('ru', true, 'recaptchaCallback') !!}
            {!! NoCaptcha::display() !!}
          </div>
          <div class="form__btn">
            <button type="submit" class="form__btn__aplicBtn text-white">Отправить</button>
          </div>
        </form>
      </div>
    </section>
    <script type="text/javascript">
      var notification = document.getElementById('notification');
      if(notification){
          var timer = setInterval(timerFunction, 1000);
          var count = 0;
          function timerFunction() {
              count++;
              if(count > 5){
                  notification.className = "d-none";
                  clearInterval(timer);
              }
          }
      }
    </script>
@endsection

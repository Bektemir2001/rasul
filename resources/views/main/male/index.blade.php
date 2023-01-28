@extends('layouts.main_main')
@section('content')
<div class="banner">

     {{-- header --}}
     @include('includes.header_for_main')
     {{-- header --}}

</div>
    <section class="section__content">

      <div class="container-lg">
      @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif
        @if($set_button)
        @include('includes.application_form')
        @endif
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


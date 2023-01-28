@extends('layouts.main_main')
@section('content')
<div class="banner">

     {{-- header --}}
     @include('includes.header_for_main')
     {{-- header --}}

</div>
    <section class="section__content">
        @if(session('test_time_m') != null)

                        <script>
                            localStorage.setItem('test_time_m', {{session('test_time_m')}});
                            localStorage.setItem('test_time_s', {{session('test_time_s')}});
                        </script>
                        <div clas="d-none">
                            {{session()->forget('test_time_m')}}
                            {{session()->forget('test_time_s')}}
                        </div>
        @endif
      <div class="container-lg">
        <div class="container">
            <h4 class="mb-4 mt-4">{{$test->name}}</h4>
            <form action="{{route('male.test.result', $test->id)}}" method="POST">
              @csrf
            @foreach ($questions as $question)
            <div style="width:70%;">
                <div class="card">
                    <b>{{$i.") ".$question->question}}</b>
                    <div class="card-body">
                        <div class="form-check">
                            <b class="text-primary">{{'a)'}}</b>
                            <input class="form-check-input" type="radio" name="{{'answer['.$question->id.']'}}" id="{{'flexRadioDefault'.$i}}" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              <h6>{{$question->first_answer}}</h6>
                            </label>
                          </div>
                          <div class="form-check">
                            <b class="text-primary">{{'b)'}}</b>
                            <input class="form-check-input" type="radio" name="{{'answer['.$question->id.']'}}" id="{{'flexRadioDefault'.$i}}" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              <h6>{{$question->second_answer}}</h6>
                            </label>
                          </div>
                          <div class="form-check">
                            <b class="text-primary">{{'c)'}}</b>
                            <input class="form-check-input" type="radio" name="{{'answer['.$question->id.']'}}" id="{{'flexRadioDefault'.$i}}" value="3">
                            <label class="form-check-label" for="flexRadioDefault2">
                              <h6>{{$question->third_answer}}</h6>
                            </label>
                          </div>
                    </div>
                </div>
            </div>
            <div class="d-none">{{$i += 1}}</div>
            @endforeach
            <button class="btn btn-primary mb-4 mt-4" id="send_test_button">Закончить тест</button>
            </form>
        </div>

      </div>
    </section>

    @endsection


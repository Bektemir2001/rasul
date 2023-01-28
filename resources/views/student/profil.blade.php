@extends('layouts.main_profil')
@section('content')

    <div class="container-lg section__profile mb-5">
      <div class="row">
        <div class="col-md-3">
            @if (auth()->user()->image)
            <div class="section__profile__user p-5"><img src="{{asset(auth()->user()->image)}}" alt="">
            @endif

            <div class="section__profile__user__info">
              <h4>{{$user->name}}</h4>
              <h4>{{$user->surname}}</h4>
              <p>Lorem, ipsum dolor.</p>
              <div class="section__profile__user__info-title">
                <p>Возраст: <span>{{$user->age}}</span></p>
                @if(count($user->student))
                <p>Статус:<span>Студент</span></p>
                @else
                  @if(count($user->application))
                    @if($user->application[array_key_last($user->application->toArray())]['status'] == 0)
                      <p>Статус:<span> в ожидании</span></p>
                    @elseif($user->application[array_key_last($user->application->toArray())]['status'] == 1)
                      <p>Статус:<span> отменено</span></p>
                    @endif
                  @else
                  <p>Статус:<span></span></p>
                  @endif
                @endif
                <p>Адресс:<span>{{auth()->user()->address}}</span></p>
                @include('includes.change_users_data_form')
              </div>

            </div>

          </div>

        </div>
        @if (count(auth()->user()->student))
        <div class="col-md-9">
            <div class="section__profile__data p-5">
              <table class="table table-bordered">
                <thead>
                  <tr></tr>
                  <th scope="col">#</th>
                  <th scope="col">Семестр</th>
                  <th scope="col">Предмет</th>
                  <th scope="col">Балл</th>
                  <th scope="col">%</th>
                </thead>
                <tbody>
                    @foreach (auth()->user()->testResult as $test)
                    {{-- @dd($test) --}}
                        <tr>
                            <th scope="row">{{$test->id}}</th>
                            <td>{{$test->test->lesson->semester->name}}</td>
                            <td>{{$test->test->lesson->name}}</td>
                            <td>{{$test->score}}</td>
                            <td>{{$test->percent}}</td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        @endif
      </div>
    </div>


@endsection



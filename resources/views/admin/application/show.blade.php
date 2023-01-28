@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
          @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif
            <div class="text-center">
              <img class="img-fluid img-circle" src="{{asset($application->user->image)}}" alt="User profile picture" style="width:150px; height:150px;">
            </div>

            <h3 class="profile-username text-center">{{$application->user->name}} {{$application->user->surname}}</h3>

            <p class="text-muted text-center">{{$application->type->name}}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Адрес</b>
                <div class="">{{$application->user->address}}</div>
              </li>
              <li class="list-group-item">
                <b>Возраст</b>
                <div class="">{{$application->user->age}}</div>
              </li>
              <li class="list-group-item">
                <b>Email</b>
                <div class="">{{$application->user->email}}</div>
              </li>
              <li class="list-group-item">
                <b>Текст</b>
                <div class="">{{$application->message}}</div>
              </li>
              <li class="list-group-item">
                <b>Пасспорт</b>
                <div>
                    <img src="{{asset('storage/'.$application->passport_image)}}" style="width: 600px; height:400px;"/>
                </div>

              </li>
              <li class="list-group-item">
                <b>Аттестат</b>
                <div>
                    <img src="{{asset('storage/'.$application->certificate_image)}}" style="width: 600px; height:400px;"/>
                </div>

              </li>
            </ul>
            @if($application->status != 2)
              <div style="float: left;display: block; width:15%;" class="text-center">
                  <a href="{{route('application.accept', $application->id)}}" class="btn btn-primary">Принять</a>
              </div>
            @endif
            @if($application->status != 1)
            <div style="float: left;display: block; width:15%;" class="text-center">
                  <a href="{{route('application.cancel', $application->id)}}" class="btn btn-danger">Отменить</a>
              </div>
            @endif
            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('application.delete', $application->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button title="submit" class="btn btn-secondary">
                        Удалить
                    </button>
                </form>
             </div>
             <div style="float: left;display: block; width:15%;" class="text-center">
                  <a href="{{route('application.pending')}}" class="btn btn-danger">Назат</a>
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
</div>


@endsection



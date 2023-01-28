@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
          @if($moderator->image)
            <div class="text-center">

              <img class="img-fluid img-circle" src="{{asset($moderator->image)}}" alt="moderator profile picture" style="width:150px; height:150px;">
            </div>
          @endif
            <h3 class="profile-username text-center">{{$moderator->name}} {{$moderator->surname}}</h3>

            <p class="text-muted text-center">{{$moderator->gender == 'male' ? 'Мужчина' : 'Женщина' }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Адрес</b>
                <div class="">{{$moderator->address}}</div>
              </li>
              <li class="list-group-item">
                <b>Возраст</b>
                <div class="">{{$moderator->age}}</div>
              </li>
              <li class="list-group-item">
                <b>Email</b>
                <div class="">{{$moderator->email}}</div>
              </li>
              <li class="list-group-item">
                <b>Текст</b>
                <div class="">{{$moderator->content}}</div>
              </li>
            </ul>

            <div style="float: left;display: block; width:15%;" class="text-center">
                <a href="{{route('moderator.edit', $moderator->id)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('moderator.delete', $moderator->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button title="submit" class="btn btn-secondary">
                        Удалить
                    </button>
                </form>
             </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
      </div>
</div>
@endsection



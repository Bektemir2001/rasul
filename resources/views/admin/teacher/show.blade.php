@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid img-circle" src="{{asset($teacher->image)}}" alt="User profile picture" style="width:150px; height:150px;">
            </div>

            <h3 class="profile-username text-center">{{$teacher->name}} {{$teacher->surname}}</h3>

            <p class="text-muted text-center">Teacher</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Адрес</b>
                <div class="">{{$teacher->address}}</div>
              </li>
              <li class="list-group-item">
                <b>Возраст</b>
                <div class="">{{$teacher->age}}</div>
              </li>
              <li class="list-group-item">
                <b>Текст</b>
                <div class="">{{$teacher->content}}</div>
              </li>
            </ul>

            <div style="float: left;display: block; width:15%;" class="text-center">
                <a href="{{route('teacher.edit', $teacher->id)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('teacher.delete', $teacher->id)}}" method="POST">
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



@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid img-circle" src="{{asset($student->user->image)}}" alt="User profile picture" style="width:150px; height:150px;">
            </div>

            <h3 class="profile-username text-center">{{$student->user->name}} {{$student->user->surname}}</h3>

            <p class="text-muted text-center">{{$student->type->name}}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <div><b>Курс</b></div>
                <div style="float:left; display: block; width: 10%;" id="studentLevel">{{$student->level}}</div>
                <div style="float:left; display: block; width:50%;">
                  @if($student->level < 4)
                  <button class="btn btn-primary btn-sm" onclick="upLevel()">поднять</button>
                  @endif
                  @if($student->level > 1)
                  <button class="btn btn-danger btn-sm" onclick="downLevel()">понизить</button>
                  @endif
                </div>
              </li>
              <li class="list-group-item">
                <b>Адрес</b>
                <div class="">{{$student->user->address}}</div>
              </li>
              <li class="list-group-item">
                <b>Возраст</b>
                <div class="">{{$student->user->age}}</div>
              </li>
              <li class="list-group-item">
                <b>Email</b>
                <div class="">{{$student->user->email}}</div>
              </li>
              <li class="list-group-item">
                <b>Текст</b>
                <div class="">{{$student->content}}</div>
              </li>
            </ul>

            <div style="float: left;display: block; width:15%;" class="text-center">
                <a href="{{route('student.edit', $student->id)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('student.delete', $student->id)}}" method="POST">
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
<script type="text/javascript">
  function upLevel(){
    var level = document.getElementById('studentLevel');
    $.ajax({
            url: "{{route('upLevel', ['_token' => 'csrf_token'])}}",
            data: {id:{{$student->id}}},
            success: function(response){
                level.innerHTML = response.level;
            }
        });
  }
  function downLevel(){
    var level = document.getElementById('studentLevel');
    $.ajax({
            url: "{{route('downLevel', ['_token' => 'csrf_token'])}}",
            data: {id:{{$student->id}}},
            success: function(response){
                level.innerHTML = response.level;
            }
        });
  }

</script>
@endsection



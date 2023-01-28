@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{$feedback->name}} {{$feedback->surname}}</h3>

            <p class="text-muted text-center">Обратная связь</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Тема</b>
                <div class="">{{$feedback->title}}</div>
              </li>
              <li class="list-group-item">
                <b>Номер телефона</b>
                <div class="">{{$feedback->phone_number}}</div>
              </li>
              <li class="list-group-item">
                <b>Email</b>
                <div class="">{{$feedback->email}}</div>
              </li>
              <li class="list-group-item">
                <b>Текст</b>
                <div class="">{{$feedback->message}}</div>
              </li>
            </ul>

            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('feedback.delete', $feedback->id)}}" method="POST">
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



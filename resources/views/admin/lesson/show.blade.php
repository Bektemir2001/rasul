@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid" src="{{asset($lesson->image)}}" alt="User profile picture" style="width:200px; height:200px;">
            </div>

            <h3 class="profile-username text-center">{{$lesson->name}}</h3>

            <p class="text-muted text-center">Предмет</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Семестр</b>
                <div class="">{{$lesson->semester->name}}</div>
              </li>
              @foreach ($lesson->files as $file)
              <li class="list-group-item">
                <b>{{$file->name}}</b>
                <div>
                <a href="{{route('file.download', $file->id)}}">Скачать</a>
                </div>
              </li>
              @endforeach
              <li class="list-group-item">
                <b>Добавить файл</b>
                <form action="{{route('lesson.addfile', $lesson->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file col-6">
                        <input type="file" class="custom-file-input form-control @error('files.*') is-invalid @enderror" id="exampleInputFile" name="files[]" value="{{old('files')}}" multiple required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте файл')" oninput="this.setCustomValidity('')">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
                <div>
                </div>
              </li>
            </ul>

            <div style="float: left;display: block; width:15%;" class="text-center">
                <a href="{{route('lesson.edit', $lesson->id)}}" class="btn btn-primary">Редактировать</a>
            </div>
            <div style="float: left;display: block;" class="text-center">
                <form action="{{route('lesson.delete', $lesson->id)}}" method="POST">
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



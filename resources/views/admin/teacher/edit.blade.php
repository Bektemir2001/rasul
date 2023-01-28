@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container">
        <div class="container">
            <div class="card-body">
                <form method="POST" action="{{ route('teacher.update', $teacher->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$teacher->name}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="surname" class="col-md-4 col-form-label text-md-end">Фамилия</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$teacher->surname}}" required autocomplete="surname" autofocus>

                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                            <label for="job" class="col-md-4 col-form-label text-md-end">Специальность</label>
                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control" name="job" value="{{ old('job') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Адрес</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ $teacher->address }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="age" class="col-md-4 col-form-label text-md-end">Возраст</label>
                        <div class="col-md-6">
                            <input id="age" type="text" class="form-control" name="age" value="{{ $teacher->age }}">
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-md-4 col-form-label text-md-end">Текст</label>
                        <div class="col-md-6">
                            <textarea id="text" type="text" class="form-control" name="content" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">{{ $teacher->content }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="exampleInputFile" class="col-md-4 col-form-label text-md-end">Изображение</label>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-3" src="{{asset($teacher->image)}}"  alt="image" style="width:200px;height:200px;">
                        </div>
                            <div class="col-md-6 custom-file" style="left: 35%">
                                <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{route('teacher.index')}}" class="btn btn-secondary">
                                Отменить
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Обнавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection



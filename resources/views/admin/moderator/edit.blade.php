@extends('layouts.main_admin')
@section('content')

  <div class="content-wrapper">
    <div class="container">
        <div class="container">
            <div class="card-body">
                <form method="POST" action="{{ route('moderator.update', $moderator->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$moderator->name}}" required autocomplete="name" autofocus>
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
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$moderator->surname}}" required autocomplete="surname" autofocus>
                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $moderator->email }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="type_id" class="col-md-4 col-form-label text-md-end">Тип</label>

                        <div class="col-md-6">
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected=""value="0" >Пол</option>
                                <option {{$moderator->gender == 'male' ? 'selected':''}} value="male">Мужчина</option>
                                <option {{$moderator->gender == 'woman' ? 'selected':''}} value="woman">Женщина</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Адрес</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ $moderator->address }}">
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
                            <input id="age" type="text" class="form-control" name="age" value="{{ $moderator->age }}">
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
                            <textarea id="text" type="text" class="form-control" name="content">{{ $moderator->content }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="exampleInputFile" class="col-md-4 col-form-label text-md-end">Изображение</label>
                        @if($moderator->image)
                        <div class="col-sm-6">
                            <img class="img-fluid mb-3" src="{{asset($moderator->image)}}"  alt="image" style="width:200px;height:200px;">
                        </div>
                        @endif
                            <div class="col-md-6 custom-file" style="margin-left:35%;">
                                <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>
                    <input class="d-none" name="id" value="{{ $moderator->id }}">
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{route('moderator.index')}}" class="btn btn-secondary">
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

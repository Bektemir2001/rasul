@extends('layouts.main_admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <div class="mt-4 mb-4">
            <button type="button" class="btn btn-primary btn-sm" id="modalButton" onclick="openWindow()">Добавить</button>

            <!-- Create Modal -->
            <div class="d-none" id="createWindow">

                  <form class="mt-4 mb-4" method="POST" action="{{ route('moderator.store') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="row mb-3">
                          <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="surname" class="col-md-4 col-form-label text-md-end">Фамилия</label>

                          <div class="col-md-6">
                              <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                          </div>
                      </div>
                      <div class="row mb-3">
                        <label for="surname" class="col-md-4 col-form-label text-md-end">Email</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="surname" class="col-md-4 col-form-label text-md-end">Пароль</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control" name="password" value="{{ old('password') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-md-4 col-form-label text-md-end">Пол</label>

                        <div class="col-md-6">
                            <select name="gender" class="form-control">
                                <option value="male">Мужчина</option>
                                <option value="woman">Женщина</option>
                            </select>
                        </div>
                    </div>
                      <div class="row mb-3">
                          <label for="address" class="col-md-4 col-form-label text-md-end">Адрес</label>
                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="age" class="col-md-4 col-form-label text-md-end">Возраст</label>
                          <div class="col-md-6">
                              <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}">
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="text" class="col-md-4 col-form-label text-md-end">Текст</label>
                          <div class="col-md-6">
                              <textarea id="text" type="text" class="form-control" name="content">{{ old('content') }}</textarea>
                          </div>
                      </div>
                      <div class="row mb-4">
                          <label for="exampleInputFile" class="col-md-4 col-form-label text-md-end">Изображение</label>
                              <div class="col-md-6 custom-file">
                                  <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="image" value="{{old('image')}}">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeWindow()">Отменить</button>
                              <button type="submit" class="btn btn-primary">
                                  Дабовить
                              </button>
                          </div>
                      </div>
                  </form>
            </div>
          </div>
          {{-- Create Modal --}}
            {{-- @if(count($errors))
            @dd($errors)
            @endif --}}
          {{-- Error Modal --}}

          @if(count($errors))
          <div class="mt-4 mb-4">
              <button type="button" class="d-none" id="autoclick" onclick="openErrorWindow()"></button>

              <div class="d-none" id="errorWindow">
                      <form class="mt-4" method="POST" action="{{ route('moderator.store') }}" enctype="multipart/form-data">
                          @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            @error('name')
                                <p class="text-danger" style="margin-left:35%;">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">Фамилия</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                            </div>
                            @error('surname')
                                <p class="text-danger" style="margin-left:35%;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                          <label for="surname" class="col-md-4 col-form-label text-md-end">Email</label>

                          <div class="col-md-6">
                              <input id="surname" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                          </div>
                            @error('email')
                                <p class="text-danger" style="margin-left:35%;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                          <label for="surname" class="col-md-4 col-form-label text-md-end">Пароль</label>

                          <div class="col-md-6">
                              <input id="surname" type="text" class="form-control" name="password" value="{{ old('password') }}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                          </div>
                            @error('password')
                                <p class="text-danger" style="margin-left:35%;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Пол</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control">
                                    <option value="male"
                                        {{old('gender') === 'male' ? 'selected' : ''}}>
                                        Мужчина
                                    </option>
                                    <option value="woman"
                                        {{old('gender') === 'woman' ? 'selected' : ''}}>
                                        Женщина
                                    </option>
                                </select>
                            </div>
                           @error('gender')
                                <p class="text-danger" style="margin-left:35%;">{{$message}}</p>
                            @enderror
                        </div>
                          <div class="row mb-3">
                              <label for="address" class="col-md-4 col-form-label text-md-end">Адрес</label>
                              <div class="col-md-6">
                                  <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="age" class="col-md-4 col-form-label text-md-end">Возраст</label>
                              <div class="col-md-6">
                                  <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}">
                              </div>
                          </div>
                          <div class="row mb-3">
                              <label for="text" class="col-md-4 col-form-label text-md-end">Текст</label>
                              <div class="col-md-6">
                                  <textarea id="text" type="text" class="form-control" name="content">{{ old('content') }}</textarea>
                              </div>
                          </div>
                          <div class="row mb-4">
                              <label for="exampleInputFile" class="col-md-4 col-form-label text-md-end">Изображение</label>
                                  <div class="col-md-6 custom-file">
                                      <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="image" value="{{old('image')}}">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                            @error('image')
                                <p class="text-danger" style="margin-left:35%;">{{$message}}</p>
                            @enderror
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeErrorWindow()">Отменить</button>
                                  <button type="submit" class="btn btn-primary">
                                      Дабовить
                                  </button>
                              </div>
                          </div>
                      </form>
              </div>
            </div>
          @endif
          {{-- Error Modal --}}

        <div class="container">
        <h3 class="text-center">Модераторы</h3>

        @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif
        <div class="container">
            <div class="demo-html">
                <div id="example_wrapper" class="">
                    <table id="example" class="table table-bordered border-primary" style="width: 100%;" aria-describedby="example_info">
                        <thead>
                            <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10%;">
                                id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                                Имя
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 30%;">
                                Фамилия
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 15%;">
                                Пол
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25%;">
                                Действие
                            </th>
                            {{-- <th width="2px"></th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($moderators as $moderator)
                            <tr>
                                <td class="sorting_1">{{$moderator->id}}</td>
                                <td>{{$moderator->name}}</td>
                                <td>{{$moderator->surname}}</td>
                                <td>{{$moderator->gender == 'male' ? 'Мужчина' : 'Женшина'}}</td>
                                <td>
                                    <div style="float: left;
                                    display: block;
                                    width: 30%;" class="text-center">
                                        <a href="{{route('moderator.show', $moderator->id)}}"><i class="fas fa-eye"></i></a>
                                    </div>
                                    <div style="float: left;
                                    display: block;
                                    width: 30%;" class="text-center">
                                        <a href="{{route('moderator.edit', $moderator->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                    </div>
                                    <div style="float: left;
                                    display: block;
                                    width: 30%;" class="text-center">
                                        <form action="{{route('moderator.delete', $moderator->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button title="submit" class="border-0 bg-transparent">
                                                <i title="submit" class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </div>


                                </td>
                                {{-- td>rfed</td> --}}
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
@endsection

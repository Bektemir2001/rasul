@extends('layouts.main_admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">

        <div class="mt-4 mb-4">
          <button type="button" class="btn btn-primary btn-sm" id="modalButton" onclick="openWindow()">Добавить Семестр</button>

          <!-- Create Modal -->
          <div class="d-none" id="createWindow">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('semester.store')}}" method="POST">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить Семестр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label for="exampleInput" class="form-label">Название семестра</label>
                    <input type="text" class="form-control" name="name" id="exampleInput" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                  </div>
                  <div class="modal-body">
                    <label class="form-label">Форма обучения</label>
                    <select class="form-select" name="type_id">
                        @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeWindow()">Отменить</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        {{-- Create Modal --}}

        {{-- Error Modal --}}

        @if(count($errors))
        <div class="mt-4 mb-4">
            <button type="button" class="d-none" id="autoclick" onclick="openErrorWindow()"></button>

            <div class="d-none" id="errorWindow">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{route('semester.store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Добавить Семестр</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <label for="exampleInput" class="form-label">Название</label>
                      <input type="text" class="form-control" name="name" id="exampleInput" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                      @error('name')
                        <p class="text-danger">Укажите названия семестра</p>
                      @enderror
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Форма обучения</label>
                        <select class="form-select" name="type_id">
                            @foreach($types as $type)
                            <option value="{{$type->id}}"
                                {{old('type_id') == $type->id ? 'selected' : ''}}>
                                {{$type->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('type_id')
                        <p class="text-danger">{{$message}}</p>
                      @enderror
                      </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeErrorWindow()">Отменить</button>
                      <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        @endif
        {{-- Error Modal --}}
        <div class="container">
        <h3 class="text-center">Семестры</h3>

        @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif

        <div class="demo-html" style="width: 90%;display: block;
        margin-left: auto;
        margin-right: auto;">
            <div id="example_wrapper" class="">
                <table id="example" class="table table-bordered border-primary" aria-describedby="example_info">
                    <thead>
                        <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10%;">
                            id
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                            Названия
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                            Форма обучения
                        </th>
                        <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25%;">
                            Действие
                        </th>
                        {{-- <th width="2px"></th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($semesters as $semester)
                        <tr class="odd">
                            <td class="sorting_1">{{$semester->id}}</td>
                            <td>{{$semester->name}}</td>
                            <td>{{$semester->type->name}}</td>
                            
                            <td>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <a href="{{route('semester.show', $semester->id)}}"><i class="fas fa-eye"></i></a>
                                </div>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <a href="{{route('semester.edit', $semester->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                </div>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <form action="{{route('semester.delete', $semester->id)}}" method="POST">
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

<!-- ./wrapper -->

@endsection



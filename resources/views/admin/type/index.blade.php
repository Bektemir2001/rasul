@extends('layouts.main_admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">

        <div class="mt-4 mb-4">
          <button type="button" class="btn btn-primary btn-sm" id="modalButton" onclick="openWindow()">Добавить</button>

          <!-- Create Modal -->
          <div class="d-none" id="createWindow">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('type.create')}}" method="POST">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label for="exampleInput" class="form-label">Название</label>
                    <input type="text" class="form-control" name="name" id="exampleInput">
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
                  <form action="{{route('type.create')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <label for="exampleInput" class="form-label">Название</label>
                      <input type="text" class="form-control" name="name" id="exampleInput">
                      @error('name')
                        <p class="text-danger">Укажите названия типа</p>
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
        <h3 class="text-center">Форма Обучения</h3>

        @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif

        <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col" colspan="3" class="text-center">Действие</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $type)
              <tr>
                <th scope="row">{{$type->id}}</th>
                <td>{{$type->name}}</td>
                <td width="60px"><a href="{{route('type.show', $type->id)}}" class="btn btn-primary">Смотреть</a></td>
                <td width="80px"><a href="{{route('type.edit', $type->id)}}" class="btn btn-success">Редактировать</a></td>
                <td width="70px">
                    <form action="{{route('type.delete', $type->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
<!-- ./wrapper -->

@endsection



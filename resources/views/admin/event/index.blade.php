@extends('layouts.main_admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">

        <div class="mt-4 mb-4">
          <button type="button" class="btn btn-primary btn-sm" id="modalButton" onclick="openWindow()">Добавить</button>

          <!-- Create Modal -->
          <div class="d-none" id="createWindow">
            <div class="container">
              <div class="container">
                <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWindow()">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput" class="form-label">Название</label>
                        <input type="text" class="form-control col-6 @error('name') is-invalid @enderror" name="name" id="exampleInput" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label>Текст</label>
                        <textarea class="form-control" name="content" id="ckeditor" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')"></textarea>
                    </div>
                    <div class="form-group col-6">
                        <label>Изображение для предварительного просмотра</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image_preview" value="{{old('image')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>

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
              <div class="container">
                <div class="container">
                  <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeErrorWindow()">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="form-group">
                        <label for="exampleInput" class="form-label">Название</label>
                        <input type="text" class="form-control col-6" name="name" id="exampleInput" value="{{old('name')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                        @error('name')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label>Текст</label>
                          <textarea name="content" id="ckeditor1" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">{{old('content')}}</textarea>
                          @error('content')
                              <p class="text-danger"> пожалуйста, заполните это поле </p>
                          @enderror
                        </div>
                    <div class="form-group col-6">
                        <label>Изображение для предварительного просмотра</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image_preview') is-invalid @enderror" id="exampleInputFile" name="image_preview" value="{{old('image_preview')}}" required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте фото')" oninput="this.setCustomValidity('')">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @error('image_preview')
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
        <h3 class="text-center mb-4 mt-4">Мероприятия</h3>

        @if(session('notification'))
        <div class="alert alert-light" role="alert" style="font-size: 16px; background-color: #f3ebf3;" id="notification">
            <ul>
                <li>{{session('notification')}}</li>
            </ul>
        </div>
        @endif

        <div class="demo-html" style="width: 70%;display: block;
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
                        <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 25%;">
                            Действия
                        </th>
                        {{-- <th width="2px"></th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr class="odd">
                            <td class="sorting_1">{{$event->id}}</td>
                            <td>{{$event->name}}</td>
                            <td>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <a href="{{route('event.show', $event->id)}}"><i class="fas fa-eye"></i></a>
                                </div>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <a href="{{route('event.edit', $event->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                </div>
                                <div style="float: left;
                                display: block;
                                width: 30%;" class="text-center">
                                    <form action="{{route('event.delete', $event->id)}}" method="POST">
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

<script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script>
    var editor = CKEDITOR.replace( 'ckeditor',{
      filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
      } );
    var editor1 = CKEDITOR.replace( 'ckeditor1',{
      filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
      } );
</script>
<!-- ./wrapper -->

@endsection



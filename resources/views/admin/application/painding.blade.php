@extends('layouts.main_admin')
@section('content')
<div class="content-wrapper">
        <div class="container mb-4 mt-4">
        <h3 class="text-center">Заявки в ожидании</h3>

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
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">
                                id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 20%;">
                                Имя
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 25%;">
                                Фамилия
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 15%;">
                                Форма обучение
                            </th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20%;">
                                Действия
                            </th>
                            {{-- <th width="2px"></th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                            <tr>
                                <td class="sorting_1">{{$application->id}}</td>
                                <td>{{$application->user->name}}</td>
                                <td>{{$application->user->surname}}</td>
                                <td>{{$application->type->name}}</td>
                                <td>
                                    <div style="float: left;
                                    display: block;
                                    width: 50%;" class="text-center">
                                        <a href="{{route('application.show', $application->id)}}" class="btn btn-primary">Смотреть</a>
                                    </div>
                                    <div style="float: left;
                                    display: block;
                                    width: 50%;" class="text-center">
                                        <form action="{{route('student.delete', $application->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button title="submit" class="btn btn-danger">
                                                Удалить
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

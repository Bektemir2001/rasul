@extends('layouts.main_admin')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container mb-4 mt-4">

        <div class="container">
        <h3 class="text-center">Пользователи</h3>

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
                            @foreach ($users as $user)
                            <tr>
                                <td class="sorting_1">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->gender == 'male' ? 'Мужчина' : 'Женшина'}}</td>
                                <td>
                                    <div style="float: left;
                                    display: block;
                                    width: 30%;" class="text-center">
                                        <a href="{{route('user.show', $user->id)}}"><i class="fas fa-eye"></i></a>
                                    </div>
                                    <div style="float: left;
                                    display: block;
                                    width: 30%;" class="text-center">
                                        <a href="{{route('user.edit', $user->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                    </div>
                                    <div style="float: left;
                                    display: block;
                                    width: 30%;" class="text-center">
                                        <form action="{{route('user.delete', $user->id)}}" method="POST">
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

@extends('layouts.main_admin')
@section('content')

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-4 mt-4">
                    <h1 class="m-0 text-center">{{$event->name}}</h1>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </div>
        <div class="container">

            <div class="text-center">
                <label>Изображение для предварительного просмотра</label>
            </div>
            <div class="text-center">
                <img src="{{asset($event->image_preview)}}" alt="image" style="width: 450px; height: 350px; border-radius: 8px;"/>
            </div>
        </div>
        <div class="mb-4 mt-4" style="position: relative; top: 50px;">
            <h3 class="text-center">Текст</h3>
        </div>
        <div style="position: relative; top: 50px;">
            <h4 class="mb-4 mt-4 text-center">
                {!! $event->content !!}
            </h4>
        </div>

        <div class="mt-4 card-body" style="position: relative; top: 50px;">
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('event.edit', $event->id)}}" class="btn btn-app">
                            <i class="fas fa-edit text-green"></i> Редактировать
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <form action="{{route('event.delete', $event->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-app" type="submit">
                                <i class="fas fa-trash text-danger"></i> Удалить
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>

@endsection



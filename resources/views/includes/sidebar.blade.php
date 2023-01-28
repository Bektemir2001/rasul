<?php 
$a = [];
$data = App\Models\Application::where('status', 0)->get();
foreach($data as $d){
  if($d->user->gender == auth()->user()->gender){
    array_push($a, $d);
  }
}

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('index')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li style="margin-left: 100px;">
        @if(auth()->user()->gender == 'male')
        <h5 class="nav-link" style="color: black;">Мужской отдел</h5>
        @else
        <h5 class="nav-link" style="color: black;">Женский отдел</h5>
        @endif
      </li>
    </ul>

  </nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if(auth()->user()->role == 'admin')
    <a href="{{route('admin.index')}}" class="brand-link">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    @else
    <a href="{{route('admin.index')}}" class="brand-link">
      <span class="brand-text font-weight-light">Модератор</span>
    </a>
    @endif
    
    <!-- Sidebar -->
    <div class="sidebar">



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(auth()->user()->role === 'admin')
              <li class="nav-item">
                  <a href="{{route('moderator.index')}}" class="nav-link">
                      <i class="nav-icon fas fa-calendar-alt"></i>
                      <p>
                          Модераторы
                    </p>
                  </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{route('test.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tenge"></i>
                    <p>
                    Тест
                  </p>
                </a>
              </li>
          <li class="nav-item">
            <a href="{{route('type.index')}}" class="nav-link">
                <i class="nav-icon fas fa-tenge"></i>
                <p>
                Форма обучения
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Пользователи
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('student.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    Студенты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('semester.index')}}" class="nav-link">
                <i class="nav-icon far fa-bookmark"></i>
                <p>
                    Семестры
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('teacher.index')}}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                    Преподаватели
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('lesson.index')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Предметы
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('event.index')}}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                    Мероприятия
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('feedback.index')}}" class="nav-link">
                <i class="nav-icon fab fa-facebook-f"></i>
                <p>
                    Обратная связь
              </p>
              <span class="badge badge-info">{{count($a)}}</span>
            </a>
          </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Заявки
                @if(count($a))
                <span class="badge badge-info">{{count($a)}}</span>
                @endif
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="{{route('application.accepted')}}" class="nav-link">
                    <i class="fas fa-check nav-icon"></i>
                  <p>принятые</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('application.canceled')}}" class="nav-link">
                    <i class="fas fa-ban nav-icon"></i>
                  <p>Отменённые</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('application.pending')}}" class="nav-link">
                  <i class="far fa-copy nav-icon"></i>
                  <p>В Ожидании</p>
                  <span class="badge badge-info">{{count($a)}}</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

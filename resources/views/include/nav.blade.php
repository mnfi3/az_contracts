<nav class="navbar navbar-expand-md navbar-light navbar-main bg-light-purple" dir="ltr">
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav ml-auto">

      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <!-- Authentication Links -->
        @auth
          <li class="nav-item ml-5 pl-4">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">خروج از سیستم</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('report') }}">گزارش گیری</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('proposals') }}">پروپوزال ها</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('memorandums') }}">تفاهم نامه ها</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contracts') }}">قراردادها</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">پنل مدیریت</a>
          </li>
          {{--<li class="nav-item">--}}
            {{--<span class="nav-link">{{ Auth::user()->name }}</span>--}}

          {{--</li>--}}

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

        @endAuth
      </ul>
    </div>
  </div>
</nav>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('include.head')
<body>
<div id="app" class="rtl">
  @include('include.nav')
  <main class="app-container pt-3 p-2">
    @yield('content')
  </main>
</div>
</body>
</html>

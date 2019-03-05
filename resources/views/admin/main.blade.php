<!DOCTYPE html>
<html lang="en">
    <head>
       @include('admin.partials._head') 
    </head>
  
    <body>

        @include('admin.partials._header')

        @include('admin.partials._navigation')

        <div class="container">

            @include('admin.partials._messages')

            @yield('content')

            @include('admin.partials._footer')
                 
        </div><!-- end of container -->

            @include('admin.partials._javascript')

            @yield('scripts')
    </body>
</html>
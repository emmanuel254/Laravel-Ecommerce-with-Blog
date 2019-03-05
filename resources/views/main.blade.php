<!DOCTYPE html>
<html lang="en">
    <head>
       @include('partials._head') 
    </head>
  
    <body class="animsition">

        {{-- @include('partials._header') --}}

        @include('partials._navigation')

        <div class="container">

            @include('partials._messages')

            @yield('content')

                             
        </div><!-- end of container -->

          @include('partials._footer')


                <!-- Back to top -->
        <div class="btn-back-to-top bg0-hov" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span>
        </div>


            @include('partials._javascript')

            @yield('scripts')
    </body>
</html>
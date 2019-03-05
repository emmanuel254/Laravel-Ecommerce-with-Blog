
<head>
        <title>Admin @yield('title')</title><!-- CHANGE THIS TITLE FOR EACH PAGE -->
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      

         {{ Html::style('css/bootstrap.min.css') }}
         {{ Html::style('css/font-awesome.min.css') }}
         {{ Html::style('css/zabuto_calendar.css') }}
         {{ Html::style('css/style_admin.css') }}
         {{ Html::style('css/styles.css') }}
         {{ Html::style('css/style-responsive.css') }}
         <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-fileupload.css') }}" /> 
          {{ Html::script('js/jquery-3.3.1.min.js') }}
       
    @yield('stylesheets_admin')
</head>
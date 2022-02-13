<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/favicon.ico">
<link rel="icon" type="image/png" href="{{asset('./assets/img/favicon.png')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>@yield('page_title')</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- Main CSS -->
<link href="{{asset('./assets/css/main.css')}}" rel="stylesheet"/>
<!--custom css-->
@yield('summernote_css')
</head>
<body>

<!-----NAVBAR-------->
@include('layouts.header')
<!-- End Navbar -->
 
<!------NAVBAR-------->
@yield('page_contents')
<!-- End Navbar -->
  
<!-----FOOTER------------->
@include('Layouts.footer')
<!-- End Footer -->
    
<!--------------------------------------
JAVASCRIPTS
--------------------------------------->
<script src="{{asset('./assets/js/vendor/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('./assets/js/vendor/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('./assets/js/vendor/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('./assets/js/functions.js')}}" type="text/javascript"></script>
@yield('sumernote_js')
</body>
</html>
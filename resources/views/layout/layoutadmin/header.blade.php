<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
      @if(Request::segment(1))
            LAMPION KARAKTER - {{ucwords(Request::segment(1))}}
      @else
          {{'LAMPION KARAKTER'}}
      @endif
      @if(Request::segment(2))
           - {{ucwords(Request::segment(2))}}
      @endif
      @if(Request::segment(3))
           - {{ucwords(Request::segment(3))}}
      @endif
    </title>

    <!-- Bootstrap -->
    <link href={!! asset("assetadmin/css/bootstrap.min.css") !!} rel="stylesheet">
    <!-- Font Awesome -->
    <link href={!! asset("assetadmin/css/font-awesome.min.css") !!} rel="stylesheet">
    <!-- dataTable -->
    <link href={!! asset("assetadmin/css/dataTables.bootstrap.min.css") !!} rel="stylesheet">
    <link href={!! asset("assetadmin/css/responsive.bootstrap.min.css") !!} rel="stylesheet">
    <!-- datepicker -->
    <link href={!! asset("assetadmin/css/datepicker.css") !!}  rel="stylesheet">
    <!-- sweetalert -->
    <link href={!! asset("assetuser/css/sweetalert.css") !!}  rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href={!! asset("assetadmin/css/custom.css") !!}  rel="stylesheet">

    <style type="text/css" media="screen">
      .modal-wide .modal-dialog{
        width: 40%;
      }
      
      .dropdown-menu{
        z-index: 2000 !important;
      }

      .nav_menu{
        background: #00ffff;
      }
      .x_panel{
        background: #c8b7b7;
      }
      .body {
        color: black;
      }
    </style>

    @yield('css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src={{ asset("assetadmin/images/img.jpg") }} alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
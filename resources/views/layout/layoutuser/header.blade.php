<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <link href="{{asset('assetuser/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetuser/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetuser/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('assetuser/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('assetuser/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('assetuser/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('assetuser/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('assetuser/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('assetuser/css/datepicker.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    
</head><!--/head-->

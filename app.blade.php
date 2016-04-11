<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">--}}

        <title class="titleSeanetix">Seanetix</title>
        <link rel="shortcut icon" href="{{{ asset('\img\favicon.png') }}}">

        <!----------------------------------Jquery---------------------------->
        <script type="text/javascript" src="/plugins/jquery-1.12.0.min.js"></script>

        <!------------------------------tiny_mce------------------------------>
       <script type="text/javascript" src="/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
        {!! HTML::script('/js/index.js') !!}

        <!--Connect owl_carousel plugin-->
        <link href="{{ asset('plugins/owl_carousel/owl.carousel.css') }}" rel="stylesheet">
        <script src="plugins/owl_carousel/owl.carousel.min.js"></script>

        <!--------------------Connect arcticModal plugin----------------------->
        <script src="plugins/arctic_modal/jquery.arcticmodal-0.3.min.js"></script>
        <link rel="stylesheet" href="plugins/arctic_modal/jquery.arcticmodal-0.3.css">
        <link rel="stylesheet" href="plugins/arctic_modal/themes/simple.css">

        <!-- Bootstrap framework -->
        <link href="{{ asset('/plugins/bootstrap-3.3.6-dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/plugins/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <script type="text/javascript" src="/plugins/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- Project css -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/box_service.css') }}" rel="stylesheet">

    </head>
<body class="container-fluid">

    <div class=" row memu-menu">
        <div class="col-md-12">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                <span class="sr-only">Toggle Navigation</span>
            </button>
            <div class="navbar-header">

                        <a class="navbar-brand navbar-brand-site" href="{{ url('/#') }}">
                           <div class="img-icons"> <img src="/img/icons.png" alt="Company Logo"></div>
                           <div class="content-icons">
                               <p>Seanetix</p>
                               <aside>Web and Mobile Development</aside>
                           </div>
                        </a>
            </div>


            <div class="collapse navbar-collapse  main-menu" id="bs-example-navbar-collapse-1">
                <ul id="main_menu" class="nav navbar-nav nav-site" >
                    @if(isset($menu))
                        @foreach($menu as $item)
                            <li><a data-id="mainMenu" class="menu-site" href="/#{{ $item->tag }}">{{ $item->menu_title }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

    {{--Modal window--}}
    <div  style="display: none">
        <div  id="modal" >
        </div>
    </div>




    @yield('content')


</body>
</html>
<script>
    $(document).ready(function() {
        if (screen.width < 767) {

            $('.menu-site').on('click', function(){
                $('.glyphicon-align-justify').click();
            })

        }
    });
</script>
<style>

    @media  (min-device-width: 1px)and (max-device-width: 767px){
        .nav-site {
            float: left;
        }

        .navbar-collapse.in {
            background-color: rgba(59, 59, 59, 0.76);
        }

        .glyphicon-align-justify:before {
            color: white;
        }

        .img-icons img{
            width: 45%;
            float: right;
        }
        .content-icons p{
            font-size: 20px;
            margin: 6px 0 2px;
        }
        .content-icons aside {
            font-size: 6px;
        }
        .menu-site{
            font-size: 20px;
        }
      /*  .navbar-nav>li>a:hover{
            color: #b71c1c;
            background-color: #CBCBCB!important;
        }*/

    }

    @media  (min-device-width: 768px)and (max-device-width: 780px){
        .img-icons img{
            width: 45%;
            float: right;
        }
        .content-icons p{
            font-size: 20px;
            margin: 6px 0 2px;
        }
        .content-icons aside {
            font-size: 6px;
        }
        .menu-site{
            font-size: 18px;
        }
      /*  .navbar-nav>li>a:hover{
            color: #b71c1c;
            background-color: #CBCBCB!important;
        }*/
    }
    @media  (min-device-width: 781px)and (max-device-width: 834px){
        .img-icons img{
            width: 60%;
            float: right;
        }
        .content-icons p{
            font-size: 25px;
            margin: 9px 0 3px;
        }
        .content-icons aside {
            font-size: 8px;
        }
        .menu-site{
            font-size: 22px;
        }
    }
    @media  (min-device-width: 835px)and (max-device-width: 883px){
        .img-icons img{
            width: 70%;
            float: right;
        }
        .content-icons p{
            font-size: 28px;
            margin: 9px 0 3px;
        }
        .content-icons aside {
            font-size: 8px;
        }
    }

</style>
@if($errors->has('subject'))
    {{$errors->first('subject')}}
@endif
<div class="row image" data-id="#{{$value['mainContent'][0]->tag}}" style="background-image: url('{{(file_exists(public_path().$value['mainContent'][0]->bg_img))? $value['mainContent'][0]->bg_img : ''}}')" >
    <div class="contact-contact col-xs-12">
        <div class="row">
            <div class=".col-md-10 col-md-offset-1">
                <div  class="main-content-title-white" data-id="mainTitle">{{$value['mainContent'][0]->title}}</div>

            </div>

        </div>

        <div class="row">

                    <div class="col-sm-4">
                        @if(count($value['contactAll']))
                            @foreach ($value['contactAll'] as $contactAll)
                                <div class="contact-info">
                                    <div>
                                        <img class="imgSt imgUA" style="width: 8%; margin: 0px 20px 10px 0px" src="/img/UA.png" alt="address">
                                        <img class="imgSt imgUK" style="width: 8%; margin: 0px 20px 10px 0px" src="/img/UK.png" alt="address">
                                    </div>

                                    <div>
                                        <div data-id="addresses" class="add"><img class="icon" src="/img/1.png" alt="address"><span>{{$contactAll->address}}</span></div>
                                        <div class="add"><img class="icon" src="/img/2.png" alt="email">{{$contactAll->email}}</div>
                                        <div data-id="phone" class="add"><img class="icon" src="/img/3.png" alt="phone"> <span>{{$contactAll->phone}}</span></div>
                                        <div class="add"><img class="icon" src="/img/4.png" alt="phone">{{$contactAll->social}}</div>
                                    </div>
                                    <a href="https://www.facebook.com" target="_blank">
                                        <img class="icon" src="/img/facebook.png" alt="facebook">
                                    </a>
                                    <a href="https://twitter.com" target="_blank">
                                        <img class="icon-twitter" src="/img/twitter.png" alt="twitter">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-sm-8">

                        <div  class="progress animationDispatch" style="height: 12px; display: none">
                            <div   class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>

                        <div data-id ="message" class="alert alert-success" role="alert" style="display: none"> </div>
                        {!! Form::open(array('route' => 'sendEmail', 'id'=>'mail')) !!}
                        <div class="mail">
                            <div class="row input-group-site">
                                <div class="col-sm-6">
                                    @if($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <span class="sr-only">Error:</span>
                                        @foreach($errors->get('name') as $message)
                                            {{$message}}
                                        @endforeach
                                    </div>
                                    @endif
                                        <div class="input-group">
                                        <span class="input-group-addon input-group-addon-side" id="basic-addon1">name:</span>
                                        {!!Form::text('name', '', array('data-id'=>'name', 'class'=>'form-control form-control-side', 'aria-describedby'=>'basic-addon1', 'required'))!!}
                                        </div>
                                    </div>
                                <div class="col-sm-6">
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <span class="sr-only">Error:</span>
                                            @foreach($errors->get('email') as $message)
                                                {{$message}}
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="input-group input-group-email">
                                        <span class="input-group-addon input-group-addon-side" id="basic-addon1">email:</span>
                                        {!!Form::email('email', '', array('data-id'=>'email', 'class'=>'form-control form-control-side', 'aria-describedby'=>'basic-addon1', 'required', 'pattern'=>'^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$', 'placeholder'=>'example@domain.com'))!!}
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('subject'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    @foreach($errors->get('subject') as $message)
                                        {{$message}}
                                    @endforeach
                                </div>
                            @endif
                            <div class="input-group input-group-site">
                                <span class="input-group-addon input-group-addon-side" id="basic-addon1">subject:</span>
                                {!!Form::text('subject', '', array('data-id'=>'subject', 'class'=>'form-control form-control-side', 'aria-describedby'=>'basic-addon1'))!!}
                            </div>
                            @if($errors->has('message'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    @foreach($errors->get('message') as $message)
                                        {{$message}}
                                    @endforeach
                                </div>
                            @endif
                            {!!Form::textarea('message', '', array('data-id'=>'message', 'placeholder'=>'message', 'class'=>'form-control input-group-addon-side-textarea input-group-site', 'rows'=>'3'))!!}
                            <div class="btn-group btn-group-site" role="group" aria-label="...">
                                {!! Form::button('SEND', array('class'=>'btn btn-default bottom-site-contact', 'type'=>'submit') )!!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
    </div>


</div>
<div class="row">
    <div class="maps-site">
        <div class="maps" data-id="maps" style=" height: 60px; position: relative; overflow: hidden">
            <div style="position: absolute; top: 0; left: 0; right: 0; background: transparent; z-index: 1000" class="maps-text">maps
                <span class="glyphicon glyphicon-chevron-down strDown" aria-hidden="true" ></span>

            </div>
            <div  class="mapUp" style="display: none; z-index: 1001; position: absolute; background-color: rgba(0,0,0,.5); width: 5%; height: 100% ">
                <span class="glyphicon glyphicon-arrow-up strUp" aria-hidden="true"></span>
            </div>
            <div  class="hhhhhh" id="map"></div>
        </div>
    </div>
</div>
                                                <script>
                                                    $(document).ready(function() {
                                                        $('.imgSt').on('click', function(){

                                                            var parent = $(this).parents('.contact-info');
                                                            if($(this).hasClass('imgUK')){
                                                                parent.find('div[data-id="addresses"]').find('span').eq(0).html('United Kingdom');
                                                                parent.find('div[data-id="phone"]').find('span').eq(0).html('+44 (0)845 4740515');

                                                          }else{
                                                                parent.find('div[data-id="addresses"]').find('span').eq(0).html('{{$contactAll->address}}');
                                                                parent.find('div[data-id="phone"]').find('span').eq(0).html('{{$contactAll->phone}}');

                                                            }
                                                            
                                                        })
                                                    });
                                                    
                                                </script>

<style>
    #map {
        width: 100%;
        height: 600px;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    var googleMap;
    var mapOptionsObj;
    function initialize() {
        var mapCanvas = document.getElementById('map');
        var center = new google.maps.LatLng(49.9975266, 36.2397669);

        var mapOptions = {
            center: center,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        mapOptionsObj = mapOptions;

        var map = new google.maps.Map(mapCanvas, mapOptions);
        googleMap = map;
        var marker = new google.maps.Marker({
            position: center,
            map: map,
            icon: '/img/map_icon.png',
            title: 'Seanetix company',
        });

       /* var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, "click", function() {
            infowindow.setContent('40 Pushkinskaya str.');
            infowindow.open(map,marker);
        });*/
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
{{------------------------------------------------------КАРТА--------------------------------------------------------------}}



<style>

    .strDown{
        position: absolute;
        font-size: 100%;
        top: 45px;
        left: 0;
        right: 0;
        bottom: 0;
        background: transparent;
        z-index: 1000;
        display: block;
        margin: auto;
        width: 40px;
        height: 40px;
    }
    .strUp{
        position: absolute;
        font-size: 250%;
        margin: auto;
        padding: 0;
        width: 50px;
        height: 50px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: block;
    }
</style>


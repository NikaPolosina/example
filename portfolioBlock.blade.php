
{{--------------------------------------------------PortfolioTemplate------------------------------------------------}}

        <div data-id="portfolioTemplate" class="portfolioTemplate" style="display: none">


            <div class="team-carousel_nav  artisan col-md-12" style="max-width: 85%;">
                <div class="portfolio_prev prev" data-id="owlNav" data-type="prev"></div>
                <div class="portfolio_next next" data-id="owlNav" data-type="next"></div>
            </div>

            <div id="dialog" style="width: 100%" class="portfolio-modal" title="Basic dialog">
                <div class="portfolio-modal-conteiner">
                    <div class="portfolio-modal-img">
                        <button type="button" class="close" style="display: block" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="portfolio-modal-info"></div>
                    </div>
                </div>
            </div>

        </div>


    <script>
        $(document).ready(function(){
             $('.bottom-site-portfolio-more').on('click', function(){
                 var parent = $(this).parents('.allPortfolioHolder');
                 parent.find('div[data-ismine="false"]').toggle();

                 if(parent.find('div[data-ismine="false"]').is(':visible')){
                     $(this).text('LESS PROJECTS');
                 }else{
                     $(this).text('MORE PROJECTS');
                     jQuery('html, body').animate({scrollTop: $('[data-id="#portfolio"]').offset().top-$('.memu-menu').height()+35}, 800);

                 }
             }) ;

        });
    </script>
{{--------------------------------------------------PortfolioTemplate------------------------------------------------}}
<div class="row image" data-id="#{{$value['mainContent'][0]->tag}}" style="background-image: url('{{(file_exists(public_path().$value['mainContent'][0]->bg_img))? $value['mainContent'][0]->bg_img : ''}}')" >

            <div class="col-md-10 col-md-offset-1 allPortfolioHolder">
                <div class="main_content_title_black" data-id="mainTitle">{{$value['mainContent'][0]->title}}</div>
            </div>



                <div class="col-xs-12 col-md-12 allPortfolioHolder port-hold">
                        @if(count($value['portfolioPhotoAll']))
                            <?php $i = 1;
                                $cnt = 0;
                            ?>
                            @foreach ($value['portfolioPhotoAll'] as $portfolioPhoto)
                                <?php
                                if($portfolioPhoto->is_main){
                                   $style = 'style="display: block" data-ismine="true" ';
                                }else{
                                    $style = 'style="display: none" data-ismine="false"';
                                }
                                ?>

                                <div class=" col-xs-12 col-sm-6 col-md-4 single_portfolio_block" <?=$style?>>
                                    <div data-cnt="<?=$i?>" class="portfolio_photo">


                                        <?php
                                        $pathTwoo = public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'portfolio_photo'.DIRECTORY_SEPARATOR.$portfolioPhoto->id;

                                            if(is_dir($pathTwoo)){
                                                $pathThri = scandir($pathTwoo);
                                                $jpeg = array_pop($pathThri);
                                                if(file_exists($pathTwoo.DIRECTORY_SEPARATOR.$jpeg)){
                                                    $path ='/img/portfolio_photo/'.$portfolioPhoto->id.'/'.$jpeg;
                                                }else{
                                                    $path = '/img/people_photo/placeholder.jpg';
                                                }

                                            }else{
                                                $path = '/img/people_photo/placeholder.jpg';

                                            }

                                        ?>
                                        <div data-id="divImagePortfolio" data-cn="{{$cnt}}">
                                            <?php $cnt++; ?>
                                            <img  data-id="portfolio_img" class="portfolio_img" src="{{$path}}" style="max-width: 100%">

                                            <div data-id="description" style="display: none">
                                            <div class="modal_bottom_bottom">
                                                <div class = "portfolio-name">{{$portfolioPhoto->title}}</div>
                                                <div class = "portfolio-description"><span>Description: </span> {{$portfolioPhoto->description}}</div>
                                                <div class = "portfolio-technologies"><span>Technologies: </span>{{$portfolioPhoto->technologies}}</div>
                                                <?php
                                                    foreach ( explode(" ", $portfolioPhoto->linkSite) as $value) {?>
                                                        <a class="portfolio-linkSite" href="<?=$value?>" target="_blank"><?=$value?></a>
                                                   <?php  } ?>
                                                {{--<a class="portfolio-linkSite" href="{{$portfolioPhoto->linkSite}}" target="_blank">{!!$portfolioPhoto->linkSite!!}</a>--}}
                                            </div>

                                                <a class="hiden" target="_blank">hide...</a>


                                            </div>
                                            <div class="portfolio_hover_bg" style="text-align: center; display: none">
                                                {{--<div class="help-va"></div>--}}
                                                <span class="glyphicon glyphicon-plus-sign" style="color: #ffffff; font-size: 30px" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php

                                    $i++;

                                    if($i == 4){
                                        $i = 1;
                                    }
                                    ?>
                            @endforeach
                        @endif

                    @if(!isset($value['batton']))
                        <div class="text-center">
                            <div class="btn-group btn-group-portfolio" role="group" aria-label="..." >
                                <button type="button" class="btn btn-default bottom-site-portfolio bottom-site-portfolio-more">MORE PROJECTS</button>
                            </div>
                        </div>
                    @endif
                </div>

        <div class="clearfix"></div>
    </div>

<style>

    .portfolio_hover_bg.active{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        background-color: rgba(165, 185, 189, 0.56);
    }

    .portfolio_hover_bg.active span {
        margin-top : -15px;
        margin-left : -15px;
        position: absolute;
        top: 50%;
        left: 50%;

    }


    .close{
        color: #0D133C;
        margin: 0px 0px 0px 5px;
        position: absolute;
    }
    .close:hover{
        color: red;
    }
    .hiden{
        z-index: 9999999999999999999999999999999;
        margin: -20px;
        height: 30px;
        width: 70px;
        webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
        color: #ffff00;
        cursor: pointer;
        position: absolute;
        bottom: 50%;
        right: 100%;
        background: rgba(0, 0, 0, 0.69);
        border-radius: 8px 8px 0 0;
        text-align: center;
        padding: 5px;
    }

    .hiden:hover{
        color: white;
        text-decoration: none;
    }
</style>
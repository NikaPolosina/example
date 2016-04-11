
/*
 Block
- tiltle
- content
- bg-img
* */

$(document).ready(function() {
/*-------------------------------------services---------------------------*/



        var isMobile = {
                Android: function() {
                        return navigator.userAgent.match(/Android/i);
                },
                BlackBerry: function() {
                        return navigator.userAgent.match(/BlackBerry/i);
                },
                iOS: function() {
                        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                },
                Opera: function() {
                        return navigator.userAgent.match(/Opera Mini/i);
                },
                Windows: function() {
                        return navigator.userAgent.match(/IEMobile/i);
                },
                any: function() {
                        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                }
        };

        if(isMobile.any()) {

                $('.mk-flipbox-flipper').on('click', function(){

                        var front = $(this).find('.mk-flipbox-front');
                        var back = $(this).find('.mk-flipbox-back');

                        if(back.hasClass('back-show') && front.hasClass('front-hide')){


                                // show front
                                if(front.hasClass('front-hide')){
                                        front.removeClass('front-hide');
                                }
                                front.addClass('front-show');

                                if(back.hasClass('back-show')){
                                        back.removeClass('back-show');
                                }
                                back.addClass('back-hide');
                        }else{


                                // show back
                                if(front.hasClass('front-show')){
                                        front.removeClass('front-show');
                                }
                                front.addClass('front-hide');

                                if(back.hasClass('back-hide')){
                                        back.removeClass('back-hide');
                                }
                                back.addClass('back-show');
                        }

                });



        }else{
                var style = '<style> ' +
                    '.mk-flipbox-container.flip-horizontal:hover .mk-flipbox-front { ' +
                    '-webkit-transform: rotateY(180deg); ' +
                    '-moz-transform: rotateY(180deg);' +
                    '-o-transform: rotateY(180deg);' +
                    '-ms-transform: rotateY(180deg);' +
                    'transform: rotateY(180deg);' +
                    'ms-transform: rotateY(180deg);' +
                    'visibility: hidden;' +
                    '}' +
                    '' +
                    '.mk-flipbox-container.flip-horizontal:hover .mk-flipbox-back {' +
                    '-webkit-transform: rotateY(0deg);' +
                    '-moz-transform: rotateY(0deg);' +
                    '-o-transform: rotateY(0deg);' +
                    '-ms-transform: rotateY(0deg);' +
                    'transform: rotateY(0deg);' +
                    'ms-transform: rotateY(0deg);' +
                    '}' +
                    '</style>';


                $('body').append(style);

        }



        /*-------------------------------------services---------------------------*/

        var modal = $('#modal');

        jQuery(document).ready(function(){
                var owl = jQuery(".owl-carousel");
                var loop = ($('button[data-id="editTeamBlock"]').length > 0)? false : true;
                owl.on('initialized.owl.carousel', function(e) {
                        $('div[data-id="owlNav"]').on('click', function(){
                                owl.trigger( $(this).attr('data-type')+'.owl.carousel');
                        });

                        $('.person-photo').on('mouseenter',function(){
                                var mainBlock = $(this).parents('div[data-id="team-block"]');
                                var parent = mainBlock.parent();
                                if(!parent.next().hasClass('active')){
                                        mainBlock.addClass('activePersonMinus');
                                }else if(!parent.prev().hasClass('active')){
                                        mainBlock.addClass('activePersonPlus');
                                }else{
                                        mainBlock.addClass('activePerson');
                                }
                        });
                        $('.person-photo').on('mouseleave' ,function() {
                                var mainBlock = $(this).parents('div[data-id="team-block"]');
                                mainBlock.removeClass('activePerson activePersonMinus activePersonPlus');
                        });
                        if(window.location.hash){
                                var target = window.location.hash;
                                var target2 = $('div[data-id="'+target+'"]');
                                if(target2.length < 1) return;
                                if(target == '#hello'){
                                        jQuery('html, body').animate({scrollTop: 0}, 400);
                                }else{
                                        jQuery('html, body').animate({scrollTop: $(target2).offset().top}, 800);
                                }
                        }
                }).owlCarousel({
                        items: 4,
                        margin: 0,
                        loop: loop,
                        nav: false,
                        dots:true,
                        responsive:{
                                500:{
                                        items: 4
                                },
                                400:{
                                        items:2
                                },
                                300:{
                                        items:2
                                }
                        }
                });
        });
//----------------------------------------------------------MAIL------------------------------------------------------------//
        $('form#mail').on('submit', function(){
                var form = $(this);
                var parent = form.parent();
                var animationDispatch = parent.find('.animationDispatch').toggle('slow');

                function valueUp() {
                        var step = 1;
                        var curVall = parent.find('.progress-bar').attr('aria-valuenow');
                        var val = curVall + step;
                        parent.find('.progress-bar').attr('aria-valuenow', val).css({
                                'width' : curVall + step + '%'
                        }) ;
                }
                setInterval(valueUp, 300);

                var name = form.find('input[data-id="name"]').val();
                var email = form.find('input[data-id="email"]').val();
                var subject =form.find('input[data-id="subject"]').val();
                var content =form.find('textarea[data-id="message"]').val();
                if(!name || !email || !subject || !content){
                        event.preventDefault();
                }

                $.ajax({
                        type : 'GET',
                        url : '/email',
                        data : {
                                name : name,
                                email : email,
                                subject : subject,
                                content : content
                        },
                        success: function(data){
                                animationDispatch.toggle();
                                form.find("input, textarea").val('');
                                $('div[data-id ="message"]').text('Thank you! Your email successfuly sent, we will contact you withing 24 hours.').toggle('slow');
                                setTimeout(function(){
                                        $('div[data-id ="message"]').text('').toggle('slow');
                                }, 4000);
                        },
                        error: function(){
                                $('div[data-id ="message"]').removeClass('alert-success').addClass('alert-danger').text('Email was not send').toggle('slow');
                                setTimeout(function(){
                                        $('div[data-id ="message"]').toggle('slow').text('').removeClass('alert-danger').addClass('alert-success');
                                }, 4000);
                        }
                });

                event.preventDefault();
        });
//-----------------------------------------------------------MAIL------------------------------------------------------------//


        $('[data-id="mainMenu"]').on('click', function(e){
                var target = $(this).attr('href').split('/')[1];
                var target2 = $('div[data-id="'+target+'"]');
                if(target2.length < 1) return;
                if(target == '#hello'){
                        jQuery('html, body').animate({scrollTop: 0}, 400);
                }else{
                        jQuery('html, body').animate({scrollTop: $(target2).offset().top-$('.memu-menu').height()+35}, 400);
                }
        });
//-----------------------------------------------------------MAPS------------------------------------------------------------//
        $('div.maps-text').on('click', function(){

                    var parent = $(this).closest('.maps-site'),
                        maps = parent.find('.maps'),
                        map = parent.find('#map');
                        mapUp = maps.find('.mapUp').toggle('slow');

                    

                    $('.mapUp').on('click', (function(){
                            //jQuery('html, body').animate({scrollTop: $('[data-id="#contact"]').offset().top}, 800);
                            maps.animate({height: '60px'}, 1000);
                            $('.mapUp').hide();

                    }));

                    if(maps.height() == 60){
                            googleMap.setZoom(mapOptionsObj.zoom);
                            googleMap.setCenter(mapOptionsObj.center);
                            maps.animate({height: '600px'}, 100, function(){jQuery('html, body').animate({scrollTop: $('body').height()}, 400)});

                    }else{
                            maps.animate({height: '60px'}, 1000);
                    }
            }
        );
 //-----------------------------------------------------------MAPS------------------------------------------------------------//

        //------------------------------------------------------feedback--------------------------------------------------------------//


        setInterval(function(){

                var all = $('div[data-id="feedback"]').find('div[data-id="single-feedback"]');
                all.eq(0).addClass('hidden');
                all.eq(1).removeClass('hidden');
                all.eq(all.length -1).after(all.eq(0));
        },12000);
 //------------------------------------------------------feedback--------------------------------------------------------------//

 //------------------------------------------------------portfolio--------------------------------------------------------------//


        var portfolioHE = $('.allPortfolioHolder .portfolio_photo');

        portfolioHE.on({

                mouseenter : function() {
                          if (screen.width < 722) {
                         return false
                         }
                        if($(this).attr('data-cnt') == 1){
                                $(this).addClass('portfolioActivPlus');
                        }else if($(this).attr('data-cnt') == 2){
                                $(this).addClass('portfolioActiv');
                        }else{
                                $(this).addClass('portfolioActivMinus');
                        }

                        $(this).closest('.single_portfolio_block').css({'minHeight' : $(this).outerHeight(true)});
                        if(screen.width < 722){
                                $(this).find('.portfolio_hover_bg').addClass('active').hide();
                        }else{
                                $(this).find('.portfolio_hover_bg').addClass('active').show();

                        }
                },

                mouseleave : function() {
                        $(this).removeClass('portfolioActiv portfolioActivPlus portfolioActivMinus');
                        $(this).find('.portfolio_hover_bg').removeClass('active').hide();
                }
        });
        if (screen.width < 722) {
                $('.portfolio_img').on('click', function(){
                        $(this).parent().find('div[data-id="description"]').toggle('slow');
                        $('.hiden').hide();
                });
        }
        $('.portfolio_hover_bg').on('click', function(){
                $('.close').show();
                var parent =$(this).parent();/*divImagePortfolio*/
                var img = parent.find('img[data-id="portfolio_img"]');/*portfolio_img*/
                var  mainBlock  = img.parents('.single_portfolio_block');/*single_portfolio_block*/
                var portfolioPhoto = mainBlock.find('.portfolio_photo');/*'.portfolio_photo'*/
                portfolioPhoto/*.closest('div[data-id="divImagePortfolio"]').css({'maxHeight':mainBlock.height()+'px'})*/.removeClass('portfolioActiv portfolioActivPlus portfolioActivMinus');


                portfolioPhoto.find('.portfolio_hover_bg').removeClass('active').hide();
                mainBlock.height('').width('');
                var currentCnt = parent.attr('data-cn');

                modal.arcticmodal({
                        beforeOpen: function(){
                                var meta = '<meta id="noScroll" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
                                $('head').append(meta);


                                

                                modal.html($('div[data-id="portfolioTemplate"]').html());

                                var imgPath = img.attr('src');
                                var newImage = '<img style="max-width: 100%" src="'+imgPath+'" >';
                                var description = mainBlock.find('div[data-id="description"]').html();
                                modal.find('.portfolio-modal-img').append(newImage);

                                modal.find('.portfolio-modal-info').append(description).show();



                                $('.hiden').addClass('super');

                                var portHold = $('.port-hold');
                                var allPort = portHold.find('[data-id="divImagePortfolio"]');
                                modal.find('.portfolio_next').on('click', function(){
                                        currentCnt++;
                                        if(currentCnt  >= allPort.length){
                                                currentCnt = 0;
                                        }



                                        parent = allPort.eq(currentCnt);
                                        var img = parent.find('img[data-id="portfolio_img"]');/*portfolio_img*/
                                        var  mainBlock  = img.parents('.single_portfolio_block');/*single_portfolio_block*/
                                        var portfolioPhoto = mainBlock.find('.portfolio_photo');/*'.portfolio_photo'*/
                                        var imgPath = img.attr('src');
                                        var description = mainBlock.find('div[data-id="description"]').html();

                                        modal.find('.portfolio-modal-img').find('img').attr('src', imgPath);

                                        //modal.find('.portfolio-modal-info').html('').append(description).show();



                                        var currentHide = modal.find('.hiden');
                                        modal.find('.portfolio-modal-info').html('').animate({width: '35%'}, 500, function(){
                                                //modal.find('.modal_bottom_bottom').show();
                                                currentHide.text('hide...').addClass('super');
                                        });
                                        modal.find('.portfolio-modal-info').html('').append(description).show();






                                        $('.hiden').on('click', function(){
                                                var currentHide = modal.find('.hiden');
                                                if(currentHide.hasClass('super')){
                                                        modal.find('.modal_bottom_bottom').hide();
                                                        currentHide.text('info...').removeClass('super');

                                                        modal.find('.portfolio-modal-info').animate({width: '0px'}, 500, function() {


                                                        });
                                                }else{

                                                        modal.find('.portfolio-modal-info').animate({width: '35%'}, 500, function(){
                                                                modal.find('.modal_bottom_bottom').show();
                                                                currentHide.text('hide...').addClass('super');
                                                        });

                                                }
                                        });

                                        $('.close').on('click', function(){
                                                modal.arcticmodal('close');
                                        });

                                });

                                modal.find('.portfolio_prev').on('click', function(){
                                        currentCnt--;
                                        if(currentCnt  < 0){
                                                currentCnt = allPort.length - 1;
                                        }

                                        parent = allPort.eq(currentCnt);
                                        var img = parent.find('img[data-id="portfolio_img"]');/*portfolio_img*/
                                        var  mainBlock  = img.parents('.single_portfolio_block');/*single_portfolio_block*/
                                        var portfolioPhoto = mainBlock.find('.portfolio_photo');/*'.portfolio_photo'*/
                                        var imgPath = img.attr('src');
                                        var description = mainBlock.find('div[data-id="description"]').html();

                                        modal.find('.portfolio-modal-img').find('img').attr('src', imgPath);
                                        var currentHide = modal.find('.hiden');
                                        modal.find('.portfolio-modal-info').html('').animate({width: '35%'}, 500, function(){
                                                //modal.find('.modal_bottom_bottom').show();
                                                currentHide.text('hide...').addClass('super');
                                        });
                                        modal.find('.portfolio-modal-info').html('').append(description).show();



                                        $('.hiden').on('click', function(){
                                                var currentHide = modal.find('.hiden');
                                                if(currentHide.hasClass('super')){
                                                        modal.find('.modal_bottom_bottom').hide();
                                                        currentHide.text('info...').removeClass('super');

                                                        modal.find('.portfolio-modal-info').animate({width: '0px'}, 500, function() {


                                                        });
                                                }else{

                                                        modal.find('.portfolio-modal-info').animate({width: '35%'}, 500, function(){
                                                                modal.find('.modal_bottom_bottom').show();
                                                                currentHide.text('hide...').addClass('super');
                                                        });

                                                }
                                        });

                                        $('.close').on('click', function(){
                                                modal.arcticmodal('close');
                                        });

                                });


                                $('.hiden').on('click', function(){

                                        var currentHide = modal.find('.hiden');
                                        if(currentHide.hasClass('super')){
                                                modal.find('.modal_bottom_bottom').hide();
                                                currentHide.text('info...').removeClass('super');

                                                modal.find('.portfolio-modal-info').animate({width: '0px'}, 500, function() {


                                                });
                                        }else{

                                                 modal.find('.portfolio-modal-info').animate({width: '35%'}, 500, function(){
                                                        modal.find('.modal_bottom_bottom').show();
                                                         currentHide.text('hide...').addClass('super');
                                                 });

                                        }
                                });
                                
                                $('.close').on('click', function(){
                                        modal.arcticmodal('close');
                                });


                        },
                        beforeClose: function(){

                                $('#noScroll').remove();
                                var meta = '<meta name="viewport" content="width=device-width, initial-scale=1">';
                                $('head').append(meta);



                                modal.html('');
                        }

                });
        });
        //------------------------------------------------------portfolio--------------------------------------------------------------//

        tinyMCE.init({
                selector: '#mytextarea'
        });

});

<div class="row" data-id="#{{$value['mainContent'][0]->tag}}" style=" position: relative; background-image: url('{{(file_exists(public_path().$value['mainContent'][0]->bg_img))? $value['mainContent'][0]->bg_img : ''}}')" >
        <div class="team-carousel_nav col-md-12">
            <div class="prev" data-id="owlNav" data-type="prev"></div>
            <div class="next" data-id="owlNav" data-type="next"></div>
        </div>

        <div class=" col-xs-12 col-md-10 col-md-offset-1">

            <div class="main_content_title_black" data-id="mainTitle">{{$value['mainContent'][0]->title}}</div>
            {{----------------------Bottom edit team----------------}}

                <div data-id="caruselHolder" class="owl-carousel" style="z-index: 1000;">
                    @foreach($value['peoples'] as $person)
                        <div data-person="{{$person->id}}" data-id="team-block" class="team-block item">
                            <div class="single-person-block">
                                <div class="person-photo">
                                    <?php
                                        $person->photo = trim($person->photo);
                                        $path=(!empty($person->photo) && file_exists(public_path().$person->photo)) ? $person->photo : '/img/people_photo/placeholder.jpg';
                                    ?>
                                    <img data-id="test" src="{{$path}}" style="width: 100%">
                                    <span class="team-info">
                                        <div data-id="teamName" class="team-name">{{$person->first_name}}</div>
                                        <div data-id="teamProfession" class="team-profession">{{$person->title}}</div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>

        <div class="clearfix"></div>
</div>

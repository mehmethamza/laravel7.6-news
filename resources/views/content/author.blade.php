<div class="author-box">
    <img class="author-img" src="{{$content -> author -> image}}" alt="">
    <div class="author-info">
        <h4 class="author-name">{{$content -> author -> name}}</h4>
        <div class="authors-social">
            <a href="{{$content -> author -> twitter}}" class="ts-twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="{{$content -> author -> facebook}}" class="ts-facebook">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="{{$content -> author -> google}}" class="ts-google-plus">
                <i class="fa fa-google-plus"></i>
            </a>
            <a href="{{$content -> author -> linkedin}}" class="ts-linkedin">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
        <div class="clearfix"></div>
        <p>{{$content -> author -> statement}} </p>

    </div>
</div>

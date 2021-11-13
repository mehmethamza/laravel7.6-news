<div class="col-lg-8">
    <div class="ts-overlay-style featured-post">
        <div class="item " style="background-image:url({{$block_wrapper_2_3[0] -> image}})">
            <a href="#" class="post-cat ts-purple-bg">
                @php
                    foreach ($block_wrapper_2_3[0] -> category as  $category) {
                    echo $category -> name ;
                    }
                @endphp
            </a>
            <div class="overlay-post-content">
                <div class="post-content">

                    <h3 class="post-title md">
                        <a href="#">{{$block_wrapper_2_3[0] -> title}}</a>
                    </h3>
                    <ul class="post-meta-info">
                        <li class="author">
                            <a href="#">
                                <img src="images/avater/author1.jpg" alt=""> Donald Ramos
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-clock-o"></i>
                            @php
                                echo  Carbon\Carbon::parse($block_wrapper_2_3[0] -> created_at) ->toDateString();
                            @endphp
                        </li>

                    </ul>
                </div>
            </div>
            <!--/ Featured post end -->
        </div>
    </div>
</div>

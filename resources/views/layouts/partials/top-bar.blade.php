<section class="top-bar v5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 align-self-center">
                <div class="ts-breaking-news clearfix">
                    <h2 class="breaking-title float-left">
                        <i class="fa fa-bolt"></i> Breaking News :</h2>
                    <div class="breaking-news-content float-left" id="breaking_slider1">
                        <div class="breaking-post-content">
                            <p>
                                <a>{{$setting -> braking}}</a>
                            </p>
                        </div>
                        <div class="breaking-post-content">
                            <p>
                                <a >{{$setting -> braking}}</a>
                            </p>
                        </div>
                        <div class="breaking-post-content">
                            <p>
                                <a >{{$setting -> braking}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col-->

            <div class="col-md-4 text-right xs-left">
                <div class="ts-date-item">
                    <i class="fa fa-clock-o"></i>
                    @php
                        echo Carbon\Carbon::now()->isoFormat('dddd D');
                    @endphp
                </div>
            </div>
            <!--end col -->


        </div>
        <!-- end row -->
    </div>
</section>

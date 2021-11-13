<div class=" watch-post mb-30">
    <div class="ts-heading-item">
        <h2 class="ts-title">
            <span>Hızlı İçerik</span>
        </h2>
    </div>
    <div class="row">

        @include('layouts.partials.block-wrapper-2.left.block.block-1.left-big-item')
        <!-- col end-->

        <div class="col-lg-5">
            <div class="nav post-list-box" id="nav-tab" role="tablist">
                @foreach ($block_wrapper_2_1 as $key =>  $content)
                    @if ($key == 0 )

                    @else
                        @include('layouts.partials.block-wrapper-2.left.block.block-1.right-item')
                    @endif
                @endforeach

            {{-- burada bundan ucdana gelcek --}}

                <!-- nav item end-->

                <!-- nav item end-->
            </div>
            <!-- watch list post end-->
        </div>

        <!-- col end -->
    </div>
    <!-- row end-->
</div>

<div class="col-lg-4">
            <div class="ts-grid-content ts-list-post-box">

                @foreach ($block_wrapper_2_3 as  $key => $content)

                @if ($key == 0)

                @else
                        @if ($key == 1 )
                            @include('layouts.partials.block-wrapper-2.left.block.block-3.right.top-item')
                        @else
                             @include('layouts.partials.block-wrapper-2.left.block.block-3.right.item')
                        @endif
                @endif






                @endforeach
                {{-- bundan iki tane gelecek --}}


                <!-- end item-->

                <!-- end item-->
            </div>
            <!-- ts grid box-->
        </div>

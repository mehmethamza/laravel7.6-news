<section class="block-wrapper">
    <div class="container">

        @include('layouts.partials.block-wrapper-3.banner')
        <!-- row end-->
        <div class="row ts-grid-item-2">

            @foreach ($block_wrapper_3 as $content)
                @include('layouts.partials.block-wrapper-3.mainitem')
            @endforeach



        </div>
    </div>
</section>

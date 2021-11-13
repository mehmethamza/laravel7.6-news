<div class="ts-grid-box bg-dark-item">
    <div class="ts-heading-item">
        <h2 class="ts-title">
            <span>
            @php
                foreach ($block_wrapper_2_3[0] -> category as  $category) {
                    echo $category -> name ;
                }

            @endphp
            </span>
        </h2>
    </div>
    <div class="row ts-grid-item ts-post-style-2">
        @include('layouts.partials.block-wrapper-2.left.block.block-3.left')

        @include('layouts.partials.block-wrapper-2.left.block.block-3.right')


    </div>
</div>

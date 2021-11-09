<ul>
    @foreach ($children -> child as $children)
        <li>
            @php
            echo $children -> name ;
            @endphp
        </li>
            @if (!empty($children -> child[0]))
            @include('deneme2')
            @endif

    @endforeach
</ul>

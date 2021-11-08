<ul>
    @foreach ($categories as $categori)
        <li>{{$categori -> name}}</li>
        <ul>
            @foreach ($categori->child as $children)
                <li>@php
                    echo $children -> name;
                @endphp</li>
            @endforeach
        </ul>
    @endforeach
</ul>

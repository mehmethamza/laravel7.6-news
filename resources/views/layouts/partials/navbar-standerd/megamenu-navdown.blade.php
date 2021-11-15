<li>
    <a href="{{route("category",$category -> slug)}}">{{$category -> name}}</a>
    <ul class="nav-dropdown">

        @foreach ($category -> child as $child_category)

            <li>
            <a href="{{route("category",$child_category -> slug)}}">{{$child_category -> name }}</a>

          </li>
        @endforeach

      <!--Pages end-->
    </ul>
  </li>

<li>
    <a href="#">{{$category -> name}}</a>
    <ul class="nav-dropdown">

        @foreach ($category -> child as $child_category)

            <li>
            <a href="#">{{$child_category -> name }}</a>

          </li>
        @endforeach

      <!--Pages end-->
    </ul>
  </li>

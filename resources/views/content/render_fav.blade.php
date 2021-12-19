@if (empty($fav))

    <li>
        <a onclick="addfav()" href="javascript:;">
            Add Favori
            <i class="fas fa-plus"></i>
        </a>



        <script>

            function addfav() {

                $.ajax({
                    type:'POST',
                    url:"{{ route('kullanici.addfav') }}",
                    data:{content_id:"{{encrypt($content -> id )}}", _token:"{{ csrf_token() }}",slug:"{{$content->slug}}"},
                    success:function(res){
                        if(res.success) {
                        // alert("Başarılı");
                        // console.log("{{$fav}}");
                        // console.log(res.fav);
                        window.location.reload();


                    }
                }});
            }

        </script>
    </li>

    @else
        <li>
            <a onclick="subtractfav()" href="javascript:;">
                Subtract Favori
                <i class="fas fa-minus"></i>
            </a>

            <script>

                function subtractfav() {

                    $.ajax({
                        type:'POST',
                        url:"{{ route('kullanici.subtractfav') }}",
                        data:{content_id:"{{encrypt($content -> id )}}", _token:"{{ csrf_token() }}",slug:"{{$content->slug}}"},
                        success:function(res){
                            if(res.success) {
                            // alert("Başarılı");
                            // console.log("{{$fav}}");
                            // console.log(res.fav);
                            window.location.reload();


                        }
                    }});
                }

            </script>
        </li>

@endif

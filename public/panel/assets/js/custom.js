    "use strict";
    var KTDatatablesBasicPaginations = function() {
        var initTable1 = function() {
            var table = $('#kt_datatable');
            // begin first table
            table.DataTable({
                responsive: true,
                pagingType: 'full_numbers',
                order: [[ 0, "desc" ]]
            });
        };
        return {
            //main function to initiate the module
            init: function() {
                initTable1();
            },
        };
    }();
    jQuery(document).ready(function() {
        KTDatatablesBasicPaginations.init();
        $('.tooltips').tooltip();
        $(".status").change(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.table-disabled').removeClass('none');
            var $data = $(this).prop("checked");
            var $dataUrl = $(this).data("url");
            
            if( $data != "undefined" && $dataUrl != "undefined" ){
                $.post( $dataUrl, {data : $data}, function(response){
                    setTimeout(function(){
                        window.location.reload();
                    }, 80);
                });
            }
        });
        $(".delete-alert").click(function() {
            var $dataUrl = $(this).data("url");
            Swal.fire({
                title: "Silmek istediğinize emin misiniz?",
                text: "Bu işlemin geri dönüşü yoktur..",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Evet, Sil",
                cancelButtonText: "Vazgeç",
            }).then(function(result){
                if (result.value) {
                    window.location.href = $dataUrl;
                }
            }); 
        });
        $('.btnLoading').click(function () {
            $(this).find('span').hide();
            $(this).find('.spinner-border').show();
        });
    });
    $( "#kt_datatable").on( "click", "tr.odd, tr.even", function(){
        $(".delete-alert").click(function(){
            var $dataUrl = $(this).data("url");
            Swal.fire({
                title: "Silmek istediğinize emin misiniz?",
                text: "Bu işlemin geri dönüşü yoktur..",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Evet, Sil",
                cancelButtonText: "Vazgeç",
            }).then(function(result){
                if (result.value) {
                    window.location.href = $dataUrl;
                }
            }); 
        });
    });
$(".modal").attr("tabindex", null);

//sidenavin yernin deyisilmesi
$("#slide-out").css("transform", "translateX(-105%)")


// csv filein import edilmesi

$("#csv_file").on("change", function () {
    $('#upload_csv').submit();
});

$('#upload_csv').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url: $(this).data("url"),
        method:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(jsonData)
        {
            $('#csv_file').val('');
            table.ajax.reload();
        },
        error:function (r) {
            alert("Xəta baş verdi")
        }
    });
});


//data tablenin islemesi ucun lazim olan scriptler
var base_url = $('#datatable').data("url");
var table = $('#datatable').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 1, 3, 5, 10, 25, 50, 100],
            ['1 sətir', '3 sətir', '5 sətir', '10 sətir', '25 sətir', '50 sətir', '100 sətir']
        ],
        buttons: [
            'pageLength',

            {
                extend: 'print',
                exportOptions: {
                    columns: "thead th:not(.c_neglect)"
                }
            },

            {
                extend: 'pdf',
                exportOptions: {
                    columns: "thead th:not(.c_neglect)"
                }
            },

            {
                extend: 'copy',
                exportOptions: {
                    columns: "thead th:not(.c_neglect)"
                }
            },


            {
                extend: 'excel',
                exportOptions: {
                    columns: "thead th:not(.c_neglect)"
                }
            },

            {
                extend: 'csv',
                exportOptions: {
                    columns: "thead th:not(.c_neglect)"
                }
            },

            {
                text: 'CSV Faylı Yüklə',
                action: function () {
                    $("#csv_file").click();
                }
            }
        ],
        "pageLength" : 10,
        "processing": true,
        "serverSide": true,
        "order": [[0, "desc" ]],
        "ajax":{
            url :  base_url,
            type : 'POST',
        },
        "language": {
            "paginate": {
                "previous": '<li class="waves-effect"><i class="fas fa-angle-left" style="font-size: 18px"></i></li>',
                "next": '<li class="waves-effect"><i class="fas fa-angle-right" style="font-size: 18px"></i></li>'
            },
            "search": "Axtarış: ",
            "processing": "Gözləyin...",
            "loadingRecords": "Yüklənir...",
            "infoEmpty": "Məlumat daxil edilməmişdir",
            "info": "Məlumat Göstərilir _START_-_END_, Ümumi Məlumat sayı _TOTAL_ ",
            "emptyTable": "Məlumat daxil edilməmişdir",
            "zeroRecords": "Məlumat Tapılmadı",
            "lengthMenu": "_MENU_",
            buttons: {
                pageLength: {
                    _: "%d Sətir Göstər",
                }
            }

        },
        "initComplete": function(settings, json) {

            $("#slide-out").css("transform", "translateX(-105%)")


            $("#datatable_filter").append("\n" +
                "            <button type=\"button\" class=\"mt-0 ml-3 c_row_create btn btn-sm btn-primary mb-3 waves-effect waves-light\" data-toggle=\"modal\" data-target=\"#c_modal_create\" style=\"float: right!important; \">\n" +
                "                <i class=\"fas fa-plus\"></i>\n" +
                "            </button>");

            $('.dt-button').addClass('btn btn-primary btn-md ml-0 mb-3 waves-effect waves-light');
            $('.dt-button').removeClass('dt-button');
            $('.button-page-length').removeClass('btn btn-primary btn-md ml-0 mb-3 waves-effect waves-light');
            $('.button-page-length').addClass('dt-button');
            $('.buttons-collection').addClass('btn btn-primary btn-md ml-0 mb-3 waves-effect waves-light');


        },
        "fnDrawCallback": function( oSettings ) {


            $("#slide-out").css("transform", "translateX(-105%)")


            $('.dt-button').addClass('btn btn-primary btn-md ml-0 mb-3 waves-effect waves-light');
            $('.dt-button').removeClass('dt-button');
            $('.button-page-length').removeClass('btn btn-primary btn-md ml-0 mb-3 waves-effect waves-light');
            $('.button-page-length').addClass('dt-button');

            $('.buttons-collection').addClass('btn btn-primary btn-md ml-0 mb-3 waves-effect waves-light');


            $(".file-path-wrapper").on("click", function () {
                $(this).prev().children().click();
            });


            $(".c_row_update").on("click", function () {
                var id = $(this).parent().parent().find(".c_id").text();

                $old_value_action = $("#c_update_form").data('action');


                $("#c_update_form").attr('action', $old_value_action + id);
                // alert($old_value_action)

                $.ajax({
                    type: "POST",
                    url: $(this).data("updatelink"),
                    data: {my_data: id},

                    beforeSend: function() {
                        $('.c_spinner').show();
                    },

                    complete: function() {
                        $('.c_spinner').hide();
                    },

                    success: function(data) {
                        $("#c_update_form").html(data)
                    },
                    error: function() {
                        alert('Xəta baş verdi');
                    }
                });


            });

            $(".c_row_delete").on("click", function () {
                //silme islemine redirect ederek silen
                var id = $(this).parent().parent().find(".c_id").text();
                $old_data = $(this).data('deletelinkold');
                $(this).data("deletelink", $old_data + id);
                swal({
                    title: "Əminsiniz?",
                    text: "Silinən məlumatlar geri qaytarılmayacaq!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = $(this).data('deletelink');
                        }
                    });


            });

            $(".c_other_link").on("click", function () {
                var id = $(this).parent().parent().find(".c_id").text();
                $old_data = $(this).data('href');
                $(this).attr("href", $old_data + id);
            });


            //switchlernen birden cox elementi secmek
            var idler = [];
            $(".c_checkbox").change(function () {

                var ischecked = $(this).prop("checked");

                if (ischecked == true){
                    idler.push($(this).attr('id'));
                }else{
                    var removeItem = $(this).attr('id');

                    idler = jQuery.grep(idler, function(value) {
                        return value != removeItem;
                    });
                }

            });



            //butun elementleri secmek
            var idArray = [];
            var counter = 0;
            $('.c_check_all').click(function () {

                if (counter % 2 === 0){
                    $(".c_checkbox").prop("checked" ,true);


                    $('.c_checkbox').each(function () {
                        idArray.push(this.id);
                    });

                    $(".c_checkbox").click(function () {

                        var isCheck = $(this).prop("checked");

                        if (isCheck == false){
                            var removeItem = $(this).attr("id");

                            idArray = jQuery.grep(idArray, function(value) {
                                return value != removeItem;
                            });
                        }else{
                            idArray.push($(this).attr("id"))
                        }

                    });

                } else{
                    $(".c_checkbox").prop("checked" ,false);
                    idArray = [];
                    idler = [];
                }
                counter++;
            });



            //birden cox elementi silmek
            $('.c_delete_all').click(function () {

                swal({
                    title: "Əminsiniz?",
                    text: "Silinən məlumatlar geri qaytarılmayacaq!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            if (counter % 2 === 0){
                                if (idler.length != 0){
                                    window.location.href = $(".c_row_delete").data('deletelinkold') + idler;
                                }
                            }else{
                                if (idArray.length != 0){
                                    window.location.href = $(".c_row_delete").data('deletelinkold') + idArray;
                                }
                            }

                        }
                    });
                event.preventDefault();
            });


            //tablede switche basanda rowun renginin deyismesi
            $(".c_checkbox").on("click", function () {

                if ($(this).prop("checked")){
                    $(this).next().addClass("c_label_thead2");
                    $(this).parent().parent().parent().css("background-color", "#2196f3ad ");
                }else{
                    $(this).next().removeClass("c_label_thead2");
                    $(this).parent().parent().parent().css("background-color", "#fff");
                }
            });


            //tablede switche basanda butun rowlarin renginin deyismesi
            $(".c_check_all").click(function () {

                if ($(this).prop("checked")){
                    $(".c_label_thead").addClass("c_label_thead2");
                    $(".c_checkbox").parent().parent().parent().css("background-color", "#2196f3ad");
                }else{
                    $(".c_label_thead").removeClass("c_label_thead2");
                    $(".c_checkbox").parent().parent().parent().css("background-color", "#fff");
                }

            });



        }
    });


//dropzone nun dinamik sekilleri yuklemesi
var myDropzone = new Dropzone("#dropzone");
myDropzone.on("complete", function(file) {
    $("#slide-out").css("transform", "translateX(-105%)")
    $data_url_of_dropzone = $('#dropzone').data("url");
    table.ajax.reload();
});





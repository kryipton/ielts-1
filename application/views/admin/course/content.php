
<!--tabledeki fieldleri gizletmek ucun olan style bunu external css in icinde yazma yoxsa diger seyfelerdeki tablelerde korlanar-->
<style>
    th:nth-child(2){
        display: none;
    }

    td:nth-child(2){
        display: none;
    }

    th:nth-child(6){
        display: none;
    }

    td:nth-child(6){
        display: none;
    }

    th:nth-child(7){
        display: none;
    }
    td:nth-child(7){
        display: none;
    }

    th:nth-child(8){
        display: none;
    }
    td:nth-child(8){
        display: none;
    }

    th:nth-child(9){
        display: none;
    }

    td:nth-child(9){
        display: none;
    }



    th:nth-child(12){
        display: none;
    }
    td:nth-child(12){
        display: none;
    }

    th:nth-child(14){
        display: none;
    }
    td:nth-child(14){
        display: none;
    }

    th:nth-child(15){
        display: none;
    }
    td:nth-child(15){
        display: none;
    }

    th:nth-child(16){
        display: none;
    }
    td:nth-child(16){
        display: none;
    }


    th:nth-child(18){
        display: none;
    }
    td:nth-child(18){
        display: none;
    }

    th:nth-child(19){
        display: none;
    }
    td:nth-child(19){
        display: none;
    }

    .dt-buttons{
        display: none;
    }

</style>
<!--tabledeki fieldleri gizletmek ucun olan style bunu external css in icinde yazma yoxsa diger seyfelerdeki tablelerde korlanar-->


<section>

    <div class="card card-cascade narrower z-depth-0 pb-4">

        <!--tablenin basliqi-->
        <div
            class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

            <div style="visibility: hidden;">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                        class="fas fa-th-large mt-0"></i></button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                        class="fas fa-columns mt-0"></i></button>
            </div>

            <a class="white-text mx-3">Kurslar</a>

            <div style="visibility: hidden;">
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                        class="fas fa-pencil-alt mt-0"></i></button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                        class="fas fa-eraser mt-0"></i></button>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2"><i
                        class="fas fa-info-circle mt-0"></i></button>
            </div>

        </div>
        <!--tablenin basliqi-->

        <div class="px-4">

            <!-- Tablenin ozu -->
            <div class="table-responsive">
                <!--Table-->
                <table class="table table-hover table-bordered mb-0" id="datatable" data-url="<?php echo $get_data_link?>">

                    <!-- Table head -->
                    <thead>
                    <tr>

                        <th class="c_switch_th" data-orderable="false" style="width: 20px!important; padding: 5px!important;">

                            <!--<label for="checkbox" class="form-check-label mr-2 label-table c_label_thead"><input type="checkbox" class="c_check_all form-check-input"/><span id="c_span_whole"></span></label>-->
                            <a class="red lighten-1 btn btn-danger mr-1 c_delete_all" style="padding: 6px!important;"><i style="font-size: 13px;" class="fas fa-trash"></i></a>

                            <input class="form-check-input c_check_all" type="checkbox" id="checkbox">
                            <label for="checkbox" class="form-check-label mr-2 label-table c_label_thead c_switch_margin"></label>

                        </th>


                        <th data-orderable="true" class="c_th_max_width"><a>id<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Adı Az<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Adı En<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Adı Ru<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Haqqında Az<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Haqqında En<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Haqqında Ru<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Qeydiyyatdan keçmiş istifadəçilər<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun tarixi<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Qiyməti<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursda iştirak edəcək maksimum tələbə sayı<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Şəkli<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Leksiyalar<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>İmtahanlar<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Müddəti<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Kursun Səviyyəsi<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>Sertifikat<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>qiymətləndirmələr<i class="fas fa-sort ml-1"></i></a></th>
                        <th data-orderable="true" class="c_th_max_width"><a>qiymətləndirmələr<i class="fas fa-sort ml-1"></i></a></th>


                        <th data-orderable="false" class="c_operations" style="width: 53px!important;"><a>Operations</a></th>


                    </tr>
                    </thead>
                    <!-- Table head -->


                    <!-- Table body data table melumatlari bura ajaxnan getirir-->
                    <tbody></tbody>
                    <!-- Table body data table melumatlari bura ajaxnan getirir-->

                </table>
                <!-- Table -->
            </div>
            <!-- Tablenin ozu -->
        </div>
    </div>





</section>













<?php
class MY_Controller extends CI_Controller{

    private $img_key;
    private $file_key;

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata("user"))){
            redirect(base_url("Panel_admin_page_secure_login_page"));
        }

    }


//======================================== Dinamik Insert functionlari ===================================================

    //  core v2.0
    public function insert_db($config){


//      post metoduynan qebul edilen deyerler bu arrayin icine toplanir ve data olaraq db ya insert olur
        $data = array();

//      eyer cond 1 dise proses ugurla basa catib eger 0 qaytarirsa demeli prosesde xeta var ve geri seyfeye aler sessionla birlikde qayidir
        $cond = 1;

//      type text ve password olan inputlarin namelerinin arraylari fore eache salinaraq data arrayina doldurulur(xususi filterler metodlardan kecerek)
        foreach ($config["inputs_array"] as $key => $value){

//          inputlarin arrayinin icinde gelen deyerin ilk 9 herfi "not_input" dursa demeli o input deyil manual deyer olaraq qebul edilir
            $additional_id  = substr($value, 0, 11);
            $additional_editor  = substr($value, 0,8);
            $additional_file  = substr($value, 0,6);
            $additional_required  = substr($value, 0,10);
            $additional_md5  = substr($value, -5);


//          eger inputun ilk 9 herfi "not_input" dursa onu postnan cagirmir sadece default deyer kimi goturur
            if ($additional_id == "(not_input)" && strlen($value) > 11){
                $post_data = substr($value, 11);
            }
            elseif ($additional_md5 == "(md5)"){
                $password = substr($value, 0, strlen($value)-5);
                $post_data = md5($this->input->post($password));
            }
            elseif ($additional_required == "(required)" && strlen($value) >= 10){
                $important = substr($value, 10);
                $post_data = $this->input->post($important);
            }
            elseif ($additional_editor == "(editor)" && strlen($value) > 8){
                $editor = substr($value, 8);
                $editor .= "_create";
                $post_data = $this->input->post($editor);
            }
            elseif(!empty($config['upload_path']) && $additional_file == "(file)" && strlen($value) > 6){

                $config_upload['upload_path'] = $config["upload_path"];
                $config_upload['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|txt|webp';
                $config_upload['file_name'] = $_FILES[substr($value, 6)]['name'];
                $this->load->library('upload',$config_upload);
                $this->upload->initialize($config_upload);

                $is_upload = $this->upload->do_upload(substr($value, 6));
                if ($is_upload){
                    $post_data = $this->upload->data('file_name');

//                    if (substr($post_data, -3) == "jpg" || substr($post_data, -3) == "png" || substr($post_data, -4) == "jpeg" || substr($post_data, -3) == "gif"){
//                        $config_img['image_library'] = 'gd2';
//                        $config_img['source_image'] = $config["upload_path"] . $post_data;
//                        $config_img['create_thumb'] = false;
//                        $config_img['maintain_ratio'] = false;
//                        $config_img['width']     = 800;
//                        $config_img['height']   = 600;
//                        $config_img['new_image'] = $config["upload_path"] . $post_data;
//
//                        $this->load->library('image_lib', $config_img);
//                        $this->image_lib->resize();
//                    }



                }else{
                    $post_data = "default.png";
                }

            }else{
                $post_data = strip_tags($this->input->post($value));
            }



//          eger post data bosdursa cond 0 olsun
            if (empty($post_data) && $additional_required == "(required)" && strlen($value) >= 10){
                $cond = 0;
            }

//          modele gonderilecek data nin doldurulmasi
            $data[$key] = $post_data;

        }



//      eyer cond 1 dise succes linke success alerti ile birlikde redirect edir
        if ($cond == 1){

//          core ucun modelde yazilmis xususi insert metodu
            $id = $this->Core->add($data, $config["table_name"]);

            $this->session->set_flashdata("success", "Məlumat Əlavə Edildi!");
            $this->session->set_userdata("id", $id);

            redirect($config["success_link"]);

//      eyer cond 0 dise error linke error alerti ile birlikde redirect edir
        }else{
            $this->session->set_flashdata("alert", "Boşluq Buraxmayın!");
            redirect($config["error_link"]);
        }

    }
    //  core v2.0

//**************************************** Dinamik Insert functionlari ****************************************************





//======================================== Dinamik Update functionlari ===================================================

    //  core v2.0
    public function update_db($config){

        $row = $this->Core->get_where_row($config["where"] , $config["table_name"]);

//      post metoduynan qebul edilen deyerler bu arrayin icine toplanir ve data olaraq db ya insert olur
        $data = array();

//      eyer cond 1 dise proses ugurla basa catib eger 0 qaytarirsa demeli prosesde xeta var ve geri seyfeye aler sessionla birlikde qayidir
        $cond = 1;

//      type text ve password olan inputlarin namelerinin arraylari fore eache salinaraq data arrayina doldurulur(xususi filterler metodlardan kecerek)
        foreach ($config["inputs_array"] as $key => $value){

//          inputlarin arrayinin icinde gelen deyerin ilk 9 herfi "not_input" dursa demeli o input deyil manual deyer olaraq qebul edilir
            $additional_id  = substr($value, 0, 11);
            $additional_editor  = substr($value, 0,8);
            $additional_file  = substr($value, 0,6);
            $additional_required  = substr($value, 0,10);
            $additional_md5  = substr($value, -5);

//            eger inputun ilk 9 herfi "not_input" dursa onu postnan cagirmir sadece default deyer kimi goturur
            if ($additional_id == "(not_input)" && strlen($value) > 11){
                $post_data = substr($value, 11);
            }
            elseif ($additional_md5 == "(md5)"){
                $password = substr($value, 0, strlen($value)-5);
                $post_data = md5($this->input->post($password));
            }
            elseif ($additional_required == "(required)" && strlen($value) >= 10){
                $important = substr($value, 10);
                $post_data = $this->input->post($important);
            }
            elseif ($additional_editor == "(editor)" && strlen($value) > 8){
                $editor = substr($value, 8);
                $editor .= "_editor";
                $post_data = $this->input->post($editor);
            }
            elseif(!empty($config['upload_path']) && $additional_file == "(file)" && strlen($value) > 6){

                $config_upload['upload_path'] = $config["upload_path"];
                $config_upload['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|txt|webp';
                $config_upload['file_name'] = $_FILES[substr($value, 6)]['name'];
                $this->load->library('upload',$config_upload);
                $this->upload->initialize($config_upload);

                $is_upload = $this->upload->do_upload(substr($value, 6));
                if ($is_upload){
                    $post_data = $this->upload->data('file_name');

//                    if (substr($post_data, -3) == "jpg" || substr($post_data, -3) == "png" || substr($post_data, -4) == "jpeg" || substr($post_data, -3) == "gif"){
//                        $config_img['image_library'] = 'gd2';
//                        $config_img['source_image'] = $config["upload_path"] . $post_data;
//                        $config_img['create_thumb'] = false;
//                        $config_img['maintain_ratio'] = false;
//                        $config_img['width']     = 800;
//                        $config_img['height']   = 600;
//                        $config_img['new_image'] = $config["upload_path"] . $post_data;
//
//                        $this->load->library('image_lib', $config_img);
//                        $this->image_lib->resize();
//                    }

                    if (!empty($row[$key]) && $row[$key] != "default.png" && $row[$key] != "doc.png")
                    unlink($config["upload_path"] . $row[$key]);

                }else{
                    $post_data = $row[$key];
                }

            }else{
                $post_data = strip_tags($this->input->post($value));
            }



//          eger post data bosdursa cond 0 olsun
            if (empty($post_data) && $additional_required == "(required)" && strlen($value) >= 10){
                $cond = 0;
            }

//          modele gonderilecek data nin doldurulmasi
            $data[$key] = $post_data;

        }




//      eyer cond 1 dise succes linke success alerti ile birlikde redirect edir
        if ($cond == 1){

//          core ucun modelde yazilmis xususi insert metodu
            $this->Core->update($config["where"], $config["table_name"] , $data);

            $this->session->set_flashdata("success", "Məlumat yenilendi!");
            redirect($config["success_link"]);

//      eyer cond 0 dise error linke error alerti ile birlikde redirect edir
        }else{
            $this->session->set_flashdata("alert", "Boşluq Buraxmayın!");
            redirect($config["error_link"]);
        }


    }
    //  core v2.0

//**************************************** Dinamik Update functionlari ****************************************************





//======================================== Dinamik Delete functionlari ===================================================

    //  core v2.0
    public function delete_db($config){
        $row="";

        if (strpos($config["where"]["id"], ',') !== false){
            $id_array = explode(",", $config["where"]["id"]);

            if (!empty($config["upload_path"])){

                foreach ($id_array as $key=>$value) {
                    $row = $this->Core->get_where_row(array("id" => $value), $config["table_name"]);
                    foreach ($config["table_file_field_names"] as $file){
                        if (!empty($row[$file]) && $row[$file] != "default.png" && $row[$file] != "doc.png")
                        unlink($config["upload_path"] . $row[$file]);
                    }

                    $result = $this->Core->delete(array("id" => $value), $config["table_name"]);

                }

                if ($result == 1){
                    $this->session->set_flashdata("success", "Məlumatlar Silindi!");
                    redirect($config["success_link"]);
                }else{
                    $this->session->set_flashdata("alert", "Xəta Baş Verdi!");
                    redirect($config["error_link"]);
                }

            }else{

                foreach ($id_array as $key=>$value) {
                    $result = $this->Core->delete(array("id" => $value), $config["table_name"]);
                }

                if ($result == 1){
                    $this->session->set_flashdata("success", "Məlumatlar Silindi!");
                    redirect($config["success_link"]);
                }else{
                    $this->session->set_flashdata("alert", "Xəta Baş Verdi!");
                    redirect($config["error_link"]);
                }
            }



        }else{

            $row = $this->Core->get_where_row($config["where"], $config["table_name"]);



            foreach ($config["table_file_field_names"] as $file){
                if (!empty($row[$file]) && $row[$file] != "default.png" && $row[$file] != "doc.png")
                    unlink($config["upload_path"] . $row[$file]);
            }

            $result = $this->Core->delete($config["where"], $config["table_name"]);

            if ($result == 1){
                $this->session->set_flashdata("success", "Məlumat Silindi!");
                redirect($config["success_link"]);
            }else{
                $this->session->set_flashdata("alert", "Xəta Baş Verdi!");
                redirect($config["error_link"]);
            }
        }


    }
    //  core v2.0

//**************************************** Dinamik Delete functionlari ****************************************************






//======================================== Dinamik Delete functionlari ===================================================

    //  core v2.0
    public function import_csv($config){


        if(!empty($_FILES['csv_file']['name']))
        {
            $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
            fgetcsv($file_data);
            $count =0;
            while($row = fgetcsv($file_data))
            {

                for ($i=1; $i < count($config["field_names"]); $i++){

                    $arr[$config["field_names"][$i]] = $row[$i-1];
                }

                $data[$count] = $arr;

                $this->Core->add($data[$count], $config["table_name"]);

                $count++;
            }


        }


    }
    //  core v2.0

//**************************************** Dinamik Delete functionlari ****************************************************







//======================================== Dinamik Ajax update functionlari ===================================================

    //core v1.0
    public function update_db_ajax($where, $data_post, $table_field_post ,$table_name){

        $changed_data = strip_tags($this->input->post($data_post));

        $table_field_name = strip_tags($this->input->post($table_field_post));

        $data = array(
          $table_field_name => $changed_data
        );

        $this->Model_for_core->core_update($where, $table_name, $data);

    }
    //core v1.0

    //core v1.0
    public function update_db_ajax_img($where, $upload_path, $input_name, $field_name ,$table_name, $link){

        $row = $this->CarModel_model->get_model_row($where);

        //      sekiller upload edilir
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES[$input_name]['name'];

        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $cond = $this->upload->do_upload("file");

        if ($cond && $row[$field_name] != "default.png"){
            unlink($upload_path . $row[$field_name]);
        }

        $data = array(
            $field_name => ($cond) ? $this->upload->data('file_name') : $row[$field_name],
        );

        $this->Model_for_core->core_update($where, $table_name, $data);

        if ($cond){
            $this->session->set_flashdata("success", "Şəkil Yeniləndi!");
        }else{
            $this->session->set_flashdata("alert", "Şəkil Yenilənmədi!");
        }

        redirect($link);


    }
    //core v1.0

//**************************************** Dinamik Ajax update functionlari ****************************************************







//======================================== Dinamik Ajax Sekil upload(galereya) functionlari ===================================================

    //core v2.0 hele tamalanmiyib!!
    public function dropzone($config2){

        //      sekiller dropzonedan upload edilir
        $config['upload_path'] = $config2["upload_path"];
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES[$config2["input_name"]]['name'];

        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $cond = $this->upload->do_upload("file");


        //      upload edilecek sekil database e yuklenir
        $data  = array(
            $config2["field_name"] => ($cond) ? $this->upload->data('file_name') : "default.png",
            "tour_id" => $config2["id"],
        );


        //      eyger sekil upload oldusa succes olmadisa warning alerti versin
        if ($cond){
            $this->session->set_flashdata("success", "Şəkil Yükləndi!");
        }else{
            $this->session->set_flashdata("alert", "Şəkil Yüklənmədi!");
        }

        $this->Core->add($data, $config2["table_name"]);


    }
    //core v2.0 hele tamalanmiyib!!

//**************************************** Dinamik Ajax Sekil upload(galereya) functionlari ****************************************************




//======================================== Dinamik Data table kodlari ===================================================


    //core v2.0
    public function data_table($config)
    {

        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";


        $config["valid_columns"] = $this->Core->list_fields($config["table_name"]);

        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }


        if(!isset($config["valid_columns"][$col]))
        {
            $order = null;
        }
        else
        {
            if ($col >= 1){
                $order = $config["valid_columns"][$col - 1];
            }else{
                $order = $config["valid_columns"][$col];
            }

        }
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }

        if(!empty($search))
        {
            $x=0;
            foreach($config["valid_columns"] as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }
        }
        $this->db->limit($length,$start);
        $employees = $this->db->get($config["table_name"]);
        $data = array();

//        menim duzeltdiyim kodlar
        foreach ($employees->result_array() as $key => $item) {
            $item = array_values($item);
            array_unshift($item , '<input class="form-check-input c_checkbox" type="checkbox" id="'. $item[0] .'">
            <label for="'. $item[0] .'" class="form-check-label mr-2 label-table c_label_thead"></label>');

            $count = 0;
            foreach ($item as $k=>$v){
                if (substr($v, -4) == ".jpg" || substr($v, -4) == ".png" || substr($v, -5) == ".jpeg"){
                    $item[$k] = '<a href="' . base_url($config["upload_path"]) . $v .'" data-size="1600x1067">
                                  <img class="img-fluid" width="100px" height ="100px" style="display: initial; object-fit:contain; height:100px!important; width:100px!important" src="' . base_url($config["upload_path"]) . $v .'" alt="Sekil" >
                                </a>';
                }elseif (substr($v, -4) == ".doc" || substr($v, -4) == ".pdf" || substr($v, -4) == ".txt" || substr($v, -5) == ".docx"){
                    $item[$k] = '<a href="'. base_url($config["upload_path"]) . $v .'" download><img class="materialboxed" width="89px" height ="44px" style="display: initial; object-fit:contain;" src="' . base_url($config["upload_path"]) . "doc.png" .'" alt="Sekil"></a>';
                }else{

                    if ($count != 1){
                        $item[$k] = '<span class="c_update_link" >' . $v . '</span>';
                    }else{
                        $item[$k] = '<span class="c_update_link c_id" >' . $v . '</span>';
                    }

                }
                $count++;
            }

            $data[] = $item;
        }

        foreach ($data as $element => $val) {

            foreach ($config["additional_links"] as $name => $link){
                $val[] = '<a data-href="'. base_url($link) .'" href="'. base_url($link) .'" class="btn btn-sm btn-primary c_other_link">'. $name .'</a>';
                $data[$element] = $val;
            }

            $val[] = '<a data-toggle="modal" data-target="#centralModalFluidSuccessDemo"  class="btn btn-primary mr-1 btn-sm c_row_update " data-updatelink = "' . $config["link_for_update_modal"] . '" >
                        <i class="fas fa-wrench" style="font-size: 15px"></i>
                      </a>
                      <a  data-deletelinkold = "' . $config["delete_link"] . '" data-deletelink = "' . $config["delete_link"] . '" class="red lighten-1 btn btn-sm btn-danger mr-1 c_row_delete">
                        <i style="font-size: 15px;" class="fas fa-trash"></i>
                      </a>';
            $data[$element] = $val;

        }
//        menim duzeltdiyim kodlar



        $total_employees = $this->data_table_2($config["table_name"]);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data,
        );

        echo json_encode($output);
        exit();
    }
    //core v2.0


    //core v2.0
    public function data_table_2($table_name)
    {
        $query = $this->db->select("COUNT(*) as num")->get($table_name);
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
    //core v2.0


    //core v2.0
    public function data_table_array($config)
    {



        if (empty($config["id_array"]))
        {
            $config["id_array"] = -1;
        }

        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";


        $config["valid_columns"] = $this->Core->list_fields($config["table_name"]);

        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }


        if(!isset($config["valid_columns"][$col]))
        {
            $order = null;
        }
        else
        {
            if ($col >= 1){
                $order = $config["valid_columns"][$col - 1];
            }else{
                $order = $config["valid_columns"][$col];
            }

        }
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }

        if(!empty($search))
        {
            $x=0;
            foreach($config["valid_columns"] as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }
        }
        $this->db->limit($length,$start);
        $employees = $this->db->where_in($config["id"], $config["id_array"])->get($config["table_name"]);


        $data = array();

//        menim duzeltdiyim kodlar
        foreach ($employees->result_array() as $key => $item) {
            $item = array_values($item);
            array_unshift($item , '<input class="form-check-input c_checkbox" type="checkbox" id="'. $item[0] .'">
            <label for="'. $item[0] .'" class="form-check-label mr-2 label-table c_label_thead"></label>');

            $count = 0;
            foreach ($item as $k=>$v){
                if (substr($v, -4) == ".jpg" || substr($v, -4) == ".png" || substr($v, -5) == ".jpeg"){
                    $item[$k] = '<a href="' . base_url($config["upload_path"]) . $v .'" data-size="1600x1067">
                                  <img class="img-fluid" width="100px" height ="100px" style="display: initial; object-fit:contain; height:100px!important; width:100px!important" src="' . base_url($config["upload_path"]) . $v .'" alt="Sekil" >
                                </a>';
                }elseif (substr($v, -4) == ".doc" || substr($v, -4) == ".pdf" || substr($v, -4) == ".txt" || substr($v, -5) == ".docx"){
                    $item[$k] = '<a href="'. base_url($config["upload_path"]) . $v .'" download><img class="materialboxed" width="89px" height ="44px" style="display: initial; object-fit:contain;" src="' . base_url($config["upload_path"]) . "doc.png" .'" alt="Sekil"></a>';
                }else{

                    if ($count != 1){
                        $item[$k] = '<span class="c_update_link" >' . $v . '</span>';
                    }else{
                        $item[$k] = '<span class="c_update_link c_id" >' . $v . '</span>';
                    }

                }
                $count++;
            }

            $data[] = $item;
        }

        foreach ($data as $element => $val) {

            foreach ($config["additional_links"] as $name => $link){
                $val[] = '<a data-href="'. base_url($link) .'" href="'. base_url($link) .'" class="btn btn-sm btn-primary c_other_link">'. $name .'</a>';
                $data[$element] = $val;
            }

            $val[] = '<a data-toggle="modal" data-target="#centralModalFluidSuccessDemo"  class="btn btn-primary mr-1 btn-sm c_row_update " data-updatelink = "' . $config["link_for_update_modal"] . '" >
                        <i class="fas fa-wrench" style="font-size: 15px"></i>
                      </a>
                      <a  data-deletelinkold = "' . $config["delete_link"] . '" data-deletelink = "' . $config["delete_link"] . '" class="red lighten-1 btn btn-sm btn-danger mr-1 c_row_delete">
                        <i style="font-size: 15px;" class="fas fa-trash"></i>
                      </a>';
            $data[$element] = $val;

        }
//        menim duzeltdiyim kodlar



        $total_employees = $this->data_table_2_array($config["id"], $config["id_array"], $config["table_name"]);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data,
        );

        echo json_encode($output);
        exit();

    }
    //core v2.0

    //core v2.0
    public function data_table_2_array($id, $id_array, $table_name)
    {
        $query = $this->db->where_in($id, $id_array)->select("COUNT(*) as num")->get($table_name);
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
    //core v2.0


//**************************************** Dinamik Data table kodlari ****************************************************









//======================================== Dinamik update ve insert view yazdirmaq ===================================================

//  core v2.0
    public function update_view($config)
    {

        $html="";
        $html2 = "";
        $html3 = "";
        $html4 = "";
        $counter = 1;
        $counter2 = 0;
        $arr = array();
        $data = $this->Core->get_where_row($config["where"], $config["table_name"]);
        $required2 = "";


        foreach ($config["label_name_and_input_name"] as $key=>$value) {

            if (strlen($value) > 8 && substr($value, 0,6) == "(group"){

                array_push($arr, $value);

                if ($counter % 3 == 0){


                    if (strlen($arr[0]) > 10 && substr($arr[0], -10) == "(required)"){

                        $arr[0] = substr($arr[0], 0,-10);

                        if ($config["input_name_type"][substr($arr[0], 8)] == "editor"){
                            $html2 = '<label for="' . substr($arr[0], 8) . '" style="color: black!important;">' . array_search ($arr[0] . "(required)", $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[0], 8). "_editor" .'">'. $data[substr($arr[0], 8)] .'</textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[0], 8). "_editor" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[0], 8)] == "file"){

                                $required="";
                                $html2 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[0] . "(required)", $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[0], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="'. $data[$value] .'">
                                            </div>
                                          </div>
                                        </div>';

                            }else{
                                $input_value = 'value="' . $data[substr($arr[0], 8)] . '"';
                                $required = "required";

                                $html2 = '<div class="md-form md-outline">
                                       <input '.$input_value.' ' . $required . '  type="' . $config["input_name_type"][substr($arr[0], 8)] . '"  id="' . substr($arr[0], 8) . '" name="'. substr($arr[0], 8) . '" class="form-control">
                                       <label for="' . substr($arr[0], 8) . '" class="active"> '. array_search ($arr[0] . "(required)", $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }

                    }else{
                        if ($config["input_name_type"][substr($arr[0], 8)] == "editor"){
                            $html2 = '<label for="' . substr($arr[0], 8) . '" style="color: black!important;">' . array_search ($arr[0], $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[0], 8). "_editor" .'">'. $data[substr($arr[0], 8)] .'</textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[0], 8). "_editor" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[0], 8)] == "file"){

                                $required="";
                                $html2 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[0], $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[0], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="'. $data[$value] .'">
                                            </div>
                                          </div>
                                        </div>';

                            }else{
                                $input_value = 'value="' . $data[substr($arr[0], 8)] . '"';
                                $required="";
                                $html2 = '<div class="md-form md-outline">
                                       <input '.$input_value.' ' . $required . '  type="' . $config["input_name_type"][substr($arr[0], 8)] . '"  id="' . substr($arr[0], 8) . '" name="'. substr($arr[0], 8) . '" class="form-control">
                                       <label for="' . substr($arr[0], 8) . '" class="active"> '. array_search ($arr[0], $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }
                    }


                    if (strlen($arr[1]) > 10 && substr($arr[1], -10) == "(required)"){

                        $arr[1] = substr($arr[1], 0,-10);

                        if ($config["input_name_type"][substr($arr[1], 8)] == "editor"){
                            $html3 = '<label for="' . substr($arr[1], 8) . '" style="color: black!important;">' . array_search ($arr[1] . "(required)", $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[1], 8). "_editor" .'">'. $data[substr($arr[1], 8)] .'</textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[1], 8). "_editor" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[1], 8)] == "file"){

                                $required="";
                                $html3 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[1] . "(required)", $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[1], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="'. $data[$value] .'">
                                            </div>
                                          </div>
                                        </div>';

                            }else{
                                $input_value = 'value="' . $data[substr($arr[1], 8)] . '"';
                                $required = "required";

                                $html3 = '<div class="md-form md-outline">
                                       <input '.$input_value.' ' . $required . '  type="' . $config["input_name_type"][substr($arr[1], 8)] . '"  id="' . substr($arr[1], 8) . '" name="'. substr($arr[1], 8) . '" class="form-control">
                                       <label for="' . substr($arr[1], 8) . '" class="active"> '. array_search ($arr[1] . "(required)", $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }

                    }else{
                        if ($config["input_name_type"][substr($arr[1], 8)] == "editor"){
                            $html3 = '<label for="' . substr($arr[1], 8) . '" style="color: black!important;">' . array_search ($arr[1], $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[1], 8). "_editor" .'">'. $data[substr($arr[1], 8)] .'</textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[1], 8). "_editor" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[1], 8)] == "file"){

                                $required="";
                                $html3 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[1], $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[1], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{
                                $input_value = 'value="' . $data[substr($arr[1], 8)] . '"';
                                $required="";
                                $html3 = '<div class="md-form md-outline">
                                       <input '.$input_value.' ' . $required . '  type="' . $config["input_name_type"][substr($arr[1], 8)] . '"  id="' . substr($arr[1], 8) . '" name="'. substr($arr[1], 8) . '" class="form-control">
                                       <label for="' . substr($arr[1], 8) . '" class="active"> '. array_search ($arr[1], $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }
                    }


                    if (strlen($arr[2]) > 10 && substr($arr[2], -10) == "(required)"){

                        $arr[2] = substr($arr[2], 0,-10);

                        if ($config["input_name_type"][substr($arr[2], 8)] == "editor"){
                            $html4 = '<label for="' . substr($arr[2], 8) . '" style="color: black!important;">' . array_search ($arr[2] . "(required)", $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[2], 8). "_editor" .'">'. $data[substr($arr[2], 8)] .'</textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[2], 8). "_editor" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[2], 8)] == "file"){

                                $required="";
                                $html4 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[2] . "(required)", $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[2], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="'. $data[$value] .'">
                                            </div>
                                          </div>
                                        </div>';

                            }else{
                                $input_value = 'value="' . $data[substr($arr[2], 8)] . '"';
                                $required = "required";

                                $html4 = '<div class="md-form md-outline">
                                       <input '.$input_value.' ' . $required . '  type="' . $config["input_name_type"][substr($arr[2], 8)] . '"  id="' . substr($arr[2], 8) . '" name="'. substr($arr[2], 8) . '" class="form-control">
                                       <label for="' . substr($arr[2], 8) . '" class="active"> '. array_search ($arr[2] . "(required)", $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }

                    }else{
                        if ($config["input_name_type"][substr($arr[2], 8)] == "editor"){
                            $html4 = '<label for="' . substr($arr[2], 8) . '" style="color: black!important;">' . array_search ($arr[2], $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[2], 8). "_editor" .'">'. $data[substr($arr[2], 8)] .'</textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[2], 8). "_editor" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[2], 8)] == "file"){

                                $required="";
                                $html4 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[2], $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[2], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{
                                $input_value = 'value="' . $data[substr($arr[2], 8)] . '"';
                                $required="";
                                $html4 = '<div class="md-form md-outline">
                                       <input '.$input_value.' ' . $required . '  type="' . $config["input_name_type"][substr($arr[2], 8)] . '"  id="' . substr($arr[2], 8) . '" name="'. substr($arr[2], 8) . '" class="form-control">
                                       <label for="' . substr($arr[2], 8) . '" class="active"> '. array_search ($arr[2], $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }
                    }


                    $html .= '<ul class="nav md-pills pills-secondary">

                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#'. "az1" . $counter2 .'az" role="tab">Az</a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#'. "en1" . $counter2. "1" .'en" role="tab">En</a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#'. "ru1" . $counter2 . "2" .'ru" role="tab">Ru</a>
                                </li>
                            
                             </ul>
                            
                             <div class="tab-content pt-0">
                            
                                <!--Panel 1-->
                                <div class="tab-pane fade in show active" id="'. "az1" . $counter2 .'az" role="tabpanel">'.  $html2 .'</div>
                                <!--/.Panel 1-->
                            
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="'. "en1" . $counter2. "1" .'en" role="tabpanel">'.  $html3 .'</div>
                                <!--/.Panel 2-->
                            
                                <!--Panel 3-->
                                <div class="tab-pane fade" id="'. "ru1" . $counter2. "2" .'ru" role="tabpanel">'.  $html4 .'</div>
                                <!--/.Panel 3-->
                        
                             </div>';


                    $arr = array();

                }


                $counter++;
            }else{

                if (strlen($value) > 10 && substr($value, -10) == "(required)"){
                    $required2="required";
                    $value = substr($value, 0,-10);
                }else{
                    $required2="";
                }

                if ($config["input_name_type"][$value] == "editor"){
                    $html .= '<label for="' . $value . '" style="color: black!important;">' . $key .'</label><textarea  name="'. $value . "_editor" .'">'. $data[$value] .'</textarea><br><br><script>CKEDITOR.replace( "'. $value . "_editor" .'", {});</script>';
                }else{
                    if ($config["input_name_type"][$value] != "file"){
                        $required= $required2;
                        $input_value = 'value="' . $data[$value] . '"';

                        $html .= '<div class="md-form md-outline">
                                       <input  '. $input_value . ' ' . $required . '  type="' . $config["input_name_type"][$value]. '"  id="' . $value . '" name="'. $value . '" class="form-control">
                                       <label for="' . $value . '" class="active"> '. $key .' </label>
                                    </div>';


                    }else{
                        $required="";
                        $input_value = '';
                        $html .=  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. $key .'</span>
                                              <input name="'. $value .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                    }

                }
            }

            $counter2++;
        }



        $count = 0;
        foreach ($config["select_name_and_table_name"]as $key => $value) {
            $splitted_string_array = explode(".",$value);
            $splitted_string_array2 = explode(".",$key);

            $table_data = $this->Core->get_desc($splitted_string_array[0]);
            $table_data_row = $this->Core->get_where_row(array("id" => $data[$splitted_string_array2[0]]),$splitted_string_array[0]);

            if (!empty($table_data) && !empty($table_data_row)){
                $html .= '<label for="">'. $splitted_string_array2[1] .'</label>
                        <select name="'. $splitted_string_array2[0] .'" class="mdb-select'. $count .' md-form">';

                $html .= '<option value="'. $table_data_row["id"] .'">'. $table_data_row["name_az"] .'</option>';

                foreach ($table_data as $item){

                    if ($data[$splitted_string_array2[0]] != $item["id"]){
                        $html .= '<option value="'. $item["id"] .'">'. $item[$splitted_string_array[1]] .'</option>';
                    }
                }

                $html .= '</select> <script>$(\'.mdb-select'. $count .'\').materialSelect();</script>';

            }


            $count++;
        }

        $html5 = '<br><button type="submit" class="btn btn-primary" style="float: right">Yenilə <i class="fas fa-pencil-alt"></i></button>';

        return $html . $html5;

    }
//  core v2.0


//  core v2.0
    public function create_view($config)
    {

       $html2 = "";
       $html3 = "";
       $html4 = "";
       $counter = 1;
       $counter2 = 0;
       $arr = array();

//       update modal view
       $html = '<div class="modal fade" id="centralModalFluidSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-fluid modal-notify modal-primary" role="document">
                            <!-- Content -->
                            <div class="modal-content" style="width: 95%; margin: auto;">
                                <!-- Header -->
                                <div class="modal-header">
                                    <p class="heading lead">Düzənlə</p>
                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                    
                                <!-- Body -->
                                <div class="modal-body">
                                
                                        <div class="preloader-wrapper big active c_spinner" style="margin-left: auto; margin-right: auto; display: inherit">
                                        <div class="spinner-layer spinner-blue-only">
                                          <div class="circle-clipper left">
                                            <div class="circle"></div>
                                          </div><div class="gap-patch">
                                            <div class="circle"></div>
                                          </div><div class="circle-clipper right">
                                            <div class="circle"></div>
                                          </div>
                                        </div>
                                     </div>
                                     <p class="c_spinner" style="text-align: center">Zəmət olmasa gözləyin Məlumatlar yüklənir...</p>
                                
                                    <form data-action="'. $config["update_link"] .'" id="c_update_form" action="'. $config["add_link"] .'" method="post" enctype="multipart/form-data">';


       $html .= '<div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Yarat<i class="ml-1 fas fa-plus"></i></button>
                      </div>';
       $html .=  '</form>
                                </div>
                            </div>
                            <!-- Content -->
                        </div>
                    
                    </div>';
//       update modal view





//       create modal view
       $html .= '<div class="modal fade" id="c_modal_create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-fluid modal-notify modal-primary" role="document">
                            <!-- Content -->
                            <div class="modal-content" style="width: 95%; margin: auto;">
                                <!-- Header -->
                                <div class="modal-header">
                                    <p class="heading lead">Yeni Məlumat yaratma</p>
                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                    
                                <!-- Body -->
                                <div class="modal-body">
                                    <form data-action="'. $config["update_link"] .'" action="'. $config["add_link"] .'" method="post" enctype="multipart/form-data">';



       $required= "";
       $required2 = "";
       foreach ($config["label_name_and_input_name"] as $key=>$value) {

            if (strlen($value) > 8 && substr($value, 0,6) == "(group"){

                array_push($arr, $value);


                if ($counter % 3 == 0){


                    if (strlen($arr[0]) > 10 && substr($arr[0], -10) == "(required)"){

                        $arr[0] = substr($arr[0], 0,-10);

                        if ($config["input_name_type"][substr($arr[0], 8)] == "editor"){
                            $html2 = '<label for="' . substr($arr[0], 8) . '" style="color: black!important;">' . array_search ($arr[0] . "(required)", $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[0], 8). "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[0], 8). "_create" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[0], 8)] == "file"){

                                $required="";
                                $html2 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[0] . "(required)", $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[0], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{

                                $required = "required";


                                $html2 = '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][substr($arr[0], 8)] . '"  id="' . substr($arr[0], 8) . '" name="'. substr($arr[0], 8) . '" class="form-control">
                                       <label for="' . substr($arr[0], 8) . '" class=""> '. array_search ($arr[0] . "(required)", $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }

                    }else{
                        if ($config["input_name_type"][substr($arr[0], 8)] == "editor"){
                            $html2 = '<label for="' . substr($arr[0], 8) . '" style="color: black!important;">' . array_search ($arr[0], $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[0], 8). "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[0], 8). "_create" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[0], 8)] == "file"){

                                $required="";
                                $html2 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[0], $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[0], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{

                                $required="";

                                $html2 = '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][substr($arr[0], 8)] . '"  id="' . substr($arr[0], 8) . '" name="'. substr($arr[0], 8) . '" class="form-control">
                                       <label for="' . substr($arr[0], 8) . '" class=""> '. array_search ($arr[0], $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }
                    }

                    if (strlen($arr[1]) > 10 && substr($arr[1], -10) == "(required)"){

                        $arr[1] = substr($arr[1], 0,-10);

                        if ($config["input_name_type"][substr($arr[1], 8)] == "editor"){
                            $html3 = '<label for="' . substr($arr[1], 8) . '" style="color: black!important;">' . array_search ($arr[1] . "(required)", $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[1], 8). "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[1], 8). "_create" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[1], 8)] == "file"){

                                $required="";
                                $html3 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[1] . "(required)", $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[1], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{

                                $required = "required";

                                $html3 = '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][substr($arr[1], 8)] . '"  id="' . substr($arr[1], 8) . '" name="'. substr($arr[1], 8) . '" class="form-control">
                                       <label for="' . substr($arr[1], 8) . '" class=""> '. array_search ($arr[1] . "(required)", $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }

                    }else{
                        if ($config["input_name_type"][substr($arr[1], 8)] == "editor"){
                            $html3 = '<label for="' . substr($arr[1], 8) . '" style="color: black!important;">' . array_search ($arr[1], $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[1], 8). "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[1], 8). "_create" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[1], 8)] == "file"){

                                $required="";
                                $html3 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[1], $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[1], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{

                                $required="";

                                $html3 = '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][substr($arr[1], 8)] . '"  id="' . substr($arr[1], 8) . '" name="'. substr($arr[1], 8) . '" class="form-control">
                                       <label for="' . substr($arr[1], 8) . '" class=""> '. array_search ($arr[1], $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }
                    }

                    if (strlen($arr[2]) > 10 && substr($arr[2], -10) == "(required)"){

                        $arr[2] = substr($arr[2], 0,-10);

                        if ($config["input_name_type"][substr($arr[2], 8)] == "editor"){
                            $html4 = '<label for="' . substr($arr[2], 8) . '" style="color: black!important;">' . array_search ($arr[2] . "(required)", $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[2], 8). "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[2], 8). "_create" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[2], 8)] == "file"){

                                $required="";
                                $html4 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[2] . "(required)", $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[2], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{

                                $required = "required";

                                $html4 = '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][substr($arr[2], 8)] . '"  id="' . substr($arr[2], 8) . '" name="'. substr($arr[2], 8) . '" class="form-control">
                                       <label for="' . substr($arr[2], 8) . '" class=""> '. array_search ($arr[2] . "(required)", $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }

                    }else{
                        if ($config["input_name_type"][substr($arr[2], 8)] == "editor"){
                            $html4 = '<label for="' . substr($arr[2], 8) . '" style="color: black!important;">' . array_search ($arr[2], $config["label_name_and_input_name"]) .'</label><textarea name="'. substr($arr[2], 8). "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. substr($arr[2], 8). "_create" .'", {});</script>';
                        }else{
                            if ($config["input_name_type"][substr($arr[2], 8)] == "file"){

                                $required="";
                                $html4 =  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. array_search ($arr[2], $config["label_name_and_input_name"]) .'</span>
                                              <input name="'. substr($arr[2], 8) .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';

                            }else{

                                $required="";

                                $html4 = '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][substr($arr[2], 8)] . '"  id="' . substr($arr[2], 8) . '" name="'. substr($arr[2], 8) . '" class="form-control">
                                       <label for="' . substr($arr[2], 8) . '" class=""> '. array_search ($arr[2], $config["label_name_and_input_name"]) .' </label>
                                    </div>';

                            }
                        }
                    }



                    $html .= '<ul class="nav md-pills pills-secondary">

                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#'. "az" . $counter2 .'az" role="tab">Az</a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#'. "en" . $counter2. "1" .'en" role="tab">En</a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#'. "ru" . $counter2 . "2" .'ru" role="tab">Ru</a>
                                </li>
                            
                             </ul>
                            
                             <div class="tab-content pt-0">
                            
                                <!--Panel 1-->
                                <div class="tab-pane fade in show active" id="'. "az" . $counter2 .'az" role="tabpanel">'.  $html2 .'</div>
                                <!--/.Panel 1-->
                            
                                <!--Panel 2-->
                                <div class="tab-pane fade" id="'. "en" . $counter2. "1" .'en" role="tabpanel">'.  $html3 .'</div>
                                <!--/.Panel 2-->
                            
                                <!--Panel 3-->
                                <div class="tab-pane fade" id="'. "ru" . $counter2. "2" .'ru" role="tabpanel">'.  $html4 .'</div>
                                <!--/.Panel 3-->
                        
                             </div>';



                    $arr = array();
                    $html2 ="";
                    $html3 ="";
                    $html4 ="";

                }


                $counter++;
            }else{

                if (strlen($value) > 10 && substr($value, -10) == "(required)"){
                    $required2="required";
                    $value = substr($value, 0,-10);
                }else{
                    $required2="";
                }

                if ($config["input_name_type"][$value] == "editor"){
                    $html .= '<label for="' . $value . '" style="color: black!important;">' . $key .'</label><textarea name="'. $value. "_create" .'"></textarea><br><br><script>CKEDITOR.replace( "'. $value. "_create" .'", {});</script>';
                }else{
                    if ($config["input_name_type"][$value] == "file"){

                        $required="";
                        $html .=  '<div class="md-form">
                                          <div class="file-field">
                                            <div class="btn btn-primary btn-sm float-left">
                                              <span>'. $key .'</span>
                                              <input name="'. $value .'" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text" placeholder="Fayl yüklə">
                                            </div>
                                          </div>
                                        </div>';



                    }else{

                        $required = $required2;

                        $html .= '<div class="md-form md-outline">
                                       <input ' . $required . '  type="' . $config["input_name_type"][$value] . '"  id="' . $value . '" name="'. $value . '" class="form-control">
                                       <label for="' . $value . '" class=""> '. $key .' </label>
                                    </div>';

                    }
                }

            }

            $counter2++;

        }

        $html .= "<br>";

        foreach ($config["select_name_and_table_name"] as $key => $value) {
            $splitted_string_array = explode(".",$value);
            $splitted_string_array2 = explode(".",$key);


            $table_data = $this->Core->get_desc($splitted_string_array[0]);


            if (!empty($table_data)){
                $html .= '<label for="">'. $splitted_string_array2[1] .'</label>
                        <select name="'. $splitted_string_array2[0] .'" class="mdb-select md-form">';


                foreach ($table_data as $item){
                    $html .= '<option value="'. $item["id"] .'">'. $item[$splitted_string_array[1]] .'</option>';
                }
                $html .= '</select><br>';
            }


        }



        $html .= '<div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Yarat<i class="ml-1 fas fa-plus"></i></button>
                      </div>';
       $html .=  '</form>
                                </div>
                            </div>
                            <!-- Content -->
                        </div>
                    
                    </div>';
//       create modal view



       return $html;


    }
//  core v2.0

//**************************************** Dinamik update ve insert view yazdirmaq ****************************************************



/* Viewdaki alertlerin gorsenmesi ucun lazim olan kodlar sadece kopyalayib viewdeki php faylinin icine atin


<!--melumat alerti-->
<?php if($this->session->flashdata("success")){ ?>
    <script>
        iziToast.success({
            icon: 'icon-person',
            message: '<?php echo $this->session->flashdata("success")?>',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            // progressBarColor: 'rgb(0, 255, 184)',
        });
    </script>
<?php }?>


<!--melumat alerti-->
<?php if($this->session->flashdata("alert")){ ?>
    <script>
        iziToast.warning({
            icon: 'icon-person',
            message: '<?php echo $this->session->flashdata("alert")?>',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            // progressBarColor: 'rgb(0, 255, 184)',
        });
    </script>
<?php }?>


   Viewdaki alertlerin gorsenmesi ucun lazim olan kodlar sadece kopyalayib viewdeki php faylinin icine atin */





}
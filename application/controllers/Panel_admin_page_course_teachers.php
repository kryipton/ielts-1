<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Panel_admin_page_course_teachers extends MY_Controller{

    private $view_folder = "";
    private $table_name= "";
    private $upload_path= "";
    private $label_name_and_input_name = "";
    private $update_link = "";
    private $add_link = "";
    private $delete_link = "";
    private $link_for_update_modal = "";
    private $success_link = "";
    private $error_link = "";
    private $get_data_link = "";
    private $input_name_type ="";
    private $field_names ="";
    private $add_update_input_array  ="";


    public function __construct()
    {
        parent::__construct();

//      adminin icindeki papkanin adi
        $this->view_folder = "course_teachers";

//      tablemizin adi
        $this->table_name = "course_teachers";

//      sekilleri ve fayllari yukleyeceyimiz yer meselen: base_url("uploads/teachers/")
        $this->upload_path = "uploads/teachers/";

//      tablemizin fieldlerinin array icinde siralanmasi BU DEYISILMIR!
        $this->field_names = $this->Core->list_fields("teachers");

        $this->label_name_and_input_name = array();

        $this->input_name_type = array();

        $this->add_update_input_array = array();


//      tabledeki melumatlarin add olunduqu link
        $this->add_link                       = base_url("Panel_admin_page_course_teachers/add/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      tabledeki melumatlarin delete olunduqu link
        $this->delete_link                    = base_url("Panel_admin_page_course_teachers/delete/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      proseslerden her hansi biri ugurla basa catdiqda hansi linke atsin
        $this->success_link                   = base_url("Panel_admin_page_course_teachers/index/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      proseslerden her hansi biri ugurla basa catmadiqda hansi linke atsin
        $this->error_link                     = base_url("Panel_admin_page_course_teachers/index/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      data tablenin icine melumatlarin ajaxnan getirilmesi ucun lazim olan link
        $this->get_data_link                  = base_url("Panel_admin_page_course_teachers/get_data/");
    }

    public function index($id)
    {
        $data["course"] = $this->Core->get_where_row(array("id" => $id), "course");

        $config["label_name_and_input_name"] = $this->label_name_and_input_name;
        $config["input_name_type"] = $this->input_name_type;
        $config["select_name_and_table_name"] = array(
            "teacher_id.Müəllimlər" => "teachers.name_az"
        );
        $config["update_link"] = $this->update_link . $id;
        $config["add_link"]    = $this->add_link . $id;
        $data["create_modal"] = $this->create_view($config);


        $data["get_data_link"] = $this->get_data_link . $id;
        $data["field_names"] = $this->field_names;
        $data["view_folder"] = $this->view_folder;
        $this->load->view('admin/includes/index', $data);

    }

    public function get_data($id)
    {
        $teacher_ids = $this->Core->get_where_result_desc(array("course_id" => $id), "course_teachers");
        $id_array = [];
        foreach ($teacher_ids as $item){
            $id_array[] = $item["teacher_id"];
        }

        $config["id"] = "id";
        $config["id_array"] = $id_array;
        $config["additional_links"] = array();
        $config["table_name"] = "teachers";
        $config["upload_path"] = $this->upload_path;
        $config["delete_link"] = $this->delete_link . $id . "/";
        $config["link_for_update_modal"] = $this->link_for_update_modal;

        $this->data_table_array($config);
    }

    public function add($id)
    {

        $config["inputs_array"] = array(
            "teacher_id" => "teacher_id",
            "course_id" => "(not_input)$id",
        );
        $config["success_link"] = $this->success_link . $id;
        $config["error_link"] =  $this->error_link . $id;
        $config["table_name"] = $this->table_name;
        $config["upload_path"] = $this->upload_path;

        $this->insert_db($config);

    }


    public function delete($id, $id2)
    {


        $config["where"] = array(
            "teacher_id"=> $id2,
            "course_id"=> $id,
        );
        $config["table_file_field_names"] = array();
        $config["success_link"] = $this->success_link . $id;
        $config["error_link"] = $this->error_link . $id;
        $config["table_name"] = $this->table_name;

        $this->delete_db($config);

    }



}
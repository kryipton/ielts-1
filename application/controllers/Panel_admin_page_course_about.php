<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Panel_admin_page_course_about extends MY_Controller{

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
    private $table_file_field_names  ="";


    public function __construct()
    {
        parent::__construct();

//      adminin icindeki papkanin adi
        $this->view_folder = "course_about";

//      tablemizin adi
        $this->table_name = "course_about";

//      sekilleri ve fayllari yukleyeceyimiz yer meselen: base_url("uploads/teachers/")
        $this->upload_path = "";

//      eger sekil veya file varsa tablenin hansi fieldinnen adini goturub papkadan silsin
        $this->table_file_field_names = array();

//==============================================================================================

//      tablemizin fieldlerinin array icinde siralanmasi BU DEYISILMIR!
        $this->field_names = $this->Core->list_fields($this->table_name);

        $this->label_name_and_input_name = array(

            "Müəllimlər Haqqında Başlıqı Az" => "(group2)name_az",
            "Müəllimlər Haqqında Başlıqı En" => "(group2)name_en",
            "Müəllimlər Haqqında Başlıqı Ru" => "(group2)name_ru",

            "Müəllimlər Haqqında Az" => "(group2)desc_az",
            "Müəllimlər Haqqında En" => "(group2)desc_en",
            "Müəllimlər Haqqında Ru" => "(group2)desc_ru",


        );

        $this->input_name_type = array(

            "name_az" => "text",
            "name_en" => "text",
            "name_ru" => "text",

            "desc_az" => "editor",
            "desc_en" => "editor",
            "desc_ru" => "editor",


        );

        $this->add_update_input_array = array(

            "desc_az" => "(editor)desc_az",
            "desc_en" => "(editor)desc_en",
            "desc_ru" => "(editor)desc_ru",

            "name_az" => "name_az",
            "name_en" => "name_en",
            "name_ru" => "name_ru",


        );


//==============================================================================================

//      tabledeki melumatlarin update olunduqu link
        $this->update_link                    = base_url("Panel_admin_page_course_about/update/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      ajaxnan melumatlarin modalin icine getirilmesi
        $this->link_for_update_modal          = base_url("Panel_admin_page_course_about/get_data_for_update/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      proseslerden her hansi biri ugurla basa catdiqda hansi linke atsin
        $this->success_link                   = base_url("Panel_admin_page_course_about/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      proseslerden her hansi biri ugurla basa catmadiqda hansi linke atsin
        $this->error_link                     = base_url("Panel_admin_page_course_about/");//bunnarin sonuna slash qoymaq vacibdir yoxsa islemez

//      data tablenin icine melumatlarin ajaxnan getirilmesi ucun lazim olan link
        $this->get_data_link                  = base_url("Panel_admin_page_course_about/get_data");
    }

    public function index()
    {

        $config["label_name_and_input_name"] = $this->label_name_and_input_name;
        $config["input_name_type"] = $this->input_name_type;
        $config["select_name_and_table_name"] = array();
        $config["update_link"] = $this->update_link;
        $config["add_link"]    = $this->add_link;
        $data["create_modal"] = $this->create_view($config);


        $data["get_data_link"] = $this->get_data_link;
        $data["field_names"] = $this->field_names;
        $data["view_folder"] = $this->view_folder;
        $this->load->view('admin/includes/index', $data);
    }

    public function get_data()
    {

        $config["additional_links"] = array();
        $config["table_name"] = $this->table_name;
        $config["upload_path"] = $this->upload_path;
        $config["delete_link"] = $this->delete_link;
        $config["link_for_update_modal"] = $this->link_for_update_modal;

        $this->data_table($config);

    }

    public function get_data_for_update()
    {
        $id = strip_tags($this->input->post("my_data"));//bu deyisilmir

        $config["where"] = array(
            "id" => $id,
        );
        $config["table_name"] = $this->table_name;
        $config["label_name_and_input_name"] = $this->label_name_and_input_name;
        $config["input_name_type"] = $this->input_name_type;
        $config["select_name_and_table_name"] = array();

        echo $this->update_view($config);

    }

    public function update($id)
    {


        $config["where"]            = array(
            "id" => $id,
        );
        $config["inputs_array"]     = $this->add_update_input_array;
        $config["success_link"]     = $this->success_link;
        $config["error_link"]       = $this->error_link;
        $config["table_name"]       = $this->table_name;
        $config["upload_path"]      = $this->upload_path;

        $this->update_db($config);

    }




}
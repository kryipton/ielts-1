<?php
 class ContactWebPageCoding extends CI_Controller{
     private $parent_folder = "";
     private $sub_folder = "";

     public function __construct()
     {
         parent::__construct();

         $this->parent_folder = "front";
         $this->sub_folder = "contact";

/*
        $dil = $this->uri->segment(1);
         if ($dil == ""){
             $dil = "az";
         }
         $this->lang->load($dil, $dil);

         $this->session->set_userdata("dil", $dil);*/

     }

     public function index()
     {

         $this->load->view("$this->parent_folder/$this->sub_folder/whole_page");
     }

     public function send_message()
     {

         $name=$this->input->post("user");
         $mail=$this->input->post("mail");
         $phone=$this->input->post("number");
         $msg=$this->input->post("msg");
         $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'testermail0777@gmail.com',
             'smtp_pass' => 'testerCODE',
             'mailtype'  => 'html',
             'charset'  => 'html',
             'wordwrap'  => TRUE, );

         $this->load->library("email");
         $this->email->initialize($config);
         $this->email->set_newline("\r\n");
         $this->email->from('testermail0777@gmail.com', $this->input->post('user'));
         $this->email->to("vuna172@gmail.com");
         $this->email->subject(' LuckyTravel  ');
         $this->email->message("$name adlı şəxsdən mesaj:<br> $msg <br> <br> <strong>Şəxslə əlaqə:</strong> <br> $mail <br> $phone") ;
         $this->email->send();
         $this->session->set_flashdata("sccs", "Mesajınız göndərildi!");
         redirect(base_url(""));
     }


 }
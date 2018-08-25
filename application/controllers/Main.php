<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Main extends CI_Controller {  
      //functions  
      function email_availibility()  
      {  
           $this->load->view("email_availibility");  
      }  
      function check_email_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("main_model");  
                if($this->main_model->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email sudah di gunakan, coba yang lain </label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email tersedia </label>';  
                }  
           }  
      }       
 }  
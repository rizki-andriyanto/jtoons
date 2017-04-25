<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Uploadimages.php");

class Login extends Uploadimages {
    
	 public function __construct()
     {
          parent::__construct();

          // $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->model('Uploadimages_model','Uploadimages');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');

          //load the login model
          $this->load->model('login_model');
          $this->load->library('session');
       
     }

public function index()
     {    
          
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('header-3');
               $this->load->view('login_view');
               $this->load->view('footer-2');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
                    if (count($usr_result) > 0) //active user record is present
                    {
                         //set the session variables
                         //validation succesed
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE
                              
                              
                         );
                         $this->session->set_userdata($sessiondata);

                         // redirect("view");
                        $this->load->view('header-2'); 
                        $this->data['view_data']= $this->Uploadimages->view_data();
                        // $this->load->view('v_admin', $this->data, FALSE);
                        $this->load->view('footer-2');
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         $this->load->view('header-3');
                         $this->load->view('login_view');
                         $this->load->view('footer-2');
                    }
               }
              
          }
     }

     

    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
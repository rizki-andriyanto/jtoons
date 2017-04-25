<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
       
        $this->load->helper('url');   
        $this->load->model('imagedata_model');

    }
    
    

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {   
        $this->load->view('header');

        // $data['photos'] = $this->Uploadimages->view_data()->result();
        // $this->load->view('content',$data);
        

        
        
        $data['photos'] = $this->imagedata_model->list_data()->result();
        // $data['content'] = $this->imagedata_model->list_data2()->result();
        
        $this->load->view('content',$data);
        $this->load->view('footer');
   

    }
    
   

    
}


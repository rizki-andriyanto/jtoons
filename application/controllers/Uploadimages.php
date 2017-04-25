<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadimages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Uploadimages
	 *	- or -
	 * 		http://example.com/index.php/Uploadimages/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Uploadimages/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        // revisi
        $this->load->helper('form');
        // $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model('pagination_model');
        
        $this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
        $this->load->model('Uploadimages_model','Uploadimages'); /* LOADING MODEL * Uploadimages_model as Uploadimages */
        

    }




	public function index()
	{

        $this->load->view('header-2');
		$this->load->view('insert');
        $this->load->view('footer-2');
	}

	public function file_upload(){
              $files = $_FILES;
              $count = count($_FILES['userfile']['name']);
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
				}
				  $fileName = implode(',',$images);
				  $this->Uploadimages->upload_image($this->input->post(),$fileName);
				  redirect('Uploadimages/view');
				}



		public function view(){
            
            $this->load->view('header-2');
            
			$this->data['view_data']= $this->Uploadimages->view_data();
            $this->load->view('home', $this->data, FALSE);
            $this->load->view('footer-2');

				}
        public function read($read_id){
            $this->load->view('header-2');
            $this->data['read_data']= $this->Uploadimages->read_data($read_id);
            $this->data['edit_data_image']= $this->Uploadimages->edit_data_image($read_id);
            $this->load->view('read', $this->data, FALSE);
            $this->load->view('footer-2');
                }




		public function edit($edit_id){
            $this->load->view('header-2');
			$this->data['edit_data']= $this->Uploadimages->edit_data($edit_id);
			$this->data['edit_data_image']= $this->Uploadimages->edit_data_image($edit_id);
            $this->load->view('edit', $this->data, FALSE);
            $this->load->view('footer-2');
				}

	    public function deleteimage(){
			$deleteid  = $this->input->post('image_id');
			$this->db->delete('photos', array('id' => $deleteid)); 
			$verify = $this->db->affected_rows();
			echo $verify;

		}


	   public function edit_file_upload(){
              $files = $_FILES;
              if(!empty($files['userfile']['name'][0])){
              $count = count($_FILES['userfile']['name']);
              $c_id = $this->input->post('c_id');
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
				}
				  $fileName = implode(',',$images);
				  $this->Uploadimages->edit_upload_image($c_id,$this->input->post(),$fileName);
				}else
				{
			  $c_id = $this->input->post('c_id');
			  $this->Uploadimages->edit_upload_image($c_id,$this->input->post());
				}
				redirect('Uploadimages/view');
				}

}

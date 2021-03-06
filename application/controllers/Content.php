<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Content_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'content/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'content/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'content/index.html';
            $config['first_url'] = base_url() . 'content/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Content_model->total_rows($q);
        $content = $this->Content_model->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'content_data' => $content,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header-2');
        $this->load->view('content/content_list', $data);
        $this->load->view('footer-2');
    }

    public function read($id) 
    {
        $row = $this->Content_model->get_by_id($id);
        if ($row) {
            $data = array(
		'c_id' => $row->c_id,
		'judul' => $row->judul,
		'konten' => $row->konten,
	    );
            $this->load->view('content/content_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('content/create_action'),
	    'c_id' => set_value('c_id'),
	    'judul' => set_value('judul'),
	    'konten' => set_value('konten'),
	);
        $this->load->view('content/content_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'konten' => $this->input->post('konten',TRUE),
	    );

            $this->Content_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('content'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content/update_action'),
		'c_id' => set_value('c_id', $row->c_id),
		'judul' => set_value('judul', $row->judul),
		'konten' => set_value('konten', $row->konten),
	    );
            $this->load->view('content/content_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('c_id', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'konten' => $this->input->post('konten',TRUE),
	    );

            $this->Content_model->update($this->input->post('c_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('content'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $this->Content_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pagination'));

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('konten', 'konten', 'trim|required');

	$this->form_validation->set_rules('c_id', 'c_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Content.php */
/* Location: ./application/controllers/Content.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-22 14:49:18 */
/* http://harviacode.com */
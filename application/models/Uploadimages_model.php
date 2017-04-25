<?php
class Uploadimages_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function upload_image($inputdata,$filename)
  {
    $this->db->insert('content', $inputdata); 
    $insert_id = $this->db->insert_id();

    if($filename!='' ){
    $filename1 = explode(',',$filename);
    foreach($filename1 as $file){
    $file_data = array(
    'image' => $file,
    'c_id' => $insert_id
    );
    $this->db->insert('photos', $file_data);
    }
    }
  }

  public function view_data(){
        $query=$this->db->query("SELECT
  content.*,photos.*
FROM
  content LEFT JOIN photos on `content`.c_id=photos.c_id
ORDER BY
  `content`.c_id DESC");
        return $query->result_array();
    }


    public function edit_data($id){
        $query=$this->db->query("SELECT ud.*
                                 FROM content ud 
                                 WHERE ud.c_id = $id");
        return $query->result_array();
    }

    public function read_data($id){
        $query=$this->db->query("SELECT ud.*
                                 FROM content ud 
                                 WHERE ud.c_id = $id");
        return $query->result_array();
    }
    

    public function edit_data_image($id){
        $query=$this->db->query("SELECT photo.*
                                 FROM content ud 
                                 RIGHT JOIN photos as photo
                 ON ud.c_id = photo.c_id 
                                 WHERE ud.c_id = $id");
        return $query->result_array();
    }

    public function edit_upload_image($c_id,$inputdata,$filename ='')
  {

    $data = array('judul'                   => $inputdata['judul'],
                      'konten'                  => $inputdata['konten']);
      $this->db->where('c_id', $c_id);
      $this->db->update('content', $data);

    if($filename!='' ){
    $filename1 = explode(',',$filename);
    foreach($filename1 as $file){
    $file_data = array(
    'image' => $file,
    'c_id' => $c_id
    );
    $this->db->insert('photos', $file_data);
    }
    }
  }

}
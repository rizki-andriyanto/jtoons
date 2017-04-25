<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagedata_model extends CI_Model {
	function list_data(){
		
		$list = $this->db->get('photos');
		return $list 	;
	}
	// function list_data2(){
	// 	$list2 = $this->db->get('content');
		
	// 	return $list2 	;
	// }

	

}

/* End of file Imagedata_model.php */
/* Location: ./application/models/Imagedata_model.php */ 
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
      //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "select * from user where username = '" . $usr . "' and password = '" . md5($pwd) . "' and status = 'active'";
          $query = $this->db->query($sql);
          return $query->num_rows();	
          
     }

	

}


// class user_model extends CI_Model
// {
//      function __construct()
//     {
//         parent::__construct();
//     }
     
//      function get_user($email, $pwd)
//      {
//           $this->db->where('email', $email);
//           $this->db->where('password', md5($pwd));
//         $query = $this->db->get('user');
//           return $query->result();
//      }


    //  // get user
    //  function get_user_by_id($id)
    //  {
    //       $this->db->where('id', $id);
    //     $query = $this->db->get('user');
    //       return $query->result();
    //  }
     
    //  // insert
    //  function insert_user($data)
    // {
    //       return $this->db->insert('user', $data);
    //  }
     
// }
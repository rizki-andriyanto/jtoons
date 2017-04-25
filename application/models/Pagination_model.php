<?php
class Pagination_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    //fetch books
    function get_books($limit, $start, $st = NULL)
    {
        if ($st == "Sketsa") $st = "";
        // $sql = "select * from content where judul like '%$st%' limit " . $start . ", " . $limit;

        $sql = "SELECT
	content.*, photos.*
FROM
	content
INNER JOIN photos ON content.c_id = photos.c_id
WHERE
	content.judul LIKE '%$st%'
LIMIT ".$start.",".$limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_books_count($st = NULL)
    {
        if ($st == "Sketsa") $st = "";
        $sql = "SELECT
	content.*, photos.*
FROM
	content
LEFT JOIN photos ON content.c_id = photos.c_id
WHERE
	content.judul LIKE '%$st%'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}

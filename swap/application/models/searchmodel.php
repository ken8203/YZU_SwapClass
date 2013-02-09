<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class SearchModel extends CI_Model {
    function __construct()  
    {  
        parent::__construct() ;  
    }
    function searchClass($search)
    {
        $this->db->from('classInfo') ;
        $this->db->like('className' , $search) ;
        $this->db->limit(20);
        $query = $this->db->get() ;
        
        return $query ;
    }
    function searchClassByID($search)
    {
        $query = $this->db->get_where('classInfo' , Array('classID' => $search)) ;
        
        return $query->row() ;
    }
}

/* End of file searchmodel.php */
/* Location: ./application/models/searchmodel.php */
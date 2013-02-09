<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class SwapModel extends CI_Model {
    function __construct()  
    {  
        parent::__construct() ;  
    }
    function swapInsert($class , $class2 , $userId)
    {
        $data = Array (
            'status' => 0 ,
            'classID1' => $class ,
            'classID2' => $class2 ,
            'user' => $userId
        ) ;
        $this->db->insert('swapinfo' , $data) ;
    }
    function swapList()
    {
        $this->db->from('swapinfo') ;
        $this->db->order_by('id' , 'desc') ;
        $query = $this->db->get() ;
        return $query->result() ;
    }
    function matchAll($class , $class2)
    {
        $data = Array (
            'classID1' => $class2 ,
            'classID2' => $class 
        ) ;
        
        $this->db->from('swapinfo') ;
        $this->db->where($data) ;
        $this->db->order_by('id' , 'desc') ;
        $query = $this->db->get() ;
        return $query->result() ;
    }
}

/* End of file swapmodel.php */
/* Location: ./application/models/swapmodel.php */
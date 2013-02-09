<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {
    function __construct()  
    {  
        parent::__construct() ;  
    }
    function checkRegister($userId , $checkStudent)
    {
        if (!$checkStudent)
        {
            $this->db->select('COUNT(*) AS users') ;
            $this->db->from('member') ;
            $this->db->where('user_id' , $userId) ;
            $query = $this->db->get() ;
            
            return $query->row()->users > 0 ;
        }
        else
        {
            $data = Array ('user_id' => $userId) ;
            $query = $this->db->get_where('member' , $data) ;
            
            return $query->row()->studentNumber ;
        }
    }   
    function Regist($name , $gender , $phone , $email , $user_id , $studentNumber)       
    {
        $this->db->insert('member' ,
                Array(
                    'name' => $name ,
                    'gender' => $gender ,
                    'phone' => $phone ,
                    'email' => $email ,
                    'user_id' => $user_id ,
                    'studentNumber' => $studentNumber
                )) ;
    }
    function numberUpdate($studentNumber , $userId)
    {
        $data = Array ('studentNumber' => $studentNumber) ;
        $userdata = Array ('user_id' => $userId) ;
        $this->db->update('member' , $data , $userdata) ;
    }
    function getUserID($userId)
    {
        $data = Array ('user_id' => $userId) ;
        $this->db->from('member') ;
        $this->db->where($data) ;
        $query = $this->db->get() ;
        
        return $query->row() ;
    }
}

/* End of file usermodel.php */
/* Location: ./application/models/usermodel.php */
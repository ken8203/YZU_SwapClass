<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {
    public function Main ()
    {
        // Facebook config
        parent::__construct() ;
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST ) ;
        $CI = & get_instance( );
        $CI->config->load("facebook",TRUE) ;
        $config = $CI->config->item('facebook') ;
        $this->load->library('Facebook', $config) ;
        // Facebook config
    }
    public function index()
    {
        $this->load->model('UserModel') ;
        $userId = $this->facebook->getUser() ;   // 0 if not login
        
        // list swapinfo
        $this->load->Model('SwapModel') ;
        $this->load->Model('SearchModel') ;
                    
        $data['result'] = $this->SwapModel->swapList() ;
        $count = count($data['result']) ;
        for ($i = 0 ; $i < $count ; $i++)
        {
            $class1 = $this->SearchModel->searchClassByID($data['result'][$i]->classID1) ;
            $class2 = $this->SearchModel->searchClassByID($data['result'][$i]->classID2) ;
            $status =  $data['result'][$i]->status ;
                        
            $data['result'][$i]->classID1 = $class1->classID . "　" . $class1->classTime . "　" . $class1->className ; 
            $data['result'][$i]->classID2 = $class2->classID . "　" . $class2->classTime . "　" . $class2->className ;
            $data['result'][$i]->status = ($status == '0' ? '待換' : ($status == '1' ? '已配' : '已換')) ;
            $data['result'][$i]->bgcolor = ($status == '0' ? '' : ($status == '1' ? 'success' : 'error')) ;
         }
        // list swapinfo
        if($userId == 0)
        {
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email')) ;
            $this->load->view('main_index', $data) ;
        } 
        else 
        {
            if ($this->UserModel->checkRegister($userId , false))
            {
                $number = $this->UserModel->checkRegister($userId , true) ;
                    
                if ($number == NULL)
                    $this->load->view('student_register') ;
                else 
                {
                    $_SESSION['userid'] = $userId ;
                    $data['alreadyRegist'] = true ;
                
                    $this->load->view('main_index' , $data) ;
                }    
                return false ;
            }
            
            $user = $this->facebook->api('/me') ;
            $this->UserModel->Regist($user['name'] , (array_key_exists('gender' , $user) ? $user['gender'] : NULL) , (array_key_exists('phone' , $user) ? $user['phone'] : NULL) , $user['email'] , $userId , NULL) ;
        }
    }
    public function register()
    {
        $userId = $this->facebook->getUser() ;
        $this->load->model('UserModel') ;
        $studentNumber = $this->input->post('studentNumber') ;
        $confirm = $this->input->post('confirm') ;
        
        if ($studentNumber != $confirm)
        {
            redirect(site_url('/')) ;
            return false ;
        }
        
        $number = $this->UserModel->checkRegister($userId , true) ;
        if ($number == NULL)
            $this->UserModel->numberUpdate($studentNumber , $userId) ;
        
        redirect(site_url('/')) ;
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
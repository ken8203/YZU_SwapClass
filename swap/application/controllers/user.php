<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {
    public function post()
    {
        if (isset($_SESSION['userid']) && $this->input->post('search') != '' && $this->input->post('search2') != '')
        {
            $this->load->model('SearchModel') ;
            $this->load->model('UserModel') ;
            $this->load->model('SwapModel') ;
            $userId = $this->UserModel->getUserID($_SESSION['userid']) ;
            $class = explode('  ' , $this->input->post('search')) ;
            $class2 = explode('  ' ,$this->input->post('search2')) ;
            
            if (count($this->SearchModel->searchClassByID($class[0])) > 0 && count($this->SearchModel->searchClassByID($class2[0])) > 0)
                $this->SwapModel->swapInsert($class[0] , $class2[0] , $_SESSION['userid']) ;
        }
        redirect(site_url('/')) ;
    }
    public function getSearch()
    {
        $search = $this->input->get('search') ;
        $this->load->model('SearchModel') ;
        $class = $this->SearchModel->searchClass($search) ;
       
        echo json_encode($class->result()) ;
    }
    public function panel()
    {
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
            $id = $data['result'][$i]->user ;
            
            if ($id != $_SESSION['userid'])
                unset($data['result'][$i]) ;
            else
            {     
                if ($this->SwapModel->matchAll($class1->classID , $class2->classID) != NULL)    // 100% match swapinfo get
                    $data['match100'] = $this->SwapModel->matchAll($class1->classID , $class2->classID) ;
                $data['result'][$i]->classID1 = $class1->classID . "　" . $class1->classTime . "　" . $class1->className ; 
                $data['result'][$i]->classID2 = $class2->classID . "　" . $class2->classTime . "　" . $class2->className ;
                $data['result'][$i]->status = ($status == '0' ? '待換' : ($status == '1' ? '已配' : '已換')) ;
                $data['result'][$i]->bgcolor = ($status == '0' ? '' : ($status == '1' ? 'success' : 'error')) ;
            }
         }
        // list swapinfo
        
        // match swapinfo string handle
        $count = count($data['match100']) ;
        for ($i = 0 ; $i < $count ; $i++)
        {
            $class1 = $this->SearchModel->searchClassByID($data['match100'][$i]->classID1) ;
            $class2 = $this->SearchModel->searchClassByID($data['match100'][$i]->classID2) ;
            $data['match100'][$i]->classID1 = $class1->classID . "　" . $class1->classTime . "　" . $class1->className ; 
            $data['match100'][$i]->classID2 = $class2->classID . "　" . $class2->classTime . "　" . $class2->className ;
        }
        // match swapinfo string handle 
        
        if (isset($_SESSION['userid']))
            $this->load->view('user_panel.php' , $data);
        else
            redirect(site_url('/')) ;
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
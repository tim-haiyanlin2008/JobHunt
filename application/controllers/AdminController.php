<?php
require_once "BaseController.php";
require_once APPLICATION_PATH."./models/item.php";
class  AdminController extends  BaseController{
    
    

    public function indexAction()
    {
        
    }
    
    public function additemuiAction()
    {
        
    }
    public function additemAction()
    {
        $name=$this->getRequest()->getParam("name");
        $description=$this->getRequest()->getParam("description");
        $vote_count=$this->getRequest()->getParam("vote_count");
        
        $data=array (
            'name'=>$name,
            'description'=>$description,
            'vote_count'=>$vote_count
            
        );
        
        $itemModel=new item();
        $myId=$itemModel->insert($data);
        echo "myid is ".$myId; 
        $this->render("ok");
        //exit();
    }
    
}
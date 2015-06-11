<?php
require_once APPLICATION_PATH."./models/item.php";
require_once "BaseController.php";
class IndexController extends BaseController
{

   
    public function indexAction()
    {
        // action body
        $itemModel=new item();
       $itemModel=$itemModel->fetchall()->toArray();
       // print_r($itemModel);
       $this->view->itemModel=$itemModel;
    }
    public function mytestAction()
    {
        
    }


}


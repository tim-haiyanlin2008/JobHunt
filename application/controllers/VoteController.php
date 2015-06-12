<?php
require_once "BaseController.php";
require_once APPLICATION_PATH."./models/item.php";
require_once APPLICATION_PATH."./models/voteLog.php";
class VoteController extends  BaseController{
    
 public function voteAction()
    {
       // echo "my vote";
       $item_id=$this->getRequest()->getParam("itemId");
       $ip=$this->getRequest()->getServer("REMOTE_ADDR");
       //echo $item."ip address is  ".$ip;
       $today=date("Ymd");
     
       $voteLogModel=new voteLog();
       $where="ip='$ip' and vote_date='$today'";
       $res=$voteLogModel->fetchAll($where)->toArray();
       //echo count($res)."    ppp";
       
       if(count($res)>0){
           //echo "you have ready vote!!!!";
           $this->render("error");
           return ;
       }else {
           $data=array (
               'ip'=>$ip,
               'vote_date'=>$today,
               'item_id'=>$item_id
           
              );
           if($voteLogModel->insert($data)>0){
               
                $itemModel=new item();
                $currentItem=$itemModel->find($item_id)->toArray();
                $newVote=$currentItem[0]['vote_count']+1;
                $set=array(
                    vote_count=>$newVote
                    
                );
                $myWhere="id=$item_id";
                $itemModel->update($set, $myWhere);
               // var_dump($currentItem);
                //exit();
                
                }
                
       }
           
        $this->render("vote");
        
    }
    
    
    
    
}
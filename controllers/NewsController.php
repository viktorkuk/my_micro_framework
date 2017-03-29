<?php

class NewsController extends BaseController {
    
    public function entryAction($args){
        $entryId = $args[0];
        $entryObj = new NewsModel($entryId);
        $entry = $entryObj->getData();
        //echo '<pre>';        var_dump($entry); die();
        
        $this->view->render('entry', array('entry' => $entry));
    }
    
}

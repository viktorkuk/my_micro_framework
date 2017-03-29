<?php

class IndexController extends BaseController{
    
    public function indexAction($arg){
        $allNews = NewsModel::getAllNews();
        $this->view->render('index', array('news' => $allNews));
    }    

    
}


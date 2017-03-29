<?php

class AdminController extends BaseController {
    
    public function indexAction($args){
        if(!$this->isAdmin()) header("Location: /admin/login/");
        
        $allNews = NewsModel::getAllNews();
        $this->view->render('admin', array('news' => $allNews));
    }
    
    public function getnewsAction($args){
        if(!$this->isAdmin()) die('You are not admin)');
        
        $allNews = NewsModel::getAllNews();
        header('Content-Type: application/json');
        echo json_encode($allNews);
    }
    
    public function getentryAction($args){
        if(!$this->isAdmin()) die('You are not admin)');
        
        $entryId = $args[0];
        $entryObj = new NewsModel($entryId);
        $entry = $entryObj->getData();
        
        header('Content-Type: application/json');
        echo json_encode($entry);
    }
    
    public function removeentryAction($args){
        if(!$this->isAdmin()) die('You are not admin)');
        $entryId = $args[0];
        $entryObj = new NewsModel($entryId);
        $entryObj->delete();
    }
    
    public function manageentryAction($args){
        if(!$this->isAdmin()) die('You are not admin)');
        
        if(!empty($_POST['id'])){
            $entryObj = new NewsModel($_POST['id']);
        }else{
            $entryObj = new NewsModel();
        }
        $entryObj->setTitle($_POST['title']);
        $entryObj->setText($_POST['text']);
        $entryObj->save();
        
        header('Content-Type: application/json');
        echo json_encode(array('result' => 'ok'));
    }
    
    
    
    public function logoutAction(){
        unset($_SESSION['is_admin']);
        header("Location: /");
    }
    
    public function loginAction($args){
        $errors = array();
        if(isset($_POST['login']) && isset($_POST['password'])){
            if(empty($_POST['login'])) $errors[] = 'please provide login';
            if(empty($_POST['password'])) $errors[] = 'please provide password';
            
            if(empty($errors)){
                if(md5($_POST['login'].$_POST['password']) == SECURE_STRING){
                        $_SESSION['is_admin'] = SECURE_STRING;
                        header("Location: /admin/");
                }else{
                    $errors[] = 'wrong login or password';
                }
            }
            
        }
        
        $this->view->render('login', array('errors' => $errors));
    }
    
    private function isAdmin(){
        return (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == SECURE_STRING);
    }
    
}

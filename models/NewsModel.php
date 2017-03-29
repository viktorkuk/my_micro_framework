<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsModel
 *
 * @author victor
 */
class NewsModel extends BaseModel {
    
    const DB_TABLE = 'news';

    public function __construct($id = false) {
        parent::__construct(self::DB_TABLE, $id);
    }
    
    public static function getAllNews(){
        return parent::getAllItems(self::DB_TABLE);
    }
    
    public function getTitle(){
        return $this->data['title'];
    }
    
    public function setTitle($title){
        $this->data['title'] = $title;
    }
    
    public function getText(){
        return $this->data['text'];
    }
    
    public function setText($text){
        $this->data['text'] = $text;
    }
    
    public function save() {
        unset($this->data['date']);
        parent::save();
    }
    
    
}

<?php

class BaseModel{

    private $db = null;
    protected $dbTable;
    protected $id;
    public $data;

    public function __construct($dbTable, $id = false){
        $this->dbTable = $dbTable;
        $this->id = $id;
        $this->db = DB::getInstanse();
        
        if(!$id){
            $this->data = $this->db->fecthKeys($this->dbTable);
        }else{
            $this->data = $this->db->fetchRow($this->dbTable,$this->id);
        }
        
        if(!$this->data){
            throw new Exception('No such record');
        }
    }

    public function save(){
        if($this->id){
            return $this->db->updeteRow($this->dbTable, $this->data, $this->id);
        }else{
            return $this->id = $this->db->insertRow($this->dbTable, $this->data);
        }
    }
    
    public function delete(){
        $this->db->delete($this->dbTable, $this->id);
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getData(){
        return $this->data;
    } 
    
    public function setData($data){
        $dataDiff = array_diff_key($this->data,$data);
        if(!empty($dataDiff)){
            throw new Exception('wrong data for save!');
        }
        
        $this->data = $data;
        
        return $this->id;
    }
    
    public static function getAllItems($dbTable){
        $db = DB::getInstanse();
        return $db->fetchAll($dbTable);
    }
    
    
  
}
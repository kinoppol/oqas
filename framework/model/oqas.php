<?php

class oqas{
    private $db;
    function __construct($db_ref){
        $this->db=$db_ref;
    }
    function get_project($data=array()){
       
        $sql='select * from project';
        if(count($data)){
          $sql.=' where '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            $data=$result->fetch_assoc();
            return $data;
        
    }
    function get_indicator($data=array()){
       
        $sql='select * from indicator';
        if(count($data)){
          $sql.=' where '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);

            $data=$result->fetch_assoc();
            return $data;
        
    }
    function get_root_indicators($project_id){
        $sql='select * from indicator';
          $sql.=' where project_id="'.$project_id.'" and parent_id="0"';
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($data=$result->fetch_assoc()){
                $res[]=$data;
            }
            return $res;

    }
    function get_child_indicators($parent_id){
        $sql='select * from indicator';
          $sql.=' where parent_id="'.$parent_id.'"';
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($data=$result->fetch_assoc()){
                $res[]=$data;
            }
            return $res;

    }
}
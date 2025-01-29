<?php

class oqas_model{
    private $db;
    function __construct($db_ref){
        $this->db=$db_ref;
    }
    function get_projects($data=array()){
       
        $sql='select * from project';
        if(count($data)){
          $sql.=' where '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($data=$result->fetch_assoc()){
              $res[]=$data;
            }
            return $res;
        
    }


    function insert_project($data=array()){
        $sql='insert into project set '.arr2set($data);
        $result=$this->db->query($sql);
        return $this->db->insert_id;
    }
    function update_project($data=array(),$where=array()){
      $sql='update project set '.arr2set($data).' where '.arr2and($where);
      $result=$this->db->query($sql);
      return $result;
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database(); //载入数据库类
    }
    
    public function getColumnName($table_name){
        $field_data = $this->db->field_data($table_name);
        return $field_data;
    }

    public function getData($table_name, $where_data, $page = FALSE, $limit = FALSE){
        $flag_list_all = FALSE;
        if(!is_array($where_data)){
            list($index, $id) = explode(':', $where_data);
            $where_data = array($index => $id);
            if($id==-1){
                $flag_list_all = TRUE;
            }
        }
        if(is_array($table_name)){
            $all_data = array();
            foreach($table_name as $key => $value){
                foreach ($where_data as $column => $keyword) {
                    $this->db->where($column, $keyword);
                }
                if(intval($page) == -1){
                    $this->db->limit(1);
                }
                $result = $this->db->get($key)->result_array();
                array_push($all_data, $result);
            }
            return $all_data;
        }else{
            if(!empty($where_data) && !$flag_list_all){
                foreach ($where_data as $column => $keyword) {
                    $this->db->like($column, $keyword);
                }
            }
            if(intval($page) != -1){
                $page = $page==FALSE ? 1 : $page;
                $limit = $limit==FALSE ? 8 : $limit;
                $this->db->limit($limit, $limit*($page-1));
            }
        	$result = $this->db->get($table_name);
        	return $result;
        }
    }

    public function getCount($table_name, $query_arr = array()){
        if(count($query_arr)!=0){
            foreach ($query_arr as $key => $value) {
                $this->db->like($key, $value);
            }
        }
        $this->db->from($table_name);
        $count = $this->db->count_all_results();
        return $count;
    }

    public function setData($table_name, $arr){
    	if( empty($arr['eid']) && empty($arr['pid']) && empty($arr['uid']) ){
    		$this->db->insert($table_name, $arr);
            $id = $this->db->insert_id();
            return $id;
    	}else{
            $this->db->where(key($arr), array_shift($arr));
            $this->db->update($table_name, $arr);
            $affected_rows = $this->db->affected_rows();
            return $affected_rows;
    	}
    }

    public function delData($table_name, $id){
        if(is_array($id)){
            $this->db->where_in('id',$id);
        }else{
            $this->db->where('eid', $id);
        }
        $this->db->delete($table_name);
    }
}
?>
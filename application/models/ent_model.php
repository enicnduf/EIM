<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Ent_Management
 * @author		Enicn_D
 * @since		Version 1.0
 **/
/*----------------------------------------------------------------------------------------*/
/**
 * getData()     获取数据的主要方法
 * setData()     更改、插入的主要方法
 * getDataAll()  获取某个具体eid相关的全部数据
 * 
 * 
 * getData($data_type, $page = 0, $limit = 8, $where_arr = array())
 * @param $data_type   要获取的数据类型，如basic、assets
 * @param $page        页码；为0时则查询全部数据；默认为0；
 * @param $limit       每页显示的条数；默认为8；
 * @param $where_arr   需要查询的内容（数组类型），键名为字段名，键值为查询值；默认为空数组
 * @return object(CI_DB_mysql_result)
 * 
 * setData($data_type, $set_arr)
 * @param $data_type   要设置的数据类型
 * @param $set_arr     需要设置的内容（数组类型），键名为字段名，键值为插入或更新值
 * @return bool(true)
 * 
 * getDataAll($eid)
 * @param $eid         要搜索的企业ID
 * @return array( object(CI_DB_mysql_result), object(CI_DB_mysql_result), ... )
 *  
 **/
class Ent_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database(); //载入数据库类
    }
    
    public function getData($data_type, $page = 0, $limit = 8, $where_arr = array()){
        $table_name = 'ent_'.$data_type;
        $this->db->from($table_name);
        if(!empty($where_arr)){
            foreach($where_arr as $key => $value){
                $this->db->where($key, $value);
            }
        }
        if($page!=0){
            $this->db->limit($limit, $limit*($page-1));
        }
        $data = $this->db->get();
        return $data;
    }
    
    public function setData($data_type, $set_arr){
        $eid = $set_arr['eid'];
        $table_name = 'ent_'.$data_type;
        $this->db->where('eid', $id);
        $this->db->update($table_name, $arr);
        return TRUE;
    }
    
    public function getDataAll($eid){
        $data_all = array();
        $tables = array('basic','production','expenses','manager',
                        'shareholder','related','debt','focus','assets');
        for($i=0;$i<count($tables);$i++){
            $table_name = 'ent_'.$tables[$i];
            $this->db->from($table_name);
            $this->db->where('eid',$eid);
            $data_all[$tables[$i]] = $this->db->get();
        }
        return $data_all;
    }
    
}

?>
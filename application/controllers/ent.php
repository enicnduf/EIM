<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ent extends MY_Controller {

    public function __construct(){
        parent::__construct();
        header("Content-Type: text/html; charset=utf-8");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        $segment = $this->uri->segment(1);
        if($segment === false){
            $this->_js('index');
        }
    }

    public function index(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'index';
            $view_data = array('main_data' => 'empty');
            $main_data = array();
            $tables_config = $this->tables_config;
            $tables_name_ent = $this->tables_name_ent;
            $tables_name_person = $this->tables_name_person;
            $flag_list_all = -1;
            $main_data[0] = $this->Common_model->getData('ent_basic', 'eid:'.$flag_list_all, 1, 4)->result_array();
            $main_data[1] = $this->Common_model->getData('person_basic', 'pid:'.$flag_list_all, 1, 4)->result_array();
            $header_data = $this->_setHeader($header_data, 0, 
                                                '企业信息管理系统', 
                                                '欢迎你，'.$user_data['name']);
            $view_data['tables_config'] = $tables_config;
            $view_data['tables_name_ent'] = $tables_name_ent;
            $view_data['tables_name_person'] = $tables_name_person;
            $view_data['main_data'] = $main_data;
            $this->_loadView($page_name, $view_data, $header_data);
        }else{
            $this->_goLogin();
        }
    }

    public function view_e(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'view_e';
            $tables_config = $this->tables_config;
            $tables_name_ent = $this->tables_name_ent;
            $view_data = array();
            $main_data = array();
            $action = $this->input->get('a');
            if($action=='search'){
                $column = $this->input->get('c');
                $keyword = $this->input->get('k');
                //$keyword = iconv('gbk', 'utf-8', $keyword);
                $keyword = urldecode($keyword);
                $where_data = array($column => $keyword);
                $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
                $limit = $this->input->get('limit', true) ? $this->input->get('limit', true) : 8;
                $search_options = $tables_config['search_options'];
                $main_data = $this->Common_model->getData('ent_basic', $where_data, $page, $limit)->result_array();
                $header_data = $this->_setHeader($header_data, 1, 
                                                '企业资料', 
                                                $search_options[1][$column] .'：'.$keyword);
                $view_data['total'] = ceil($this->Common_model->getCount('ent_basic') / $limit);
                $view_data['page'] = $page;
                $view_data['limit'] = $limit;
                $view_data['search_options'] = $search_options;
            }else{
                $eid = $this->input->get('id', true);
                if($eid){
                    $main_data = $this->Common_model->getData($tables_name_ent, 'eid:'.$eid);
                    $header_data = $this->_setHeader($header_data, 1, 
                                                    $main_data[0][0]['name'].' - 企业资料', 
                                                    $main_data[0][0]['name']);
                    $view_data['eid'] = $eid;
                }else{
                    $flag_list_all = -1;
                    $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
                    $limit = $this->input->get('limit', true) ? $this->input->get('limit', true) : 8;
                    $main_data = $this->Common_model->getData('ent_basic', 'eid:'.$flag_list_all, $page, $limit)->result_array();
                    $header_data = $this->_setHeader($header_data, 1, 
                                                    '企业资料', 
                                                    '企业资料');
                    $view_data['total'] = ceil($this->Common_model->getCount('ent_basic') / $limit);
                    $view_data['page'] = $page;
                    $view_data['limit'] = $limit;
                }
            }
            $view_data['tables_config'] = $tables_config;
            $view_data['tables_name_ent'] = $tables_name_ent;
            $view_data['main_data'] = $main_data;
            $this->_loadView($page_name, $view_data, $header_data);
        }else{
            $this->_goLogin();
        }
    }

    public function input_e(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'input_e';
            if ($this->_checkRole($user_data['role'], $page_name)) {
                $tables_config = $this->tables_config;
                $tables_name_ent = $this->tables_name_ent;
                $view_data = array('main_data' => 'empty');
                $main_data = array();
                $eid = $this->input->get('id', true);
                $main_data = $this->Common_model->getData($tables_name_ent, 'eid:'.$eid);
                if($eid){
                    $header_data = $this->_setHeader($header_data, 2, 
                                                   $main_data[0][0]['name'].' - 更改资料', 
                                                   $main_data[0][0]['name']);
                }else{
                    $header_data = $this->_setHeader($header_data, 2, 
                                                   '录入企业资料', 
                                                   '录入企业资料');
                }
                $view_data['tables_config'] = $tables_config;
                $view_data['tables_name_ent'] = $tables_name_ent;
                $view_data['eid'] = $eid;
                $view_data['main_data'] = $main_data;
                $this->_loadView($page_name, $view_data, $header_data);
            } else {
                $this->_js('alert', '您没有访问此页的权限。');
                $this->_js('back');
            }
        }else{
            $this->_goLogin();
        }
    }

    public function view_p(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'view_p';
            $tables_config = $this->tables_config;
            $tables_name_person = $this->tables_name_person;
            $view_data = array();
            $main_data = array();
            $action = $this->input->get('a');
            if($action=='search'){
                $column = $this->input->get('c');
                $keyword = $this->input->get('k');
                $keyword = iconv('gbk', 'utf-8', $keyword);
                $where_data = array($column => $keyword);
                $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
                $limit = $this->input->get('limit', true) ? $this->input->get('limit', true) : 8;
                $search_options = $tables_config['search_options'];
                $main_data = $this->Common_model->getData('person_basic', $where_data, $page, $limit)->result_array();
                $header_data = $this->_setHeader($header_data, 3, 
                                                '个人资料', 
                                                $search_options[3][$column] .'：'.$keyword);
                $view_data['total'] = ceil($this->Common_model->getCount('person_basic') / $limit);
                $view_data['page'] = $page;
                $view_data['limit'] = $limit;
                $view_data['search_options'] = $search_options;
            }else{
                $pid = $this->input->get('id', true);
                if($pid){
                    $main_data = $this->Common_model->getData($tables_name_person, 'pid:'.$pid);
                    $header_data = $this->_setHeader($header_data, 3, 
                                                    $main_data[0][0]['name'].' - 个人资料', 
                                                    $main_data[0][0]['name']);
                    $view_data['pid'] = $pid;
                }else{
                    $flag_list_all = -1;
                    $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
                    $limit = $this->input->get('limit', true) ? $this->input->get('limit', true) : 8;
                    $main_data = $this->Common_model->getData('person_basic', 'pid:'.$flag_list_all, $page, $limit)->result_array();
                    $header_data = $this->_setHeader($header_data, 3, 
                                                    '个人资料', 
                                                    '个人资料');
                    $view_data['total'] = ceil($this->Common_model->getCount('person_basic') / $limit);
                    $view_data['page'] = $page;
                    $view_data['limit'] = $limit;
                }
            }
            $view_data['tables_config'] = $tables_config;
            $view_data['tables_name_person'] = $tables_name_person;
            $view_data['main_data'] = $main_data;
            $this->_loadView($page_name, $view_data, $header_data);
        }else{
            $this->_goLogin();
        }
    }

    public function input_p(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'input_p';
            if ($this->_checkRole($user_data['role'], $page_name)) {
                $tables_config = $this->tables_config;
                $tables_name_person = $this->tables_name_person;
                $view_data = array('main_data' => 'empty');
                $main_data = array();
                $pid = $this->input->get('id', true);
                $main_data = $this->Common_model->getData($tables_name_person, 'pid:'.$pid);
                if($pid){
                    $header_data = $this->_setHeader($header_data, 4, 
                                                   $main_data[0][0]['name'].' - 更改资料', 
                                                   $main_data[0][0]['name']);
                }else{
                    $header_data = $this->_setHeader($header_data, 4, 
                                                   '录入个人资料', 
                                                   '录入个人资料');
                }
                $view_data['tables_config'] = $tables_config;
                $view_data['tables_name_person'] = $tables_name_person;
                $view_data['pid'] = $pid;
                $view_data['main_data'] = $main_data;
                $this->_loadView($page_name, $view_data, $header_data);
            } else {
                $this->_js('alert', '您没有访问此页的权限。');
                $this->_js('back');
            }
        }else{
            $this->_goLogin();
        }
    }

    public function users(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'users';
            if ($this->_checkRole($user_data['role'], $page_name)) {
                $view_data = array('main_data' => 'empty');
                $tables_config = $this->tables_config;
                $uid = $this->input->get('id', true);
                if($uid){
                    $table_name = array('sys_users' => '用户表');
                    $main_data = $this->Common_model->getData($table_name, 'uid:'.$uid);
                    $header_data = $this->_setHeader($header_data, 5, 
                                                    $main_data[0][0]['name'].' - 用户管理', 
                                                    $main_data[0][0]['name']);
                    $view_data['uid'] = $uid;
                }else{
                    $flag_list_all = -1;
                    $page = $this->input->get('page', true) ? $this->input->get('page', true) : 1;
                    $limit = $this->input->get('limit', true) ? $this->input->get('limit', true) : 8;
                    $main_data = $this->Common_model->getData('sys_users', 'uid:'.$flag_list_all, $page, $limit)->result_array();
                    $header_data = $this->_setHeader($header_data, 5, 
                                                    '用户管理', 
                                                    '用户管理');
                    $view_data['total'] = ceil($this->Common_model->getCount('sys_users') / $limit);
                    $view_data['page'] = $page;
                    $view_data['limit'] = $limit;
                }
                $view_data['tables_config'] = $tables_config;
                $view_data['main_data'] = $main_data;
                $this->_loadView($page_name, $view_data, $header_data);
            } else {
                $this->_js('alert', '您没有访问此页的权限。');
                $this->_js('back');
            }
        }else{
            $this->_goLogin();
        }
    }

    public function password(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'password';
            $view_data = array('main_data' => 'empty');
            $header_data = $this->_setHeader($header_data, 5, 
                                                   '修改密码', 
                                                   '修改密码');
            $this->_loadView($page_name, $view_data, $header_data);
        }else{
            $this->_goLogin();
        }
    }

    public function profile(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $page_name = 'profile';
            $view_data = array('main_data' => 'empty');
            $table_name = array('sys_users' => '用户表');
            $main_data = $this->Common_model->getData($table_name, 'uid:'.$user_data['uid'], -1);
            $view_data['main_data'] = $main_data[0][0];
            $header_data = $this->_setHeader($header_data, 5, 
                                                   '修改资料', 
                                                   '修改资料');
            $this->_loadView($page_name, $view_data, $header_data);
        }else{
            $this->_goLogin();
        }
    }

    public function inputSave(){
        $tables_config = $this->tables_config;
        $save_arr = array();
        $table_name = $this->input->post('table_name', true);
        if($table_name){
            $index = $this->input->post('index',true);
            $id = $this->input->post('id', true);
            $new = $this->input->post('new', true);
            if($id){
                $save_arr[$index] = $id;
            }
            $table_column = $tables_config[$table_name.'_column'];
            foreach ($table_column as $c_name => $c_dscrptn) {
                $save_arr[$c_name] = $this->input->post($c_name, true);
            }
            $save_result = $this->Common_model->setData($table_name, $save_arr, $new);
            echo $save_result;
        }else{
            $this->_js('alert', '访问错误。#1');
            $this->_js('back');
        }
    }

    public function delete(){
        $action = $this->input->get('a', true);
        $table_name = $this->input->post('table_name', true);
        $id = $this->input->post('id', true);
        if($table_name){
            if($action=='item'){
                $this->Common_model->delData($table_name, explode(',', $id));
            }else{
                $this->Common_model->delData($table_name, $id);
            }
            return true;
        }else{
            return FALSE;
        }
    }

    public function ajax(){
        $action = $this->input->post('action', true);
        $id = $this->input->post('id', true);
        $ajax_data = array('action'=>$action,'id'=>$id);
        $single_view = true;
        $this->_loadView($ajax_data, $single_view);
    }
}
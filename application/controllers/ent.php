<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ent extends MY_Controller {

    public function __construct(){
        parent::__construct();
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
                $keyword = iconv('gbk', 'utf-8', $keyword);
                $where_data = array($column => $keyword);
                $page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;
                $limit = $this->input->get('limit', TRUE) ? $this->input->get('limit', TRUE) : 8;
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
                $eid = $this->input->get('id', TRUE);
                if($eid){
                    $main_data = $this->Common_model->getData($tables_name_ent, 'eid:'.$eid);
                    $header_data = $this->_setHeader($header_data, 1, 
                                                    $main_data[0][0]['name'].' - 企业资料', 
                                                    $main_data[0][0]['name']);
                    $view_data['eid'] = $eid;
                }else{
                    $flag_list_all = -1;
                    $page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;
                    $limit = $this->input->get('limit', TRUE) ? $this->input->get('limit', TRUE) : 8;
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
            $tables_config = $this->tables_config;
            $tables_name_ent = $this->tables_name_ent;
            $view_data = array('main_data' => 'empty');
            $main_data = array();
            $eid = $this->input->get('id', TRUE);
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
                $page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;
                $limit = $this->input->get('limit', TRUE) ? $this->input->get('limit', TRUE) : 8;
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
                $pid = $this->input->get('id', TRUE);
                if($pid){
                    $main_data = $this->Common_model->getData($tables_name_person, 'pid:'.$pid);
                    $header_data = $this->_setHeader($header_data, 3, 
                                                    $main_data[0][0]['name'].' - 个人资料', 
                                                    $main_data[0][0]['name']);
                    $view_data['pid'] = $pid;
                }else{
                    $flag_list_all = -1;
                    $page = $this->input->get('page', TRUE) ? $this->input->get('page', TRUE) : 1;
                    $limit = $this->input->get('limit', TRUE) ? $this->input->get('limit', TRUE) : 8;
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
            $tables_config = $this->tables_config;
            $tables_name_person = $this->tables_name_person;
            $view_data = array('main_data' => 'empty');
            $main_data = array();
            $pid = $this->input->get('id', TRUE);
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
        $table_name = $this->input->post('table_name', TRUE);
        if($table_name){
            $index = $this->input->post('index',TRUE);
            $id = $this->input->post('id', TRUE);
            if($id){
                $save_arr[$index] = $id;
            }
            $table_column = $tables_config[$table_name.'_column'];
            foreach ($table_column as $c_name => $c_dscrptn) {
                $save_arr[$c_name] = $this->input->post($c_name, TRUE);
            }
            $save_result = $this->Common_model->setData($table_name, $save_arr);
            echo $save_result;
        }else{
            $this->_js('alert', '访问错误。#1');
            $this->_js('back');
        }
    }

    public function delete(){
        $action = $this->input->get('a', TRUE);
        $table_name = $this->input->post('table_name', TRUE);
        $id = $this->input->post('id', TRUE);
        if($table_name){
            if($action=='item'){
                $this->Common_model->delData($table_name, explode(',', $id));
            }else{
                $this->Common_model->delData($table_name, $id);
            }
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function ajax(){
        $action = $this->input->post('action', TRUE);
        $id = $this->input->post('id', TRUE);
        $ajax_data = array('action'=>$action,'id'=>$id);
        $single_view = TRUE;
        $this->_loadView($ajax_data, $single_view);
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library('Auth');
    }

    public function index(){
    	$string = $this->input->get('s', TRUE);
        $estring = $this->auth->authcode($string,'ENCODE');
        echo $estring.'</br>';
    }

    public function search(){
    	$column = $this->input->post('column', TRUE);
    	$keyword = $this->input->post('keyword', TRUE);
    	$keyword = rawurlencode($keyword);
    	echo '?a=search&c='.$column.'&k='.$keyword;
    }

    public function login(){
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $user_data = $this->Common_model->getData(array('sys_users' => '用户表'), array('username'=>$username), -1);
        if($password == $this->auth->authcode($user_data[0][0]['password'])){
        	unset($user_data[0][0]['password']);
        	$cookie = $this->auth->authcode(json_encode($user_data[0][0]), 'ENCODE');
        	$this->auth->generateCookie('eim_user', $cookie, 1800);
        	echo 'PASS';
        }else{
        	echo 'WRONG';
        }
    }

    public function profile(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $name = $this->input->post('name', TRUE);
            $dept = $this->input->post('dept', TRUE);
            $save_arr = array('uid' => $user_data['uid'], 'name' => $name, 'dept' => $dept);
            $this->Common_model->setData('sys_users', $save_arr);
            $user_data = $this->Common_model->getData(array('sys_users' => '用户表'), 'uid:'.$user_data['uid'], -1);
            unset($user_data[0][0]['password']);
            $cookie = $this->auth->authcode(json_encode($user_data[0][0]), 'ENCODE');
            $this->auth->generateCookie('eim_user', $cookie, 1800);
            echo 'SUCCEED';
        }else{
            echo 'FAIL';
        }
    }

    public function password(){
        $user_data = $this->auth->is_logged_in();
        if($user_data){
            $oldpassword = $this->input->post('oldpassword', TRUE);
            $newpassword = $this->input->post('newpassword', TRUE);
            $newpassword2 = $this->input->post('newpassword2', TRUE);
            $user_data = $this->Common_model->getData(array('sys_users' => '用户表'), 'uid:'.$user_data['uid'], -1);
            if($oldpassword == $this->auth->authcode($user_data[0][0]['password'])){
                if($newpassword == $newpassword2){
                    $save_arr = array('uid' => $user_data[0][0]['uid'], 'password' => $this->auth->authcode($newpassword, 'ENCODE'));
                    $this->Common_model->setData('sys_users', $save_arr);
                    echo 'SUCCEED';
                }else{
                    echo '新密码输入不一致';
                }
            }else{
                echo '原密码错误';
            }
        }else{
            echo 'FAIL';
        }
    }

    public function logout(){
    	$this->auth->logout();
    	header('Location: /www/eim/ent/index');
    }
}
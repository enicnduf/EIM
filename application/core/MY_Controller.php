<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
   	public $tables_config = array();
   	public $tables_name_ent = array();
   	public $tables_name_person = array();
   	public $tables_name_sys = array();

    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library('Auth');
        $this->load->config('tables_config',TRUE);
        $this->tables_config = $this->config->item('tables_config');
        $this->tables_name_ent = $this->tables_config['tables_name_ent'];
        $this->tables_name_person = $this->tables_config['tables_name_person'];
        $this->tables_name_sys = $this->tables_config['tables_name_sys'];
    }

    protected function _goLogin(){
        $view_data = array('main_data' => 'empty');
        $header_data = $this->_setHeader($header_data, 0, 
                                            '企业信息管理系统', 
                                            '首页');
        $this->_loadView('login', $view_data, $header_data, $single_view = TRUE);
    }

    protected function _checkRole($role, $role_type){
        switch ($role_type) {
            case 'view_e':
                $check_pos = 1;
                $check_value = 1;
                break;
            case 'input_e':
                $check_pos = 1;
                $check_value = 2;
                break;
            case 'view_p':
                $check_pos = 2;
                $check_value = 1;
                break;
            case 'input_p':
                $check_pos = 2;
                $check_value = 2;
                break;
            case 'users':
                $check_pos = 3;
                $check_value = 1;
            default:
                $check_pos = 0;
                $check_value = 1;
                break;
        }
        if (intval(substr($role, $check_pos, 1)) >= $check_value) {
            return true;
        } else {
            return false;
        }
    }

    protected function _loadView($page_name, $view_data, $header_data, $single_view = FALSE){
        if(empty($view_data['main_data'])){
            $this->_js('alert', '访问错误。此页无内容。');
            $this->_js('back');
        }else{
    		$this->load->helper(array('form','url'));
    		if($single_view){
                $this->load->view($page_name, $view_data);
    		}else{
                $this->load->view('_header',$header_data);
        		$this->load->view($page_name, $view_data);
        		$this->load->view('_footer');
            }
        }
    }

    protected function _setHeader($header_data, $current, $title, $header_title){
        $header_data['current'] = $current;
        $header_data['title'] = $title;
        $header_data['header_title'] = $header_title;
        $header_data['user_data'] = $this->auth->is_logged_in();
        return $header_data;
    }

    protected function _redirect($url, $statusCode = 303){
       header('Location: ' . $url, TRUE, $statusCode);
       die();
    }

    protected function _js($action, $string = ''){
        switch($action){
            case 'alert': $this->_js('js','alert("'.$string.'")'); break;
            case 'back':  $this->_js('js','window.history.go(-1);location.reload;'); break;
            case 'index': $this->_js('js','window.location.href="'.base_url().'ent/"'); break;
            case 'jump': $this->_js('js','window.location.href="'.$string.'"'); break;
            default: echo '<script lang="javascript">'.$string.'</script>'; break;
        }
    }

    protected function _numberCharacter($number){
        $character = $this->tables_config['number'];
        if ($number > 10){
            $single = $number % 10;
            $ten = floor($number / 10);
            return $character[$ten] + '十' + $character[$single];
        } else {
            return $character[$number];
        }
    }
}
?>
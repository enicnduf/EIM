<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
   	public $tables_config = array();
   	public $tables_name_ent = array();
   	public $tables_name_person = array();
   	public $tables_name_sys = array();

    public function __construct(){
        parent::__construct();
        header("Content-Type: text/html; charset=utf-8");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
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
            case 'index': $this->_js('js','window.location.href='.$this->config->item('base_url')); break;
            case 'jump': $this->_js('js','window.location.href='.$string); break;
            default: echo '<script lang="javascript">'.$string.'</script>'; break;
        }
    }
}
?>
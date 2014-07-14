<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
/**
Output class
*/
class docx extends MY_Controller
{
	
	public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

	function index()
	{
		$user_data = $this->auth->is_logged_in();
        if($user_data){
			$this->_cleanTempFile();
			$tables_config = $this->tables_config;
			$index = $this->input->post('index');
			$id = $this->input->post('id');
			$tables_type = $tables_config['index_to_type'][$index];
			$tables_array = $tables_config[$tables_type];
			$tpl_prefix = $tables_config['tpl_prefix_'.$index];

			$phpword = new \PhpOffice\PhpWord\PhpWord();
			$document = $phpword->loadTemplate('templates/'.$index.'.docx');
			$document->setValue('year', date('Y'));
			$document->setValue('month', date('m'));
			$document->setValue('day', date('d'));
			$main_data = $this->Common_model->getData($tables_array, $index.':'.$id);
			foreach ($main_data as $sub_key => $sub_data) {
				list($prefix, $clone_name) = each($tpl_prefix);
				$row_count = count($sub_data);
				if ($row_count > 1) {
					$document->cloneRow($clone_name, $row_count);
				}
				if($clone_name == 'er_related' || $clone_name == 'pr_related'){
					if ($row_count > 1) {
						for ($j=1;$j<=$row_count;$j++){
							$row = '关联企业'.$this->_numberCharacter($j);
							$column = $clone_name.'#'.$j;
							$replacement[$column] = $row;
						}
					} else {
						$replacement[$clone_name] = '关联企业一';
					}
				}
				
				if (empty($sub_data)) {
					$table_column = $tables_config[key($tables_array).'_column'];
					foreach ($table_column as $column => $dscrptn) {
						$replacement[$prefix.$column] = '';
					}
				} else {
					$i = 1;
					foreach ($sub_data as $sequence => $table_data) {
						$row_count = count($sub_data);
						if ($row_count > 1) {
							foreach ($table_data as $column => $row) {
								$replacement[$prefix.$column.'#'.$i] = $row;
							}
							$i++;
						} else {
							foreach ($table_data as $column => $row) {
								$replacement[$prefix.$column] = $row;
							}
						}
					}
				}
				next($tables_array);
			}
			$this->_setValue($document, $replacement);
			$name_utf = $main_data[0][0]['name'].'.docx';
			$name_gbk = iconv('utf-8','gbk',$main_data[0][0]['name']).'.docx';
			$file_path_gbk = 'output/'.$name_gbk;
			$document->saveAs($file_path_gbk);
			$arr = array('file_path'=>$name_utf, 'time'=>time());
			$table_name = 'eim_docx';
			$this->db->insert($table_name, $arr);
			echo base_url().'output/'.urlencode($name_utf).'|'.$id;
		} else {
			$this->_goLogin();
		}
	}

	function _setValue($phpword, $replacement)
	{
		foreach ($replacement as $key => $value) {
			$phpword->setValue($key, $value);
		}
		return $phpword;
	}

 	function _forceDownload($file_path, $file_name){
        $file_name = iconv('utf-8','gbk',$file_name);
        header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header("Content-Disposition: attachment; filename=$file_name"); 
        readfile($file_path);
    }

    function _cleanTempFile(){
    	$table_name = 'eim_docx';
        $file_list = $this->db->get($table_name)->result_array();
        foreach($file_list as $file){
            $time = intval($file['time'])+120;
            if($time < time()){
            	$file_path = 'output/'.iconv('utf-8','gbk',$file['file_path']);
                unlink($file_path);
                $this->db->where('id', $file['id']);
                $this->db->delete($table_name);
            }
        }
    }
}

?>
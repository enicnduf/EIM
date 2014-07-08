<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['tables_name_all'] = array('basic'=>'企业基本信息','production'=>'企业生产/销售信息',
            'expenses'=>'企业支出信息','managers'=>'管理层信息','shareholders'=>'股东信息',
            'related'=>'关联企业信息','debt'=>'企业负债信息','focus'=>'特别关注','assets'=>'资产信息');

$config['basic_column'] = array('企业名称' => 'name', '营业执照号' => 'license',
            '企业类型' => 'type', '地址'=> 'address', '注册资本' => 'reg_capital',
            '成立时间' => 'establish_date', '营业期限' => 'business_time_limit',
            '行业分类' => 'industry', '企业性质' => 'kind', '主营产品' => 'major_business',
            '经营范围' => 'business_range', '组织机构代码证号' => 'org_num',
            '国税登记号' => 'national_tax_num', '地税登记号' => 'land_tax_num',
            '贷款卡号' => 'loan_num', '贷款卡年检情况' => 'loan_check',
            '特殊经营许可证号' => 'special_license_num', '企业所获其他证书' => 'award_certifications',
            '经营场所面积' => 'space', '经营场所来源' => 'space_source', 
            '企业规模（人数' => 'ppl_num', '固定生产设备 '=> 'equipment');

$config['production_column'] = array('时间' => 'date', '生产总值' => 'quantity', '销售额' => 'sales', 
			'利润' => 'profit', '存货' => 'stock', '应收' => 'receivable', '备注' => 'memo');

$config['expenses_column'] = array('水费' => 'water', '电费' => 'electric', '工资' => 'salary', 
			'租金' => 'rent', '纳税' => 'tax', '备注' => 'memo');

$config['managers_column'] = array('职位' => 'position', '姓名' => 'name', '出生年月' => 'birth', 
			'户籍' => 'native', '身份证号' => 'id_card', '婚姻状况' => 'marriage', '住址' => 'address',
			'联系方式' => 'contact', '配偶姓名' => 'mate_name', '配偶出生年月' => 'mate_birth', 
			'配偶户籍' => 'mate_native', '配偶身份证号' => 'mate_id_card', '配偶住址' => 'mate_address',
			'配偶联系方式' => 'mate_contact', '备注' => 'memo');

$config['shareholders_column'] = array('自然人|公司' => 'type', '姓名' => 'name', '持股' => 'shares', 
			'身份证号|注册证号' => 'info_1', '年龄|经营范围' => 'info_2', '备注' => 'memo');

$config['related_column'] = array('公司名称' => 'name', '关系' => 'relationship', '企业类型' => 'type', 
			'公司简介' => 'description');

$config['debt_column'] = array('负债类型' => 'type', '期限' => 'deadline', '金额' => 'amount', 
			'贷款方（担保方）' => 'lender', '余额' => 'balance', '备注' => 'memo');

$config['focus_column'] = array('类型' => 'type', '详细信息' => 'details');

$config['assets_column'] = array('资产类型' => 'type', '权属' => 'rights', '权属证号' => 'rights_num', 
			'位置' => 'location', '面积' => 'space', '状态' => 'status', '备注' => 'memo');

$config['list_column'] = array('企业编号'=>'eid', '企业名称' => 'name', '行业分类'=>'industry', '主营产品'=>'major_business');

$config['column_width'] = array('eid'=>1,'name'=>3,'indusry'=>2,'major_business'=>6);

/* End of file config.php */
/* Location: ./application/config/config.php */

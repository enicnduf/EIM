<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
Enterprise tables config
*/
$config['tables_name_ent'] = array('ent_basic'=>'企业基本信息','ent_production'=>'企业生产/销售信息',
            'ent_expenses'=>'企业支出信息','ent_managers'=>'管理层信息','ent_shareholders'=>'股东信息',
            'ent_related'=>'关联企业信息','ent_debt'=>'企业负债信息','ent_focus'=>'特别关注','ent_assets'=>'企业资产信息');

$config['ent_basic_column'] = array('name' => '企业名称', 'license' => '营业执照号',
            'type' => '企业类型', 'address' => '地址' , 'reg_capital' => '注册资本',
            'establish_date' => '成立时间', 'business_time_limit' => '营业期限',
            'industry' => '行业分类', 'kind' => '企业性质', 'major_business' => '主营产品',
            'business_range' => '经营范围', 'org_num' => '组织机构代码证号',
            'national_tax_num' => '国税登记号', 'land_tax_num' => '地税登记号',
            'loan_num' => '贷款卡号', 'loan_check' => '贷款卡年检情况',
            'special_license_num' => '特殊经营许可证号', 'award_certifications' => '企业所获其他证书',
            'space' => '经营场所面积', 'space_source' => '经营场所来源', 
            'ppl_num' => '企业规模（人数）', 'equipment' => '固定生产设备');

$config['ent_production_column'] = array('date' => '时间', 'quantity' => '生产总值', 'sales' => '销售额', 
			'profit' => '利润', 'stock' => '存货', 'receivable' => '应收', 'memo' => '备注');

$config['ent_expenses_column'] = array('date' => '时间', 'water' => '水费', 'electric' => '电费', 'salary' => '工资', 
			'rent' => '租金', 'tax' => '纳税', 'memo' => '备注');

$config['ent_managers_column'] = array('position' => '职位', 'name' => '姓名', 'birth' => '出生年月', 
			'native' => '户籍', 'id_card' => '身份证号', 'marriage' => '婚姻状况', 'address' => '住址',
			'contact' => '联系方式', 'mate_name' => '配偶姓名', 'mate_birth' => '配偶出生年月', 
			'mate_native' => '配偶户籍', 'mate_id_card' => '配偶身份证号', 'mate_address' => '配偶住址',
			'mate_contact' => '配偶联系方式', 'memo' => '备注');

$config['ent_shareholders_column'] = array('type' => '自然人|公司', 'name' => '姓名', 'shares' => '持股', 
                  'info_1' => '身份证号|注册证号', 'info_2' => '年龄|经营范围', 'memo' => '备注');

$config['ent_related_column'] = array('name' => '公司名称', 'relationship' => '关系', 'type' => '企业类型', 
			'description' => '公司简介');

$config['ent_debt_column'] = array('type' => '负债类型', 'deadline' => '期限', 'amount' => '金额', 
			'lender' => '贷款方（担保方）', 'balance' => '余额', 'memo' => '备注');

$config['ent_focus_column'] = array('type' => '类型', 'details' => '详细信息');

$config['ent_assets_column'] = array('type' => '资产类型', 'rights' => '权属', 'rights_num' => '权属证号', 
			'location' => '位置', 'space' => '面积', 'status' => '状态', 'memo' => '备注');

$config['list_column_ent'] = array('eid' => '企业编号', 'name' => '企业名称', 'industry' => '行业分类', 'major_business' => '主营产品');

/**
Person tables config
**/
$config['tables_name_person'] = array('person_basic'=>'个人基本信息', 'person_related'=>'关联企业信息',
            'person_debt'=>'个人负债信息','person_focus'=>'特别关注','person_assets'=>'个人资产信息');

$config['person_basic_column'] = array('name' => '姓名', 'position' => '职位', 'birth' => '出生年月', 
                  'native' => '户籍', 'id_card' => '身份证号', 'marriage' => '婚姻状况', 'address' => '住址',
                  'contact' => '联系方式', 'mate_name' => '配偶姓名', 'mate_birth' => '配偶出生年月', 
                  'mate_native' => '配偶户籍', 'mate_id_card' => '配偶身份证号', 'mate_address' => '配偶住址',
                  'mate_contact' => '配偶联系方式', 'memo' => '备注');

$config['person_related_column'] = array('name' => '公司名称', 'relationship' => '关系', 'type' => '企业类型', 
                  'description' => '公司简介');

$config['person_debt_column'] = array('type' => '负债类型', 'deadline' => '期限', 'amount' => '金额', 
                  'lender' => '贷款方（担保方）', 'balance' => '余额', 'memo' => '备注');

$config['person_focus_column'] = array('type' => '类型', 'details' => '详细信息');

$config['person_assets_column'] = array('type' => '资产类型', 'rights' => '权属', 'rights_num' => '权属证号', 
                  'location' => '位置', 'space' => '面积', 'status' => '状态', 'memo' => '备注');

$config['list_column_person'] = array('pid' => '个人编号', 'name' => '姓名', 'position' => '职位', 'id_card' => '身份证号');

$config['column_width'] = array('eid ' => 1,'name' => 3,'industry' => 2,'major_business' => 6,
                              'pid' => 1, 'position' => 2, 'id_card' => 6);
/**
Search options
**/
$config['search_options'] = array('1' => array('name' => '企业名称', 'type' => '企业类型', 'industry' => '企业分类', 'kind' => '企业性质'),
                                    '3' => array('name' => '个人姓名'));
/* End of file config.php */
/* Location: ./application/config/config.php */

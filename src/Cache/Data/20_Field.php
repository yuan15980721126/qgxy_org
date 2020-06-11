<?php
return array ( 'catid' => array ( 'id' => '281', 'moduleid' => '20', 'field' => 'catid', 'name' => '栏目', 'tips' => '', 'required' => '1', 'minlength' => '1', 'maxlength' => '6', 'pattern' => '', 'errormsg' => '必须选择一个栏目', 'class' => '', 'type' => 'catid', 'setup' => '', 'ispost' => '1', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '1', ), 'title' => array ( 'id' => '282', 'moduleid' => '20', 'field' => 'title', 'name' => '标题', 'tips' => '', 'required' => '1', 'minlength' => '1', 'maxlength' => '80', 'pattern' => '', 'errormsg' => '标题必须为1-80个字符', 'class' => '', 'type' => 'title', 'setup' => 'array (
  \'thumb\' => \'1\',
  \'style\' => \'1\',
  \'size\' => \'55\',
)', 'ispost' => '1', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '1', ), 'keywords' => array ( 'id' => '283', 'moduleid' => '20', 'field' => 'keywords', 'name' => '关键词', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '80', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'text', 'setup' => 'array (
  \'size\' => \'55\',
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)', 'ispost' => '1', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '1', ), 'description' => array ( 'id' => '284', 'moduleid' => '20', 'field' => 'description', 'name' => 'SEO简介', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'textarea', 'setup' => 'array (
  \'fieldtype\' => \'mediumtext\',
  \'rows\' => \'4\',
  \'cols\' => \'55\',
  \'default\' => \'\',
)', 'ispost' => '1', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '1', ), 'number' => array ( 'id' => '295', 'moduleid' => '20', 'field' => 'number', 'name' => '信用编码', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'text', 'setup' => 'array (
  \'size\' => \'50\',
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '0', ), 'grade' => array ( 'id' => '306', 'moduleid' => '20', 'field' => 'grade', 'name' => '信用分数', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => 'number', 'errormsg' => '', 'class' => '', 'type' => 'number', 'setup' => 'array (
  \\\'size\\\' => \\\'\\\',
  \\\'numbertype\\\' => \\\'1\\\',
  \\\'decimaldigits\\\' => \\\'1\\\',
  \\\'default\\\' => \\\'\\\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '0', ), 'code' => array ( 'id' => '297', 'moduleid' => '20', 'field' => 'code', 'name' => '证书编号', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'text', 'setup' => 'array (
  \'size\' => \'50\',
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '0', ), 'xinyongcode' => array ( 'id' => '313', 'moduleid' => '20', 'field' => 'xinyongcode', 'name' => '统一社会信用代码', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'text', 'setup' => 'array (
  \\\'size\\\' => \\\'50\\\',
  \\\'default\\\' => \\\'\\\',
  \\\'ispassword\\\' => \\\'0\\\',
  \\\'fieldtype\\\' => \\\'varchar\\\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '0', ), 'address' => array ( 'id' => '314', 'moduleid' => '20', 'field' => 'address', 'name' => '注册地点', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'text', 'setup' => 'array (
  \\\'size\\\' => \\\'50\\\',
  \\\'default\\\' => \\\'\\\',
  \\\'ispassword\\\' => \\\'0\\\',
  \\\'fieldtype\\\' => \\\'varchar\\\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '0', ), 'organize' => array ( 'id' => '315', 'moduleid' => '20', 'field' => 'organize', 'name' => '发证部门', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'text', 'setup' => 'array (
  \'size\' => \'50\',
  \'default\' => \'中企信办信用建设工作委员会\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '0', 'issystem' => '0', ), 'gettime' => array ( 'id' => '316', 'moduleid' => '20', 'field' => 'gettime', 'name' => '初次获证日期', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'datetime', 'setup' => '', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '0', 'status' => '1', 'issystem' => '0', ), 'realtime' => array ( 'id' => '298', 'moduleid' => '20', 'field' => 'realtime', 'name' => '颁发日期', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'datetime', 'setup' => '', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '1', 'status' => '1', 'issystem' => '0', ), 'effecttime' => array ( 'id' => '317', 'moduleid' => '20', 'field' => 'effecttime', 'name' => '有效期', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'datetime', 'setup' => '', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '1', 'status' => '1', 'issystem' => '0', ), 'createtime' => array ( 'id' => '286', 'moduleid' => '20', 'field' => 'createtime', 'name' => '评价时间', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'datetime', 'setup' => '', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '2', 'status' => '1', 'issystem' => '1', ), 'content' => array ( 'id' => '285', 'moduleid' => '20', 'field' => 'content', 'name' => '经营实体信息', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'editor', 'setup' => 'array (
  \'edittype\' => \'kindeditor\',
  \'toolbar\' => \'full\',
  \'default\' => \'\',
  \'height\' => \'\',
  \'show_add_description\' => \'0\',
  \'show_auto_thumb\' => \'0\',
  \'showpage\' => \'1\',
  \'enablekeylink\' => \'0\',
  \'replacenum\' => \'\',
  \'enablesaveimage\' => \'0\',
  \'flashupload\' => \'1\',
  \'alowuploadexts\' => \'\',
  \'alowuploadlimit\' => \'\',
)', 'ispost' => '1', 'unpostgroup' => '', 'listorder' => '10', 'status' => '0', 'issystem' => '1', ), 'message' => array ( 'id' => '294', 'moduleid' => '20', 'field' => 'message', 'name' => '信用认证信息', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '0', 'errormsg' => '', 'class' => '', 'type' => 'editor', 'setup' => 'array (
  \'edittype\' => \'kindeditor\',
  \'toolbar\' => \'full\',
  \'default\' => \'\',
  \'height\' => \'\',
  \'show_add_description\' => \'0\',
  \'show_auto_thumb\' => \'0\',
  \'showpage\' => \'0\',
  \'enablekeylink\' => \'0\',
  \'replacenum\' => \'\',
  \'enablesaveimage\' => \'0\',
  \'flashupload\' => \'0\',
  \'alowuploadexts\' => \'\',
  \'alowuploadlimit\' => \'\',
)', 'ispost' => '0', 'unpostgroup' => '', 'listorder' => '12', 'status' => '0', 'issystem' => '0', ), 'recommend' => array ( 'id' => '287', 'moduleid' => '20', 'field' => 'recommend', 'name' => '允许评论', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '1', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'radio', 'setup' => 'array (
  \'options\' => \'允许评论|1
不允许评论|0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'labelwidth\' => \'\',
  \'default\' => \'\',
)', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '93', 'status' => '0', 'issystem' => '0', ), 'readpoint' => array ( 'id' => '288', 'moduleid' => '20', 'field' => 'readpoint', 'name' => '阅读收费', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '5', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'number', 'setup' => 'array (
  \'size\' => \'5\',
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'0\',
  \'default\' => \'0\',
)', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '93', 'status' => '0', 'issystem' => '0', ), 'hits' => array ( 'id' => '289', 'moduleid' => '20', 'field' => 'hits', 'name' => '点击次数', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '8', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'number', 'setup' => 'array (
  \'size\' => \'10\',
  \'numbertype\' => \'1\',
  \'decimaldigits\' => \'0\',
  \'default\' => \'0\',
)', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '93', 'status' => '0', 'issystem' => '0', ), 'readgroup' => array ( 'id' => '290', 'moduleid' => '20', 'field' => 'readgroup', 'name' => '访问权限', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'groupid', 'setup' => 'array (
  \'inputtype\' => \'checkbox\',
  \'fieldtype\' => \'tinyint\',
  \'labelwidth\' => \'85\',
  \'default\' => \'\',
)', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '96', 'status' => '0', 'issystem' => '1', ), 'posid' => array ( 'id' => '291', 'moduleid' => '20', 'field' => 'posid', 'name' => '推荐位', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'posid', 'setup' => '', 'ispost' => '1', 'unpostgroup' => '', 'listorder' => '97', 'status' => '1', 'issystem' => '1', ), 'template' => array ( 'id' => '292', 'moduleid' => '20', 'field' => 'template', 'name' => '模板', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'template', 'setup' => '', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '98', 'status' => '1', 'issystem' => '1', ), 'status' => array ( 'id' => '293', 'moduleid' => '20', 'field' => 'status', 'name' => '状态', 'tips' => '', 'required' => '0', 'minlength' => '0', 'maxlength' => '0', 'pattern' => '', 'errormsg' => '', 'class' => '', 'type' => 'radio', 'setup' => 'array (
  \'options\' => \'发布|1
定时发布|0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'labelwidth\' => \'75\',
  \'default\' => \'1\',
)', 'ispost' => '1', 'unpostgroup' => '3,4', 'listorder' => '99', 'status' => '1', 'issystem' => '1', ), ); ?>
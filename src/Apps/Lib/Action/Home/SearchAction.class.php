<?php

/**

 *

 * SearchAction.class.php (前台搜索功能)

 *

 * @package      	YOURPHP

 * @author          liuxun QQ:147613338 <admin@yourphp.cn>

 * @copyright     	Copyright (c) 2008-2011  (http://www.yourphp.cn)

 * @license         http://www.yourphp.cn/license.txt

 * @version        	YourPHP企业网站管理系统 v2.1 2011-03-01 yourphp.cn $

 */

if(!defined("Yourphp")) exit("Access Denied");

class SearchAction extends BaseAction

{



	function _initialize()

    {

		parent::_initialize();

    }



    public function index()

    {

		//搜索

		$_REQUEST['id'] = $catid =  intval($_REQUEST['id']);

		$p= max(intval($_REQUEST[C('VAR_PAGE')]),1);

		$_REQUEST['keyword'] = $keyword = get_safe_replace($_REQUEST['keyword']);

		$_REQUEST['module'] = $module =  get_safe_replace($_REQUEST['module']);

//		$_REQUEST['verifyCode'] = get_safe_replace($_REQUEST['verifyCode']);

		$module =  $module ? $module  : 'Article' ;

		$this->assign($_REQUEST);

		$this->assign('bcid',0);

		$where = " status=1 ";

//		if(md5($_REQUEST['verifyCode']) != $_SESSION['verify']){

//         $this->error(L('error_verify'));

//      }



		if(APP_LANG){

			$lang = LANG_NAME;

			$langid= LANG_ID;

			$where .=" and lang= $langid";

			$this->assign('lang',$lang);

			$this->assign('langid',$langid);

		}



		if($catid){

			$cat = $this->categorys[$catid];

			$bcid = explode(",",$cat['arrparentid']);

			$bcid = $bcid[1];

			if($bcid == '') $bcid=intval($catid);

			if(empty($module))$module=$cat['module'];

			unset($cat['id']);

			$this->assign($cat);

			$cat['id']=$catid;

			$this->assign('catid',$catid);

			$this->assign('bcid',$bcid);





			if($cat['child']){

				$where .= " and catid in(".$cat['arrchildid'].")";

			}else{

				$where .=  " and catid=".$catid;

			}

		}

		$seo_title = $cat['title'] ? $cat['title'] : $cat['catname'];

		$this->assign ('seo_title',$keyword.' '.$seo_title);

		$this->assign ('seo_keywords',$keyword.$cat['keywords']);

		$this->assign ('seo_description',$keyword.$cat['description']);





		if($keyword){

			//如果模型为number或code

			if($_REQUEST['module']=='number')

			{

				$module ='Credit';

				$dao = M('Certification');

				$where .= ' AND number like "%'.$keyword.'%" ';

//

			}

			elseif($_REQUEST['module']=='code') {

				$module =  'Credit';

				$dao = M('Certification');

				$where .= ' AND code like "%'.$keyword.'%" ';

			}

			else {

				if(strstr($keyword,'or')){

					$keydo = ' or ';

					$keyword_arr= explode('or',$keyword);

				}elseif(strstr($keyword,' ')){

					$keydo = ' AND ';

					$keyword_arr= explode(' ',$keyword);

				}

				$keyword_arr=array_filter($keyword_arr);

				if(count($keyword_arr)>1){

					foreach($keyword_arr as $key =>$keywordz){

						$keyword_arr[$key] = ' title like "%'.trim($keywordz).'%" ';

					}

					$where .= ' AND ('.implode($keydo,$keyword_arr).')';

				}else{

					$where .= ' AND title like "%'.$keyword.'%" ';
//                    $where .= ' AND title = '.'"'.$keyword.'"';

				}

			}

		}

		$this->dao= M($module);

		if($dao)

		{

			$tcount = $dao->where($where)->count(1);

		}



		$count = $this->dao->where($where)->count();
		$this->assign('count',$count);

		$this->assign('ccount', $tcount);



		if($keyword && ($count || $tcount)){

			import ( "@.ORG.Page" );

			$listRows =  !empty($cat['pagesize']) ? $cat['pagesize'] : C('PAGE_LISTROWS');

			$page = new Page ( $count, $listRows );

			$_REQUEST['p'] = '{$page}';

			$page->urlrule =  URL('Home-Search/index',$_REQUEST);

			$pages = $page->show();

			//add by 响应式手机端 上一页和下一页

			$this->assign('prePage',$page->prePage);

			$this->assign('nextPage',$page->nextPage);

			//end

			$field =  $this->module[$cat['moduleid']]['listfields'];

			$field =  $field ? $field : '*';

			$list = $this->dao->field($field)->where($where)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

			if($dao)

			{

				$clist = $dao->field($field)->where($where)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

				$this->assign('clist', $clist);

			}



			$this->assign('pages',$pages);

			$this->assign('list',$list);





		}



		$this->display();



    }

}

?>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo C('DEFAULT_CHARSET');?>" />
<title><?php echo L('welcome');?></title>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/style.css" /> 
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.min.js"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.artDialog.js?skin=default"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/iframeTools.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.form.js"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.validate.js"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/MyDate/WdatePicker.js"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.colorpicker.js"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/my.js"></script> 
<script type="text/javascript" src="__ROOT__/Public/Js/swfupload.js"></script> 

<script language="JavaScript">
<!--
var ROOT =	 '__ROOT__';
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
function confirm_delete(url){
	art.dialog.confirm("<?php echo L('real_delete');?>", function(){location.href = url;});
}
//-->
</script>
</head>
<body width="100%">
<div id="loader" ><?php echo L('load_page');?></div>
<div id="result" class="result none"></div>
<div class="mainbox">

<?php if(empty($_GET['isajax'])): ?><div id="nav" class="mainnav_title">

	<div id="lang">
	<?php if(APP_LANG): parse_str($_SERVER['QUERY_STRING'],$urlarr); unset($urlarr[l]); $url='index.php?'.http_build_query($urlarr); ?>
		<?php if(is_array($Lang)): $i = 0; $__LIST__ = $Lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$langvo): $mod = ($i % 2 );++$i;?><a <?php if($langvo[status]==0): ?>style="display:none;"<?php endif; ?> href="<?php echo ($url); ?>&l=<?php echo ($langvo["mark"]); ?>" <?php if($langvo[mark]==$_SESSION['YP_lang']): ?>class="on"<?php endif; ?>><?php echo ($langvo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	</div>
	<ul><a href="<?php echo U($nav[bnav][model].'/'.$nav[bnav][action],$nav[bnav][data]);?>"><?php echo ($nav["bnav"]["name"]); ?></a>|
	<?php if(is_array($nav["nav"])): $i = 0; $__LIST__ = $nav["nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vonav): $mod = ($i % 2 );++$i; if($vonav[data][isajax]): ?><a href="javascript:void(0);" onclick="openwin('<?php echo ($vonav[action]); ?>','<?php echo U($vonav[model].'/'.$vonav[action],$vonav[data]);?>','<?php echo ($vonav["name"]); ?>',600,440)"><?php echo ($vonav["name"]); ?></a>|
	<?php else: ?>
	<a href="<?php echo U($vonav[model].'/'.$vonav[action],$vonav[data]);?>"><?php echo ($vonav["name"]); ?></a>|<?php endif; endforeach; endif; else: echo "" ;endif; ?></ul>
	</div>
	<script>
	//|str_replace=__ROOT__.'/index.php','',###
	var onurl ='<?php echo ($_SERVER["REQUEST_URI"]); ?>';
	jQuery(document).ready(function(){
		$('#nav ul a ').each(function(i){
		if($('#nav ul a').length>1){
			var thisurl= $(this).attr('href');
			thisurl = thisurl.replace('&menuid=<?php echo cookie("menuid");?>','');
			if(onurl.indexOf(thisurl) == 0 ) $(this).addClass('on').siblings().removeClass('on');
		}else{
			$('#nav ul').hide();
		}
		});
		if($('#nav ul a ').hasClass('on')==false){
		$('#nav ul a ').eq(0).addClass('on');
		}
	});
	</script><?php endif; ?>


<table  class="search_table" width="100%" <?php if($isChildModule) : ?>style='display:none;'<?php endif;?>>
	<tr>
		<td class="search">
			<form action="<?php echo U($module_name.'/index');?>" method="get">
			<input type="hidden" name="g" value="<?php echo (GROUP_NAME); ?>" />
			<input type="hidden" name="m" value="<?php echo (MODULE_NAME); ?>" />
			<input type="hidden" name="a" value="<?php echo (ACTION_NAME); ?>" />

			<input id="title" type="text" size="14" class="input-text" name="keyword" value="<?php echo ($_GET['keyword']); ?>" />
			<select name="searchtype">
			<?php if($fields['name']): ?><option value="title" <?php if(($searchtype) == "name"): ?>selected="selected"<?php endif; ?>><?php echo L('name');?></option><?php endif; ?>
			<?php if($fields['title']): ?><option value="title" <?php if(($searchtype) == "title"): ?>selected="selected"<?php endif; ?>><?php echo L('title');?></option><?php endif; ?>
			<?php if($fields['username']): ?><option value="username" <?php if(($searchtype) == "username"): ?>selected="selected"<?php endif; ?>><?php echo L('username');?></option><?php endif; ?>
			<?php if($fields['keywords']): ?><option value="keywords" <?php if(($searchtype) == "keywords"): ?>selected="selected"<?php endif; ?>><?php echo L('keywords');?></option><?php endif; ?>
			<option value="id" <?php if(($searchtype) == "id"): ?>selected="selected"<?php endif; ?>>ID</option>
			</select>
			<?php if($fields['catid']): ?><select id="catid" name="catid">
			<option value=""><?php echo L('select_category');?></option>
			<?php echo ($select_categorys); ?>
			</select><?php endif; ?>

			<?php if($fields['typeid']): ?><select id="typeid" name="typeid">
			<option value=""><?php echo L('select_typeid');?></option>
			<?php if(is_array($Type)): $i = 0; $__LIST__ = $Type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; if($row['parentid']==$fields['typeid']['setup']['default']): ?><option value="<?php echo ($row['typeid']); ?>" <?php if(($typeid) == $row['typeid']): ?>selected="selected"<?php endif; ?>><?php echo ($row['name']); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</select><?php endif; ?>


			<?php if($fields['posid']): ?><select id="posid" name="map[posid]">
			<option value=""><?php echo L('select_posids');?></option>
			<?php if(is_array($posids)): $i = 0; $__LIST__ = $posids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row['id']); ?>" <?php if($posid ==$row['id']): ?>selected="selected"<?php endif; ?>><?php echo ($row['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select><?php endif; ?>


			<select id="status" name="map[status]">
			<option value=""><?php echo L('status');?></option>
			<option value="0" <?php if(isset($status) && $status ==0): ?>selected="selected"<?php endif; ?>><?php echo L(noshenhe);?></option>
			<option value="1" <?php if(isset($status) && $status ==1): ?>selected="selected"<?php endif; ?>><?php echo L(isshenhe);?></option>
			</select>


			<select id="order" name="order">
			<option value="listorder" <?php if(($order) == "listorder"): ?>selected="selected"<?php endif; ?>><?php echo L('listorder');?></option>
			<option value="<?php echo ($pkid); ?>" <?php if(($order) == $pkid): ?>selected="selected"<?php endif; ?>>ID<?php echo L('listorder');?></option>
			<?php if($fields['hits']): ?><option value="hits" <?php if(($order) == "hits"): ?>selected="selected"<?php endif; ?>><?php echo L('hits'); echo L('listorder');?></option><?php endif; ?>
			</select>

			<select name="sort">
				<option value="asc" <?php if($sort =='asc'): ?>selected="selected"<?php endif; ?>><?php echo L('order_by_asc');?></option>
				<option value="desc" <?php if($sort =='desc'): ?>selected="selected"<?php endif; ?>><?php echo L('order_by_desc');?></option>
			</select>
			<span style="padding-left:4px;"><?php echo L('display_yes');?>&nbsp;<input type="text" size="3" class="input-text" name="listRows" value="<?php echo ($_GET['listRows']); ?>" />&nbsp;<?php echo L('listRows');?></span>
			<!-- <select name="listRows">
				<option value="1" <?php if($listRows ==1): ?>selected="selected"<?php endif; ?>>1<?php echo L('listRows');?></option>
				<option value="15" <?php if($listRows ==5): ?>selected="selected"<?php endif; ?>>15<?php echo L('listRows');?></option>
				<option value="20" <?php if($listRows ==20): ?>selected="selected"<?php endif; ?>>20<?php echo L('listRows');?></option>
				<option value="50" <?php if($listRows ==50): ?>selected="selected"<?php endif; ?>>50<?php echo L('listRows');?></option>
				<option value="100" <?php if($listRows ==100): ?>selected="selected"<?php endif; ?>>100<?php echo L('listRows');?></option>
			</select> -->

			<input type="hidden" id="menuid" name="menuid" value="<?php echo ($_GET['menuid']); ?>"/>
			<input type="submit" value="<?php echo L('chaxun');?>"  class="button" />
			<input type="reset" value="<?php echo L('reset');?>" class="button"  />
			</form>
		</td>

	</tr>
</table>
<form name="myform" id="myform" action="" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0">
		<thead>
            <tr>
			<th width="30"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');"></th>
            <th width="40"><?php echo L('listorder');?></th>
            <th width="40">ID</th>
            <?php if(array_search('is_news',$listfields)) : ?><th><?php echo L('is_news');?></th><?php endif;?>
            <?php if(array_search('is_promotion',$listfields)) : ?><th><?php echo L('is_promotion');?></th><?php endif;?>
            <?php if(array_search('is_hots',$listfields)) : ?><th><?php echo L('is_hots');?></th><?php endif;?>
            <?php if(array_search('is_home',$listfields)) : ?><th><?php echo L('is_home');?></th><?php endif;?>
            <?php if(array_search('is_hide',$listfields)) : ?><th><?php echo L('is_hide');?></th><?php endif;?>
            <?php if(array_search('is_original',$listfields)) : ?><th><?php echo L('is_original');?></th><?php endif;?>
			<th><?php echo L('title');?></th>
			<?php if($fields['status']): ?><th width="60"><?php echo L('status');?></th><?php endif; ?>
			<?php if($fields['hits']): ?><th width="40"><?php echo L('hits');?></th><?php endif; ?>
			<th width="60"><?php echo L('username');?></th>
            
			<th width="120"><?php echo L('manage');?></th>
            </tr>
        </thead>
      	<tbody>
      		<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
			<td  width="30" align="center"><input class="inputcheckbox " name="ids[]" value="<?php echo ($vo['id']); ?>" type="checkbox" ></td>
			<td width="40" align='center'><input name='listorders[<?php echo ($vo["id"]); ?>]' type='text' size='3' value='<?php echo ($vo["listorder"]); ?>' class='input-text-c'></td>
			<td align="center"><?php echo ($vo['id']); ?></td>
			<?php if(isset($vo['is_news'])) : ?><td><a class="<?php if($vo['is_news']) : ?>checked<?php else :?>unchecked<?php endif;?>" href="javascript:void(0)" status="<?php echo ($vo['is_news']); ?>" onclick="changeSatuas('is_news',<?php echo ($vo['id']); ?>,this)"></a></td><?php endif;?>
			<?php if(isset($vo['is_promotion'])) : ?><td><a class="<?php if($vo['is_promotion']) : ?>checked<?php else :?>unchecked<?php endif;?>" href="javascript:void(0)" status="<?php echo ($vo['is_promotion']); ?>" onclick="changeSatuas('is_promotion',<?php echo ($vo['id']); ?>,this)"></a></td><?php endif;?>
			<?php if(isset($vo['is_hots'])) : ?><td><a class="<?php if($vo['is_hots']) : ?>checked<?php else :?>unchecked<?php endif;?>" href="javascript:void(0)" status="<?php echo ($vo['is_hots']); ?>" onclick="changeSatuas('is_hots',<?php echo ($vo['id']); ?>,this)"></a></td><?php endif;?>
			<?php if(isset($vo['is_home'])) : ?><td><a class="<?php if($vo['is_home']) : ?>checked<?php else :?>unchecked<?php endif;?>" href="javascript:void(0)" status="<?php echo ($vo['is_home']); ?>" onclick="changeSatuas('is_home',<?php echo ($vo['id']); ?>,this)"></a></td><?php endif;?>
			<?php if(isset($vo['is_hide'])) : ?><td><a class="<?php if($vo['is_hide']) : ?>checked<?php else :?>unchecked<?php endif;?>" href="javascript:void(0)" status="<?php echo ($vo['is_news']); ?>" onclick="changeSatuas('is_hide',<?php echo ($vo['id']); ?>,this)"></a></td><?php endif;?>
			<?php if(isset($vo['is_original'])) : ?><td><a class="<?php if($vo['is_original']) : ?>checked<?php else :?>unchecked<?php endif;?>" href="javascript:void(0)" status="<?php echo ($vo['is_original']); ?>" onclick="changeSatuas('is_original',<?php echo ($vo['id']); ?>,this)"></a></td><?php endif;?>
      		<td><?php if($vo['catid']): ?>[<font color="green"><?php echo ($categorys[$vo['catid']]['catname']); ?></font>]<?php endif; ?> 
			<?php if($module_name=='Guestbook' || $module_name=='Feedback') : echo ($vo['username']); ?>-<?php echo ($vo['title']); else :?><a href="<?php echo ($vo["url"]); ?>" <?php if($vo['title_style']!=''): ?>style ="<?php echo ($vo['title_style']); ?>"<?php endif; ?> target="_blank"><?php echo ($vo['title']); ?> </a><?php endif;?>
			
			<?php if($vo['thumb']!=''): ?><img src="./Public/Images/admin_image.gif"><?php endif; ?>
			<?php if($vo['posid']!=0): ?><img src="./Public/Images/admin_elite.gif"><?php endif; ?></td>
			<?php if($fields['status']): ?><td align="center"><?php if($vo['status']==1) : ?><font color="green"><?php echo L('isshenhe');?></font><?php else :?><a href="<?php echo U($module_name.'/status',array(id=>$vo['id'],status=>1));?>"><font color="red"><?php echo L('noshenhe');?></font></a><?php endif;?></td><?php endif; ?>
			<?php if($fields['hits']): ?><td align="center"><?php echo ($vo['hits']); ?></td><?php endif; ?>
      		<td align="center"><?php echo ($vo['username']); ?></td>
      	 
			<td align="center">
				<?php if(!empty($childModules)) : ?>
				<?php if(is_array($childModules)): $k2 = 0; $__LIST__ = $childModules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($k2 % 2 );++$k2;?><a href="<?php echo U($child['name'].'/index',array('menuid'=>$child['menuid'],"$pmidname"=>$vo['id']));?>"><?php echo L($child['title']);?></a> |<?php endforeach; endif; else: echo "" ;endif; ?>
				<?php endif;?>
				<a href="<?php echo U($module_name.'/edit',array(id=>$vo['id'])+$parentParam);?>"><?php echo L('edit');?></a> | 
				<a href="javascript:confirm_delete('<?php echo U($module_name.'/delete',array(id=>$vo['id'])+$parentParam);?>')"><?php echo L('delete');?></a> | 
				<a href="javascript:confirm_copy('<?php echo U($module_name.'/copy',array(id=>$vo['id'])+$parentParam);?>')"><?php echo L('复制');?></a>
			</td>
      		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
      	</tbody>
    </table>

    <div class="btn">
    	<input type="button" class="button" name="dosubmit" value="<?php echo L('delete')?>" onclick="myform.action='<?php echo U($module_name.'/deleteall');?>';return confirm_deleteall()"/> 
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('listorder')?>" onclick="myform.action='<?php echo U($module_name.'/listorder');?>';$('#myform').submit();" />  
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('status_ok')?>" onclick="myform.action='<?php echo U($module_name.'/statusallok');?>';$('#myform').submit();" /> 
    	<!-- edit by qiuye  批量处理-->
    	<?php if(array_search('is_news',$listfields)) : ?>
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('news')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_news&value=1';$('#myform').submit();" /> 
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('old')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_news&value=0';$('#myform').submit();" /> 
    	<?php endif;?> <?php if(isset($vo['is_promotion'])) : ?>
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('promotion')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_promotion&value=1';$('#myform').submit();" /> 
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('non_promotion')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_promotion&value=0';$('#myform').submit();" /> 
    	<?php endif;?> <?php if(array_search('is_hots',$listfields)) : ?>
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('hots')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_hots&value=1';$('#myform').submit();" /> 
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('cold')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_hots&value=0';$('#myform').submit();" /> 
    	<?php endif;?> <?php if(array_search('is_home',$listfields)) : ?>
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('yes_home')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_home&value=1';$('#myform').submit();" /> 
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('no_home')?>" onclick="myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_home&value=0';$('#myform').submit();" /> 
    	<?php endif;?> <?php if(array_search('is_hide',$listfields)) : ?>
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('sales')?>" onclick="myform.action='myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_hide&value=1';$('#myform').submit();" /> 
    	<input  type="button" class="button" name="dosubmit" value="<?php echo L('unsales')?>" onclick="myform.action='myform.action='<?php echo U($module_name.'/changeYes');?>&catalog=is_hide&value=0';$('#myform').submit();" /> 
    	<?php endif;?>
    	<input type="submit" value="<?php echo L('Exceltable')?>" name="dosubmit" class="button" onclick="myform.action='?g=Admin&amp;m=<?php echo MODULE_NAME?>&amp;a=excel'"/>   	
    </div>
</div>
</form>

<div id="pages" class="page"><?php echo ($page); ?></div>
<script>
$("#catid").attr("value",'<?php echo ($catid); ?>');
function confirm_deleteall(){
	art.dialog.confirm("<?php echo L('real_delete');?>", function(){ $('#myform').submit();});
}
function confirm_copy($url){
	var times = window.prompt("复制条数", 1);
	if(times!=null && !isNaN(times)){
		document.location = $url + '&times=' + times;
	}
}

// ajax 修改单个产品的状态 qiuye
function changeSatuas(field,productId,obj){
	value = eval($(obj).attr('status')) ? 0 : 1;
	$.post("<?php echo U($module_name.'/changeSatuas');?>",{field:field,value:value,id:productId},function(data){
		if(data.status == true){
			if($(obj).hasClass('checked')){
				$(obj).removeClass('checked').addClass('unchecked');
			} else {
				$(obj).removeClass('unchecked').addClass('checked');
			}
			$(obj).attr('status',value);
		}
		if(data.status == false){
			art.dialog(data.message);
		}
	},"json");
}

// 重组搜索条件
 $(function(){
 	$('#pages a').each(function(){
 		
 	});
 });
</script>
</body>
</html>
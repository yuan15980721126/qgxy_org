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


<div id="msg"></div>

<form name="myform" id="myform" action="<?php if($action_name=='add'): echo U($module_name.'/insert'); else: echo U($module_name.'/update'); endif; ?>&iscreatehtml=1" method="post">

<div id="filelist" class="hide"></div>

<div class="error"><ul></ul></div>

 

<table cellpadding=0 cellspacing=0 class="table_form" width="100%">

        <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i; if(!empty($r['status'])): ?><tr>

                <td <?php if($module_name==Application) : ?>width="20%"<?php else :?> width="10%" <?php endif;?>><?php if($r['required']): ?><font color="red">*</font><?php endif; echo ($r["name"]); ?></td>

                <td <?php if($module_name==Application) : ?>width="80%"<?php else :?> width="90%" <?php endif;?> id="box_<?php echo ($r['field']); ?>">

                <?php echo (getform($form,$r)); ?>

                <?php if($r[field]=='title'&&$fields[cc]): ?><span style="position: absolute;left:510px; top:170px">缩略图尺寸为：<?php echo($fields['cc']['setup']['default']); ?></span><?php endif; ?>    

                </td>

            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <?php if($module_name == 'Identification') : ?>
            <tr class="attribute_list">
                <td width="10%">
                    <font color="red">*守信承诺</font></td>
                <td width="90%" id="">
                    <?php  $_result=M()->query("SELECT `*` FROM `mqu_promise` WHERE status=1 "); if ($_result): $k=0;foreach($_result as $key=>$rd):++$k;$mod = ($k % 2 );?><input type="checkbox" class="input_checkbox " name="promise[]"  <?php if (in_array($rd['id'], $promise_list)) { ?>checked <?php }?>  value="<?php echo ($rd["id"]); ?>"><?php echo ($rd["title"]); ?>---<img src="<?php echo ($rd["image"]); ?>" style="margin:0px;width: 70px;height: 70px;"/><br><?php endforeach; endif;?>
                </td>
            </tr>

            <tr class="attribute_list">
                <td width="10%">
                    <font color="red">*荣誉资质</font></td>
                <td width="90%" id="">
                    <?php  $_result=M()->query("SELECT `*` FROM `mqu_honor` WHERE status=1 "); if ($_result): $k=0;foreach($_result as $key=>$rd):++$k;$mod = ($k % 2 );?><input type="checkbox" class="input_checkbox " name="honor[]"  <?php if (in_array($rd['id'], $honor_list)) { ?>checked <?php }?>  value="<?php echo ($rd["id"]); ?>"><?php echo ($rd["title"]); ?>---<img src="<?php echo ($rd["image"]); ?>" style="margin:0px;width: 70px;height: 70px;"/><br><?php endforeach; endif;?>
                </td>
            </tr>


            <tr class="attribute_list">
                <td width="10%">
                    <font color="red">*可信名片</font></td>
                <td width="90%" id="">
                    <?php  $_result=M()->query("SELECT `*` FROM `mqu_card` WHERE status=1 "); if ($_result): $k=0;foreach($_result as $key=>$rd):++$k;$mod = ($k % 2 );?><input type="checkbox" class="input_checkbox " name="card[]"  <?php if (in_array($rd['id'], $card_list)) { ?>checked <?php }?>  value="<?php echo ($rd["id"]); ?>"><?php echo ($rd["name"]); ?>---<?php echo ($rd["company"]); ?><br><?php endforeach; endif;?>
                </td>
            </tr>

            <tr class="attribute_list">
                <td width="10%">
                    <font color="red">*企业实力-概览</font></td>
                <td width="90%" id="">
                    <?php  $_result=M()->query("SELECT `*` FROM `mqu_icon` WHERE type = 1 AND status=1 "); if ($_result): $k=0;foreach($_result as $key=>$rd):++$k;$mod = ($k % 2 );?><input type="radio" class="input_checkbox " name="overview"  <?php if (in_array($rd['id'], $overview_list)) { ?>checked <?php }?>  value="<?php echo ($rd["id"]); ?>">
                        <?php for($i=1;$i<=8;$i++){?>
                            <?php if(!empty($rd['image_'.$i])){?>
                            <!--图标:<img src="<?php echo $rd['image_'.$i];?>" style="width: 50px;height: 50px;"/>-->
                            标题:<?php echo $rd['title_'.$i];?>&nbsp;&nbsp;---说明:<?php echo $rd['desc_'.$i];?>&nbsp;&nbsp;
                            <?php }?>
                        <?php }?>
                        <br><?php endforeach; endif;?>
                </td>
            </tr>

            <tr class="attribute_list">
                <td width="10%">
                    <font color="red">*企业实力-认证许可</font></td>
                <td width="90%" id="">
                    <?php  $_result=M()->query("SELECT `*` FROM `mqu_icon` WHERE type = 2 AND status=1 "); if ($_result): $k=0;foreach($_result as $key=>$rd):++$k;$mod = ($k % 2 );?><input type="radio" class="input_checkbox " name="license"  <?php if (in_array($rd['id'], $license_list)) { ?>checked <?php }?>  value="<?php echo ($rd["id"]); ?>">
                        <?php for($i=1;$i<=8;$i++){?>
                        <?php if(!empty($rd['image_'.$i])){?>
                        <!--图标:<img src="<?php echo $rd['image_'.$i];?>" style="width: 50px;height: 50px;"/>-->
                        标题:<?php echo $rd['title_'.$i];?>&nbsp;&nbsp;---说明:<?php echo $rd['desc_'.$i];?>&nbsp;&nbsp;
                        <?php }?>
                        <?php }?>
                        <br><?php endforeach; endif;?>
                </td>
            </tr>
            <tr class="attribute_list">
                <td width="10%">
                    <font color="red">*企业实力-知识产权</font></td>
                <td width="90%" id="">
                    <?php  $_result=M()->query("SELECT `*` FROM `mqu_icon` WHERE type = 3 AND status=1 "); if ($_result): $k=0;foreach($_result as $key=>$rd):++$k;$mod = ($k % 2 );?><input type="radio" class="input_checkbox " name="intellectual"  <?php if (in_array($rd['id'], $intellectual_list)) { ?>checked <?php }?>  value="<?php echo ($rd["id"]); ?>">
                        <?php for($i=1;$i<=8;$i++){?>
                        <?php if(!empty($rd['image_'.$i])){?>
                        <!--图标:<img src="<?php echo $rd['image_'.$i];?>" style="width: 50px;height: 50px;"/>-->
                        标题:<?php echo $rd['title_'.$i];?>&nbsp;&nbsp;---说明:<?php echo $rd['desc_'.$i];?>&nbsp;&nbsp;
                        <?php }?>
                        <?php }?>
                        <br><?php endforeach; endif;?>
                </td>
            </tr>


    <?php endif;?>
</table>

<div id="bootline"></div>

<div id="btnbox" class="btn">

<?php if($vo['id']!=''): ?><input TYPE="hidden" name="id" value="<?php echo ($vo["id"]); ?>"><?php endif; ?>

 

<input type='hidden' name='<?php echo ($parentModuleKey); ?>' value='<?php echo ($parentModuleValue); ?>'>

<input type="hidden"  name="lang" value="<?php echo ($langid); ?>" />

<input type="hidden" name="forward" value="<?php echo ($_SERVER['HTTP_REFERER']); ?>" />

<INPUT TYPE="submit"  value="<?php echo L('dosubmit');?>" class="button" >

<input TYPE="reset"  value="<?php echo L('cancel');?>" class="button">

</div>

</form>

<?php if($module_name==Application) : ?>

<style>

	#box_registercapital,#box_income,#box_funds{position: relative;}

	.unit{position: absolute;left: 455px;top: 8px;}

</style>

<script type="text/javascript">
	$("#box_registercapital,#box_income,#box_funds").append('<span class="unit">万元</span>')
</script>

<?php endif;?>

</div>
</body>
</html>
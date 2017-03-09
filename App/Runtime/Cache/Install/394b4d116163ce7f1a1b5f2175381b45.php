<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title>软件安装许可协议</title>
<style type="text/css">
p{text-indent:2em;font-weight:550;line-height:25px;}
h1{width:40%;margin:0 auto;text-align:center;}
</style>
</head>
<body>
			<div style="width:800px;margin:0 auto;">
			<h1>软件安装许可协议</h1>
				<p>如果您安装、复制或以其它方式使用了本软件产品，则视为您已同意下列条款，并已和林飞网络科技有限公司(以下简称“林飞网络”)签定了本《软件许可协议》(以下简称”协议”)。如您不同意本协议中的条款，请不要安装软件。如果您通过合法渠道从林飞网络取得本软件的任何拷贝，则您拥有如下权利： </p>
				<h3>1:使用权 </h3>
				<p>您有权在计算机上安装本软件，并在业务范围内使用本软件，再现本软件具有的全部功能。</p>
				<h3>2:备份 </h3>
				<p>出于存档的目的，您有权复制一份本软件作为备份件保存，但复制备份件不得违反第三条第 1款和第 2 款的有关规定。</p>
				<h3>3:技术支持  </h3>
				<p>您有权获得添家缘公司的全面的技术支持。对于本软件在安装使用过程中产生的任何疑问、问题，您均有权向添家缘公司提出并要求添家缘公司给予解答或解决。</p>
				<h3>4:版本升级</h3>
				<p>根据实际需要，您有权获得本软件的各个升级版本的使用权。但如果添家缘公司另有要求，您须支付适当的版本升级费用。</p>
				<h3>5:一般限制 </h3>
				<p>您对本软件的使用权仅限于再现本软件本身具有的功能，您无权擅自修改本软件，也无权对本软件进行反向工程、反编译或反汇编，也无权在本软件的基础上进行二次开发，衍生新的软件。如果出于适用性或其它原因需要修改本软件，应书面向添家缘公司提出，由添家缘公司进行修改。</p>
				<h3>6:备份  </h3>
				<p>除非为您自己的正常使用或备份存档的目的，您也无权擅自复制本软件的全部或任何部分内容。</p>
				<h3>7:使用 </h3>
				<p>对本软件的使用权范围仅限于您单位本身。未经添家缘公司书面允许，您无权以转让、许可、出租、租赁、出借、赠与或其它任何方式向任何第三方提供本软件或其复制件或其中任何部分，无论这种提供是否出于商业目的。</p>
				<h3>8:其他  </h3>
				<p>您有义务采取有效措施，约束您的职员或员工遵守上述 3.1、3.2 款的有关约定。</p>
				<h3>9:声明 </h3>
				<p>对于本软件，添家缘公司保证不含有任何恶意破坏您的计算机资源(包括 文档、程序 和 其他数据)的功能设置。对于您在使用此软件过程中而产生的利润损失、可用性消失、商业中断，或任何形式的间接、特别、意外或必然的破坏，或任何其他方的索赔，添家缘公司及其代理、销售人概不负责，即使添家缘公司已事先被告知此类事有可能发生。</p>
				<h3>10:知识产权和保密 </h3>
				<p>本软件的版权和可能涉及林飞网络的商标权、专利权、专有技术和其他权利，其所有权归标识应妥善保留，不能擅自进行删剪或修改。您拥有授权范围内的使用权，但没有转让或许可他人使用的权利。对于涉及林飞网络技术秘密的内容，您还负有保密的义务。</p>
				<h3>11:其它 </h3>
				<p>本软件许可协议的未尽事宜，由双方其它协议或另行协商约定。本软件许可协议适用中华人共和国有关法律。以上资料只用于建立我们的客户服务系统，以使我们能够更好的为您提供技术支持和售后服务</p>

			</div>
			<div style="width:200px;margin:0 auto;">
			<form method="get" action="<?php echo U('init');?>" onsubmit="return mysubmit();">
			同意安装协议<input type="checkbox" name="anzhuang" id="che" value="1" />
			<input type="submit" value="下一步">
			</form>
			</div>
</body>
<script type="text/javascript">
function mysubmit()
{
	heckbox = document.getElementById('che');
  if(checkbox.checked){
		return true;
	}
		return false;

}
</script>
</html>
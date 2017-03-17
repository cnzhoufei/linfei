$(function(){
// alert(1)
	var $parent=$(".xjgroup"),
	$prev=$('#showimg .prev'),
	$next=$('#showimg .next'),
	$oul=$('.xjgroup ul'),
	imgboxs=$('.xjgroup li'),
	details=document.getElementById('details'),
	count=imgboxs.length,
	iNow=0,iNowUlLeft=0;
	var slen=imgboxs.length>4?4:count;if(count>4){$prev.show();
		$next.show()}


		function fixUlLeft(){var w=-imgboxs.eq(0).outerWidth(true)*iNowUlLeft;startMove(details,{left:w});$prev.get(0).className=iNowUlLeft==0?"prev noMore":"prev";$next.get(0).className=iNowUlLeft==(count-slen)?"next noMore":"next"}$prev.bind('click',function(){if(iNowUlLeft==0)return;iNowUlLeft--;fixUlLeft()});$next.bind('click',function(){if(iNowUlLeft<count-4){iNowUlLeft++}fixUlLeft()})});$(function(){var x=20;var y=-200;$("a.tooltip").mouseover(function(e){var tooltip="<div id='tooltip'><img src='"+this.href+"' alt='产品预览图'/><\/div>";$("body").append(tooltip);$("#tooltip").css({"top":(e.pageY+y)+"px","left":(e.pageX+x)+"px"}).show("fast")}).mouseout(function(){$("#tooltip").remove()}).mousemove(function(e){$("#tooltip").css({"top":(e.pageY+y)+"px","left":(e.pageX+x)+"px"})}).click(function(){return false});$("#tjparam").tabMenu({tabMenuBox:".tab_nav",tabMenuSub:"a",tabCtnBox:".tab_body",tabCtnSub:".sub",tabMenuCur:"cur",switchingMode:"click"})})
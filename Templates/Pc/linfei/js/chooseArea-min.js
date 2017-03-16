function productAnimate() {
	$('html,body').animate({
		scrollTop: $('#qynav').offset().top
	}, 1000)
}
function getArgs(href) {
	var argsArr = new Object();
	var query = href.substring(href.indexOf('?') + 1, href.length);
	var pairs = query.split("&");
	for (var i = 0; i < pairs.length; i++) {
		var sign = pairs[i].indexOf("=");
		if (sign == -1) {
			continue
		}
		var aKey = pairs[i].substring(0, sign);
		var aValue = pairs[i].substring(sign + 1);
		argsArr[aKey] = unescape(aValue)
	}
	return argsArr
}
function setNewUrl(href) {
	var url = "service/product/plist";
	var param = getArgs(href);
	if (href.indexOf("?") > -1) {
		var areaid = param.areaid;
		if (areaid >= 100 && areaid <= 105) {
			url = url + "?areaid=" + areaid
		} else {
			url = url + "?areaid=0"
		}
	} else {
		url = url + "?areaid=0"
	}
	$("#getUrl").val(url);
	return url
}
var glState = true;

function lazyLoad(jsonData) {
	var nCount, nCurrent, sjNum;
	var listBox = $("#listing");
	if (jsonData && jsonData.pagein) {
		nCount = jsonData.pagein.count;
		nCurren = jsonData.pagein.current;
		sjNum = parseInt(nCurren) + 1;
		$("#Count").val(nCount);
		$("#CurrentNum").val(sjNum)
	}
	if (jsonData && jsonData.data && jsonData.data.length > 0) {
		$.each(jsonData.data, function(Index, sgdata) {
			var newhtml = $('<div class="view v2 view-first"><a href="/product/' + sgdata.product_id + '" target="_blank"><img src="http://img.mimujiang.com/' + sgdata.product_thumb + '" width="330px" height="230px" title="' + sgdata.product_name + '"></a><div class="mask"><a class="pro_show"  target="_blank" href="/product/' + sgdata.product_id + '"><i></i></a></div></div>');
			listBox.append(newhtml)
		})
	}
	glState = true
};
(function($) {
	$.extend({
		'chooseArea': function(con) {
			var anavs = $("#qynav a"),
				anavlen = anavs.length,
				apics = $("#qypic a"),
				apiclen = apics.length,
				mouseCur, isCurrent = function(obj) {
					return obj.hasClass('cur')
				},
				hoverForOpera = function(obj, len, className, state) {
					for (var i = 0; i < len; i++) {
						if (!obj.eq(i).hasClass('cur') && obj.eq(i).hasClass(className)) {
							obj.eq(i).find('i').css('display', state)
						}
					}
				},
				hoverFun = function(mouseCur, state) {
					var className = mouseCur.attr('class').split(/\s/)[0];
					hoverForOpera(apics, apiclen, className, state);
					hoverForOpera(anavs, anavlen, className, state)
				},
				clickForOpera = function(obj, len, className) {
					var state;
					for (var i = 0; i < apiclen; i++) {
						if (obj.eq(i).hasClass(className)) {
							state = "block";
							obj.eq(i).addClass('cur')
						} else {
							state = "none";
							obj.eq(i).removeClass('cur')
						}
						obj.eq(i).find('i').css('display', state)
					}
				},
				clickFun = function(clickCur) {
					var className = clickCur.attr('class').split(/\s/)[0];
					clickForOpera(apics, apiclen, className);
					clickForOpera(anavs, anavlen, className)
				};
			anavs.hover(function() {
				isCurrent($(this)) || hoverFun($(this), 'block')
			}, function() {
				isCurrent($(this)) || hoverFun($(this), 'none')
			});
			apics.hover(function() {
				isCurrent($(this)) || hoverFun($(this), 'block')
			}, function() {
				isCurrent($(this)) || hoverFun($(this), 'none')
			});
			anavs.bind('click', function() {
				productAnimate();
				var url = $(this).attr('href');
				if (!isCurrent($(this))) {
					$("#getUrl").val(url);
					var listBox = $("#listing");
					listBox.html('');
					$("#getUrl").val(url);
					clickFun($(this));
					url = setNewUrl(url);
					ajaxOperate(url, lazyLoad)
				}

				//return false
			});
			apics.bind('click', function() {
				productAnimate();
				var url = $(this).attr('href');
				if (!isCurrent($(this))) {
					$("#getUrl").val(url);
					var listBox = $("#listing");
					listBox.html('');
					$("#getUrl").val(url);
					clickFun($(this));
					url = setNewUrl(url);
					ajaxOperate(url, lazyLoad)
				}
				//return false
			})
		}
	})
}(jQuery));
$(window).scroll(function() {
	var count = $("#Count").val();
	var curNum = $("#CurrentNum").val();
	var next = parseInt(curNum);
	var url = $("#getUrl").val();
	var isScroll = parseInt(count) - parseInt(curNum) > 0 ? true : false;
	var gg = parseInt(curNum);
	if (isScroll && ($(document).height() - $(this).scrollTop() - $(this).height() < 200) && glState) {
		glState = false;
		url = $("#getUrl").val() + "&current=" + gg;
		ajaxOperate(url, lazyLoad)
	}
});
$(window).scroll(function() {
	var isBH = $(this).scrollTop() > 0 ? "block" : "none";
	$('.guide .g-toTop').css('display', isBH)
});
$('.g-toTop').click(function() {
	$("html , body").animate({
		scrollTop: "0"
	}, 200)
});
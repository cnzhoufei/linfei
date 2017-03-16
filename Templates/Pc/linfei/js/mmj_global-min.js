function ajaxOperate(url, callback, type) {
	var data;
	$.ajax({
		type: type,
		url: url,
		dataType: 'json',
		async: false,
		beforeSend: function() {},
		success: function(ctn) {
			data = ctn;
			callback && callback(data)
		},
		error: function() {}
	})
}
$(function() {
	var searchText = $('input.inputText');
	searchText.each(function(index, element) {
		var defaultVal = $(element).val();
		var curVal = "";
		$(element).focus(function() {
			if ($(element).val() == defaultVal) {
				$(element).val("")
			}
		});
		$(element).blur(function() {
			curVal = $(element).val();
			curVal = curVal == "" ? defaultVal : curVal;
			$(element).val(curVal)
		})
	})
});

function setBimgSize() {
	var dw = $(document).width();
	var setpbg = $('.setpbg');
	var ml;
	if (dw < 1900) {
		ml = (1920 - dw) / 2;
		setpbg.css('marginLeft', -ml + "px")
	}
}
$(function() {
	setBimgSize()
});
$(window).resize(function() {
	setBimgSize()
});

function changeJD(choose, navA, hdbz, isFirst) {
	var curW = choose.width();
	var index = navA.index(choose);
	var left = 0;
	for (var i = 0; i < index; i++) {
		left += navA.eq(i).outerWidth(true)
	}
	hdbz.css('width', curW + 20);
	isFirst ? hdbz.css('left', left + "px") : miaovStartMove(hdbz.get(0), {
		left: left
	}, MIAOV_MOVE_TYPE.BUFFER)
}
$(function() {
	var hdNav = $('#hdNav');
	var navA = $("#hdNav a");
	var navcurA = $("#hdNav a.cur");
	var hdCur = $(".headCur");
	var choose;
	var timer = null;
	navA.bind('mouseover', function() {
		if (timer) {
			clearTimeout(timer);
			timer = null
		}
		if (hdCur.is(":hidden")) {
			hdCur.show()
		}
		choose = $(this);
		changeJD(choose, navA, hdCur)
	});
	navA.bind('mouseout', function(event) {
		choose = $(this);
		if (!choose.hasClass('cur')) {
			
			if (navcurA.length > 0) {
				timer = setTimeout(function() {
					changeJD(navcurA, navA, hdCur);
					timer = null
				}, 500)
			} else {
				timer = setTimeout(function() {
					hdCur.css({
						width: 0,
						left: 0
					});
					hdCur.hide();
					timer = null
				}, 500)
				
			}
		}
		event.stopPropagation()
	});
	changeJD(navcurA, navA, hdCur, true);
	navA.each(function(index) {
		
        if($(this).hasClass("cur")){
			choose = $(this);
			changeJD(choose, navA, hdCur)
		}
    });
});
$("#forwx").hover(function() {
	$('.wxewmBox').show()
}, function() {
	$('.wxewmBox').hide()
});

$(function() {
	var timer = null;
	var typebox = $("#productType");
	$("#ourProduct").hover(function(event) {
		if (timer) {
			clearTimeout(timer);
			timer = null
		}
		if (typebox.is(":hidden")) {
			typebox.slideDown()
		}
	}, function(event) {
		timer = setTimeout(function() {
			typebox.slideUp();
			timer = null
		}, 500)
	});
	$("#productType").bind("mouseover", function(event) {
		if (timer) {
			clearTimeout(timer);
			timer = null;
			typebox.slideDown()
		}
	});
	$("#productType").bind("mouseout", function(event) {
		timer = setTimeout(function() {
			typebox.slideUp();
			timer = null
		}, 500)
	})
});


			

$(function() {
	var timer = null;
	var typebox = $("#productTypes");
	$("#ourProducts").hover(function(event) {
		if (timer) {
			clearTimeout(timer);
			timer = null
		}
		if (typebox.is(":hidden")) {
			typebox.slideDown()
		}
	}, function(event) {
		timer = setTimeout(function() {
			typebox.slideUp();
			timer = null
		}, 500)
	});
	$("#productTypes").bind("mouseover", function(event) {
		if (timer) {
			clearTimeout(timer);
			timer = null;
			typebox.slideDown()
		}
	});
	$("#productTypes").bind("mouseout", function(event) {
		timer = setTimeout(function() {
			typebox.slideUp();
			timer = null
		}, 500)
	})
});
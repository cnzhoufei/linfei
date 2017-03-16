function callback(A) {
	A.obj.show()
}(function(A) {
	A.fn.extend({
		opacity: function(D) {
			for (var C = 0, B = this.length; C < B; C++) {
				this[C].style.opacity = D;
				this[C].style.filter = "alpha(opacity:" + D + ")"
			}
		}
	})
})(jQuery);
$(function() {
	var K = $(document).width();
	var M = "";
	var C = $(".rsArrowLeft");
	var D = $(".rsArrowRight");
	var I = document.getElementById("zt-sma-bj");
	var L = $(".rsContainer");
	var E = $(".rsContainer .rsSlide");
	var G = $(".rsNav .rsNavItem");
	var J = 0;
	var H = E.length;
	var B = $(".infoInner");

	function N() {
		B.removeClass("move");
		E.opacity(0);
		E.hide();
		miaovStartMove(E.eq(J).get(0), {
			opacity: 100
		}, MIAOV_MOVE_TYPE.BUFFER, callback, {
			obj: E.eq(J)
		});
		G.removeClass("cur");
		G.eq(J).addClass("cur");
		B.eq(J).addClass("move")
	}
	C.bind("click", function() {
		F();
		if (J == 0) {
			J = H - 1
		} else {
			J--
		}
		N()
	});
	D.bind("click", function() {
		F();
		if (J == H - 1) {
			J = 0
		} else {
			J++
		}
		N()
	});
	G.bind("click", function() {
		F();
		J = $(this).index();
		N()
	});

	function F() {
		clearInterval(M)
	}
	function A() {
		if (J == H - 1) {
			J = 0
		} else {
			J++
		}
		N()
	}
	M = setInterval(A, 5000)
});
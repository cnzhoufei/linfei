function css(D, B, E) {
	if (arguments.length == 2) {
		if (B != "opacity") {
			var C = $(D).css(B),
				A = parseInt(C);
			return A
		}
		return Math.round(100 * parseFloat(D.currentStyle ? D.currentStyle[B] : document.defaultView.getComputedStyle(D, !1)[B]))
	}
	if (arguments.length == 3) {
		switch (B) {
		case "width":
		case "height":
		case "paddingLeft":
		case "paddingTop":
		case "paddingRight":
		case "paddingBottom":
			E = Math.max(E, 0);
		case "left":
		case "top":
		case "marginLeft":
		case "marginTop":
		case "marginRight":
		case "marginBottom":
			D.style[B] = E + "px";
			break;
		case "opacity":
			D.style.filter = "alpha(opacity:" + E + ")", D.style.opacity = E / 100;
			break;
		default:
			D.style[B] = E
		}
	}
	return function(F, G) {
		css(D, F, G)
	}
}
function miaovStopMove(A) {
	clearInterval(A.timer)
}
function miaovStartMove(F, C, H, E, B, D, G) {
	var A = null;
	F.timer && clearInterval(F.timer);
	switch (H) {
	case MIAOV_MOVE_TYPE.BUFFER:
		A = miaovDoMoveBuffer;
		break;
	case MIAOV_MOVE_TYPE.FLEX:
		A = miaovDoMoveFlex
	}
	F.timer = setInterval(function() {
		A(F, C, D, G)
	}, 30), E && E(B)
}
function miaovDoMoveBuffer(F, C, H, E) {
	var B = !0,
		D = "",
		G = 0,
		A = 0;
	for (D in C) {
		A = css(F, D), C[D] != A && (B = !1, G = (C[D] - A) / 5, G = G > 0 ? Math.ceil(G) : Math.floor(G), css(F, D, A + G))
	}
	E && E.call(F), B && (clearInterval(F.timer), F.timer = null, H && H.call(F))
}
function miaovDoMoveFlex(F, C, H, E) {
	var B = !0,
		D = "",
		G = 0,
		A = 0;
	for (D in C) {
		F.oSpeed || (F.oSpeed = {}), F.oSpeed[D] || (F.oSpeed[D] = 0), A = css(F, D);
		if (Math.abs(C[D] - A) >= 1 || Math.abs(F.oSpeed[D]) >= 1) {
			B = !1, F.oSpeed[D] += (C[D] - A) / 5, F.oSpeed[D] *= 0.7, css(F, D, A + F.oSpeed[D])
		}
	}
	E && E.call(F), B && (clearInterval(F.timer), F.timer = null, H && H.call(F))
}
var MIAOV_MOVE_TYPE = {
	BUFFER: 1,
	FLEX: 2
};

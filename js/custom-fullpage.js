
//  ============================================== script-1 ===============================================

/*! iScroll v5.2.0 ~ (c) 2008-2016 Matteo Spinelli ~ http://cubiq.org/license */
(function (g, q, f)
{
	function p(a, b)
	{
		this.wrapper = "string" == typeof a ? q.querySelector(a) : a;
		this.scroller = this.wrapper.children[0];
		this.scrollerStyle = this.scroller.style;
		this.options = {
			resizeScrollbars: !0,
			mouseWheelSpeed: 20,
			snapThreshold: .334,
			disablePointer: !d.hasPointer,
			disableTouch: d.hasPointer || !d.hasTouch,
			disableMouse: d.hasPointer || d.hasTouch,
			startX: 0,
			startY: 0,
			scrollY: !0,
			directionLockThreshold: 5,
			momentum: !0,
			bounce: !0,
			bounceTime: 600,
			bounceEasing: "",
			preventDefault: !0,
			preventDefaultException:
			{
				tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT)$/
			},
			HWCompositing: !0,
			useTransition: !0,
			useTransform: !0,
			bindToWrapper: "undefined" === typeof g.onmousedown
		};
		for (var c in b) this.options[c] = b[c];
		this.translateZ = this.options.HWCompositing && d.hasPerspective ? " translateZ(0)" : "";
		this.options.useTransition = d.hasTransition && this.options.useTransition;
		this.options.useTransform = d.hasTransform && this.options.useTransform;
		this.options.eventPassthrough = !0 === this.options.eventPassthrough ? "vertical" : this.options.eventPassthrough;
		this.options.preventDefault = !this.options.eventPassthrough &&
			this.options.preventDefault;
		this.options.scrollY = "vertical" == this.options.eventPassthrough ? !1 : this.options.scrollY;
		this.options.scrollX = "horizontal" == this.options.eventPassthrough ? !1 : this.options.scrollX;
		this.options.freeScroll = this.options.freeScroll && !this.options.eventPassthrough;
		this.options.directionLockThreshold = this.options.eventPassthrough ? 0 : this.options.directionLockThreshold;
		this.options.bounceEasing = "string" == typeof this.options.bounceEasing ? d.ease[this.options.bounceEasing] || d.ease.circular :
			this.options.bounceEasing;
		this.options.resizePolling = void 0 === this.options.resizePolling ? 60 : this.options.resizePolling;
		!0 === this.options.tap && (this.options.tap = "tap");
		this.options.useTransition || this.options.useTransform || /relative|absolute/i.test(this.scrollerStyle.position) || (this.scrollerStyle.position = "relative");
		"scale" == this.options.shrinkScrollbars && (this.options.useTransition = !1);
		this.options.invertWheelDirection = this.options.invertWheelDirection ? -1 : 1;
		this.directionY = this.directionX = this.y =
			this.x = 0;
		this._events = {};
		this._init();
		this.refresh();
		this.scrollTo(this.options.startX, this.options.startY);
		this.enable()
	}

	function u(a, b, c)
	{
		var e = q.createElement("div"),
			d = q.createElement("div");
		!0 === c && (e.style.cssText = "position:absolute;z-index:9999", d.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.9);border-radius:3px");
		d.className = "iScrollIndicator";
		"h" == a ? (!0 === c && (e.style.cssText +=
			";height:7px;left:2px;right:2px;bottom:0", d.style.height = "100%"), e.className = "iScrollHorizontalScrollbar") : (!0 === c && (e.style.cssText += ";width:7px;bottom:2px;top:2px;right:1px", d.style.width = "100%"), e.className = "iScrollVerticalScrollbar");
		e.style.cssText += ";overflow:hidden";
		b || (e.style.pointerEvents = "none");
		e.appendChild(d);
		return e
	}

	function v(a, b)
	{
		this.wrapper = "string" == typeof b.el ? q.querySelector(b.el) : b.el;
		this.wrapperStyle = this.wrapper.style;
		this.indicator = this.wrapper.children[0];
		this.indicatorStyle =
			this.indicator.style;
		this.scroller = a;
		this.options = {
			listenX: !0,
			listenY: !0,
			interactive: !1,
			resize: !0,
			defaultScrollbars: !1,
			shrink: !1,
			fade: !1,
			speedRatioX: 0,
			speedRatioY: 0
		};
		for (var c in b) this.options[c] = b[c];
		this.sizeRatioY = this.sizeRatioX = 1;
		this.maxPosY = this.maxPosX = 0;
		this.options.interactive && (this.options.disableTouch || (d.addEvent(this.indicator, "touchstart", this), d.addEvent(g, "touchend", this)), this.options.disablePointer || (d.addEvent(this.indicator, d.prefixPointerEvent("pointerdown"), this), d.addEvent(g,
			d.prefixPointerEvent("pointerup"), this)), this.options.disableMouse || (d.addEvent(this.indicator, "mousedown", this), d.addEvent(g, "mouseup", this)));
		if (this.options.fade)
		{
			this.wrapperStyle[d.style.transform] = this.scroller.translateZ;
			var e = d.style.transitionDuration;
			if (e)
			{
				this.wrapperStyle[e] = d.isBadAndroid ? "0.0001ms" : "0ms";
				var f = this;
				d.isBadAndroid && t(function ()
				{
					"0.0001ms" === f.wrapperStyle[e] && (f.wrapperStyle[e] = "0s")
				});
				this.wrapperStyle.opacity = "0"
			}
		}
	}
	var t = g.requestAnimationFrame || g.webkitRequestAnimationFrame ||
		g.mozRequestAnimationFrame || g.oRequestAnimationFrame || g.msRequestAnimationFrame || function (a)
		{
			g.setTimeout(a, 1E3 / 60)
		},
		d = function ()
		{
			function a(a)
			{
				return !1 === e ? !1 : "" === e ? a : e + a.charAt(0).toUpperCase() + a.substr(1)
			}
			var b = {},
				c = q.createElement("div").style,
				e = function ()
				{
					for (var a = ["t", "webkitT", "MozT", "msT", "OT"], b, e = 0, d = a.length; e < d; e++)
						if (b = a[e] + "ransform", b in c) return a[e].substr(0, a[e].length - 1);
					return !1
				}();
			b.getTime = Date.now || function ()
			{
				return (new Date).getTime()
			};
			b.extend = function (a, b)
			{
				for (var c in b) a[c] =
					b[c]
			};
			b.addEvent = function (a, b, c, e)
			{
				a.addEventListener(b, c, !!e)
			};
			b.removeEvent = function (a, b, c, e)
			{
				a.removeEventListener(b, c, !!e)
			};
			b.prefixPointerEvent = function (a)
			{
				return g.MSPointerEvent ? "MSPointer" + a.charAt(7).toUpperCase() + a.substr(8) : a
			};
			b.momentum = function (a, b, c, e, d, k)
			{
				b = a - b;
				c = f.abs(b) / c;
				var g;
				k = void 0 === k ? 6E-4 : k;
				g = a + c * c / (2 * k) * (0 > b ? -1 : 1);
				k = c / k;
				g < e ? (g = d ? e - d / 2.5 * (c / 8) : e, b = f.abs(g - a), k = b / c) : 0 < g && (g = d ? d / 2.5 * (c / 8) : 0, b = f.abs(a) + g, k = b / c);
				return {
					destination: f.round(g),
					duration: k
				}
			};
			var d = a("transform");
			b.extend(b,
			{
				hasTransform: !1 !== d,
				hasPerspective: a("perspective") in c,
				hasTouch: "ontouchstart" in g,
				hasPointer: !(!g.PointerEvent && !g.MSPointerEvent),
				hasTransition: a("transition") in c
			});
			b.isBadAndroid = function ()
			{
				var a = g.navigator.appVersion;
				return /Android/.test(a) && !/Chrome\/\d/.test(a) ? (a = a.match(/Safari\/(\d+.\d)/)) && "object" === typeof a && 2 <= a.length ? 535.19 > parseFloat(a[1]) : !0 : !1
			}();
			b.extend(b.style = {},
			{
				transform: d,
				transitionTimingFunction: a("transitionTimingFunction"),
				transitionDuration: a("transitionDuration"),
				transitionDelay: a("transitionDelay"),
				transformOrigin: a("transformOrigin")
			});
			b.hasClass = function (a, b)
			{
				return (new RegExp("(^|\\s)" + b + "(\\s|$)")).test(a.className)
			};
			b.addClass = function (a, c)
			{
				if (!b.hasClass(a, c))
				{
					var e = a.className.split(" ");
					e.push(c);
					a.className = e.join(" ")
				}
			};
			b.removeClass = function (a, c)
			{
				b.hasClass(a, c) && (a.className = a.className.replace(new RegExp("(^|\\s)" + c + "(\\s|$)", "g"), " "))
			};
			b.offset = function (a)
			{
				for (var b = -a.offsetLeft, c = -a.offsetTop; a = a.offsetParent;) b -= a.offsetLeft, c -= a.offsetTop;
				return {
					left: b,
					top: c
				}
			};
			b.preventDefaultException = function (a, b)
			{
				for (var c in b)
					if (b[c].test(a[c])) return !0;
				return !1
			};
			b.extend(b.eventType = {},
			{
				touchstart: 1,
				touchmove: 1,
				touchend: 1,
				mousedown: 2,
				mousemove: 2,
				mouseup: 2,
				pointerdown: 3,
				pointermove: 3,
				pointerup: 3,
				MSPointerDown: 3,
				MSPointerMove: 3,
				MSPointerUp: 3
			});
			b.extend(b.ease = {},
			{
				quadratic:
				{
					style: "cubic-bezier(0.25, 0.46, 0.45, 0.94)",
					fn: function (a)
					{
						return a * (2 - a)
					}
				},
				circular:
				{
					style: "cubic-bezier(0.1, 0.57, 0.1, 1)",
					fn: function (a)
					{
						return f.sqrt(1 - --a * a)
					}
				},
				back:
				{
					style: "cubic-bezier(0.175, 0.885, 0.32, 1.275)",
					fn: function (a)
					{
						return --a * a * (5 * a + 4) + 1
					}
				},
				bounce:
				{
					style: "",
					fn: function (a)
					{
						return (a /= 1) < 1 / 2.75 ? 7.5625 * a * a : a < 2 / 2.75 ? 7.5625 * (a -= 1.5 / 2.75) * a + .75 : a < 2.5 / 2.75 ? 7.5625 * (a -= 2.25 / 2.75) * a + .9375 : 7.5625 * (a -= 2.625 / 2.75) * a + .984375
					}
				},
				elastic:
				{
					style: "",
					fn: function (a)
					{
						return 0 === a ? 0 : 1 == a ? 1 : .4 * f.pow(2, -10 * a) * f.sin(2 * (a - .055) * f.PI / .22) + 1
					}
				}
			});
			b.tap = function (a, b)
			{
				var c = q.createEvent("Event");
				c.initEvent(b, !0, !0);
				c.pageX = a.pageX;
				c.pageY = a.pageY;
				a.target.dispatchEvent(c)
			};
			b.click = function (a)
			{
				var b = a.target,
					c;
				/(SELECT|INPUT|TEXTAREA)/i.test(b.tagName) ||
					(c = q.createEvent(g.MouseEvent ? "MouseEvents" : "Event"), c.initEvent("click", !0, !0), c.view = a.view || g, c.detail = 1, c.screenX = b.screenX || 0, c.screenY = b.screenY || 0, c.clientX = b.clientX || 0, c.clientY = b.clientY || 0, c.ctrlKey = !!a.ctrlKey, c.altKey = !!a.altKey, c.shiftKey = !!a.shiftKey, c.metaKey = !!a.metaKey, c.button = 0, c.relatedTarget = null, c._constructed = !0, b.dispatchEvent(c))
			};
			return b
		}();
	p.prototype = {
		version: "5.2.0",
		_init: function ()
		{
			this._initEvents();
			(this.options.scrollbars || this.options.indicators) && this._initIndicators();
			this.options.mouseWheel && this._initWheel();
			this.options.snap && this._initSnap();
			this.options.keyBindings && this._initKeys()
		},
		destroy: function ()
		{
			this._initEvents(!0);
			clearTimeout(this.resizeTimeout);
			this.resizeTimeout = null;
			this._execEvent("destroy")
		},
		_transitionEnd: function (a)
		{
			a.target == this.scroller && this.isInTransition && (this._transitionTime(), this.resetPosition(this.options.bounceTime) || (this.isInTransition = !1, this._execEvent("scrollEnd")))
		},
		_start: function (a)
		{
			if (!(1 != d.eventType[a.type] && 0 !== (a.which ?
					a.button : 2 > a.button ? 0 : 4 == a.button ? 1 : 2) || !this.enabled || this.initiated && d.eventType[a.type] !== this.initiated))
			{
// =====================start


			     !this.options.preventDefault || d.isBadAndroid || d.preventDefaultException(a.target, this.options.preventDefaultException)
	
	// =========================end
			  var b = a.touches ? a.touches[0] : a;
				this.initiated = d.eventType[a.type];

// ========================start

			     this.moved = !1;
			     this.directionLocked = this.directionY = this.directionX = this.distY = this.distX = 0;
	
	// ========================end
			  this.startTime = d.getTime();
				this.options.useTransition && this.isInTransition ? (this._transitionTime(),
					this.isInTransition = !1, a = this.getComputedPosition(), this._translate(f.round(a.x), f.round(a.y)), this._execEvent("scrollEnd")) : !this.options.useTransition && this.isAnimating && (this.isAnimating = !1, this._execEvent("scrollEnd"));
				this.startX = this.x;
				this.startY = this.y;
				this.absStartX = this.x;
				this.absStartY = this.y;
				this.pointX = b.pageX;
				this.pointY = b.pageY;
				this._execEvent("beforeScrollStart")
			}
		},
		_move: function (a)
		{
			if (this.enabled && d.eventType[a.type] === this.initiated)
			{
				// ===========
		//	   this.options.preventDefault && a.preventDefault();
		// ==============

				 var b = a.touches ? a.touches[0] : a,
					c = b.pageX - this.pointX,
					e = b.pageY - this.pointY,
					k = d.getTime(),
					h;
				this.pointX = b.pageX;
				this.pointY = b.pageY;
				this.distX += c;
				this.distY += e;
				b = f.abs(this.distX);
				h = f.abs(this.distY);
				if (!(300 < k - this.endTime && 10 > b && 10 > h))
				{
					this.directionLocked || this.options.freeScroll || (this.directionLocked = b > h + this.options.directionLockThreshold ? "h" : h >= b + this.options.directionLockThreshold ? "v" : "n");
					if ("h" == this.directionLocked)
					{
						if ("vertical" == this.options.eventPassthrough) a.preventDefault();
						else if ("horizontal" ==
							this.options.eventPassthrough)
						{
							this.initiated = !1;
							return
						}
						e = 0
					}
					else if ("v" == this.directionLocked)
					{
						if ("horizontal" == this.options.eventPassthrough) a.preventDefault();
						else if ("vertical" == this.options.eventPassthrough)
						{
							this.initiated = !1;
							return
						}
						c = 0
					}
					c = this.hasHorizontalScroll ? c : 0;
					e = this.hasVerticalScroll ? e : 0;
					a = this.x + c;
					b = this.y + e;
					if (0 < a || a < this.maxScrollX) a = this.options.bounce ? this.x + c / 3 : 0 < a ? 0 : this.maxScrollX;
					if (0 < b || b < this.maxScrollY) b = this.options.bounce ? this.y + e / 3 : 0 < b ? 0 : this.maxScrollY;
					this.directionX =
						0 < c ? -1 : 0 > c ? 1 : 0;
					this.directionY = 0 < e ? -1 : 0 > e ? 1 : 0;
					this.moved || this._execEvent("scrollStart");
					this.moved = !0;
					this._translate(a, b);
					300 < k - this.startTime && (this.startTime = k, this.startX = this.x, this.startY = this.y)
				}
			}
		},
		_end: function (a)
		{
			if (this.enabled && d.eventType[a.type] === this.initiated)
			{
				this.options.preventDefault && !d.preventDefaultException(a.target, this.options.preventDefaultException) && a.preventDefault();
				var b, c;
				c = d.getTime() - this.startTime;
				var e = f.round(this.x),
					k = f.round(this.y),
					h = f.abs(e - this.startX),
					g = f.abs(k - this.startY);
				b = 0;
				var l = "";
				this.initiated = this.isInTransition = 0;
				this.endTime = d.getTime();
				if (!this.resetPosition(this.options.bounceTime))
					if (this.scrollTo(e, k), this.moved)
						if (this._events.flick && 200 > c && 100 > h && 100 > g) this._execEvent("flick");
						else if (this.options.momentum && 300 > c && (b = this.hasHorizontalScroll ? d.momentum(this.x, this.startX, c, this.maxScrollX, this.options.bounce ? this.wrapperWidth : 0, this.options.deceleration) :
					{
						destination: e,
						duration: 0
					}, c = this.hasVerticalScroll ? d.momentum(this.y, this.startY,
						c, this.maxScrollY, this.options.bounce ? this.wrapperHeight : 0, this.options.deceleration) :
					{
						destination: k,
						duration: 0
					}, e = b.destination, k = c.destination, b = f.max(b.duration, c.duration), this.isInTransition = 1), this.options.snap && (this.currentPage = l = this._nearestSnap(e, k), b = this.options.snapSpeed || f.max(f.max(f.min(f.abs(e - l.x), 1E3), f.min(f.abs(k - l.y), 1E3)), 300), e = l.x, k = l.y, this.directionY = this.directionX = 0, l = this.options.bounceEasing), e != this.x || k != this.y)
				{
					if (0 < e || e < this.maxScrollX || 0 < k || k < this.maxScrollY) l =
						d.ease.quadratic;
					this.scrollTo(e, k, b, l)
				}
				else this._execEvent("scrollEnd");
				else this.options.tap && d.tap(a, this.options.tap), this.options.click && d.click(a), this._execEvent("scrollCancel")
			}
		},
		_resize: function ()
		{
			var a = this;
			clearTimeout(this.resizeTimeout);
			this.resizeTimeout = setTimeout(function ()
			{
				a.refresh()
			}, this.options.resizePolling)
		},
		resetPosition: function (a)
		{
			var b = this.x,
				c = this.y;
			!this.hasHorizontalScroll || 0 < this.x ? b = 0 : this.x < this.maxScrollX && (b = this.maxScrollX);
			!this.hasVerticalScroll || 0 < this.y ? c =
				0 : this.y < this.maxScrollY && (c = this.maxScrollY);
			if (b == this.x && c == this.y) return !1;
			this.scrollTo(b, c, a || 0, this.options.bounceEasing);
			return !0
		},
		disable: function ()
		{
			this.enabled = !1
		},
		enable: function ()
		{
			this.enabled = !0
		},
		refresh: function ()
		{
			this.wrapperWidth = this.wrapper.clientWidth;
			this.wrapperHeight = this.wrapper.clientHeight;
			this.scrollerWidth = this.scroller.offsetWidth;
			this.scrollerHeight = this.scroller.offsetHeight;
			this.maxScrollX = this.wrapperWidth - this.scrollerWidth;
			this.maxScrollY = this.wrapperHeight - this.scrollerHeight;
			this.hasHorizontalScroll = this.options.scrollX && 0 > this.maxScrollX;
			this.hasVerticalScroll = this.options.scrollY && 0 > this.maxScrollY;
			this.hasHorizontalScroll || (this.maxScrollX = 0, this.scrollerWidth = this.wrapperWidth);
			this.hasVerticalScroll || (this.maxScrollY = 0, this.scrollerHeight = this.wrapperHeight);
			this.directionY = this.directionX = this.endTime = 0;
			this.wrapperOffset = d.offset(this.wrapper);
			this._execEvent("refresh");
			this.resetPosition()
		},
		on: function (a, b)
		{
			this._events[a] || (this._events[a] = []);
			this._events[a].push(b)
		},
		off: function (a, b)
		{
			if (this._events[a])
			{
				var c = this._events[a].indexOf(b); - 1 < c && this._events[a].splice(c, 1)
			}
		},
		_execEvent: function (a)
		{
			if (this._events[a])
			{
				var b = 0,
					c = this._events[a].length;
				if (c)
					for (; b < c; b++) this._events[a][b].apply(this, [].slice.call(arguments, 1))
			}
		},
		scrollBy: function (a, b, c, e)
		{
			a = this.x + a;
			b = this.y + b;
			this.scrollTo(a, b, c || 0, e)
		},
		scrollTo: function (a, b, c, e)
		{
			e = e || d.ease.circular;
			this.isInTransition = this.options.useTransition && 0 < c;
			var f = this.options.useTransition && e.style;
			!c || f ? (f && (this._transitionTimingFunction(e.style),
				this._transitionTime(c)), this._translate(a, b)) : this._animate(a, b, c, e.fn)
		},
		scrollToElement: function (a, b, c, e, k)
		{
			if (a = a.nodeType ? a : this.scroller.querySelector(a))
			{
				var h = d.offset(a);
				h.left -= this.wrapperOffset.left;
				h.top -= this.wrapperOffset.top;
				!0 === c && (c = f.round(a.offsetWidth / 2 - this.wrapper.offsetWidth / 2));
				!0 === e && (e = f.round(a.offsetHeight / 2 - this.wrapper.offsetHeight / 2));
				h.left -= c || 0;
				h.top -= e || 0;
				h.left = 0 < h.left ? 0 : h.left < this.maxScrollX ? this.maxScrollX : h.left;
				h.top = 0 < h.top ? 0 : h.top < this.maxScrollY ? this.maxScrollY :
					h.top;
				b = void 0 === b || null === b || "auto" === b ? f.max(f.abs(this.x - h.left), f.abs(this.y - h.top)) : b;
				this.scrollTo(h.left, h.top, b, k)
			}
		},
		_transitionTime: function (a)
		{
			if (this.options.useTransition)
			{
				a = a || 0;
				var b = d.style.transitionDuration;
				if (b)
				{
					this.scrollerStyle[b] = a + "ms";
					if (!a && d.isBadAndroid)
					{
						this.scrollerStyle[b] = "0.0001ms";
						var c = this;
						t(function ()
						{
							"0.0001ms" === c.scrollerStyle[b] && (c.scrollerStyle[b] = "0s")
						})
					}
					if (this.indicators)
						for (var e = this.indicators.length; e--;) this.indicators[e].transitionTime(a)
				}
			}
		},
		_transitionTimingFunction: function (a)
		{
			this.scrollerStyle[d.style.transitionTimingFunction] =
				a;
			if (this.indicators)
				for (var b = this.indicators.length; b--;) this.indicators[b].transitionTimingFunction(a)
		},
		_translate: function (a, b)
		{
			this.options.useTransform ? this.scrollerStyle[d.style.transform] = "translate(" + a + "px," + b + "px)" + this.translateZ : (a = f.round(a), b = f.round(b), this.scrollerStyle.left = a + "px", this.scrollerStyle.top = b + "px");
			this.x = a;
			this.y = b;
			if (this.indicators)
				for (var c = this.indicators.length; c--;) this.indicators[c].updatePosition()
		},
		_initEvents: function (a)
		{
			a = a ? d.removeEvent : d.addEvent;
			var b =
				this.options.bindToWrapper ? this.wrapper : g;
			a(g, "orientationchange", this);
			a(g, "resize", this);
			this.options.click && a(this.wrapper, "click", this, !0);
			this.options.disableMouse || (a(this.wrapper, "mousedown", this), a(b, "mousemove", this), a(b, "mousecancel", this), a(b, "mouseup", this));
			d.hasPointer && !this.options.disablePointer && (a(this.wrapper, d.prefixPointerEvent("pointerdown"), this), a(b, d.prefixPointerEvent("pointermove"), this), a(b, d.prefixPointerEvent("pointercancel"), this), a(b, d.prefixPointerEvent("pointerup"),
				this));
			d.hasTouch && !this.options.disableTouch && (a(this.wrapper, "touchstart", this), a(b, "touchmove", this), a(b, "touchcancel", this), a(b, "touchend", this));
			a(this.scroller, "transitionend", this);
			a(this.scroller, "webkitTransitionEnd", this);
			a(this.scroller, "oTransitionEnd", this);
			a(this.scroller, "MSTransitionEnd", this)
		},
		getComputedPosition: function ()
		{
			var a = g.getComputedStyle(this.scroller, null),
				b;
			this.options.useTransform ? (a = a[d.style.transform].split(")")[0].split(", "), b = +(a[12] || a[4]), a = +(a[13] || a[5])) :
				(b = +a.left.replace(/[^-\d.]/g, ""), a = +a.top.replace(/[^-\d.]/g, ""));
			return {
				x: b,
				y: a
			}
		},
		_initIndicators: function ()
		{
			function a(a)
			{
				if (f.indicators)
					for (var b = f.indicators.length; b--;) a.call(f.indicators[b])
			}
			var b = this.options.interactiveScrollbars,
				c = "string" != typeof this.options.scrollbars,
				e = [],
				d, f = this;
			this.indicators = [];
			this.options.scrollbars && (this.options.scrollY && (d = {
				el: u("v", b, this.options.scrollbars),
				interactive: b,
				defaultScrollbars: !0,
				customStyle: c,
				resize: this.options.resizeScrollbars,
				shrink: this.options.shrinkScrollbars,
				fade: this.options.fadeScrollbars,
				listenX: !1
			}, this.wrapper.appendChild(d.el), e.push(d)), this.options.scrollX && (d = {
				el: u("h", b, this.options.scrollbars),
				interactive: b,
				defaultScrollbars: !0,
				customStyle: c,
				resize: this.options.resizeScrollbars,
				shrink: this.options.shrinkScrollbars,
				fade: this.options.fadeScrollbars,
				listenY: !1
			}, this.wrapper.appendChild(d.el), e.push(d)));
			this.options.indicators && (e = e.concat(this.options.indicators));
			for (b = e.length; b--;) this.indicators.push(new v(this, e[b]));
			this.options.fadeScrollbars &&
				(this.on("scrollEnd", function ()
				{
					a(function ()
					{
						this.fade()
					})
				}), this.on("scrollCancel", function ()
				{
					a(function ()
					{
						this.fade()
					})
				}), this.on("scrollStart", function ()
				{
					a(function ()
					{
						this.fade(1)
					})
				}), this.on("beforeScrollStart", function ()
				{
					a(function ()
					{
						this.fade(1, !0)
					})
				}));
			this.on("refresh", function ()
			{
				a(function ()
				{
					this.refresh()
				})
			});
			this.on("destroy", function ()
			{
				a(function ()
				{
					this.destroy()
				});
				delete this.indicators
			})
		},
		_initWheel: function ()
		{
			d.addEvent(this.wrapper, "wheel", this);
			d.addEvent(this.wrapper, "mousewheel",
				this);
			d.addEvent(this.wrapper, "DOMMouseScroll", this);
			this.on("destroy", function ()
			{
				clearTimeout(this.wheelTimeout);
				this.wheelTimeout = null;
				d.removeEvent(this.wrapper, "wheel", this);
				d.removeEvent(this.wrapper, "mousewheel", this);
				d.removeEvent(this.wrapper, "DOMMouseScroll", this)
			})
		},
		_wheel: function (a)
		{
			if (this.enabled)
			{
				var b, c, e, d = this;
				void 0 === this.wheelTimeout && d._execEvent("scrollStart");
				clearTimeout(this.wheelTimeout);
				this.wheelTimeout = setTimeout(function ()
				{
					d.options.snap || d._execEvent("scrollEnd");
					d.wheelTimeout =
						void 0
				}, 400);
				if ("deltaX" in a) 1 === a.deltaMode ? (b = -a.deltaX * this.options.mouseWheelSpeed, a = -a.deltaY * this.options.mouseWheelSpeed) : (b = -a.deltaX, a = -a.deltaY);
				else if ("wheelDeltaX" in a) b = a.wheelDeltaX / 120 * this.options.mouseWheelSpeed, a = a.wheelDeltaY / 120 * this.options.mouseWheelSpeed;
				else if ("wheelDelta" in a) b = a = a.wheelDelta / 120 * this.options.mouseWheelSpeed;
				else if ("detail" in a) b = a = -a.detail / 3 * this.options.mouseWheelSpeed;
				else return;
				b *= this.options.invertWheelDirection;
				a *= this.options.invertWheelDirection;
				this.hasVerticalScroll || (b = a, a = 0);
				this.options.snap ? (c = this.currentPage.pageX, e = this.currentPage.pageY, 0 < b ? c-- : 0 > b && c++, 0 < a ? e-- : 0 > a && e++, this.goToPage(c, e)) : (c = this.x + f.round(this.hasHorizontalScroll ? b : 0), e = this.y + f.round(this.hasVerticalScroll ? a : 0), this.directionX = 0 < b ? -1 : 0 > b ? 1 : 0, this.directionY = 0 < a ? -1 : 0 > a ? 1 : 0, 0 < c ? c = 0 : c < this.maxScrollX && (c = this.maxScrollX), 0 < e ? e = 0 : e < this.maxScrollY && (e = this.maxScrollY), this.scrollTo(c, e, 0))
			}
		},
		_initSnap: function ()
		{
			this.currentPage = {};
			"string" == typeof this.options.snap &&
				(this.options.snap = this.scroller.querySelectorAll(this.options.snap));
			this.on("refresh", function ()
			{
				var a = 0,
					b, c = 0,
					e, d, g, n = 0,
					l;
				e = this.options.snapStepX || this.wrapperWidth;
				var m = this.options.snapStepY || this.wrapperHeight;
				this.pages = [];
				if (this.wrapperWidth && this.wrapperHeight && this.scrollerWidth && this.scrollerHeight)
				{
					if (!0 === this.options.snap)
						for (d = f.round(e / 2), g = f.round(m / 2); n > -this.scrollerWidth;)
						{
							this.pages[a] = [];
							for (l = b = 0; l > -this.scrollerHeight;) this.pages[a][b] = {
								x: f.max(n, this.maxScrollX),
								y: f.max(l,
									this.maxScrollY),
								width: e,
								height: m,
								cx: n - d,
								cy: l - g
							}, l -= m, b++;
							n -= e;
							a++
						}
					else
						for (m = this.options.snap, b = m.length, e = -1; a < b; a++)
						{
							if (0 === a || m[a].offsetLeft <= m[a - 1].offsetLeft) c = 0, e++;
							this.pages[c] || (this.pages[c] = []);
							n = f.max(-m[a].offsetLeft, this.maxScrollX);
							l = f.max(-m[a].offsetTop, this.maxScrollY);
							d = n - f.round(m[a].offsetWidth / 2);
							g = l - f.round(m[a].offsetHeight / 2);
							this.pages[c][e] = {
								x: n,
								y: l,
								width: m[a].offsetWidth,
								height: m[a].offsetHeight,
								cx: d,
								cy: g
							};
							n > this.maxScrollX && c++
						}
					this.goToPage(this.currentPage.pageX ||
						0, this.currentPage.pageY || 0, 0);
					0 === this.options.snapThreshold % 1 ? this.snapThresholdY = this.snapThresholdX = this.options.snapThreshold : (this.snapThresholdX = f.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].width * this.options.snapThreshold), this.snapThresholdY = f.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].height * this.options.snapThreshold))
				}
			});
			this.on("flick", function ()
			{
				var a = this.options.snapSpeed || f.max(f.max(f.min(f.abs(this.x - this.startX), 1E3), f.min(f.abs(this.y -
					this.startY), 1E3)), 300);
				this.goToPage(this.currentPage.pageX + this.directionX, this.currentPage.pageY + this.directionY, a)
			})
		},
		_nearestSnap: function (a, b)
		{
			if (!this.pages.length) return {
				x: 0,
				y: 0,
				pageX: 0,
				pageY: 0
			};
			var c = 0,
				e = this.pages.length,
				d = 0;
			if (f.abs(a - this.absStartX) < this.snapThresholdX && f.abs(b - this.absStartY) < this.snapThresholdY) return this.currentPage;
			0 < a ? a = 0 : a < this.maxScrollX && (a = this.maxScrollX);
			0 < b ? b = 0 : b < this.maxScrollY && (b = this.maxScrollY);
			for (; c < e; c++)
				if (a >= this.pages[c][0].cx)
				{
					a = this.pages[c][0].x;
					break
				} for (e = this.pages[c].length; d < e; d++)
				if (b >= this.pages[0][d].cy)
				{
					b = this.pages[0][d].y;
					break
				} c == this.currentPage.pageX && (c += this.directionX, 0 > c ? c = 0 : c >= this.pages.length && (c = this.pages.length - 1), a = this.pages[c][0].x);
			d == this.currentPage.pageY && (d += this.directionY, 0 > d ? d = 0 : d >= this.pages[0].length && (d = this.pages[0].length - 1), b = this.pages[0][d].y);
			return {
				x: a,
				y: b,
				pageX: c,
				pageY: d
			}
		},
		goToPage: function (a, b, c, d)
		{
			d = d || this.options.bounceEasing;
			a >= this.pages.length ? a = this.pages.length - 1 : 0 > a && (a = 0);
			b >= this.pages[a].length ?
				b = this.pages[a].length - 1 : 0 > b && (b = 0);
			var g = this.pages[a][b].x,
				h = this.pages[a][b].y;
			c = void 0 === c ? this.options.snapSpeed || f.max(f.max(f.min(f.abs(g - this.x), 1E3), f.min(f.abs(h - this.y), 1E3)), 300) : c;
			this.currentPage = {
				x: g,
				y: h,
				pageX: a,
				pageY: b
			};
			this.scrollTo(g, h, c, d)
		},
		next: function (a, b)
		{
			var c = this.currentPage.pageX,
				d = this.currentPage.pageY;
			c++;
			c >= this.pages.length && this.hasVerticalScroll && (c = 0, d++);
			this.goToPage(c, d, a, b)
		},
		prev: function (a, b)
		{
			var c = this.currentPage.pageX,
				d = this.currentPage.pageY;
			c--;
			0 > c && this.hasVerticalScroll &&
				(c = 0, d--);
			this.goToPage(c, d, a, b)
		},
		_initKeys: function (a)
		{
			a = {
				pageUp: 33,
				pageDown: 34,
				end: 35,
				home: 36,
				left: 37,
				up: 38,
				right: 39,
				down: 40
			};
			var b;
			if ("object" == typeof this.options.keyBindings)
				for (b in this.options.keyBindings) "string" == typeof this.options.keyBindings[b] && (this.options.keyBindings[b] = this.options.keyBindings[b].toUpperCase().charCodeAt(0));
			else this.options.keyBindings = {};
			for (b in a) this.options.keyBindings[b] = this.options.keyBindings[b] || a[b];
			d.addEvent(g, "keydown", this);
			this.on("destroy", function ()
			{
				d.removeEvent(g,
					"keydown", this)
			})
		},
		_key: function (a)
		{
			if (this.enabled)
			{
				var b = this.options.snap,
					c = b ? this.currentPage.pageX : this.x,
					e = b ? this.currentPage.pageY : this.y,
					g = d.getTime(),
					h = this.keyTime || 0,
					n;
				this.options.useTransition && this.isInTransition && (n = this.getComputedPosition(), this._translate(f.round(n.x), f.round(n.y)), this.isInTransition = !1);
				this.keyAcceleration = 200 > g - h ? f.min(this.keyAcceleration + .25, 50) : 0;
				switch (a.keyCode)
				{
				case this.options.keyBindings.pageUp:
					this.hasHorizontalScroll && !this.hasVerticalScroll ? c += b ?
						1 : this.wrapperWidth : e += b ? 1 : this.wrapperHeight;
					break;
				case this.options.keyBindings.pageDown:
					this.hasHorizontalScroll && !this.hasVerticalScroll ? c -= b ? 1 : this.wrapperWidth : e -= b ? 1 : this.wrapperHeight;
					break;
				case this.options.keyBindings.end:
					c = b ? this.pages.length - 1 : this.maxScrollX;
					e = b ? this.pages[0].length - 1 : this.maxScrollY;
					break;
				case this.options.keyBindings.home:
					e = c = 0;
					break;
				case this.options.keyBindings.left:
					c += b ? -1 : 5 + this.keyAcceleration >> 0;
					break;
				case this.options.keyBindings.up:
					e += b ? 1 : 5 + this.keyAcceleration >>
						0;
					break;
				case this.options.keyBindings.right:
					c -= b ? -1 : 5 + this.keyAcceleration >> 0;
					break;
				case this.options.keyBindings.down:
					e -= b ? 1 : 5 + this.keyAcceleration >> 0;
					break;
				default:
					return
				}
				b ? this.goToPage(c, e) : (0 < c ? this.keyAcceleration = c = 0 : c < this.maxScrollX && (c = this.maxScrollX, this.keyAcceleration = 0), 0 < e ? this.keyAcceleration = e = 0 : e < this.maxScrollY && (e = this.maxScrollY, this.keyAcceleration = 0), this.scrollTo(c, e, 0), this.keyTime = g)
			}
		},
		_animate: function (a, b, c, e)
		{
			function f()
			{
				var r = d.getTime(),
					p;
				r >= q ? (g.isAnimating = !1, g._translate(a,
					b), g.resetPosition(g.options.bounceTime) || g._execEvent("scrollEnd")) : (r = (r - m) / c, p = e(r), r = (a - n) * p + n, p = (b - l) * p + l, g._translate(r, p), g.isAnimating && t(f))
			}
			var g = this,
				n = this.x,
				l = this.y,
				m = d.getTime(),
				q = m + c;
			this.isAnimating = !0;
			f()
		},
		handleEvent: function (a)
		{
			switch (a.type)
			{
			case "touchstart":
			case "pointerdown":
			case "MSPointerDown":
			case "mousedown":
				this._start(a);
				break;
			case "touchmove":
			case "pointermove":
			case "MSPointerMove":
			case "mousemove":
				this._move(a);
				break;
			case "touchend":
			case "pointerup":
			case "MSPointerUp":
			case "mouseup":
			case "touchcancel":
			case "pointercancel":
			case "MSPointerCancel":
			case "mousecancel":
				this._end(a);
				break;
			case "orientationchange":
			case "resize":
				this._resize();
				break;
			case "transitionend":
			case "webkitTransitionEnd":
			case "oTransitionEnd":
			case "MSTransitionEnd":
				this._transitionEnd(a);
				break;
			case "wheel":
			case "DOMMouseScroll":
			case "mousewheel":
				this._wheel(a);
				break;
			case "keydown":
				this._key(a);
				break;
			case "click":
				this.enabled && !a._constructed && (a.preventDefault(), a.stopPropagation())
			}
		}
	};
	v.prototype = {
		handleEvent: function (a)
		{
			switch (a.type)
			{
			case "touchstart":
			case "pointerdown":
			case "MSPointerDown":
		  //   case "mousedown":
		  //       this._start(a);
		  //       break;
			case "touchmove":
			case "pointermove":
			case "MSPointerMove":
			case "mousemove":
				this._move(a);
				break;
			case "touchend":
			case "pointerup":
			case "MSPointerUp": 	
			case "mouseup":
			case "touchcancel":
			case "pointercancel":
			case "MSPointerCancel":
			case "mousecancel":
				this._end(a)
			}
		},
		destroy: function ()
		{
			this.options.fadeScrollbars && (clearTimeout(this.fadeTimeout), this.fadeTimeout = null);
			this.options.interactive && (d.removeEvent(this.indicator, "touchstart", this), d.removeEvent(this.indicator, d.prefixPointerEvent("pointerdown"),
				this), d.removeEvent(this.indicator, "mousedown", this), d.removeEvent(g, "touchmove", this), d.removeEvent(g, d.prefixPointerEvent("pointermove"), this), d.removeEvent(g, "mousemove", this), d.removeEvent(g, "touchend", this), d.removeEvent(g, d.prefixPointerEvent("pointerup"), this), d.removeEvent(g, "mouseup", this));
			this.options.defaultScrollbars && this.wrapper.parentNode.removeChild(this.wrapper)
		},
		_start: function (a)
		{
		    var b = a.touches ? a.touches[0] : a;
		    a.preventDefault();
		    a.stopPropagation();
		    this.transitionTime();
		    this.initiated = !0;
		    this.moved = !1;
		    this.lastPointX = b.pageX;
		    this.lastPointY = b.pageY;
		    this.startTime = d.getTime();
		    this.options.disableTouch || d.addEvent(g, "touchmove", this);
		    this.options.disablePointer || d.addEvent(g, d.prefixPointerEvent("pointermove"), this);
		    this.options.disableMouse || d.addEvent(g, "mousemove", this);
		    this.scroller._execEvent("beforeScrollStart")
		},
		_move: function (a)
		{
			var b = a.touches ? a.touches[0] : a,
				c, e;
			d.getTime();
			this.moved || this.scroller._execEvent("scrollStart");
			this.moved = !0;
			c = b.pageX - this.lastPointX;
			this.lastPointX =
				b.pageX;
			e = b.pageY - this.lastPointY;
			this.lastPointY = b.pageY;
			this._pos(this.x + c, this.y + e);
			a.preventDefault();
			a.stopPropagation()
		},
		_end: function (a)
		{
			if (this.initiated)
			{
				this.initiated = !1;
				a.preventDefault();
				a.stopPropagation();
				d.removeEvent(g, "touchmove", this);
				d.removeEvent(g, d.prefixPointerEvent("pointermove"), this);
				d.removeEvent(g, "mousemove", this);
				if (this.scroller.options.snap)
				{
					a = this.scroller._nearestSnap(this.scroller.x, this.scroller.y);
					var b = this.options.snapSpeed || f.max(f.max(f.min(f.abs(this.scroller.x -
						a.x), 1E3), f.min(f.abs(this.scroller.y - a.y), 1E3)), 300);
					if (this.scroller.x != a.x || this.scroller.y != a.y) this.scroller.directionX = 0, this.scroller.directionY = 0, this.scroller.currentPage = a, this.scroller.scrollTo(a.x, a.y, b, this.scroller.options.bounceEasing)
				}
				this.moved && this.scroller._execEvent("scrollEnd")
			}
		},
		transitionTime: function (a)
		{
			a = a || 0;
			var b = d.style.transitionDuration;
			if (b && (this.indicatorStyle[b] = a + "ms", !a && d.isBadAndroid))
			{
				this.indicatorStyle[b] = "0.0001ms";
				var c = this;
				t(function ()
				{
					"0.0001ms" === c.indicatorStyle[b] &&
						(c.indicatorStyle[b] = "0s")
				})
			}
		},
		transitionTimingFunction: function (a)
		{
			this.indicatorStyle[d.style.transitionTimingFunction] = a
		},
		refresh: function ()
		{
			this.transitionTime();
			this.indicatorStyle.display = this.options.listenX && !this.options.listenY ? this.scroller.hasHorizontalScroll ? "block" : "none" : this.options.listenY && !this.options.listenX ? this.scroller.hasVerticalScroll ? "block" : "none" : this.scroller.hasHorizontalScroll || this.scroller.hasVerticalScroll ? "block" : "none";
			this.scroller.hasHorizontalScroll && this.scroller.hasVerticalScroll ?
				(d.addClass(this.wrapper, "iScrollBothScrollbars"), d.removeClass(this.wrapper, "iScrollLoneScrollbar"), this.options.defaultScrollbars && this.options.customStyle && (this.options.listenX ? this.wrapper.style.right = "8px" : this.wrapper.style.bottom = "8px")) : (d.removeClass(this.wrapper, "iScrollBothScrollbars"), d.addClass(this.wrapper, "iScrollLoneScrollbar"), this.options.defaultScrollbars && this.options.customStyle && (this.options.listenX ? this.wrapper.style.right = "2px" : this.wrapper.style.bottom = "2px"));
			this.options.listenX &&
				(this.wrapperWidth = this.wrapper.clientWidth, this.options.resize ? (this.indicatorWidth = f.max(f.round(this.wrapperWidth * this.wrapperWidth / (this.scroller.scrollerWidth || this.wrapperWidth || 1)), 8), this.indicatorStyle.width = this.indicatorWidth + "px") : this.indicatorWidth = this.indicator.clientWidth, this.maxPosX = this.wrapperWidth - this.indicatorWidth, "clip" == this.options.shrink ? (this.minBoundaryX = -this.indicatorWidth + 8, this.maxBoundaryX = this.wrapperWidth - 8) : (this.minBoundaryX = 0, this.maxBoundaryX = this.maxPosX),
					this.sizeRatioX = this.options.speedRatioX || this.scroller.maxScrollX && this.maxPosX / this.scroller.maxScrollX);
			this.options.listenY && (this.wrapperHeight = this.wrapper.clientHeight, this.options.resize ? (this.indicatorHeight = f.max(f.round(this.wrapperHeight * this.wrapperHeight / (this.scroller.scrollerHeight || this.wrapperHeight || 1)), 8), this.indicatorStyle.height = this.indicatorHeight + "px") : this.indicatorHeight = this.indicator.clientHeight, this.maxPosY = this.wrapperHeight - this.indicatorHeight, "clip" == this.options.shrink ?
				(this.minBoundaryY = -this.indicatorHeight + 8, this.maxBoundaryY = this.wrapperHeight - 8) : (this.minBoundaryY = 0, this.maxBoundaryY = this.maxPosY), this.maxPosY = this.wrapperHeight - this.indicatorHeight, this.sizeRatioY = this.options.speedRatioY || this.scroller.maxScrollY && this.maxPosY / this.scroller.maxScrollY);
			this.updatePosition()
		},
		updatePosition: function ()
		{
			var a = this.options.listenX && f.round(this.sizeRatioX * this.scroller.x) || 0,
				b = this.options.listenY && f.round(this.sizeRatioY * this.scroller.y) || 0;
			this.options.ignoreBoundaries ||
				(a < this.minBoundaryX ? ("scale" == this.options.shrink && (this.width = f.max(this.indicatorWidth + a, 8), this.indicatorStyle.width = this.width + "px"), a = this.minBoundaryX) : a > this.maxBoundaryX ? "scale" == this.options.shrink ? (this.width = f.max(this.indicatorWidth - (a - this.maxPosX), 8), this.indicatorStyle.width = this.width + "px", a = this.maxPosX + this.indicatorWidth - this.width) : a = this.maxBoundaryX : "scale" == this.options.shrink && this.width != this.indicatorWidth && (this.width = this.indicatorWidth, this.indicatorStyle.width = this.width +
					"px"), b < this.minBoundaryY ? ("scale" == this.options.shrink && (this.height = f.max(this.indicatorHeight + 3 * b, 8), this.indicatorStyle.height = this.height + "px"), b = this.minBoundaryY) : b > this.maxBoundaryY ? "scale" == this.options.shrink ? (this.height = f.max(this.indicatorHeight - 3 * (b - this.maxPosY), 8), this.indicatorStyle.height = this.height + "px", b = this.maxPosY + this.indicatorHeight - this.height) : b = this.maxBoundaryY : "scale" == this.options.shrink && this.height != this.indicatorHeight && (this.height = this.indicatorHeight, this.indicatorStyle.height =
					this.height + "px"));
			this.x = a;
			this.y = b;
			this.scroller.options.useTransform ? this.indicatorStyle[d.style.transform] = "translate(" + a + "px," + b + "px)" + this.scroller.translateZ : (this.indicatorStyle.left = a + "px", this.indicatorStyle.top = b + "px")
		},
		_pos: function (a, b)
		{
			0 > a ? a = 0 : a > this.maxPosX && (a = this.maxPosX);
			0 > b ? b = 0 : b > this.maxPosY && (b = this.maxPosY);
			a = this.options.listenX ? f.round(a / this.sizeRatioX) : this.scroller.x;
			b = this.options.listenY ? f.round(b / this.sizeRatioY) : this.scroller.y;
			this.scroller.scrollTo(a, b)
		},
		fade: function (a,
			b)
		{
			if (!b || this.visible)
			{
				clearTimeout(this.fadeTimeout);
				this.fadeTimeout = null;
				var c = a ? 0 : 300;
				this.wrapperStyle[d.style.transitionDuration] = (a ? 250 : 500) + "ms";
				this.fadeTimeout = setTimeout(function (a)
				{
					this.wrapperStyle.opacity = a;
					this.visible = +a
				}.bind(this, a ? "1" : "0"), c)
			}
		}
	};
	p.utils = d;
	"undefined" != typeof module && module.exports ? module.exports = p : "function" == typeof define && define.amd ? define(function ()
	{
		return p
	}) : g.IScroll = p
})(window, document, Math);


//  ============================================== end-script-1 ===============================================

// ============================================== script 2 ====================================================


/*!
* fullPage 2.9.4 - Extensions 0.0.8
* https://github.com/alvarotrigo/fullPage.js
* @license http://alvarotrigo.com/fullPage/extensions/#license
*
* Copyright (C) 2015 alvarotrigo.com - A project by Alvaro Trigo
*/
! function (e, n)
{
  "use strict";
  "function" == typeof define && define.amd ? define(["jquery"], function (t)
  {
	  return n(t, e, e.document, e.Math)
  }) : "object" == typeof exports && exports ? module.exports = n(require("jquery"), e, e.document, e.Math) : n(jQuery, e, e.document, e.Math)
}("undefined" != typeof window ? window : this, function (e, n, t, o, i)
{
  "use strict";
  var r = "fullpage-wrapper",
	  a = "." + r,
	  l = "fp-scrollable",
	  s = "." + l,
	  c = "fp-responsive",
	  d = "fp-notransition",
	  f = "fp-destroyed",
	  u = "fp-enabled",
	  h = "fp-viewing",
	  p = "active",
	  v = "." + p,
	  g = "fp-completely",
	  m = "." + g,
	  S = ".section",
	  w = "fp-section",
	  y = "." + w,
	  b = y + v,
	  x = y + ":first",
	  C = y + ":last",
	  A = "fp-tableCell",
	  T = "." + A,
	  I = "fp-auto-height",
	  k = "fp-normal-scroll",
	  L = "fp-nav",
	  M = "#" + L,
	  O = "fp-tooltip",
	  E = "." + O,
	  R = "fp-show-active",
	  H = ".slide",
	  z = "fp-slide",
	  B = "." + z,
	  D = B + v,
	  P = "fp-slides",
	  F = "." + P,
	  V = "fp-slidesContainer",
	  W = "." + V,
	  j = "fp-table",
	  Z = "fp-slidesNav",
	  Y = "." + Z,
	  N = Y + " a",
	  q = "fp-controlArrow",
	  U = "." + q,
	  G = "fp-prev",
	  X = "." + G,
	  Q = q + " " + G,
	  _ = U + X,
	  K = "fp-next",
	  J = "." + K,
	  $ = q + " " + K,
	  ee = U + J,
	  ne = e(n),
	  te = e(t),
	  oe = {
		  scrollbars: !0,
		  mouseWheel: !0,
		  hideScrollbars: !1,
		  fadeScrollbars: !1,
		  disableMouse: !0,
		  interactiveScrollbars: !0
	  };
  e.fn.fullpage = function (l)
  {
	  function s(n, t)
	  {
		  n || ct(0), wt("autoScrolling", n, t);
		  var o = e(b);
		  l.autoScrolling && !l.scrollBar ? (xt.css(
		  {
			  overflow: "hidden",
			  height: "100%"
		  }), q(Gt.recordHistory, "internal"), Rt.css(
		  {
			  "-ms-touch-action": "none",
			  "touch-action": "none"
		  }), o.length && ct(o.position().top)) : (xt.css(
		  {
			  overflow: "visible",
			  height: "initial"
		  }), q(!1, "internal"), Rt.css(
		  {
			  "-ms-touch-action": "",
			  "touch-action": ""
		  }), pt(Rt), o.length && xt.scrollTop(o.position().top)), Rt.trigger("setAutoScrolling", [n])
	  }

	  function q(e, n)
	  {
		  wt("recordHistory", e, n)
	  }

	  function X(e, n)
	  {
		  "internal" !== n && l.fadingEffect && At.fadingEffect && At.fadingEffect.update(e), wt("scrollingSpeed", e, n)
	  }

	  function K(e, n)
	  {
		  wt("fitToSection", e, n)
	  }

	  function J(e)
	  {
		  l.lockAnchors = e
	  }

	  function re(e)
	  {
		  e ? (nt(), tt()) : (et(), ot())
	  }

	  function ae(n, t)
	  {
		  "undefined" != typeof t ? (t = t.replace(/ /g, "").split(","), e.each(t, function (e, t)
		  {
			  ft(n, t, "m")
		  })) : n ? (re(!0), it()) : (re(!1), rt())
	  }

	  function le(n, t)
	  {
		  "undefined" != typeof t ? (t = t.replace(/ /g, "").split(","), e.each(t, function (e, t)
		  {
			  ft(n, t, "k")
		  })) : l.keyboardScrolling = n
	  }

	  function se()
	  {
		  var n = e(b).prev(y);
		  n.length || !l.loopTop && !l.continuousVertical || (n = e(y).last()), n.length && _e(n, null, !0)
	  }

	  function ce()
	  {
		  var n = e(b).next(y);
		  n.length || !l.loopBottom && !l.continuousVertical || (n = e(y).first()), n.length && _e(n, null, !1)
	  }

	  function de(e, n)
	  {
		  X(0, "internal"), fe(e, n), X(Gt.scrollingSpeed, "internal")
	  }

	  function fe(e, n)
	  {
		  var t = Nn(e);
		  "undefined" != typeof n ? Un(e, n) : t.length > 0 && _e(t)
	  }

	  function ue(e)
	  {
		  Ge("right", e)
	  }

	  function he(e)
	  {
		  Ge("left", e)
	  }

	  function pe(n)
	  {
		  if (!Rt.hasClass(f))
		  {
			  zt = !0, Ht = ne.height(), e(y).each(function ()
			  {
				  var n = e(this).find(F),
					  t = e(this).find(B);
				  l.verticalCentered && e(this).find(T).css("height", Zn(e(this)) + "px"), e(this).css("height", Ce(e(this)) + "px"), l.scrollOverflow && (t.length ? t.each(function ()
				  {
					  Wn(e(this))
				  }) : Wn(e(this))), t.length > 1 && In(n, n.find(D))
			  });
			  var t = e(b),
				  o = t.index(y);
			  o && de(o + 1), zt = !1, e.isFunction(l.afterResize) && n && l.afterResize.call(Rt), e.isFunction(l.afterReBuild) && !n && l.afterReBuild.call(Rt)
		  }
	  }

	  function ve(n)
	  {
		  var t = Ct.hasClass(c);
		  n ? t || (s(!1, "internal"), K(!1, "internal"), e(M).hide(), Ct.addClass(c), e.isFunction(l.afterResponsive) && l.afterResponsive.call(Rt, n), l.responsiveSlides && At.responsiveSlides && At.responsiveSlides.toSections(), Rt.trigger("afterResponsive", [n])) : t && (s(Gt.autoScrolling, "internal"), K(Gt.autoScrolling, "internal"), e(M).show(), Ct.removeClass(c), e.isFunction(l.afterResponsive) && l.afterResponsive.call(Rt, n), l.responsiveSlides && At.responsiveSlides && At.responsiveSlides.toSlides(), Rt.trigger("afterResponsive", [n]))
	  }

	  function ge()
	  {
		  return {
			  options: l,
			  internals:
			  {
				  canScroll: Dt,
				  isScrollAllowed: Ft,
				  getDestinationPosition: Qe,
				  isTouch: Et,
				  c: un,
				  getXmovement: Vn,
				  removeAnimation: zn,
				  getTransforms: dt,
				  lazyLoad: on,
				  addAnimation: Hn,
				  performHorizontalMove: Mn,
				  landscapeScroll: In,
				  silentLandscapeScroll: st,
				  keepSlidesPosition: Xe,
				  silentScroll: ct,
				  styleSlides: xe,
				  scrollHandler: Be,
				  getEventsPage: lt,
				  getMSPointer: at,
				  isReallyTouch: Ye,
				  checkParentForNormalScrollElement: Ze,
				  usingExtension: vt,
				  toggleControlArrows: kn
			  }
		  }
	  }

	  function me()
	  {
		  l.css3 && (l.css3 = $n()), l.scrollBar = l.scrollBar || l.hybrid, ye(), be(), ae(!0), s(l.autoScrolling, "internal"), Rn(), Jn(), "complete" === t.readyState && hn(), ne.on("load", hn)
	  }

	  function Se()
	  {
		  ne.on("scroll", Be).on("hashchange", pn).blur(bn).resize(En), te.keydown(vn).keyup(mn).on("click touchstart", M + " a", xn).on("click touchstart", N, Cn).on("click", E, gn), e(y).on("click touchstart", U, yn), l.normalScrollElements && (te.on("mouseenter", l.normalScrollElements, function ()
		  {
			  re(!1)
		  }), te.on("mouseleave", l.normalScrollElements, function ()
		  {
			  re(!0)
		  }))
	  }

	  function we(e)
	  {
		  var t = "fp_" + e + "Extension";
		  Xt[e] = l[e + "Key"], At[e] = "undefined" != typeof n[t] ? new n[t] : null, At[e] && At[e].c(e)
	  }

	  function ye()
	  {
		  var n = Rt.find(l.sectionSelector);
		  l.anchors.length || (l.anchors = n.filter("[data-anchor]").map(function ()
		  {
			  return e(this).data("anchor").toString()
		  }).get()), l.navigationTooltips.length || (l.navigationTooltips = n.filter("[data-tooltip]").map(function ()
		  {
			  return e(this).data("tooltip").toString()
		  }).get())
	  }

	  function be()
	  {
		  Rt.css(
		  {
			  height: "100%",
			  position: "relative"
		  }), Rt.addClass(r), e("html").addClass(u), Ht = ne.height(), Rt.removeClass(f), Ie(), gt("parallax", "init"), e(y).each(function (n)
		  {
			  var t = e(this),
				  o = t.find(B),
				  i = o.length;
			  Ae(t, n), Te(t, n), i > 0 ? xe(t, o, i) : l.verticalCentered && jn(t)
		  }), l.fixedElements && l.css3 && e(l.fixedElements).appendTo(Ct), l.navigation && Le(), Oe(), l.fadingEffect && At.fadingEffect && At.fadingEffect.apply(), l.scrollOverflow ? ("complete" === t.readyState && Me(), ne.on("load", Me)) : He()
	  }

	  function xe(n, t, o)
	  {
		  var i = 100 * o,
			  r = 100 / o;
		  t.wrapAll('<div class="' + V + '" />'), t.parent().wrap('<div class="' + P + '" />'), n.find(W).css("width", i + "%"), o > 1 && (l.controlArrows && ke(n), l.slidesNavigation && Xn(n, o)), t.each(function (n)
		  {
			  e(this).css("width", r + "%"), l.verticalCentered && jn(e(this))
		  });
		  var a = n.find(D);
		  a.length && (0 !== e(b).index(y) || 0 === e(b).index(y) && 0 !== a.index()) ? st(a, "internal") : t.eq(0).addClass(p)
	  }

	  function Ce(e)
	  {
		  return l.offsetSections && At.offsetSections ? At.offsetSections.getWindowHeight(e) : Ht
	  }

	  function Ae(n, t)
	  {
		  t || 0 !== e(b).length || n.addClass(p), Lt = e(b), n.css("height", Ce(n) + "px"), l.paddingTop && n.css("padding-top", l.paddingTop), l.paddingBottom && n.css("padding-bottom", l.paddingBottom), "undefined" != typeof l.sectionsColor[t] && n.css("background-color", l.sectionsColor[t]), "undefined" != typeof l.anchors[t] && n.attr("data-anchor", l.anchors[t])
	  
	  }

	  function Te(n, t)
	  {
		  "undefined" != typeof l.anchors[t] && n.hasClass(p) && Pn(l.anchors[t], t), l.menu && l.css3 && e(l.menu).closest(a).length && e(l.menu).appendTo(Ct)
	  }

	  function Ie()
	  {
		  Rt.find(l.sectionSelector).addClass(w), Rt.find(l.slideSelector).addClass(z)
	  }

	  function ke(e)
	  {
		  e.find(F).after('<div class="' + Q + '"></div><div class="' + $ + '"></div>'), "#fff" != l.controlArrowColor && (e.find(ee).css("border-color", "transparent transparent transparent " + l.controlArrowColor), e.find(_).css("border-color", "transparent " + l.controlArrowColor + " transparent transparent")), l.loopHorizontal || e.find(_).hide()
	  }

	  function Le()
	  {
		  Ct.append('<div id="' + L + '"><ul></ul></div>');
		  var n = e(M);
		  n.addClass(function ()
		  {
			  return l.showActiveTooltip ? R + " " + l.navigationPosition : l.navigationPosition
		  });
		  for (var t = 0; t < e(y).length; t++)
		  {
			  var o = "";
			  l.anchors.length && (o = l.anchors[t]);
			  var i = '<li><a href="#' + o + '"><span></span></a>',
				  r = l.navigationTooltips[t];
			  "undefined" != typeof r && "" !== r && (i += '<div class="' + O + " " + l.navigationPosition + '">' + r + "</div>"), i += "</li>", n.find("ul").append(i)
		  }
		  e(M).css("margin-top", "-" + e(M).height() / 2 + "px"), e(M).find("li").eq(e(b).index(y)).find("a").addClass(p)
	  }

	  function Me()
	  {
		  e(y).each(function ()
		  {
			  var n = e(this).find(B);
			  n.length ? n.each(function ()
			  {
				  Wn(e(this))
			  }) : Wn(e(this))
		  }), He()
	  }

	  function Oe()
	  {
		  Rt.find('iframe[src*="youtube.com/embed/"]').each(function ()
		  {
			  Ee(e(this), "enablejsapi=1")
		  })
	  }

	  function Ee(e, n)
	  {
		  var t = e.attr("src");
		  e.attr("src", t + Re(t) + n)
	  }

	  function Re(e)
	  {
		  return /\?/.test(e) ? "&" : "?"
	  }

	  function He()
	  {
		  var n = e(b);
		  n.addClass(g), l.scrollOverflowHandler.afterRender && l.scrollOverflowHandler.afterRender(n), on(n), rn(n), l.scrollOverflowHandler.afterLoad(), ze() && e.isFunction(l.afterLoad) && l.afterLoad.call(n, n.data("anchor"), n.index(y) + 1), e.isFunction(l.afterRender) && l.afterRender.call(Rt)
	  }

	  function ze()
	  {
		  var e = n.location.hash.replace("#", "").split("/"),
			  t = Nn(decodeURIComponent(e[0]));
		  return !t.length || t.length && t.index() === Lt.index()
	  }

	  function Be()
	  {
		  to || (requestAnimationFrame(De), to = !0)
	  }

	  function De()
	  {
		  Rt.trigger("onScroll");
		  var n;
		  if ((!l.autoScrolling || l.scrollBar || vt("dragAndMove")) && !St())
		  {
			  var i = vt("dragAndMove") ? o.abs(At.dragAndMove.getCurrentScroll()) : ne.scrollTop(),
				  r = (Fe(i), 0),
				  a = i + ne.height() / 2,
				  s = vt("dragAndMove") ? At.dragAndMove.getDocumentHeight() : Ct.height() - ne.height(),
				  c = s === i,
				  d = t.querySelectorAll(y);
			  if (c) r = d.length - 1;
			  else if (i)
				  for (var f = 0; f < d.length; ++f)
				  {
					  var u = d[f];
					  u.offsetTop <= a && (r = f)
				  }
			  else r = 0;
			  if (n = e(d).eq(r), !n.hasClass(p))
			  {
				  Qt = !0;
				  var h, v, g = e(b),
					  m = g.index(y) + 1,
					  S = Fn(n),
					  w = n.data("anchor"),
					  x = n.index(y) + 1,
					  C = n.find(D);
				  C.length && (v = C.data("anchor"), h = C.index()), Dt && (n.addClass(p).siblings().removeClass(p), gt("parallax", "afterLoad"), e.isFunction(l.onLeave) && l.onLeave.call(g, m, x, S), e.isFunction(l.afterLoad) && l.afterLoad.call(n, w, x), l.resetSliders && At.resetSliders && At.resetSliders.apply(
				  {
					  localIsResizing: zt,
					  leavingSection: m
				  }), ln(g), on(n), rn(n), Pn(w, x - 1), l.anchors.length && (Tt = w), Qn(h, v, w, x)), clearTimeout(Zt), Zt = setTimeout(function ()
				  {
					  Qt = !1
				  }, 100)
			  }
			  l.fitToSection && (clearTimeout(Yt), Yt = setTimeout(function ()
			  {
				  l.fitToSection && Pe()
			  }, l.fitToSectionDelay))
		  }
		  to = !1
	  }

	  function Pe()
	  {
		  Dt && (zt = !0, _e(e(b)), zt = !1)
	  }

	  function Fe(e)
	  {
		  var n = e > _t ? "down" : "up";
		  return _t = e, oo = e, n
	  }

	  function Ve(e, n)
	  {
		  if (Ft.m[e])
		  {
			  var t = "down" === e ? "bottom" : "top",
				  o = "down" === e ? ce : se;
			  if (At.scrollHorizontally && (o = At.scrollHorizontally.getScrollSection(e, o)), n.length > 0)
			  {
				  if (!l.scrollOverflowHandler.isScrolled(t, n)) return !0;
				  o()
			  }
			  else o()
		  }
	  }

	  function We(e)
	  {
		  var n = e.originalEvent;
		  !Ze(e.target) && l.autoScrolling && Ye(n) && e.preventDefault()
	  }

	  function je(n)
	  {
		  var t = n.originalEvent,
			  i = e(t.target).closest(y);
		  if (!Ze(n.target) && Ye(t))
		  {
			  l.autoScrolling && n.preventDefault();
			  var r = l.scrollOverflowHandler.scrollable(i),
				  a = lt(t);
			  $t = a.y, eo = a.x, i.find(F).length && o.abs(Jt - eo) > o.abs(Kt - $t) ? !Mt && o.abs(Jt - eo) > ne.outerWidth() / 100 * l.touchSensitivity && (Jt > eo ? Ft.m.right && ue(i) : Ft.m.left && he(i)) : l.autoScrolling && Dt && o.abs(Kt - $t) > ne.height() / 100 * l.touchSensitivity && (Kt > $t ? Ve("down", r) : $t > Kt && Ve("up", r))
		  }
	  }

	  function Ze(n, t)
	  {
		  t = t || 0;
		  var o = e(n).parent();
		  return !!(t < l.normalScrollElementTouchThreshold && o.is(l.normalScrollElements)) || t != l.normalScrollElementTouchThreshold && Ze(o, ++t)
	  }

	  function Ye(e)
	  {
		  return "undefined" == typeof e.pointerType || "mouse" != e.pointerType
	  }

	  function Ne(e)
	  {
		  var n = e.originalEvent;
		  if (l.fitToSection && xt.stop(), Ye(n))
		  {
			  var t = lt(n);
			  Kt = t.y, Jt = t.x
		  }
	  }

	  function qe(e, n)
	  {
		  for (var t = 0, i = e.slice(o.max(e.length - n, 1)), r = 0; r < i.length; r++) t += i[r];
		  return o.ceil(t / n)
	  }

	  function Ue(t)
	  {
		  var i = (new Date).getTime(),
			  r = e(m).hasClass(k);
		  if (l.autoScrolling && !kt && !r)
		  {
			  t = t || n.event;
			  var a = t.wheelDelta || -t.deltaY || -t.detail,
				  s = o.max(-1, o.min(1, a)),
				  c = "undefined" != typeof t.wheelDeltaX || "undefined" != typeof t.deltaX,
				  d = o.abs(t.wheelDeltaX) < o.abs(t.wheelDelta) || o.abs(t.deltaX) < o.abs(t.deltaY) || !c;
			  Pt.length > 149 && Pt.shift(), Pt.push(o.abs(a)), l.scrollBar && (t.preventDefault ? t.preventDefault() : t.returnValue = !1);
			  var f = e(b),
				  u = l.scrollOverflowHandler.scrollable(f),
				  h = i - no;
			  if (no = i, h > 200 && (Pt = []), Dt && !mt())
			  {
				  var p = qe(Pt, 10),
					  v = qe(Pt, 70),
					  g = p >= v;
				  g && d && (s < 0 ? Ve("down", u) : Ve("up", u))
			  }
			  return !1
		  }
		  l.fitToSection && xt.stop()
	  }

	  function Ge(n, t)
	  {
		  var o = "undefined" == typeof t ? e(b) : t,
			  i = o.find(F);
		  if (!(!i.length || mt() || Mt || i.find(B).length < 2))
		  {
			  var r = i.find(D),
				  a = null;
			  if (a = "left" === n ? r.prev(B) : r.next(B), !a.length)
			  {
				  if (!l.loopHorizontal) return;
				  a = "left" === n ? r.siblings(":last") : r.siblings(":first")
			  }
			  Mt = !0, In(i, a, n)
		  }
	  }

	  function Xe()
	  {
		  e(D).each(function ()
		  {
			  st(e(this), "internal")
		  })
	  }

	  function Qe(e)
	  {
		  var n = e.position(),
			  t = n.top,
			  o = vt("dragAndMove") && At.dragAndMove.isGrabbing ? At.dragAndMove.isScrollingDown() : n.top > oo,
			  i = t - Ht + e.outerHeight(),
			  r = l.bigSectionsDestination;
		  return e.outerHeight() > Ht ? (o || r) && "bottom" !== r || (t = i) : (o || zt && e.is(":last-child")) && (t = i), l.offsetSections && At.offsetSections && (t = At.offsetSections.getSectionPosition(o, t, e)), oo = t, t
	  }

	  function _e(n, t, o)
	  {
		  if ("undefined" != typeof n && n.length)
		  {
			  var i, r, a = Qe(n),
				  s = {
					  element: n,
					  callback: t,
					  isMovementUp: o,
					  dtop: a,
					  yMovement: Fn(n),
					  anchorLink: n.data("anchor"),
					  sectionIndex: n.index(y),
					  activeSlide: n.find(D),
					  activeSection: e(b),
					  leavingSection: e(b).index(y) + 1,
					  localIsResizing: zt
				  };
			  s.activeSection.is(n) && !zt || l.scrollBar && ne.scrollTop() === s.dtop && !n.hasClass(I) || (s.activeSlide.length && (i = s.activeSlide.data("anchor"), r = s.activeSlide.index()), gt("parallax", "apply", s), l.autoScrolling && l.continuousVertical && "undefined" != typeof s.isMovementUp && (!s.isMovementUp && "up" == s.yMovement || s.isMovementUp && "down" == s.yMovement) && (s = $e(s)), e.isFunction(l.onLeave) && !s.localIsResizing && l.onLeave.call(s.activeSection, s.leavingSection, s.sectionIndex + 1, s.yMovement) === !1 || (vt("scrollOverflowReset") && At.scrollOverflowReset.setPrevious(s.activeSection), s.localIsResizing || ln(s.activeSection), l.scrollOverflowHandler.beforeLeave(), n.addClass(p).siblings().removeClass(p), on(n), l.scrollOverflowHandler.onLeave(), Dt = !1, Qn(r, i, s.anchorLink, s.sectionIndex), Ke(s), Tt = s.anchorLink, Pn(s.anchorLink, s.sectionIndex)))
		  }
	  }

	  function Ke(n)
	  {
		  if (l.css3 && l.autoScrolling && !l.scrollBar)
		  {
			  var t = "translate3d(0px, -" + o.round(n.dtop) + "px, 0px)";
			  Yn(t, !0), l.scrollingSpeed ? (clearTimeout(Wt), Wt = setTimeout(function ()
			  {
				  nn(n)
			  }, l.scrollingSpeed)) : nn(n)
		  }
		  else
		  {
			  var i = Je(n);
			  e(i.element).animate(i.options, l.scrollingSpeed, l.easing).promise().done(function ()
			  {
				  l.scrollBar ? setTimeout(function ()
				  {
					  nn(n)
				  }, 30) : nn(n)
			  })
		  }
	  }

	  function Je(e)
	  {
		  var n = {};
		  return l.autoScrolling && !l.scrollBar ? (n.options = {
			  top: -e.dtop
		  }, n.element = a) : (n.options = {
			  scrollTop: e.dtop
		  }, n.element = "html, body"), n
	  }

	  function $e(n)
	  {
		  return n.isMovementUp ? n.activeSection.before(n.activeSection.nextAll(y)) : n.activeSection.after(n.activeSection.prevAll(y).get().reverse()), ct(e(b).position().top), Xe(), n.wrapAroundElements = n.activeSection, n.dtop = n.element.position().top, n.yMovement = Fn(n.element), n.leavingSection = n.activeSection.index(y) + 1, n.sectionIndex = n.element.index(y), e(a).trigger("onContinuousVertical", [n]), n
	  }

	  function en(n)
	  {
		  n.wrapAroundElements && n.wrapAroundElements.length && (n.isMovementUp ? e(x).before(n.wrapAroundElements) : e(C).after(n.wrapAroundElements), ct(e(b).position().top), Xe(), n.sectionIndex = n.element.index(y), n.leavingSection = n.activeSection.index(y) + 1)
	  }

	  function nn(n)
	  {
		  en(n), e.isFunction(l.afterLoad) && !n.localIsResizing && l.afterLoad.call(n.element, n.anchorLink, n.sectionIndex + 1), l.scrollOverflowHandler.afterLoad(), gt("parallax", "afterLoad"), vt("scrollOverflowReset") && At.scrollOverflowReset.reset(), l.resetSliders && At.resetSliders && At.resetSliders.apply(n), n.localIsResizing || rn(n.element), n.element.addClass(g).siblings().removeClass(g), Dt = !0, e.isFunction(n.callback) && n.callback.call(this)
	  }

	  function tn(e, n)
	  {
		  e.attr(n, e.data(n)).removeAttr("data-" + n)
	  }

	  function on(n)
	  {
		  if (l.lazyLoading)
		  {
			  var t, o = sn(n);
			  o.find("img[data-src], img[data-srcset], source[data-src], audio[data-src], iframe[data-src]").each(function ()
			  {
				  t = e(this), e.each(["src", "srcset"], function (e, n)
				  {
					  var o = t.attr("data-" + n);
					  "undefined" != typeof o && o && tn(t, n)
				  }), t.is("source") && t.closest("video").get(0).load()
			  })
		  }
	  }

	  function rn(n)
	  {
		  var t = sn(n);
		  t.find("video, audio").each(function ()
		  {
			  var n = e(this).get(0);
			  n.hasAttribute("data-autoplay") && "function" == typeof n.play && n.play()
		  }), t.find('iframe[src*="youtube.com/embed/"]').each(function ()
		  {
			  var n = e(this).get(0);
			  n.hasAttribute("data-autoplay") && an(n), n.onload = function ()
			  {
				  n.hasAttribute("data-autoplay") && an(n)
			  }
		  })
	  }

	  function an(e)
	  {
		  e.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', "*")
	  }

	  function ln(n)
	  {
		  var t = sn(n);
		  t.find("video, audio").each(function ()
		  {
			  var n = e(this).get(0);
			  n.hasAttribute("data-keepplaying") || "function" != typeof n.pause || n.pause()
		  }), t.find('iframe[src*="youtube.com/embed/"]').each(function ()
		  {
			  var n = e(this).get(0);
			  /youtube\.com\/embed\//.test(e(this).attr("src")) && !n.hasAttribute("data-keepplaying") && e(this).get(0).contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', "*")
		  })
	  }

	  function sn(n)
	  {
		  var t = n.find(D);
		  return t.length && (n = e(t)), n
	  }

	  function cn(e)
	  {
		  function n(e)
		  {
			  var n, o, i, r, l, s, c, d = "",
				  f = 0;
			  for (e = e.replace(/[^A-Za-z0-9+\/=]/g, ""); f < e.length;) r = a.indexOf(e.charAt(f++)), l = a.indexOf(e.charAt(f++)), s = a.indexOf(e.charAt(f++)), c = a.indexOf(e.charAt(f++)), n = r << 2 | l >> 4, o = (15 & l) << 4 | s >> 2, i = (3 & s) << 6 | c, d += String.fromCharCode(n), 64 != s && (d += String.fromCharCode(o)), 64 != c && (d += String.fromCharCode(i));
			  return d = t(d)
		  }

		  function t(e)
		  {
			  for (var n, t = "", o = 0, i = 0, r = 0; o < e.length;) i = e.charCodeAt(o), i < 128 ? (t += String.fromCharCode(i), o++) : i > 191 && i < 224 ? (r = e.charCodeAt(o + 1), t += String.fromCharCode((31 & i) << 6 | 63 & r), o += 2) : (r = e.charCodeAt(o + 1), n = e.charCodeAt(o + 2), t += String.fromCharCode((15 & i) << 12 | (63 & r) << 6 | 63 & n), o += 3);
			  return t
		  }

		  function o(e)
		  {
			  return e
		  }

		  function i(e)
		  {
			  return e.slice(3).slice(0, -3)
		  }

		  function r(e)
		  {
			  var t = e.split("_");
			  if (t.length > 1)
			  {
				  var o = t[1],
					  r = e.replace(i(t[1]), "").split("_")[0],
					  a = r;
				  return a + "_" + n(o.slice(3).slice(0, -3))
			  }
			  return i(e)
		  }
		  var a = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
		  return o(r(n(e)))
	  }

	  function dn()
	  {
		  if (t.domain.length)
		  {
			  for (var e = t.domain.replace(/^(www\.)/, "").split("."); e.length > 2;)
			  {
				  e.shift()
			  }
			  var n = e.join(".");
			  return n.replace(/(^\.*)|(\.*$)/g, "")
		  }
		  return ""
	  }

	  function fn(e)
	  {
		  var n = dn(),
			  t = ["localhost", "127.0.0.1", "jshell.net", "UDdDQU5ZNlNN"],
			  o = t[0],
			  i = t[1],
			  r = t[2],
			  a = cn(t[3]),
			  l = [o, i, r].indexOf(n) < 0 && 0 !== n.length,
			  s = "undefined" != typeof Xt[e] && Xt[e].length;
		  if (!s && l) return !1;
		  var c = s ? cn(Xt[e]) : "";
		  c = c.split("_");
		  var d = c.length > 1 && c[1].indexOf(e, c[1].length - e.length) > -1,
			  f = c[0].indexOf(n, c[0].length - n.length) < 0;
		  return !(f && l && a != c[0]) && d || !l
	  }

	  function un(e)
	  {
		  if (vt(e) && At[e])
		  {
			  var n = cn("MTIzPGRpdiBzdHlsZT0iei1pbmRleDo5OTk5OTk5O3Bvc2l0aW9uOmZpeGVkOyB0b3A6IDIwcHg7IGxlZnQ6MjBweDsgYmFja2dyb3VuZDpyZWQ7IHBhZGRpbmc6IDdweCAxNXB4OyBmb250LXNpemU6IDE0cHg7IGZvbnQtZmFtaWx5OiBhcmlhbDsgY29sb3I6ICNmZmY7IGRpc3BsYXk6IGlubGluZS1ibG9jazsiPjxhIGhyZWY9Imh0dHA6Ly9hbHZhcm90cmlnby5jb20vZnVsbFBhZ2UvZXh0ZW5zaW9ucy8iIHN0eWxlPSJjb2xvcjogI2ZmZjsgdGV4dC1kZWNvcmF0aW9uOm5vbmU7Ij5VbmxpY2Vuc2VkIGZ1bGxQYWdlLmpzIEV4dGVuc2lvbjwvYT48L2Rpdj4xMjM="),
				  t = o.random() < .5;
			  if (!fn(e))
			  {
				  var i, r = "9999999",
					  a = "z-index",
					  l = function ()
					  {
						  i = t ? Ct.find("div").first() : Ct.find("div").last(), i.css(a) !== r && (t ? Ct.prepend(n) : Ct.append(n))
					  };
				  l(), setInterval(l, 2e3)
			  }
		  }
	  }

	  function hn()
	  {
		  var e = n.location.hash.replace("#", "").split("/"),
			  t = decodeURIComponent(e[0]),
			  o = decodeURIComponent(e[1]);
		  t && (l.animateAnchor ? Un(t, o) : de(t, o))
	  }

	  function pn()
	  {
		  if (!Qt && !l.lockAnchors)
		  {
			  var e = n.location.hash.replace("#", "").split("/"),
				  t = decodeURIComponent(e[0]),
				  o = decodeURIComponent(e[1]),
				  i = "undefined" == typeof Tt,
				  r = "undefined" == typeof Tt && "undefined" == typeof o && !Mt;
			  t.length && (t && t !== Tt && !i || r || !Mt && It != o) && Un(t, o)
		  }
	  }

	  function vn(n)
	  {
		  clearTimeout(Nt);
		  var t = e(":focus");
		  if (!t.is("textarea") && !t.is("input") && !t.is("select") && "true" !== t.attr("contentEditable") && "" !== t.attr("contentEditable") && l.keyboardScrolling && l.autoScrolling)
		  {
			  var o = n.which,
				  i = [40, 38, 32, 33, 34];
			  e.inArray(o, i) > -1 && n.preventDefault(), kt = n.ctrlKey, Nt = setTimeout(function ()
			  {
				  An(n)
			  }, 150)
		  }
	  }

	  function gn()
	  {
		  e(this).prev().trigger("click")
	  }

	  function mn(e)
	  {
		  Bt && (kt = e.ctrlKey)
	  }

	  function Sn(e)
	  {
		  2 == e.which && (io = e.pageY, Rt.on("mousemove", Tn))
	  }

	  function wn(e)
	  {
		  2 == e.which && Rt.off("mousemove")
	  }

	  function yn()
	  {
		  var n = e(this).closest(y);
		  e(this).hasClass(G) ? Ft.m.left && he(n) : Ft.m.right && ue(n)
	  }

	  function bn()
	  {
		  Bt = !1, kt = !1
	  }

	  function xn(n)
	  {
		  n.preventDefault();
		  var t = e(this).parent().index();
		  _e(e(y).eq(t))
	  }

	  function Cn(n)
	  {
		  n.preventDefault();
		  var t = e(this).closest(y).find(F),
			  o = t.find(B).eq(e(this).closest("li").index());
		  In(t, o)
	  }

	  function An(n)
	  {
		  var t = n.shiftKey;
		  if (Dt || !([37, 39].indexOf(n.which) < 0)) switch (n.which)
		  {
		  case 38:
		  case 33:
			  Ft.k.up && se();
			  break;
		  case 32:
			  if (t && Ft.k.up)
			  {
				  se();
				  break
			  }
		  case 40:
		  case 34:
			  Ft.k.down && ce();
			  break;
		  case 36:
			  Ft.k.up && fe(1);
			  break;
		  case 35:
			  Ft.k.down && fe(e(y).length);
			  break;
		  case 37:
			  Ft.k.left && he();
			  break;
		  case 39:
			  Ft.k.right && ue();
			  break;
		  default:
			  return
		  }
	  }

	  function Tn(e)
	  {
		  Dt && (e.pageY < io && Ft.m.up ? se() : e.pageY > io && Ft.m.down && ce()), io = e.pageY
	  }

	  function In(n, t, o)
	  {
		  var i = n.closest(y),
			  r = {
				  slides: n,
				  destiny: t,
				  direction: o,
				  destinyPos: t.position(),
				  slideIndex: t.index(),
				  section: i,
				  sectionIndex: i.index(y),
				  anchorLink: i.data("anchor"),
				  slidesNav: i.find(Y),
				  slideAnchor: Kn(t),
				  prevSlide: i.find(D),
				  prevSlideIndex: i.find(D).index(),
				  localIsResizing: zt
			  };
		  return r.xMovement = Vn(r.prevSlideIndex, r.slideIndex), r.localIsResizing || (Dt = !1), gt("parallax", "applyHorizontal", r), l.onSlideLeave && !r.localIsResizing && "none" !== r.xMovement && e.isFunction(l.onSlideLeave) && l.onSlideLeave.call(r.prevSlide, r.anchorLink, r.sectionIndex + 1, r.prevSlideIndex, r.xMovement, r.slideIndex) === !1 ? void(Mt = !1) : (t.addClass(p).siblings().removeClass(p), r.localIsResizing || (ln(r.prevSlide), on(t)), kn(r), i.hasClass(p) && !r.localIsResizing && Qn(r.slideIndex, r.slideAnchor, r.anchorLink, r.sectionIndex), At.continuousHorizontal && At.continuousHorizontal.apply(r), St() ? Ln(r) : Mn(n, r, !0), void(l.interlockedSlides && At.interlockedSlides && At.interlockedSlides.apply(r)))
	  }

	  function kn(e)
	  {
		  !l.loopHorizontal && l.controlArrows && (e.section.find(_).toggle(0 !== e.slideIndex), e.section.find(ee).toggle(!e.destiny.is(":last-child")))
	  }

	  function Ln(n)
	  {
		  At.continuousHorizontal && At.continuousHorizontal.afterSlideLoads(n), On(n.slidesNav, n.slideIndex), n.localIsResizing || (gt("parallax", "afterSlideLoads"), e.isFunction(l.afterSlideLoad) && l.afterSlideLoad.call(n.destiny, n.anchorLink, n.sectionIndex + 1, n.slideAnchor, n.slideIndex), Dt = !0, rn(n.destiny)), Mt = !1, At.interlockedSlides && At.interlockedSlides.apply(n)
	  }

	  function Mn(e, n, t)
	  {
		  var i = n.destinyPos;
		  if (l.css3)
		  {
			  var r = "translate3d(-" + o.round(i.left) + "px, 0px, 0px)";
			  Hn(e.find(W)).css(dt(r)), jt = setTimeout(function ()
			  {
				  t && Ln(n)
			  }, l.scrollingSpeed, l.easing)
		  }
		  else e.animate(
		  {
			  scrollLeft: o.round(i.left)
		  }, l.scrollingSpeed, l.easing, function ()
		  {
			  t && Ln(n)
		  })
	  }

	  function On(e, n)
	  {
		  e.find(v).removeClass(p), e.find("li").eq(n).find("a").addClass(p)
	  }

	  function En()
	  {
		  if (Rt.trigger("onResize"), Rn(), Ot)
		  {
			  var n = e(t.activeElement);
			  if (!n.is("textarea") && !n.is("input") && !n.is("select"))
			  {
				  var i = ne.height();
				  o.abs(i - ro) > 20 * o.max(ro, i) / 100 && (pe(!0), ro = i)
			  }
		  }
		  else clearTimeout(Vt), Vt = setTimeout(function ()
		  {
			  pe(!0)
		  }, 350)
	  }

	  function Rn()
	  {
		  var e = l.responsive || l.responsiveWidth,
			  n = l.responsiveHeight,
			  t = e && ne.outerWidth() < e,
			  o = n && ne.height() < n;
		  e && n ? ve(t || o) : e ? ve(t) : n && ve(o)
	  }

	  function Hn(e)
	  {
		  var n = "all " + l.scrollingSpeed + "ms " + l.easingcss3;
		  return e.removeClass(d), e.css(
		  {
			  "-webkit-transition": n,
			  transition: n
		  })
	  }

	  function zn(e)
	  {
		  return e.addClass(d)
	  }

	  function Bn(n, t)
	  {
		  l.navigation && (e(M).find(v).removeClass(p), n ? e(M).find('a[href="#' + n + '"]').addClass(p) : e(M).find("li").eq(t).find("a").addClass(p))
	  }

	  function Dn(n)
	  {
		  l.menu && (e(l.menu).find(v).removeClass(p), e(l.menu).find('[data-menuanchor="' + n + '"]').addClass(p))
	  }

	  function Pn(e, n)
	  {
		  Dn(e), Bn(e, n)
	  }

	  function Fn(n)
	  {
		  var t = e(b).index(y),
			  o = n.index(y);
		  return t == o ? "none" : t > o ? "up" : "down"
	  }

	  function Vn(e, n)
	  {
		  return e == n ? "none" : e > n ? "left" : "right"
	  }

	  function Wn(e)
	  {
		  if (!e.hasClass("fp-noscroll"))
		  {
			  e.css("overflow", "hidden");
			  var n, t = l.scrollOverflowHandler,
				  o = t.wrapContent(),
				  i = e.closest(y),
				  r = t.scrollable(e);
			  r.length ? n = t.scrollHeight(e) : (n = e.get(0).scrollHeight, l.verticalCentered && (n = e.find(T).get(0).scrollHeight));
			  var a = Zn(i);
			  n > a ? r.length ? t.update(e, a) : (l.verticalCentered ? e.find(T).wrapInner(o) : e.wrapInner(o), t.create(e, a, l.scrollOverflowOptions)) : t.remove(e), e.css("overflow", "")
		  }
	  }

	  function jn(e)
	  {
		  e.hasClass(j) || e.addClass(j).wrapInner('<div class="' + A + '" style="height:' + Zn(e) + 'px;" />')
	  }

	  function Zn(e)
	  {
		  var n = Ce(e);
		  if (l.paddingTop || l.paddingBottom)
		  {
			  var t = e;
			  t.hasClass(w) || (t = e.closest(y));
			  var o = parseInt(t.css("padding-top")) + parseInt(t.css("padding-bottom"));
			  n = Ht - o
		  }
		  return n
	  }

	  function Yn(e, n)
	  {
		  n ? Hn(Rt) : zn(Rt), Rt.css(dt(e)), setTimeout(function ()
		  {
			  Rt.removeClass(d)
		  }, 10)
	  }

	  function Nn(n)
	  {
		  if (!n) return [];
		  var t = Rt.find(y + '[data-anchor="' + n + '"]');
		  return t.length || (t = e(y).eq(n - 1)), t
	  }

	  function qn(e, n)
	  {
		  var t = n.find(F),
			  o = t.find(B + '[data-anchor="' + e + '"]');
		  return o.length || (o = t.find(B).eq(e)), o
	  }

	  function Un(e, n)
	  {
		  var t = Nn(e);
		  t.length && ("undefined" == typeof n && (n = 0), e === Tt || t.hasClass(p) ? Gn(t, n) : _e(t, function ()
		  {
			  Gn(t, n)
		  }))
	  }

	  function Gn(e, n)
	  {
		  if ("undefined" != typeof n)
		  {
			  var t = e.find(F),
				  o = qn(n, e);
			  o.length && In(t, o)
		  }
	  }

	  function Xn(e, n)
	  {
		  e.append('<div class="' + Z + '"><ul></ul></div>');
		  var t = e.find(Y);
		  t.addClass(l.slidesNavPosition);
		  for (var o = 0; o < n; o++) t.find("ul").append('<li><a href="#"><span></span></a></li>');
		  t.css("margin-left", "-" + t.width() / 2 + "px"), t.find("li").first().find("a").addClass(p)
	  }

	  function Qn(e, n, t, o)
	  {
		  var i = "";
		  l.anchors.length && !l.lockAnchors && (e ? ("undefined" != typeof t && (i = t), "undefined" == typeof n && (n = e), It = n, _n(i + "/" + n)) : "undefined" != typeof e ? (It = n, _n(t)) : _n(t)), Jn()
	  }

	  function _n(e)
	  {
		  if (l.recordHistory) location.hash = e;
		  else if (Ot || Et) n.history.replaceState(i, i, "#" + e);
		  else
		  {
			  var t = n.location.href.split("#")[0];
			  n.location.replace(t + "#" + e)
		  }
	  }

	  function Kn(e)
	  {
		  var n = e.data("anchor"),
			  t = e.index();
		  return "undefined" == typeof n && (n = t), n
	  }

	  function Jn()
	  {
		  var n = e(b),
			  t = n.find(D),
			  o = Kn(n),
			  i = Kn(t),
			  r = String(o);
		  t.length && (r = r + "-" + i), r = r.replace("/", "-").replace("#", "");
		  var a = new RegExp("\\b\\s?" + h + "-[^\\s]+\\b", "g");
		  Ct[0].className = Ct[0].className.replace(a, ""), Ct.addClass(h + "-" + r)
	  }

	  function $n()
	  {
		  var e, o = t.createElement("p"),
			  r = {
				  webkitTransform: "-webkit-transform",
				  OTransform: "-o-transform",
				  msTransform: "-ms-transform",
				  MozTransform: "-moz-transform",
				  transform: "transform"
			  };
		  t.body.insertBefore(o, null);
		  for (var a in r) o.style[a] !== i && (o.style[a] = "translate3d(1px,1px,1px)", e = n.getComputedStyle(o).getPropertyValue(r[a]));
		  return t.body.removeChild(o), e !== i && e.length > 0 && "none" !== e
	  }

	  function et()
	  {
		  t.addEventListener ? (t.removeEventListener("mousewheel", Ue, !1), t.removeEventListener("wheel", Ue, !1), t.removeEventListener("MozMousePixelScroll", Ue, !1)) : t.detachEvent("onmousewheel", Ue)
	  }

	  function nt()
	  {
		  var e, o = "";
		  n.addEventListener ? e = "addEventListener" : (e = "attachEvent", o = "on");
		  var r = "onwheel" in t.createElement("div") ? "wheel" : t.onmousewheel !== i ? "mousewheel" : "DOMMouseScroll";
		  "DOMMouseScroll" == r ? t[e](o + "MozMousePixelScroll", Ue, !1) : t[e](o + r, Ue, !1)
	  }

	  function tt()
	  {
		  Rt.on("mousedown", Sn).on("mouseup", wn)
	  }

	  function ot()
	  {
		  Rt.off("mousedown", Sn).off("mouseup", wn)
	  }

	  function it()
	  {
		  (Ot || Et) && (l.autoScrolling && Ct.off(Ut.touchmove).on(Ut.touchmove, We), e(a).off(Ut.touchstart).on(Ut.touchstart, Ne).off(Ut.touchmove).on(Ut.touchmove, je))
	  }

	  function rt()
	  {
		  (Ot || Et) && e(a).off(Ut.touchstart).off(Ut.touchmove)
	  }

	  function at()
	  {
		  var e;
		  return e = n.PointerEvent ?
		  {
			  down: "pointerdown",
			  move: "pointermove"
		  } :
		  {
			  down: "MSPointerDown",
			  move: "MSPointerMove"
		  }
	  }

	  function lt(e)
	  {
		  var n = [];
		  return n.y = "undefined" != typeof e.pageY && (e.pageY || e.pageX) ? e.pageY : e.touches[0].pageY, n.x = "undefined" != typeof e.pageX && (e.pageY || e.pageX) ? e.pageX : e.touches[0].pageX, Et && Ye(e) && l.scrollBar && (n.y = e.touches[0].pageY, n.x = e.touches[0].pageX), n
	  }

	  function st(e, n)
	  {
		  X(0, "internal"), "undefined" != typeof n && (zt = !0), In(e.closest(F), e), "undefined" != typeof n && (zt = !1), X(Gt.scrollingSpeed, "internal")
	  }

	  function ct(e)
	  {
		  var n = o.round(e);
		  if (l.css3 && l.autoScrolling && !l.scrollBar)
		  {
			  var t = "translate3d(0px, -" + n + "px, 0px)";
			  Yn(t, !1)
		  }
		  else l.autoScrolling && !l.scrollBar ? Rt.css("top", -n) : xt.scrollTop(n)
	  }

	  function dt(e)
	  {
		  return {
			  "-webkit-transform": e,
			  "-moz-transform": e,
			  "-ms-transform": e,
			  transform: e
		  }
	  }

	  function ft(e, n, t)
	  {
		  switch (n)
		  {
		  case "up":
			  Ft[t].up = e;
			  break;
		  case "down":
			  Ft[t].down = e;
			  break;
		  case "left":
			  Ft[t].left = e;
			  break;
		  case "right":
			  Ft[t].right = e;
			  break;
		  case "all":
			  "m" == t ? ae(e) : le(e)
		  }
	  }

	  function ut(n)
	  {
		  Rt.trigger("destroy", [n]), s(!1, "internal"), ae(!1), le(!1), Rt.addClass(f), clearTimeout(jt), clearTimeout(Wt), clearTimeout(Vt), clearTimeout(Zt), clearTimeout(Yt), ne.off("scroll", Be).off("hashchange", pn).off("resize", En), te.off("click touchstart", M + " a").off("mouseenter", M + " li").off("mouseleave", M + " li").off("click touchstart", N).off("mouseover", l.normalScrollElements).off("mouseout", l.normalScrollElements), e(y).off("click touchstart", U), vt("dragAndMove") && At.dragAndMove.destroy(), clearTimeout(jt), clearTimeout(Wt), n && ht()
	  }

	  function ht()
	  {
		  ct(0), Rt.find("img[data-src], source[data-src], audio[data-src], iframe[data-src]").each(function ()
		  {
			  tn(e(this), "src")
		  }), Rt.find("img[data-srcset]").each(function ()
		  {
			  tn(e(this), "srcset")
		  }), e(M + ", " + Y + ", " + U).remove(), e(y).css(
		  {
			  height: "",
			  "background-color": "",
			  padding: ""
		  }), e(B).css(
		  {
			  width: ""
		  }), Rt.css(
		  {
			  height: "",
			  position: "",
			  "-ms-touch-action": "",
			  "touch-action": ""
		  }), xt.css(
		  {
			  overflow: "",
			  height: ""
		  }), e("html").removeClass(u), Ct.removeClass(c), e.each(Ct.get(0).className.split(/\s+/), function (e, n)
		  {
			  0 === n.indexOf(h) && Ct.removeClass(n)
		  }), e(y + ", " + B).each(function ()
		  {
			  l.scrollOverflowHandler.remove(e(this)), e(this).removeClass(j + " " + p)
		  }), pt(Rt), Rt.find(T + ", " + W + ", " + F).each(function ()
		  {
			  e(this).replaceWith(this.childNodes)
		  }), xt.scrollTop(0);
		  var n = [w, z, V];
		  e.each(n, function (n, t)
		  {
			  e("." + t).removeClass(t)
		  })
	  }

	  function pt(e)
	  {
		  return e.css(
		  {
			  "-webkit-transition": "none",
			  transition: "none"
		  })
	  }

	  function vt(e)
	  {
		  return null !== l[e] && "object" == typeof l[e] ? l[e].enabled && At[e] : l[e] && At[e]
	  }

	  function gt(e, n, t)
	  {
		  var o = Array.isArray(t) ? t.join(", ") : t;
		  vt(e) && At[e][n](o)
	  }

	  function mt()
	  {
		  return vt("dragAndMove") && At.dragAndMove.isAnimating
	  }

	  function St()
	  {
		  return vt("dragAndMove") && At.dragAndMove.isGrabbing
	  }

	  function wt(e, n, t)
	  {
		  l[e] = n, "internal" !== t && (Gt[e] = n)
	  }

	  function yt()
	  {
		  return e("html").hasClass(u) ? void bt("error", "Fullpage.js can only be initialized once and you are doing it multiple times!") : (l.continuousVertical && (l.loopTop || l.loopBottom) && (l.continuousVertical = !1, bt("warn", "Option `loopTop/loopBottom` is mutually exclusive with `continuousVertical`; `continuousVertical` disabled")), l.scrollBar && l.scrollOverflow && bt("warn", "Option `scrollBar` is mutually exclusive with `scrollOverflow`. Sections with scrollOverflow might not work well in Firefox"), !l.continuousVertical || !l.scrollBar && l.autoScrolling || (l.continuousVertical = !1, bt("warn", "Scroll bars (`scrollBar:true` or `autoScrolling:false`) are mutually exclusive with `continuousVertical`; `continuousVertical` disabled")), void e.each(l.anchors, function (n, t)
		  {
			  var o = te.find("[name]").filter(function ()
				  {
					  return e(this).attr("name") && e(this).attr("name").toLowerCase() == t.toLowerCase()
				  }),
				  i = te.find("[id]").filter(function ()
				  {
					  return e(this).attr("id") && e(this).attr("id").toLowerCase() == t.toLowerCase()
				  });
			  (i.length || o.length) && (bt("error", "data-anchor tags can not have the same value as any `id` element on the site (or `name` element for IE)."), i.length && bt("error", '"' + t + '" is is being used by another element `id` property'), o.length && bt("error", '"' + t + '" is is being used by another element `name` property'))
		  }))
	  }

	  function bt(e, n)
	  {
		  console && console[e] && console[e]("fullPage: " + n)
	  }
	  if (e("html").hasClass(u)) return void yt();
	  var xt = e("html, body"),
		  Ct = e("body"),
		  At = e.fn.fullpage;
	  l = e.extend(!0,
	  {
		  menu: !1,
		  anchors: [],
		  lockAnchors: !1,
		  navigation: !1,
		  navigationPosition: "right",
		  navigationTooltips: [],
		  showActiveTooltip: !1,
		  slidesNavigation: !1,
		  slidesNavPosition: "bottom",
		  scrollBar: !1,
		  hybrid: !1,
		  css3: !0,
		  scrollingSpeed: 700,
		  autoScrolling: !0,
		  fitToSection: !0,
		  fitToSectionDelay: 1e3,
		  easing: "easeInOutCubic",
		  easingcss3: "ease",
		  loopBottom: !1,
		  loopTop: !1,
		  loopHorizontal: !0,
		  continuousVertical: !1,
		  continuousHorizontal: !1,
		  scrollHorizontally: !1,
		  interlockedSlides: !1,
		  dragAndMove: !1,
		  offsetSections: !1,
		  resetSliders: !1,
		  fadingEffect: !1,
		  normalScrollElements: null,
		  scrollOverflow: !1,
		  scrollOverflowReset: !1,
		  scrollOverflowHandler: ie,
		  scrollOverflowOptions: null,
		  touchSensitivity: 5,
		  normalScrollElementTouchThreshold: 5,
		  bigSectionsDestination: null,
		  keyboardScrolling: !0,
		  animateAnchor: !0,
		  recordHistory: !0,
		  controlArrows: !0,
		  controlArrowColor: "#fff",
		  verticalCentered: !0,
		  sectionsColor: [],
		  paddingTop: 0,
		  paddingBottom: 0,
		  fixedElements: null,
		  responsive: 0,
		  responsiveWidth: 0,
		  responsiveHeight: 0,
		  responsiveSlides: !1,
		  parallax: !1,
		  parallaxOptions:
		  {
			  type: "reveal",
			  percentage: 62,
			  property: "translate"
		  },
		  sectionSelector: S,
		  slideSelector: H,
		  afterLoad: null,
		  onLeave: null,
		  afterRender: null,
		  afterResize: null,
		  afterReBuild: null,
		  afterSlideLoad: null,
		  onSlideLeave: null,
		  afterResponsive: null,
		  lazyLoading: !0
	  }, l);
	  var Tt, It, kt, Lt, Mt = !1,
		  Ot = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|playbook|silk|BlackBerry|BB10|Windows Phone|Tizen|Bada|webOS|IEMobile|Opera Mini)/),
		  Et = "ontouchstart" in n || navigator.msMaxTouchPoints > 0 || navigator.maxTouchPoints,
		  Rt = e(this),
		  Ht = ne.height(),
		  zt = !1,
		  Bt = !0,
		  Dt = !0,
		  Pt = [],
		  Ft = {};
	  Ft.m = {
		  up: !0,
		  down: !0,
		  left: !0,
		  right: !0
	  }, Ft.k = e.extend(!0,
	  {}, Ft.m);
	  var Vt, Wt, jt, Zt, Yt, Nt, qt = at(),
		  Ut = {
			  touchmove: "ontouchmove" in n ? "touchmove" : qt.move,
			  touchstart: "ontouchstart" in n ? "touchstart" : qt.down
		  },
		  Gt = e.extend(!0,
		  {}, l),
		  Xt = {};
	  yt(), oe.click = Et, l.scrollOverflowOptions = e.extend(oe, l.scrollOverflowOptions), e.extend(e.easing,
	  {
		  easeInOutCubic: function (e, n, t, o, i)
		  {
			  return (n /= i / 2) < 1 ? o / 2 * n * n * n + t : o / 2 * ((n -= 2) * n * n + 2) + t
		  }
	  }), e(this).length && (At.setAutoScrolling = s, At.setRecordHistory = q, At.setScrollingSpeed = X, At.setFitToSection = K, At.setLockAnchors = J, At.setMouseWheelScrolling = re, At.setAllowScrolling = ae, At.setKeyboardScrolling = le, At.moveSectionUp = se, At.moveSectionDown = ce, At.silentMoveTo = de, At.moveTo = fe, At.moveSlideRight = ue, At.moveSlideLeft = he, At.fitToSection = Pe, At.reBuild = pe, At.setResponsive = ve, At.getFullpageData = ge, At.destroy = ut, At.landscapeScroll = In, we("continuousHorizontal"), we("scrollHorizontally"), we("resetSliders"), we("interlockedSlides"), we("responsiveSlides"), we("fadingEffect"), we("dragAndMove"), we("offsetSections"), we("scrollOverflowReset"), we("parallax"), vt("dragAndMove") && At.dragAndMove.init(), me(), Se(), vt("dragAndMove") && At.dragAndMove.turnOffTouch());
	  var Qt = !1,
		  _t = 0,
		  Kt = 0,
		  Jt = 0,
		  $t = 0,
		  eo = 0;
	  ! function ()
	  {
		  var e = n.requestAnimationFrame || n.mozRequestAnimationFrame || n.webkitRequestAnimationFrame || n.msRequestAnimationFrame;
		  n.requestAnimationFrame = e
	  }();
	  var no = (new Date).getTime(),
		  to = !1,
		  oo = 0,
		  io = 0,
		  ro = Ht
  }, "undefined" != typeof IScroll && (IScroll.prototype.wheelOn = function ()
  {
	  this.wrapper.addEventListener("wheel", this), this.wrapper.addEventListener("mousewheel", this), this.wrapper.addEventListener("DOMMouseScroll", this)
  }, IScroll.prototype.wheelOff = function ()
  {
	  this.wrapper.removeEventListener("wheel", this), this.wrapper.removeEventListener("mousewheel", this), this.wrapper.removeEventListener("DOMMouseScroll", this)
  });
  var ie = {
	  refreshId: null,
	  iScrollInstances: [],
	  toggleWheel: function (n)
	  {
		  var t = e(b).find(s);
		  t.each(function ()
		  {
			  var t = e(this).data("iscrollInstance");
			  "undefined" != typeof t && t && (n ? t.wheelOn() : t.wheelOff())
		  })
	  },
	  onLeave: function ()
	  {
		  ie.toggleWheel(!1)
	  },
	  beforeLeave: function ()
	  {
		  ie.onLeave()
	  },
	  afterLoad: function ()
	  {
		  ie.toggleWheel(!0)
	  },
	  create: function (n, t, o)
	  {
		  var i = n.find(s);
		  i.height(t), i.each(function ()
		  {
			  var n = e(this),
				  t = n.data("iscrollInstance");
			  t && e.each(ie.iScrollInstances, function ()
			  {
				  e(this).destroy()
			  }), t = new IScroll(n.get(0), o), t.on("scrollEnd", function ()
			  {
				  this.fp_isAtTop = this.y > -30, this.fp_isAtEnd = this.y - this.maxScrollY < 30
			  }), ie.iScrollInstances.push(t), t.wheelOff(), n.data("iscrollInstance", t)
		  })
	  },
	  isScrolled: function (e, n)
	  {
		  var t = n.data("iscrollInstance");
		  return !t || ("top" === e ? t.y >= 0 && !n.scrollTop() : "bottom" === e ? 0 - t.y + n.scrollTop() + 1 + n.innerHeight() >= n[0].scrollHeight : void 0)
	  },
	  scrollable: function (e)
	  {
		  return e.find(F).length ? e.find(D).find(s) : e.find(s)
	  },
	  scrollHeight: function (e)
	  {
		  return e.find(s).children().first().get(0).scrollHeight
	  },
	  remove: function (e)
	  {
		  var n = e.find(s);
		  if (n.length)
		  {
			  var t = n.data("iscrollInstance");
			  t && t.destroy(), n.data("iscrollInstance", null)
		  }
		  e.find(s).children().first().children().first().unwrap().unwrap()
	  },
	  update: function (n, t)
	  {
		  clearTimeout(ie.refreshId), ie.refreshId = setTimeout(function ()
		  {
			  e.each(ie.iScrollInstances, function ()
			  {
				  e(this).get(0).refresh()
			  })
		  }, 150), n.find(s).css("height", t + "px").parent().css("height", t + "px")
	  },
	  wrapContent: function ()
	  {
		  return '<div class="' + l + '"><div class="fp-scroller"></div></div>'
	  }
  }
});
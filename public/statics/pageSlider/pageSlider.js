/*
 * pageSlider - Zepto plugin for mobile single page sliding
 *
 * Copyright (c) 2015 Frans Lee dmon@foxmail.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Version:  1.0
 *
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Instantiate parameters
	 *
	 * @constructor
	 */
	function PageSlider(optOrIndex){
			this.inited = false,
			this.startY = 0,
			this.distance = 0,
			this.timer = null,
			this.nextPageTop = 0,
			this.prevPageTop = 0,
			this.index = 0,
			this.curPagePos = 0,
			this.nextPagePos = 0,
			this.pageHeight = 0,
			this.prevPagePos = 0;

			this.opt = {
					startPage: 1,
					range: 70,
					duration: 200,
					loop: false,
					elastic: true,
					translate3d: true,
					callback:{}
				};

			this.init(optOrIndex);
	};

	/**
	 * Set translate/translate3d according to the option
	 *
	 * @param {Number|String} offsetY  Vertical Offset
	 * @returns {String}  translate/translate3d
	 */
	PageSlider.prototype.motion = function(offsetY){
		if (this.opt.translate3d) {
			return 'translate3d(0,' + offsetY + 'px,0)';
		} else {
			return 'translate(0,' + offsetY + 'px)';
		}
	};

	/**
	 * Show the specified page
	 *
	 * @param {Number} index  The target page number
	 * @param {string} direction  The direction of the sliding,'next' or 'prev'
	 */
	PageSlider.prototype.showSec = function(index, direction) {
		if ($('.current').length) $('.current,.next,.prev').css({
			'-webkit-transition': null,
			'-webkit-transform': null
		}).removeClass('current prev next');
		var cur, next, prev;
		var totalSec = $('.section').length;
		if (direction == 'next') {
			cur = index == totalSec ? 1 : (index + 1);
			next = cur == totalSec ? (this.opt.loop ? 1 : 0) : (cur + 1);
			prev = index;
		} else if (direction == 'prev') {
			cur = index == 1 ? totalSec : (index - 1);
			next = index;
			prev = cur == 1 ? (this.opt.loop ? totalSec : 0) : (cur - 1);
		} else {
			cur = index;
			next = index == totalSec ? (this.opt.loop ? 1 : 0) : (index + 1);
			prev = index == 1 ? (this.opt.loop ? totalSec : 0) : (index - 1);
		}
		var $curSec = $('.sec' + cur);
		var $nextSec = $('.sec' + next);
		var $prevSec = $('.sec' + prev);

		$curSec.addClass('current');
		this.pageHeight = $('.current').height();

		$nextSec.addClass('next').css('-webkit-transform', this.motion(this.pageHeight));
		$prevSec.addClass('prev').css('-webkit-transform', this.motion(-this.pageHeight));

		$curSec.addClass('ani').siblings('.section').removeClass('ani');
		//执行回调
		typeof(this.opt.callback[cur])=='function' && this.opt.callback[cur]();
	};

	/**
	 * Touch start event handler
	 */
	PageSlider.prototype.touchStartHandler = function(event) {
		var that = event.data.that;
		if(that.timer){
			event.preventDefault();
			return;
		}

		that.index = $('.section').index($(this)) + 1;
		var touch = event.touches[0];
		that.distance = 0;
		that.startY = touch.clientY;
		that.curPagePos = $(this).offset().top;
		that.nextPagePos = $('.next').length && $('.next').offset().top;
		that.prevPagePos = $('.prev').length && $('.prev').offset().top;
		$(this).off('touchmove').on('touchmove', {
			'that': that
		}, that.touchMoveHandler);
		$(this).off('touchend').on('touchend', {
			'that': that
		}, that.touchEndHandler);
		event.preventDefault();
	};

	/**
	 * Touch move event handler
	 */
	PageSlider.prototype.touchMoveHandler = function(event) {
		var that = event.data.that;
		if(that.timer){
			event.preventDefault();
			return;
		}
		var touch = event.touches[0];
		that.distance = touch.clientY - that.startY;
		if (Math.abs(that.distance) < 5) {
			event.preventDefault();
			return;
		};
		if (!that.opt.elastic && ((that.index === 1 && that.distance > 0) || (that.index === $('.section').length && that.distance < 0))) {
			event.preventDefault();
			return;
		}
		that.curPageTop = that.curPagePos + that.distance;
		that.nextPageTop = that.nextPagePos + that.distance;
		that.prevPageTop = that.prevPagePos + that.distance;

		$(this).css('-webkit-transform', that.motion(that.curPageTop));
		$('.next').css('-webkit-transform', that.motion(that.nextPageTop));
		$('.prev').css('-webkit-transform', that.motion(that.prevPageTop));
		event.preventDefault();
	};

	/**
	 * Touch end event handler
	 */
	PageSlider.prototype.touchEndHandler = function(event) {
		var that = event.data.that;
		if(that.timer){
			event.preventDefault();
			return;
		}
		$('.current,.next,.prev').css('-webkit-transition', '-webkit-transform ' + that.opt.duration + 'ms linear');
		if ((that.distance < -that.opt.range && $('.next').length) || (that.distance > that.opt.range && $('.prev').length)) {
			var next = !!(that.distance < -that.opt.range);
			$(this).css('-webkit-transform', that.motion((next ? (-$(this).height()) : $(this).height())));
			$(next ? '.next' : '.prev').css('-webkit-transform', that.motion(0));
			that.timer = setTimeout(function() {
				that.showSec(that.index, next ? 'next' : 'prev');
				clearTimeout(that.timer);
				that.timer = null;
			}, that.opt.duration + 5);
		} else {
			$(this).css('-webkit-transform', that.motion(0));
			$('.prev').css('-webkit-transform', that.motion(-that.pageHeight));
			$('.next').css('-webkit-transform', that.motion(that.pageHeight));
			that.timer = setTimeout(function() {
				$('.current,.next,.prev').css({
					'-webkit-transition': null
				});
				clearTimeout(that.timer);
				that.timer = null;
			}, that.opt.duration + 5);
		}
		event.preventDefault();
	};

	/**
	 * Sliding to the target page
	 *
	 * @param {Number} index  The target page number
	 */
	PageSlider.prototype.go = function(index){
			this.init(index);
	};

	/**
	 * PageSlider initializer
	 *
	 * @param {Object|Number} optOrIndex  Settings or page number
	 */
	PageSlider.prototype.init = function(optOrIndex){
			var that = this;
			if (typeof(optOrIndex) == 'object') {
				$.extend(true, that.opt, optOrIndex);
				that.inited = false;
			} else {
				optOrIndex && (that.opt.startPage = optOrIndex);
			}

			if (!that.inited) {
				$('.section').off('touchstart').on('touchstart', {
					'that': that
				}, that.touchStartHandler);
				that.showSec(that.opt.startPage);
				that.inited = true;
			} else {
				that.showSec(that.opt.startPage)
			}

			$(window).on('onorientationchange' in window ? 'orientationchange':'resize',function(){
				that.go(that.index+1);
			});
	};

	/**
	 * To generate an instance of object
	 *
	 * @param {Object|Number} optOrIndex  Settings or page number
	 */
	PageSlider.case = function(optOrIndex) {
		return new PageSlider(optOrIndex);
	};


	if (typeof define === 'function' && typeof define.amd === 'object' && define.amd) {
		define(function() {
			return PageSlider;
		});
	} else if (typeof module !== 'undefined' && module.exports) {
		module.exports = PageSlider.case;
		module.exports.PageSlider = PageSlider;
	} else {
		window.PageSlider = PageSlider;
	}

})(window.Zepto, window, document);
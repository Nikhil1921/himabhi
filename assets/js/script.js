"use strict";
/* -----------------------------------------------------------------------------



File:           JS Core
Version:        1.0
Last change:    00/00/00 
-------------------------------------------------------------------------------- */
(function() {

	

	var Prysm = {
		init: function() {
			this.Basic.init();  
		},

		Basic: {
			init: function() {

				this.preloader();
				this.BackgroundImage();
				this.Animation();
				this.StickyHeader();
				this.scrollTop();
				this.MobileMenu();
				this.MainSlider();
				this.counterUp();
				this.searchPopUp();
				this.CarouselSLider();
				this.countDown();
				this.ProductSingle();
				this.videoBox();
				this.SkillProgress();
				
				
			},
			preloader: function (){
				jQuery(window).on('load', function(){
					jQuery('#preloader').fadeOut('slow');
				})
			},
			BackgroundImage: function (){
				$('[data-background]').each(function() {
					$(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
				});
			},
			Animation: function (){
				if($('.wow').length){
					var wow = new WOW(
					{
						boxClass:     'wow',
						animateClass: 'animated',
						offset:       0,
						mobile:       true,
						live:         true
					}
					);
					wow.init();
				}
			},
			StickyHeader: function (){
				jQuery(window).on('scroll', function() {
					if (jQuery(window).scrollTop() > 250) {
						jQuery('.organio-header-section').addClass('sticky-on')
					} else {
						jQuery('.organio-header-section').removeClass('sticky-on')
					}
				})
			},
			scrollTop: function (){
				$(window).on("scroll", function() {
					if ($(this).scrollTop() > 200) {
						$('.scrollup').fadeIn();
					} else {
						$('.scrollup').fadeOut();
					}
				});

				$('.scrollup').on("click", function()  {
					$("html, body").animate({
						scrollTop: 0
					}, 800);
					return false;
				});
			},
			MainSlider: function (){
				var	tpj = jQuery;
				if(window.RS_MODULES === undefined) window.RS_MODULES = {};
				if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
				RS_MODULES.modules["revslider151"] = {init:function() {
					window.revapi15 = window.revapi15===undefined || window.revapi15===null || window.revapi15.length===0  ? document.getElementById("rev_slider_15_1") : window.revapi15;
					if(window.revapi15 === null || window.revapi15 === undefined || window.revapi15.length==0) return;
					window.revapi15 = jQuery(window.revapi15);
					if(window.revapi15.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_15_1"); return;}
					revapi15.revolutionInit({
						revapi:"revapi15",
						DPR:"dpr",
						sliderLayout:"fullwidth",
						visibilityLevels:"1240,1024,778,480",
						gridwidth:"1230,1024,778,480",
						gridheight:"660,660,540,480",
						perspective:600,
						perspectiveType:"global",
						keepBPHeight:true,
						editorheight:"660,660,540,480",
						responsiveLevels:"1240,1024,778,480",
						progressBar:{disableProgressBar:true},
						navigation: {
							wheelCallDelay:1000,
							onHoverStop:false,
							arrows: {
								enable:true,
								style:"case-arrows1",
								left: {
									h_offset:30
								},
								right: {
									h_offset:30
								}
							}
						},
						parallax: {
							levels:[3,6,8,10,25,30,35,40,45,46,47,48,49,50,51,30],
							type:"mouse",
							origo:"slidercenter",
							speed:0
						},
						viewPort: {
							global:false,
							globalDist:"-200px",
							enable:false
						},
						fallbacks: {
							allowHTML5AutoPlayOnAndroid:true
						},
					});

				}};
				$(".or-category-main-slider").slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					arrows: false,
					fade: true,
					dots: true,
				});
				$(".or-banner-slider").slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					arrows: false,
					fade: true,
					dots: false,
				});
				var	tpj = jQuery;
				if(window.RS_MODULES === undefined) window.RS_MODULES = {};
				if(RS_MODULES.modules === undefined) RS_MODULES.modules = {};
				RS_MODULES.modules["revslider181"] = {init:function() {
					window.revapi18 = window.revapi18===undefined || window.revapi18===null || window.revapi18.length===0  ? document.getElementById("rev_slider_18_1") : window.revapi18;
					if(window.revapi18 === null || window.revapi18 === undefined || window.revapi18.length==0) return;
					window.revapi18 = jQuery(window.revapi18);
					if(window.revapi18.revolution==undefined){ revslider_showDoubleJqueryError("rev_slider_18_1"); return;}
					revapi18.revolutionInit({
						revapi:"revapi18",
						sliderLayout:"fullwidth",
						visibilityLevels:"1240,1024,778,480",
						gridwidth:"1240,1024,778,480",
						gridheight:"930,930,560,560",
						spinner:"spinner0",
						perspective:600,
						perspectiveType:"global",
						keepBPHeight:true,
						editorheight:"930,930,680,560",
						responsiveLevels:"1240,1024,778,480",
						progressBar:{disableProgressBar:true},
						navigation: {
							onHoverStop:false
						},
						viewPort: {
							global:false,
							globalDist:"-200px",
							enable:false
						},
						fallbacks: {
							allowHTML5AutoPlayOnAndroid:true
						},
					});
					
				}} 
				if (window.RS_MODULES.checkMinimal!==undefined) { window.RS_MODULES.checkMinimal();};
			},
			CarouselSLider: function (){
				$('.or-category-slider-area').slick({
					arrow: true,
					dots: false,
					infinite: false,
					slidesToShow: 4,
					slidesToScroll: 1,
					prevArrow: ".or-category-left_arrow",
					nextArrow: ".or-category-right_arrow",
					responsive: [
					{
						breakpoint: 1100,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,				
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-product-slider-wrapper').slick({
					arrow: true,
					dots: false,
					infinite: false,
					slidesToShow: 4,
					slidesToScroll: 1,
					prevArrow: ".or-product-left_arrow",
					nextArrow: ".or-product-right_arrow",
					responsive: [
					{
						breakpoint: 1100,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-team-slider').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 799,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 599,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-portfolio-slider').slick({
					arrow: true,
					infinite: false,
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: false,
					prevArrow: ".or-portfolio-left_arrow",
					nextArrow: ".or-portfolio-right_arrow",
					responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-product-item-slider').slick({
					arrow: true,
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: true,
					prevArrow: ".or-pro2-left_arrow",
					nextArrow: ".or-pro2-right_arrow",
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-product-item-slider2').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.category-slider-2').slick({
					arrow: true,
					dots: false,
					infinite: false,
					slidesToShow: 4,
					slidesToScroll: 1,
					prevArrow: ".or-cat-left_arrow",
					nextArrow: ".or-cat-right_arrow",
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-testimonial-slider').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-blog-slide').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-popular-cat-slider').slick({
					arrow: true,
					dots: false,
					infinite: false,
					slidesToShow: 6,
					slidesToScroll: 1,
					prevArrow: ".or-pop-cat-left_arrow",
					nextArrow: ".or-pop-cat-right_arrow",
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 400,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-team-slide-2').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1025,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.or-testimonial-slider-2').slick({
					arrow: true,
					dots: false,
					infinite: false,
					slidesToShow: 1,
					slidesToScroll: 1,
					prevArrow: ".or-tst-cat-left_arrow",
					nextArrow: ".or-tst-cat-right_arrow",
				});
				$(".or-best-product-slider").slick({
					slidesToShow: 4,
					slidesToScroll: 4,
					arrows: false,
					dots: true,
					responsive: [
					{
						breakpoint: 1025,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$(".filter li").on('click', function(){
					var filter = $(this).data('filter');
					$(".or-best-product-slider").slick('slickUnfilter');

					if(filter == 'one'){
						$(".or-best-product-slider").slick('slickFilter','.one');
					}
					else if(filter == 'two'){
						$(".or-best-product-slider").slick('slickFilter','.two');
					}
					else if(filter == 'three'){
						$(".or-best-product-slider").slick('slickFilter','.three');
					}
					else if(filter == 'four'){
						$(".or-best-product-slider").slick('slickFilter','.four');
					}
					else if(filter == 'five'){
						$(".or-best-product-slider").slick('slickFilter','.five');
					}
					else if(filter == 'six'){
						$(".or-best-product-slider").slick('slickFilter','.six');
					}
					else if(filter == 'all'){

						$(".or-best-product-slider").slick('slickUnfilter');
					}
				});
				$('.or-best-price-filter-btn ul li').on('click', function() {

					$('.or-best-price-filter-btn ul li.active').removeClass('active');
					$(this).addClass('active');
				});
				$('.best-deal-product-slider').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 700,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.testimonial-slider-4').slick({
					dots: true,
					infinite: false,
					slidesToShow: 3,
					slidesToScroll: 1,
					vertical: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 400,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
				$('.blog-slider-4').slick({
					arrow: false,
					infinite: false,
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: true,
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1,
							infinite: true,
						}
					},
					{
						breakpoint: 800,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
			},
			counterUp: function (){
				if($('.counter').length){
					jQuery('.counter').counterUp({
						delay: 50,
						time: 2000,
					});
				};
			},
			searchPopUp: function (){
				if($('.search-box-outer').length) {
					$('.search-box-outer').on('click', function() {
						$('body').addClass('search-active');
					});
					$('.close-search').on('click', function() {
						$('body').removeClass('search-active');
					});
				}
			},
			ProductSingle: function (){
				$('.shop-details-img-wrap').each(function(){
					$(this).find('img').zoomIt();
				});
				$('.shop-details-img-slider').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
					asNavFor: '.shop-details-img-thumb'
				});
				$('.shop-details-img-thumb').slick({
					slidesToShow: 3,
					slidesToScroll: 1,
					asNavFor: '.shop-details-img-slider',
					dots: true,
					focusOnSelect: true
				});
				if($('.quantity-input-2').length) {
					$('.quantity-input-2').inputarrow({
						renderNext: function(input) {
							return $('<span class="custom-next">+</span>').insertAfter(input);
						},
						renderPrev: function(input) {
							return $('<span class="custom-prev">-</span>').insertBefore(input);
						},
						disabledClassName: 'custom-disabled'
					});
				};
				$('.color-option ul li').on('click', function() {

					$('.color-option ul li.active').removeClass('active');
					$(this).addClass('active');
				});
				$('.or-canvas-cart-trigger').on("click", function() {
					$('.or-ofcanvas-cart-wrapper').toggleClass("or-canvas-cart-on");
				});
			},
			videoBox: function (){
				jQuery('.video_box').magnificPopup({
					disableOn: 200,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false,
				});
				$('.zoom-gallery').magnificPopup({
					delegate: 'a',
					type: 'image',
					closeOnContentClick: false,
					closeBtnInside: false,
					mainClass: 'mfp-with-zoom mfp-img-mobile',
					gallery: {
						enabled: true
					},
					zoom: {
						enabled: true,
						duration: 300, 
						opener: function(element) {
							return element.find('img');
						}
					}
				});
				jQuery(window).on('load', function(){
					$('.filtr-container').imagesLoaded ( function(){});
					var filterizd = $('.filtr-container');

					if(filterizd.length) {
						filterizd.filterizr({

						});
						$('.filtr-button').on('click', function() {

							$('.filtr-button.filtr-active').removeClass('filtr-active');
							$(this).addClass('filtr-active');
						});
					}
				});
			},
			MobileMenu: function (){
				$('.open_mobile_menu').on("click", function() {
					$('.mobile_menu_wrap').toggleClass("mobile_menu_on");
				});
				$('.open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on');
				});
				if($('.mobile_menu li.dropdown ul').length){
					$('.mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-caret-right"></span></div>');
					$('.mobile_menu li.dropdown .dropdown-btn').on('click', function() {
						$(this).prev('ul').slideToggle(500);
					});
				}
				$(".dropdown-btn").on("click", function () {
					$(this).toggleClass("toggle-open");
				});
			},
			SkillProgress: function (){
				if ($(".progress-bar").length) {
					var $progress_bar = $('.progress-bar');
					$progress_bar.appear();
					$(document.body).on('appear', '.progress-bar', function() {
						var current_item = $(this);
						if (!current_item.hasClass('appeared')) {
							var percent = current_item.data('percent');
							current_item.css('width', percent + '%').addClass('appeared').parent().append('<span>' + percent + '%' + '</span>');
						}

					});
				};
			},
			countDown:  function (){
				if ($('.best-deal-countdown').length > 0) {
					var deadlineDate = new Date('sep 26, 2021 23:59:59').getTime();
					var countdownDays = document.querySelector('.days .or-count-down-number');
					var countdownHours = document.querySelector('.hours .or-count-down-number');
					var countdownMinutes = document.querySelector('.minutes .or-count-down-number');
					var countdownSeconds = document.querySelector('.seconds .or-count-down-number');
					setInterval(function () {
						var currentDate = new Date().getTime();
						var distance = deadlineDate - currentDate;
						var days = Math.floor(distance / (1000 * 60 * 60 * 24));
						var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
						var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
						var seconds = Math.floor((distance % (1000 * 60)) / 1000);
						countdownDays.innerHTML = days;
						countdownHours.innerHTML = hours;
						countdownMinutes.innerHTML = minutes;
						countdownSeconds.innerHTML = seconds;
					}, 1000);

				};
			},

		}
	}
	jQuery(document).ready(function (){
		Prysm.init();
	});

})();

// custom code started

const base_url = $('input[name="base_url"]').val();

const toast = (msg, error) => {
	
	toastr.options = {
		positionClass: "toast-top-center",
		onclick: null,
	};

	error ? toastr["error"](msg) : toastr["success"](msg);

};

const wish = {
	add: (p_id) => {
		$.ajax({
			url: `${base_url}add-to-wish`,
			type: "POST",
			data: {p_id: p_id},
			dataType: "json",
			async: false,
			beforeSend: () => {
				$('#preloader').fadeIn('fast');
			},
			success: (response) => {
				$("#preloader").fadeOut("slow");
				toast(response.message, response.error);
			},
			error: (xhr, ajaxOptions, thrownError) => {
				$("#preloader").fadeOut("slow");
				toast("Something not going good. Try again.", 1);
			}
		});
	},
	delete: (p_id) => {
		$.ajax({
			url: `${base_url}delete-wish`,
			type: "POST",
			data: {p_id: p_id},
			dataType: "json",
			async: false,
			beforeSend: () => {
				$('#preloader').fadeIn('fast');
			},
			success: (response) => {
				$("#preloader").fadeOut("slow");
				toast(response.message, response.error);
				$("#show-wish").html(response.wish);
			},
			error: (xhr, ajaxOptions, thrownError) => {
				$("#preloader").fadeOut("slow");
				toast("Something not going good. Try again.", 1);
			}
		});
		return;
	},
};
const cart = {
	add: (p_id) => {
		const qty = $("input[name=quantity]").val() ? $("input[name=quantity]").val() : 1;
		cart.save(p_id, qty);
	},
	update: (p_id, rowid, operation) => {
		let qty = $(`input[name=${rowid}]`).val();

		operation === '+' ? qty++ : qty--;

		if(qty > 0 && $(`input[name=${rowid}]`).attr('max') >= qty)
		{
			$(`input[name=${rowid}]`).val(qty);
			const show = cart.save(p_id, qty);
			$("#show-cart").html(show.cart);
		}
	},
	delete: (rowid) => {
		$.ajax({
			url: `${base_url}delete-cart`,
			type: "POST",
			data: {rowid: rowid},
			dataType: "json",
			async: false,
			beforeSend: () => {
				$('#preloader').fadeIn('fast');
			},
			success: (response) => {
				$("#preloader").fadeOut("slow");
				if (!response.error) $(".prod-count").html(response.count);
				toast(response.message, response.error);
				$("#show-cart").html(response.cart);
			},
			error: (xhr, ajaxOptions, thrownError) => {
				$("#preloader").fadeOut("slow");
				toast("Something not going good. Try again.", 1);
			}
		});
		return;
	},
	save: (p_id, qty) => {
		var data;
		$.ajax({
			url: `${base_url}add-to-cart`,
			type: "POST",
			data: {p_id: p_id, qty: qty},
			dataType: "json",
			async: false,
			beforeSend: () => {
				$('#preloader').fadeIn('fast');
			},
			success: (response) => {
				data = response;
				if (!response.error) $(".prod-count").html(response.count);
				$("#preloader").fadeOut("slow");
				toast(response.message, response.error);
			},
			error: (xhr, ajaxOptions, thrownError) => {
				$("#preloader").fadeOut("slow");
				toast("Something not going good. Try again.", 1);
			}
		});
		return data;
	},
	checkout: () => {
		let finalResponse;

		if($("input[name=payment_type]:checked").val() === 'Cash on delivery')
		{
			finalResponse = cart.verifyOrSaveOrder("Cash on delivery");
			
			toast(finalResponse.message, finalResponse.error);

			if(!finalResponse.error)
			{
				setTimeout(() => {
					window.location.href = 'my-orders';
				}, 2000);
			}
		}
		else
		{
			let response = cart.verifyOrSaveOrder();
			
			var options = {
				/*live api key*/
				// "key": "rzp_live_Jf7dJMbtMe1xSC",
				// "secret": "7QSfgUjxMW5xWKY3ingxBgWN",
				/*testing api key*/
				"key": "rzp_test_j7j4Mvu2yV6kh1",
				"secret": "wfG7mIv8oXhfsRgeXSDWL2Hf",
				"amount": response.message, // 2000 paise = INR 20
				"description": "Payment",
				"prefill": {
					"name": $("#f_name").val(),
					"contact": $("#mobile").val(),
					"email": $("#email").val(),
				},
				"handler": function(res) {
					finalResponse = cart.verifyOrSaveOrder(res.razorpay_payment_id);
					toast(finalResponse.message, finalResponse.error);

					if(!finalResponse.error)
					{
						setTimeout(() => {
							window.location.href = "my-orders";
						}, 2000);
					}
				}
			};
			var rzp1 = new Razorp(options);
			rzp1.open();
			return;
		}
	},
	verifyOrSaveOrder: (payment_id='') => {
		var data = $('#checkout-form').serialize();
		data += "&payment_id=" + payment_id;
		var returnData;
		$.ajax({
			url: `${base_url}checkout`,
			type: "POST",
			data: data,
			dataType: "json",
			async: false,
			beforeSend: () => {
				$('#preloader').fadeIn('fast');
			},
			success: (response) => {
				$("#preloader").fadeOut("slow");
				$(".text-danger").html('');

				if (response.error && response.errors){
					$.each(response.errors, (input, error) => {
						$(`#error-${input}`).html(error);
					});
				}else{
					returnData = response;
				}
			},
			error: (xhr, ajaxOptions, thrownError) => {
				$("#preloader").fadeOut("slow");
				toast("Something not going good. Try again.", 1);
			}
		});

		return returnData;
	}
};

/* if (location.href.indexOf("checkout") !== -1)
{
	const checkoutTimeout = setTimeout(() => {

		$.ajax({
			url: `${base_url}update-quantities`,
			type: "POST",
			data: $("#update-qty").serialize()
		});

		clearTimeout(checkoutTimeout);

	}, 1000 * 60 * 1);
} */
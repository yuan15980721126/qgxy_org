$(function() {
	// 是否是手机
	var isPhone;
	function isPc(){
		if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){
			isPhone = true;
		}else{
			isPhone = false;
		}
	}
	isPc();
	var maxWidth = $(document).width()>768?'800':($(document).width()-30);
	$(document).on('click', '.company_tag_item', function(e) {
		var $src = $(this).attr('data-url');
		layer.open({
			type: 1,
			title: false,
			shadeClose: true,
			area: 'auto',
			maxWidth:maxWidth,
			maxHeight:500,
			content: '<img src="' + $src + '" />'
		});
	})
	$(document).on('click', '.more-card-detail', function(e) {
		var data = $(e.currentTarget).attr('data-detail');
		data = data ? JSON.parse(decodeURIComponent(data)) : {};
		var html = $('#card-detail');
		// console.log(data);
		html.find('.per-img img').attr('src', data.img);
		html.find('.name').text(data.name ? data.name : '-');
		html.find('.company').text(data.company ? data.company : '-');
		html.find('.tel').text(data.tel ? data.tel : '-');
		html.find('.wechat').text(data.wechat ? data.wechat : '-');
		html.find('.email').text(data.email ? data.email : '-');
		html.find('.introduce').text(data.introduce ? data.introduce : '-');
		// if(data.personal_SP_img){
		// 	html.find('.qrcode img').attr('src',data.personal_SP_img).siblings('.qrcode_tip').show();
		// }else{
		// 	html.find('.qrcode_tip').hide();
		// }
		layer.open({
			type: 1,
			title: false,
			// closeBtn: 0,
			area: '700px',
			maxWidth:1000,
			maxHeight:500,
			shadeClose: true,
			skin: '.card-detail',
			content: html
		});
	}.bind(this));
	
	// 荣誉证书
	$(document).on('click', '.showHonorImg', function(e) {
		var data = $(e.currentTarget).attr('data-detail');
		data = data ? JSON.parse(decodeURIComponent(data)) : {};
		var html = $('#art-box');
		// console.log(data,html)
		// html.find('.bimg img').attr('src', data.CertImg);
        html.find('.bimg img').attr('src', data.image);
		html.find('.title').text(data.title ? data.title : '-');
		html.find('.issueorg dd').text(data.company ? data.company : '-');
		html.find('.certno dd').text(data.number ? data.number : '-');
		html.find('.issuedate dd').text(data.gettime ? data.gettime : '-');
		html.find('.date dd').text(data.effectivetime ? data.effectivetime : '-');
		layer.open({
			type: 1,
			title: false,
			shadeClose: true,
			area: 'auto',
			maxWidth:maxWidth,
			maxHeight:'500',
			content: html
		});
	});
	$(document).on('click', '.showImg', function() {
		var $src = $(this).attr('src');
		layer.open({
			type: 1,
			title: false,
			shadeClose: true,
			area: 'auto',
			maxWidth:maxWidth,
			maxHeight:500,
			content: '<img src="' + $src + '" />'
		});
	});
	var direction = isPhone?'horizontal':'vertical';
	var galleryThumbs = new Swiper('.gallery-thumbs', {
		direction: direction,
		spaceBetween: 10,
		slidesPerView: 4,
		freeMode: true,
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
		mousewheel: true,
		scrollbar: {
			el: '.swiper-scrollbar',
			draggable: true,
		  },
	});
	var galleryTop = new Swiper('.gallery-top', {
		spaceBetween: 10,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: galleryThumbs
		}
	});
	maxWidth = isPhone?($(document).width()-30):'1000';
	$(document).on('click', '.gallery-top .swiper-slide', function(e) {
		var src = $(this).css('background-image').split("\"")[1];
		layer.open({
			type: 1,
			title: false,
			shadeClose: true,
			area: 'auto',
			maxWidth:maxWidth,
			maxHeight:500,
			content: '<img src="' + src + '" />'
		});
	});
	// 导航栏浮动效果
	function setNavFixed(){
		var nav=$(".company-wiki-box1"); //得到导航对象
		var win=$(window); //得到窗口对象
		var sc=$(document);//得到document文档对象。
		var headerH = $('header').height();
		$(window).scroll(function(){
			if(sc.scrollTop()>=headerH){
				nav.addClass("fixed_tab_box");
			}else{
				nav.removeClass("fixed_tab_box");
			}
		})
	}
	setNavFixed();
	$(window).resize(function(){
		setNavFixed();
	})
	// 手机导航滚动
	if(isPhone){
		// console.log(3)
		$('.company-wiki-box1_tab').addClass("swiper-container");
		$('.company-wiki-box1_tab .nav').wrapAll('<div class="swiper-wrapper"></div>')
		$('.company-wiki-box1_tab .nav').addClass('swiper-slide');
		new Swiper('.company-wiki-box1_tab', {
			slidesPerView: 4,
		});
	}
});

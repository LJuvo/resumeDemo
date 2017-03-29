function initWeixinShare() {
	var theWebUrl = window.location.href.split('#')[0];
	var title = "";
	var descContent = "我是刀锋战士，10秒解救SNH48女神，邀你来战！";
	var imgUrl ="http://7xrayk.com1.z0.glb.clouddn.com/SHN48.jpg";
	var noncestr = "1234567890123456";
	$.ajax({
		type: "post",
		url: "../WeiXin/Info",
		data: {url:theWebUrl,noncestr:noncestr},
		success: function(result) {
			console.log(result);
			if(result.issuccess) {
				wx.config({
					debug: result.debug, //这里是开启测试，如果设置为true，则打开每个步骤，都会有提示，是否成功或者失败
					appId: result.appid,
					timestamp: result.timestamp, //
					nonceStr: noncestr, //
					signature: result.sha1value,
					jsApiList: [
						// 所有要调用的 API 都要加到这个列表中
						'onMenuShareTimeline',
						'onMenuShareAppMessage',
						'onMenuShareQQ',
						'onMenuShareWeibo',
						'onMenuShareQZone',
					]
				});

				wx.ready(function() {
					wx.onMenuShareTimeline({
						title: descContent, // 分享标题
						link: theWebUrl, // 分享链接
						imgUrl:imgUrl, // 分享图标
						success: function() {
							// 用户确认分享后执行的回调函数
							_czc.push(["_trackEvent","分享到朋友圈","ShareTimeline","用户使用分享栏分享到朋友圈"]);
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
							_czc.push(["_trackEvent","取消分享到朋友圈","ShareTimelineCancelled","取消分享到朋友圈"]);
						}
					});
					wx.onMenuShareAppMessage({
						title: title, // 分享标题
						desc: descContent, // 分享描述
						link: theWebUrl, // 分享链接
						imgUrl: imgUrl, // 分享图标
						type: '', // 分享类型,music、video或link，不填默认为link
						dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
						success: function() {
							// 用户确认分享后执行的回调函数
							_czc.push(["_trackEvent","发送给朋友","ShareAppMessage","用户使用分享栏发送给朋友"]);
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
							_czc.push(["_trackEvent","取消发送给朋友","ShareAppMessageCancelled","取消发送给朋友"]);
						}
					});
					wx.onMenuShareQQ({
						title: title, // 分享标题
						desc: descContent, // 分享描述
						link: theWebUrl, // 分享链接
						imgUrl: imgUrl, // 分享图标
						success: function() {
							// 用户确认分享后执行的回调函数
							_czc.push(["_trackEvent","分享到手机QQ","ShareQQ","用户使用分享栏分享到手机QQ"]);
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
							_czc.push(["_trackEvent","取消分享到手机QQ","ShareQQCancelled","用户取消分享到手机QQ"]);
						}
					});
					wx.onMenuShareWeibo({
						title: title, // 分享标题
						desc: descContent, // 分享描述
						link: theWebUrl, // 分享链接
						imgUrl: imgUrl, // 分享图标
						success: function() {
							// 用户确认分享后执行的回调函数
							_czc.push(["_trackEvent","分享到腾讯微博","ShareWeibo","用户使用分享栏分享到腾讯微博"]);
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
							_czc.push(["_trackEvent","取消分享到腾讯微博","ShareWeiboCancelled","用户取消分享到腾讯微博"]);
						}
					});

					wx.onMenuShareQZone({
						title: title, // 分享标题
						desc: descContent, // 分享描述
						link: theWebUrl, // 分享链接
						imgUrl: imgUrl, // 分享图标
						success: function() {
							// 用户确认分享后执行的回调函数
							_czc.push(["_trackEvent","分享到QQ空间","ShareQZone","用户使用分享栏分享到QQ空间"]);
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
							_czc.push(["_trackEvent","取消分享到QQ空间","ShareQZoneCancelled","用户取消分享到QQ空间"]);
						}
					});
				});

			}
		}
	});

	//alert方法去除网页链接
	var wAlert = window.alert;
	window.alert = function(message) {
		try {
			var iframe = document.createElement("IFRAME");
			iframe.style.display = "none";
			iframe.setAttribute("src", 'data:text/plain,');
			document.documentElement.appendChild(iframe);
			var alertFrame = window.frames[0];
			var iwindow = alertFrame.window;
			if(iwindow == undefined) {
				iwindow = alertFrame.contentWindow;
			}
			iwindow.alert(message);
			iframe.parentNode.removeChild(iframe);
		} catch(exc) {
			return wAlert(message);
		}
	}
	var wConfirm = window.confirm;
	window.confirm = function(message) {
		try {
			var iframe = document.createElement("IFRAME");
			iframe.style.display = "none";
			iframe.setAttribute("src", 'data:text/plain,');
			document.documentElement.appendChild(iframe);
			var alertFrame = window.frames[0];
			var iwindow = alertFrame.window;
			if(iwindow == undefined) {
				iwindow = alertFrame.contentWindow;
			}
			iwindow.confirm(message);
			iframe.parentNode.removeChild(iframe);
		} catch(exc) {
			return wConfirm(message);
		}
	}

//$.getJSON("js/userinfo.json",function(data){});
}
var tm;
var gameObj = function(){
	base(this,LSprite,[]);
}
gameObj.prototype.init = function(){
	var self = this;
	//背景音乐关闭
//	MySoundPlayer.background.close();

//背景
	var touchBg = new LBitmap(new LBitmapData(imglist["cover_bg"]));
	SceneLayer.addChild(touchBg);

	tm = new TouchMouse();
	gameLayer.addChild(tm);
	
}

function startPlay(){
	removeChild(pagePop);
}
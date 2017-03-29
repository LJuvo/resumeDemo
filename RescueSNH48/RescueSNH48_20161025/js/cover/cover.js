var coverObj = function(){
	base(this,LSprite,[]);
}
coverObj.prototype.init = function(){
	var self = this;
	coverLayer = new LBitmap(new LBitmapData(imglist["cover_bg"]));
	self.addChild(coverLayer);
	
	var coverSNH48_bg = new LBitmap(new LBitmapData(imglist["cover_SNH48_bg"]));
	coverSNH48_bg.x = (1080 - coverSNH48_bg.getWidth())/2;
	coverSNH48_bg.y = 575;
	coverSNH48_bg.visible = false;
	self.addChild(coverSNH48_bg);
	
//	LTweenLite.to(coverSNH48_bg,1,{alpha:0,ease:Elastic.easeIn})
//	.to(coverSNH48_bg,1,{alpha:1,ease:Elastic.easeIn});
	
	LTweenLite.to(coverSNH48_bg,0.005,{scaleX:2,scaleY:2,alpha:0,ease:Quad.easeInOut,onComplete:function(obj){
		coverSNH48_bg.visible = true;
	}})
	.to(coverSNH48_bg,1,{scaleX:1,scaleY:1,alpha:1,ease:Quad.easeInOut});
	
	var coverSNH48 = new LBitmap(new LBitmapData(imglist["cover_SNH48"]));
	coverSNH48.x = (1080 - coverSNH48.getWidth())/2;
	coverSNH48.y = 575;
	coverSNH48.visible = false;
	self.addChild(coverSNH48);
	
	LTweenLite.to(coverSNH48,0.005,{delay:0.5,scaleX:3,scaleY:3,alpha:0,ease:Quad.easeInOut,onComplete:function(obj){
		coverSNH48.visible = true;
	}})
	.to(coverSNH48,1,{scaleX:1,scaleY:1,alpha:1,ease:Quad.easeInOut});
	
	var covertitle = new LBitmap(new LBitmapData(imglist["cover_title"]));
	covertitle.x = (1080 - covertitle.getWidth())/2;
	covertitle.y = 180;
	self.addChild(covertitle);
}
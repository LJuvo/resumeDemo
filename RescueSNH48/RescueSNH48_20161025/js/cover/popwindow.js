var Popwindow = function(){
	base(this,LSprite,[]);
}
Popwindow.prototype.init = function(flag){
	var self = this;
//	coverLayer.die();
	self.resMask = new LSprite();
	self.resMask.graphics.drawRect(1,"#000",[0, 0, 1080,1761],true,"rgba(0,0,0,0.7)");  
	self.resMask.addEventListener(LMouseEvent.MOUSE_UP,startGame);
	self.addChild(self.resMask);
	
	var coverImg = new LBitmap(new LBitmapData(imglist[flag]));
	coverImg.x = (1080 - coverImg.getWidth())/2;
	coverImg.y = (1761 - coverImg.getHeight())/2;
	self.addChild(coverImg);
}


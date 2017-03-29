var whitediskObj = function(){
	base(this,LSprite,[]);
}
whitediskObj.prototype.init = function(){
	var self = this;
	var switchTab= new LBitmap(new LBitmapData(imglist["disk_white"]));
	self.addChild(switchTab);
	self.addEventListener(LMouseEvent.MOUSE_DOWN,switchmusic);	
//	base(onframe,arguments);
}
function whiteswitchmusic(){
	
//	if(switchState){
//		switchState = false;
//	}else{
//		switchState = true;
//	}
	console.log(switchState);
	
}


var switchTab;
var whiteDisk;
var greyDisk;
var diskObj = function(){
	base(this,LSprite,[]);
}
diskObj.prototype.init = function(){
	whiteDisk = new LBitmapData(imglist["disk_white"]);
	greyDisk = new LBitmapData(imglist["disk_grey"]);
	
	MySoundPlayer = new SoundPlayer();
	musicLayer.addChild(MySoundPlayer);
	MySoundPlayer.playSound("background");
	//switchState = false;
	//MySoundPlayer.background.stop();
	
	var self = this;
	switchTab= new LBitmap(greyDisk);
	self.addChild(switchTab);
	
	var musicRedDisk = new LSprite();
	musicRedDisk.graphics.drawRect(0,"#000",[0,0,80,80],true,"rgba(0,0,0,0)"); 
	self.addChild(musicRedDisk);
	
	
	
//	base(onframe,arguments);
}
function switchmusic(){
	
	if(switchState){
		switchState = false;
		MySoundPlayer.background.stop();
		_czc.push(["_trackEvent","手动关闭音乐","UserStopMusic","用户手动关闭背景音乐"]);
	}else{
		switchState = true;
		MySoundPlayer.background.play();
			_czc.push(["_trackEvent","手动打开音乐","UserPlayMusic","用户手动开启背景音乐"]);
	}
	console.log(switchState);
	
}
function rotateDisk(){
//	switchTab= new LBitmap(new LBitmapData(imglist["disk_grey"]));
	if(switchState){
		switchTab.rotate += 5;
	}
	
	if(coverNum>0){
		switchTab.bitmapData = whiteDisk;
	}
	if(coverNum>=4){
		switchTab.bitmapData = greyDisk;
	}
}

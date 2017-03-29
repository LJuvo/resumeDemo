
function SoundPlayer(){
	var self = this;
	self.loadIndex = 0;
	self.background = new LSound();
	self.background.parent = self;
	//如果IOS环境，并且不支持WebAudio，则没有预先读取的音频
	if(LGlobal.ios && !LSound.webAudioEnabled){
		return;
	}
	//如果没有预先读取的音频
	if(!imglist["sound_background"]){
		return;
	}
	self.background.addEventListener(LEvent.COMPLETE,self.backgroundLoadComplete);
	self.background.load(imglist["sound_background"]);
//	var url =imglist["sound_background"];
//	var url ="src/sound/background.";
//	self.background.load(url+"mp3,"+url+"ogg,"+url+"wav");
	//如果是移动浏览器，并且不支持WebAudio，则无法适用多声道，所以只适用背景音乐
	if(LGlobal.mobile && !LSound.webAudioEnabled){
		return;
	}
	self.get = new LSound();
	self.get.parent = self;
	self.fly = new LSound();
	self.fly.parent = self;
	self.touchgood = new LSound();
	self.touchgood.parent = self;
	self.touchbad = new LSound();
	self.touchbad.parent = self;
	
	self.get.addEventListener(LEvent.COMPLETE,self.getLoadComplete);
	var url = "src/sound/zyf.";
	self.get.load(url+"mp3,"+url+"ogg,"+url+"wav");
	self.fly.addEventListener(LEvent.COMPLETE,self.flyLoadComplete);
	var url = "src/sound/hpy.";
	self.fly.load(url+"mp3,"+url+"ogg,"+url+"wav");
//	self.fly.load(imglist["sound_fly"]);
	//touch鼠标点击事件响应音频
	self.touchgood.addEventListener(LEvent.COMPLETE,self.touchgoodLoadComplete);
	var url = "src/sound/get.";
	self.touchgood.load(url+"mp3,"+url+"ogg,"+url+"wav");
	self.touchbad.addEventListener(LEvent.COMPLETE,self.touchbadLoadComplete);
	var url = "src/sound/fly.";
	self.touchbad.load(url+"mp3,"+url+"ogg,"+url+"wav");
}
SoundPlayer.prototype.loadSound = function(){
	var self = this;
	//如果PC环境，或者支持WebAudio，则已经预先读取了音频，无需再次读取
	if(LSound.webAudioEnabled || LGlobal.os == OS_PC){
		if (LGlobal.mobile){
			switch(self.loadIndex++){
				case 0:
					self.get.play(self.get.length);
					break;
				case 1:
					self.fly.play(self.fly.length);
					break;
				case 2:
					self.touchgood.play(self.touchgood.length);
					break;
				case 3:
					self.touchbad.play(self.touchbad.length);
					break;
			}
		}
		return;
	}
	//已读取音频，无需再次读取
	if(self.loadIndex > 0 ){
		return;
	}
	self.loadIndex++;
//	self.background.addEventListener(LEvent.COMPLETE,self.backgroundLoadComplete);
//	self.background.load("../src/sound/background.mp3");
};
SoundPlayer.prototype.playSound = function(name){
	var self = this;
	switch(name){
		case "get":
			if(!self.getIsLoad)return;
			self.fly.close();
			self.get.play(0,1);
			break;
		case "fly":
			if(!self.flyIsLoad)return;
			self.get.close();
			self.fly.play(0,1);
			break;
		case "background":
			if(!self.backgroundIsLoad)return;
			self.background.close();
			self.background.play(0,100);
			break;
		case "touchgood":
			if(!self.touchgoodIsLoad)return;
			self.touchbad.close();
			self.touchgood.play(0,1,1);
			break;
		case "touchbad":
			if(!self.touchbadIsLoad)return;
			self.touchgood.close();
			self.touchbad.play(0,1,1);
			break;
	}
};
SoundPlayer.prototype.closeSound = function(){
	var self = this;
			self.fly.close();
		
			self.get.close();
			
			self.background.close();
			
			self.touchgood.close();			
			self.touchbad.close();
};
SoundPlayer.prototype.closePersonSound = function(){
	var self = this;
			self.fly.close();
		
			self.get.close();
			
//			self.background.close();
};
SoundPlayer.prototype.backgroundLoadComplete = function(event){
	var self = event.currentTarget;
	self.parent.backgroundIsLoad = true;
//	self.play(0,100);
};
SoundPlayer.prototype.getLoadComplete = function(event){
	var self = event.currentTarget;
	self.parent.getIsLoad = true;
};
SoundPlayer.prototype.flyLoadComplete = function(event){
	var self = event.currentTarget;
	self.parent.flyIsLoad = true;
};
SoundPlayer.prototype.touchgoodLoadComplete = function(event){
	var self = event.currentTarget;
	self.parent.touchgoodIsLoad = true;
};
SoundPlayer.prototype.touchbadLoadComplete = function(event){
	var self = event.currentTarget;
	self.parent.touchbadIsLoad = true;
};
SoundPlayer.prototype.soundgetLength = function(){
	var self = this;
	return self.get.length;
};
SoundPlayer.prototype.soundflyLength = function(){
	var self = this;
	return self.fly.length;
};
SoundPlayer.prototype.soundbgLength = function(){
	var self = this;
	return self.background.length;
};
SoundPlayer.prototype.soundtouchgoodLength = function(){
	var self = this;
	return self.touchgood.length;
};
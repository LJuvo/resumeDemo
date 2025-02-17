
    LInit(1000/30, "legend", 800, 480, main);
	var backLayer;
	var sound;
	var nowTime;
	var musiclist = { 
		chengbi:"./music/chengbi.",
		missyoutonight:"./music/MissYouTonight."};
	
	function main(){
		LGlobal.webAudio = false;
		sound = new LSound();
		sound.x = 20;
		sound.y = 100;
		backLayer = new LSprite();
		addChild(backLayer);
		
		nowTime = new LTextField();
		nowTime.x = 100;
		nowTime.y = 50;
		backLayer.addChild(nowTime);
		nowTime.text = "00:00:00";
		backLayer.addEventListener(LEvent.ENTER_FRAME,onframe);
	
		backLayer.addEventListener(LMouseEvent.MOUSE_UP,onup);
		
		
	}
	
	function changeMusicSrc(e){
	  var val = e.value;
	  var url ='';
	  if(val==='missyou'){
	    url = musiclist.missyoutonight;
	  }else{
	  	url = musiclist.chengbi;
	  }
	  sound.load(url+"mp3,"+url+"ogg,"+url+"wav");
	  if(sound.length == 0){
				sound.addEventListener(LEvent.COMPLETE,loadOver);
			}else if(sound.playing){
				sound.stop();
			}else{
				sound.play();
			}
	  
	}
	
	
	function onup(e){
		if(e.offsetX > 30 && e.offsetX < 60 && e.offsetY > 0 && e.offsetY < 30){
			if(sound.length == 0){
				var url = "./music/MissYouTonight.";
				sound.load(url+"mp3,"+url+"ogg,"+url+"wav");
				sound.addEventListener(LEvent.COMPLETE,loadOver);
			}else if(sound.playing){
				sound.stop();
			}else{
				sound.play();
			}
		}else if(sound.length > 0 && e.offsetX > 200 && e.offsetX < 350 && e.offsetY > 50 && e.offsetY < 90){
			sound.setVolume((e.offsetX - 200)/150);
		}
	}
	function loadOver(){
		sound.play();
	}
	function onframe(){
		backLayer.graphics.clear();
		backLayer.graphics.drawRect(2,"#000000",[20,0,440,100]);
		backLayer.graphics.drawRect(1,"#000000",[70,10,380,30]);
		
		var sec = sound.getCurrentTime() % 60 >>>0;
		if(sec < 10)sec="0"+sec;
		var min = (sound.getCurrentTime() / 60)>>>0;
		if(min < 10)min="0"+min;
		nowTime.text = "00:"+min+":"+sec;
		backLayer.graphics.drawRect(1,"#000000",[70,10,380*(sound.getCurrentTime()/sound.length)>>>0,30],true,"#000000");
		if(sound.playing){
			backLayer.graphics.drawRect(2,"#000000",[30,10,10,30],true,"#000000");
			backLayer.graphics.drawRect(2,"#000000",[45,10,10,30],true,"#000000");
		}else{
			backLayer.graphics.drawVertices(1,"#000000",[[30,10],[60,25],[30,40]],true,"#000000");
		}
		for(var i=0;i<10;i++){
			var sx = 200 + i*15;
			var sy = 40 - i*4;
			if(sound.getVolume() > i*0.1){
				backLayer.graphics.drawRect(1,"#000000",[sx,50,10,40-sy],true,"#000000");
			}else{
				backLayer.graphics.drawRect(1,"#000000",[sx,50,10,40-sy]);
			}
		}
	}
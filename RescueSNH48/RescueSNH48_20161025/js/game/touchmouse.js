var CageMenu;
var resMask,coverImg;
var mouseType;
var time = 0;
var timer,timecc,timeToCharacter;
var timeNow = "";
var setTimeLine;
var gamePlayState = false;//游戏状态
var gameLastState = "lose";//游戏最终结果
var SNH48progress;
//var charNum = 2;//怪物初始数量范围（1~2随机）
var winScore = 6;//游戏胜利所需分数
var needTime = 1.0;
var timeRun = false;
var personList = [
{name :"person_00"},
{name :"person_01"},
{name :"person_02"},
{name :"person_03"},
{name :"person_04"},
{name :"person_05"},
{name :"person_06"},
{name :"person_07"}];


var redLine;
var radiolist = [
		{name:"one",img:"radiopersonGreyOne"},
		{name:"two",img:"radiopersonGreyTwo"}];
var RadioBtn;

var RadioBtn0;
var RadioBtn1;
var RadioBtn0State = false;
var RadioBtn1State = false;

//步长
var STEP = 64;
var mousecase;
var radioImg0;
var radioImg1;

var touchLayer,mouseLayer,scoreLayer,popLayer,SoundTime;

var progress01,progress02,progress03,progress04,progress05,progress06;
var progresslight01,progressgrey01;
var progressState01 = false;
var progresslight02,progressgrey02;
var progressState02 = false;
var progresslight03,progressgrey03;
var progressState03 = false;
var progresslight04,progressgrey04;
var progressState04 = false;
var progresslight05,progressgrey05;
var progressState05 = false;
var progresslight06,progressgrey06;
var progressState06 = false;

var popState = false;
var soundTimeText;

function TouchMouse(){
	var self = this;

	progresslight01 = new LBitmap(new LBitmapData(imglist["progress_01light"]));
	progressgrey01 = new LBitmap(new LBitmapData(imglist["progress_01grey"]));
	progresslight02 = new LBitmap(new LBitmapData(imglist["progress_02light"]));
	progressgrey02 = new LBitmap(new LBitmapData(imglist["progress_02grey"]));
	progresslight03 = new LBitmap(new LBitmapData(imglist["progress_03light"]));
	progressgrey03 = new LBitmap(new LBitmapData(imglist["progress_03grey"]));
	progresslight04 = new LBitmap(new LBitmapData(imglist["progress_04light"]));
	progressgrey04 = new LBitmap(new LBitmapData(imglist["progress_04grey"]));
	progresslight05 = new LBitmap(new LBitmapData(imglist["progress_05light"]));
	progressgrey05 = new LBitmap(new LBitmapData(imglist["progress_05grey"]));
	progresslight06 = new LBitmap(new LBitmapData(imglist["progress_06light"]));
	progressgrey06 = new LBitmap(new LBitmapData(imglist["progress_06grey"]));

	self.init();
}
TouchMouse.prototype.init = function(){
	touchLayer = new LSprite();
	self.addChild(touchLayer);
	
	mouseLayer = new LSprite();
	self.addChild(mouseLayer);
	
	scoreLayer = new LSprite();
	self.addChild(scoreLayer);
	
	popLayer = new LSprite();
	self.addChild(popLayer);
	
	mousecase = new LBitmap(new LBitmapData(imglist["bowl"]));
	
	bowlLayer = new LSprite();
	bowlLayer.graphics.drawRect(0,"#000",[0,0,1080,1761],true,"rgba(0,0,0,0)");
	self.addChild(bowlLayer);
	
	SoundTime = new LSprite();
	
	self.addChild(SoundTime);
	
	bowlLayer.addChild(mousecase);
	mousecase.x = -400;
	mousecase.y = -400;
//	bowlLayer.addEventListener(LMouseEvent.MOUSE_UP,mouseBowl);
//	bowlLayer.addEventListener(LMouseEvent.MOUSE_UP,mouseBowlChange);
	
	initTMLayer();
}

function initTMLayer(){
	
	var gameTime = new LBitmap(new LBitmapData(imglist["game_time"]));
	gameTime.x = (1080 - gameTime.getWidth())/2;
	gameTime.y = 120;	
	touchLayer.addChild(gameTime);
	
	//初始化倒计时时间显示
	timer = new LTextField();
	timer.color = "#000";
	timer.text = "00:00";
	timer.size = "60";
	timer.x = (1080 - timer.getWidth())/2;
	timer.y = 200;
	touchLayer.addChild(timer);
	
	//游戏进度条
	var gameProgress = new LBitmap();
	touchLayer.addChild(gameProgress);
	//人物进度
	SNH48progress = new LBitmap();
	touchLayer.addChild(SNH48progress);

	initProgress();
	
	
	touchLayer.addEventListener(LEvent.ENTER_FRAME,onframe);

	initCage();
	addTimeManger();
	popState = true;
	initPop();
	
}
function initProgress(){
	//游戏进度条
	var gamePersonProgress = new LSprite();

	var proWidth=500,proHeight=340;
	var y1 = 1340,y2 = 1490;
		progress01 = new LSprite();
		progress01.addChild(progressgrey01);
		progress01.x = (LGlobal.width - proWidth)/2 + (proWidth - progress01.getWidth()*3)/6*1;
		progress01.y = y1;
		gamePersonProgress.addChild(progress01);

		progress02 = new LSprite();
		progress02.addChild(progressgrey02);
		progress02.x = (LGlobal.width - proWidth)/2 + (proWidth - progress02.getWidth()*3)/6*3+progress02.getWidth() *1;
		progress02.y = y1;
		gamePersonProgress.addChild(progress02);
		
		progress03 = new LSprite();
		progress03.addChild(progressgrey03);
		progress03.x = (LGlobal.width - proWidth)/2 + (proWidth - progress03.getWidth()*3)/6*5 + progress03.getWidth() *2;
		progress03.y = y1;
		gamePersonProgress.addChild(progress03);
		
		progress04 = new LSprite();
		progress04.addChild(progressgrey04);
		progress04.x = (LGlobal.width - proWidth)/2 + (proWidth - progress01.getWidth()*3)/6*1;
		progress04.y = y2;
		gamePersonProgress.addChild(progress04);
		
		progress05 = new LSprite();
		progress05.addChild(progressgrey05);
		progress05.x = (LGlobal.width - proWidth)/2 + (proWidth - progress05.getWidth()*3)/6*3 + progress05.getWidth() *1;
		progress05.y = y2;
		gamePersonProgress.addChild(progress05);
		
		progress06 = new LSprite();
		progress06.addChild(progressgrey06);
		progress06.x = (LGlobal.width - proWidth)/2 + (proWidth - progress06.getWidth()*3)/6*5 + progress06.getWidth() *2;
		progress06.y = y2;
		gamePersonProgress.addChild(progress06);
		

	gamePersonProgress.graphics.drawRect(2,"#f00",[LGlobal.width/2 -250,1320,proWidth,proHeight],true,"rgba(0,0,0,0)");
	
	touchLayer.addChild(gamePersonProgress);
}
var touchSize = 0;
function changeProGress(){
	if(progressState01){
				progress01.removeChild(progressgrey01);
				progress01.addChild(progresslight01);
		}
	if(progressState02){
				progress02.removeChild(progressgrey02);
				progress02.addChild(progresslight02);
		}
	
	if(progressState03){
				progress03.removeChild(progressgrey03);
				progress03.addChild(progresslight03);
		}
	
	if(progressState04){
				progress04.removeChild(progressgrey04);
				progress04.addChild(progresslight04);
		}
	
	if(progressState05){
				progress05.removeChild(progressgrey05);
				progress05.addChild(progresslight05);
		}
	
	if(progressState06){
				progress06.removeChild(progressgrey06);
				progress06.addChild(progresslight06);
	}
}
/**
 * 定时刷新画布内容
 */
function onframe(){
//	console.log(timeNow);
	if(gamePlayState){
		timeRun = true;
		
		//剩余时间显示
		timeNow = 30 - ((new Date()).getTime() - timecc)/1000;
		timeToCharacter =((new Date()).getTime() - timecc)/1000;
		if(timeNow > 0){
			timer.text = " " +timeNow.toString().substring(0,2) + ":"+timeNow.toString().substring(3,5);
		}else{
			timer.text = "00:00";
			time = 30;
		}	
	}else{
		if(timeRun){
			timer.text = " " +timeNow.toString().substring(0,2) + ":"+timeNow.toString().substring(3,5);;
		}else{
			timer.text = "30:00";
		}
		
	}
}
/**
 * 喷雾瓶
 */
function mouseBowl(event){	
//	mousecase.LBitmap() = new LBitmapData(imglist["bowl"]);
	var showStep = STEP;
	if(mousecase != null){
		mousecase.x = event.offsetX - showStep - 270;
		mousecase.y = event.offsetY - showStep - 50;
	}
	if(popState){
		nowPlay();
		popState = false;
	}
}
/**
 * 初始化规则提示
 */
function initPop(){
	resMask = new LSprite();
	resMask.graphics.drawRect(1,"#000",[0,0,1080,1761],true,"rgba(0,0,0,0.7)");
//	resMask.addEventListener(LMouseEvent.MOUSE_UP,nowPlay);
	scoreLayer.addChild(resMask);
	
	coverImg = new LBitmap(new LBitmapData(imglist["rule"]));
	coverImg.x = (1080 - coverImg.getWidth())/2;
	coverImg.y = (1761 - coverImg.getHeight())/2;
	scoreLayer.addChild(coverImg);
}
/**
 * 控制游戏开始
 */
function nowPlay(event){
	//初始化倒计时
	timecc = (new Date()).getTime();
	//移除半透明遮罩及提示
	scoreLayer.removeChild(coverImg);
	scoreLayer.removeChild(resMask);
	//游戏状态true
	console.log(gamePlayState);
	gamePlayState = true;	
	
	
}
function initCage(){
	mouseLayer.die();
	mouseLayer.removeAllEventListener();
	mouseLayer.removeAllChild();

	//time时间计数
	cagelist(timeToCharacter);
	
	var cageTemp = Math.floor(Math.random()*10) +Math.floor(Math.random()*10);
	for(var i=0;i<CageMenu[cageTemp].length;i++){
		CageVsMenu(CageMenu[cageTemp][i]);			
	}		
	
}
/**
 * cage的位置及内容初始化
 * @param {cageMenu} obj
 */
function CageVsMenu(obj){
	var self = this;
	
	var menuButton = new LSprite();
	var bitmap = new LBitmap(new LBitmapData(imglist[obj.flag]));
	menuButton.addChild(bitmap);

	menuButton.x = (1080/3)*obj.x +(((1080/3)-menuButton.getWidth())/2); 
	menuButton.y = (menuButton.getHeight() + 80)*obj.y +290;
	mouseLayer.addChild(menuButton);
	menuButton.addEventListener(LMouseEvent.MOUSE_UP,function(event,self){
		gameStart(self.obj,event);
		mouseBowl(event);
	});
	menuButton.obj = obj;
}
function gameStart(obj,event){
	touchSize = score;
	if(obj.open==1 || obj.open==3 || obj.open==4 || obj.open==5 || obj.open==6 || obj.open==7){
		if(!progressState01 && obj.open == 1){
			score++;
			progressState01 = true;
		}
		if(!progressState02 && obj.open == 3){
			score++;
			progressState02 = true;
		}
		if(!progressState03 && obj.open == 4){
			score++;
			progressState03 = true;
		}
		if(!progressState04 && obj.open == 5){
			score++;
			progressState04 = true;
		}
		if(!progressState05 && obj.open == 6){
			score++;
			progressState05 = true;
		}
		if(!progressState06 && obj.open == 7){
			score++;
			progressState06 = true;
		}
		//点击事件音频播放
		if(touchSize < score){
			console.log("touch good");
			MySoundPlayer.playSound("touchgood");
		}else{
			MySoundPlayer.playSound("touchbad");
		}
		changeCage();
	}
	if(obj.open==0){
		gamePlayState = false;
		finishthis();
	}
}
function addTimeManger(){
	setTimeLine = setInterval(function(){changeCage();},needTime * 1000);
}
function changeCage(){
	if(gamePlayState){
		changeProGress();
	if(time>=30 || score == winScore){
		clearInterval(setTimeLine);

		finishthis();
		console.log("gameOver");
		gamePlayState = false;
		return;
	}else{
		time = time + needTime;

		initCage();
		}
	}
	
}
function finishthis(){
	clearInterval(setTimeLine);
	
	if(score == winScore){
		gameLastState = "win";
	}
	winOrlose(gameLastState);	
}

function winOrlose(flag){
	var self = this;
	
	resMask = new LSprite();
	resMask.graphics.drawRect(1,"#000",[0, 0, 1080,1761],true,"rgba(0,0,0,0.7)");  
	scoreLayer.addChild(self.resMask);
	
	
	if(flag == "win"){
		console.log(timeNow);
		if(timeNow >= 20){
			coverImg = new LBitmap(new LBitmapData(imglist["win_10s"]));
			console.log("10s:"+(30-Math.floor(timeNow)));
		}
		if(20> timeNow && timeNow > 10){
			coverImg = new LBitmap(new LBitmapData(imglist["win_20s"]));
			console.log("20s:"+(30-Math.floor(timeNow)));
		}
		if(timeNow <= 10){
			coverImg = new LBitmap(new LBitmapData(imglist["win_30s"]));
			console.log("30s:"+(30-Math.floor(timeNow)));
		}
		coverImg.x = (1080 - coverImg.getWidth())/2;
		coverImg.y = (1761 - coverImg.getHeight())/2;
		scoreLayer.addChild(coverImg);
		
//		游戏所花时间
		var scoreCText = new LTextField();
		scoreCText.color = "#e20528";
		scoreCText.size = 120;
		scoreCText.weight = "bolder";
		scoreCText.y = 705;
		scoreCText.x = 420;
		scoreCText.text = (30-Math.floor(timeNow));
		scoreLayer.addChild(scoreCText);
	}
	if(flag == "lose"){
		coverImg = new LBitmap(new LBitmapData(imglist[flag]));
		coverImg.x = (1080 - coverImg.getWidth())/2;
		coverImg.y = (1761 - coverImg.getHeight())/2;
		scoreLayer.addChild(coverImg);
	}
	var ccresMask = new LSprite();
	ccresMask.graphics.drawRect(0,"red",[340, 1250, 400,140],true,"rgba(255,0,0,0)");  
	if(flag == "win"){		
		ccresMask.addEventListener(LMouseEvent.MOUSE_UP,OverRadio);
		_czc.push(["_trackEvent","游戏通关","GameWin","用户游戏已通关。"]);
	}
	if(flag == "lose"){
		ccresMask.addEventListener(LMouseEvent.MOUSE_UP,againGame);
		_czc.push(["_trackEvent","游戏失败","GameOver","用户没有完成游戏。"]);
	}
	scoreLayer.addChild(ccresMask);
}
/**
 * 重新游戏
 */
function againGame(){
	//移除其余图层内容
	SceneLayer.removeAllChild();
	touchLayer.removeAllChild();
	mouseLayer.removeAllChild();
	popLayer.removeAllChild();
	scoreLayer.removeAllChild();
	bowlLayer.removeAllChild();
	
	//进度条状态重置
	progressState01 = false;
	progressState02 = false;
	progressState03 = false;
	progressState04 = false;
	progressState05 = false;
	progressState06 = false;
	//时间状态重置
	timeRun = false;
	//背景层添加
	var touchBg = new LBitmap(new LBitmapData(imglist["cover_bg"]));
	SceneLayer.addChild(touchBg);
	//游戏状态重置
	gamePlayState = false;
	gameLastState = "lose";
	score =0;
	time = 0;
	charNum = 2;

	//重绘游戏场景
	tm = new TouchMouse();
	gameLayer.addChild(tm);
	_czc.push(["_trackEvent","再次拯救","AgainGame","用户再次开始游戏。"]);
	
}
/**
 * 游戏胜利
 */
function OverRadio(){
	//移除其余图层内容
	SceneLayer.removeAllChild();
	touchLayer.removeAllChild();
	mouseLayer.removeAllChild();
	popLayer.removeAllChild();
	scoreLayer.removeAllChild();
	bowlLayer.removeAllChild();
	//判断游戏胜利状态
	if(gameLastState == "win"){
		scoreLayer.removeAllEventListener();
		scoreLayer.removeAllChild();
		var clueRadio = new LSprite();
		var coverImg = new LBitmap(new LBitmapData(imglist["radiopage"]));
		clueRadio.addChild(coverImg);
		SceneLayer.addChild(clueRadio);
		
		var radioLine = new LBitmap(new LBitmapData(imglist["radioLine"]));
		radioLine.x = (1080 - radioLine.getWidth())/2;
		radioLine.y = 790;
		scoreLayer.addChild(radioLine);
		
		redLine = new LBitmap(new LBitmapData(imglist["radioredLine"]));	
		redLine.x = (1080 - redLine.getWidth())/2;
		redLine.y = 760;
		scoreLayer.addChild(redLine);
		
		soundTimeText = new LTextField();
		soundTimeText.size = "25px";
		soundTimeText.text = "00:00";
		soundTimeText.x = (1080 - soundTimeText.getWidth())/2;
		soundTimeText.y = 750;
		scoreLayer.addChild(soundTimeText);
		
		for(var i=0;i<radiolist.length;i++){
			radioMenu(radiolist[i],radiolist.length,i);	
//			console.log("wssd:"+i);
		}		
		
		var RadioBtncc = new LSprite();
		var radioImg = new LBitmap(new LBitmapData(imglist["radiobtn"]));
		
		RadioBtncc.addChild(radioImg);
		radioImg.x = (1080 - radioImg.getWidth())/2;
		radioImg.y = 1380;
		RadioBtncc.addEventListener(LMouseEvent.MOUSE_UP,goNext);
		scoreLayer.addChild(RadioBtncc);	
	}
}
/**
 * 录音btn初始化
 * @param {Object} obj
 * @param {Object} temp
 * @param {Object} i
 */
function radioMenu(obj,temp,i){
	var self = this;

	if(i==0){
		RadioBtn0 = new LSprite();
		radioImg0 = new LBitmap(new LBitmapData(imglist["radiopersonGreyOne"]));
		RadioBtn0.addChild(radioImg0);
		RadioBtn0.x = 120 + (850/temp*i)+((850/temp) - RadioBtn0.getWidth())/2;
		RadioBtn0.y = 200;
		scoreLayer.addChild(RadioBtn0);
		RadioBtn0.addEventListener(LMouseEvent.MOUSE_UP,function(self){
			radioFind(i);
		});
	}
	if(i==1){
		RadioBtn1 = new LSprite();
		radioImg1 = new LBitmap(new LBitmapData(imglist["radiopersonGreyTwo"]));
		RadioBtn1.addChild(radioImg1);
		RadioBtn1.x = 120 + (850/temp*i)+((850/temp) - RadioBtn1.getWidth())/2;
		RadioBtn1.y = 200;
		scoreLayer.addChild(RadioBtn1);
		RadioBtn1.addEventListener(LMouseEvent.MOUSE_UP,function(self){
			radioFind(i);
		});
	}
	
}
/**
 * 录音btn效果切换
 * @param {Object} type
 */
function radioFind(type){
	//停止背景音乐
	switchState = false;
	MySoundPlayer.background.stop();
	//状态切换
	if(type == 0){
		RadioBtn0State = true;
		RadioBtn1State = false;
	}
	if(type == 1){
		RadioBtn0State = false;
		RadioBtn1State = true;
	}
	//洪佩云btn点击事件
	if(RadioBtn0State){
		RadioBtn0.removeChild(radioImg0);
		radioImg0 = new LBitmap(new LBitmapData(imglist["radiopersonRightOne"]));
		RadioBtn0.addChild(radioImg0);
		MySoundPlayer.closePersonSound();
		MySoundPlayer.playSound("fly");
		redLine.x=(1080 - redLine.getWidth())/2 - 200;
		_czc.push(["_trackEvent","录音","Radio","洪佩云讲话"]);
	}else{
		RadioBtn0.removeChild(radioImg0);
		radioImg0 = new LBitmap(new LBitmapData(imglist["radiopersonGreyOne"]));
		RadioBtn0.addChild(radioImg0);
	}
	//曾艳芬btn点击事件
	if(RadioBtn1State){
		RadioBtn1.removeChild(radioImg1);
		radioImg1 = new LBitmap(new LBitmapData(imglist["radiopersonRightTwo"]));
		RadioBtn1.addChild(radioImg1);
		MySoundPlayer.closePersonSound();
		MySoundPlayer.playSound("get");
		redLine.x=(1080 - redLine.getWidth())/2 + 200;
		_czc.push(["_trackEvent","录音","Radio","曾艳芬讲话"]);
	}else{
		RadioBtn1.removeChild(radioImg1);
		radioImg1 = new LBitmap(new LBitmapData(imglist["radiopersonGreyTwo"]));
		RadioBtn1.addChild(radioImg1);
	}
	SoundTime.addEventListener(LEvent.ENTER_FRAME,timeframe);
	console.log(type);
}
function timeframe(){
	if(RadioBtn0State){
		if(Math.floor(MySoundPlayer.fly.length - MySoundPlayer.fly.getCurrentTime())!=0){
			soundTimeText.text = Math.floor(MySoundPlayer.fly.length - MySoundPlayer.fly.getCurrentTime()) + ":" +MySoundPlayer.fly.getCurrentTime().toString().substring(3,5);
		}else{
			RadioBtn0State = false;
			soundTimeText.text = "00:00";
		}
	}else if(RadioBtn1State){
		if(Math.floor(MySoundPlayer.get.length - MySoundPlayer.get.getCurrentTime())!=0){
			soundTimeText.text = Math.floor(MySoundPlayer.get.length - MySoundPlayer.get.getCurrentTime()) + ":" +MySoundPlayer.get.getCurrentTime().toString().substring(3,5);
		}else{
			soundTimeText.text = "00:00";
			RadioBtn1State = false;
		}
	}else{
		soundTimeText.text = "00:00";
	}
}
function goNext(){
	//移除scene、touch、mouse、pop、score、bowl图层内容
	SceneLayer.removeAllChild();
	touchLayer.removeAllChild();
	mouseLayer.removeAllChild();
	popLayer.removeAllChild();
	scoreLayer.removeAllChild();
//	bowlLayer.removeEventListener(mouseBowl);
	bowlLayer.removeAllChild();
	
	//关闭 洪佩云 和 曾艳芬声音
	MySoundPlayer.closePersonSound();
	//背景音乐播放
	MySoundPlayer.background.play();
	switchState = true;
	
	scoreLayer.removeAllChild();
	//结尾页背景加载
	var radioImg = new LBitmap(new LBitmapData(imglist["endbg"]));
	SceneLayer.addChild(radioImg);
	
	//前去探索 func toNext
	var playNextBtn = new LSprite();
	playNextBtn.addChild(new LBitmap(new LBitmapData(imglist["nextbtn1"])));
	playNextBtn.x = (1080 - playNextBtn.getWidth())/2;
	playNextBtn.y = 950;
	playNextBtn.addEventListener(LMouseEvent.MOUSE_DOWN,toNext);
	scoreLayer.addChild(playNextBtn);
	
	
	var coverLSprite = new LSprite();
	scoreLayer.addChild(coverLSprite);
	
	//图片数据
		var covList = [];
		covList.push(new LBitmapData(imglist["nextbtn1"]));
		covList.push(new LBitmapData(imglist["nextbtn2"]));
		covList.push(new LBitmapData(imglist["nextbtn3"]));
		covList.push(new LBitmapData(imglist["nextbtn4"]));
		covList.push(new LBitmapData(imglist["nextbtn3"]));
		covList.push(new LBitmapData(imglist["nextbtn2"]));
		
		var datList = [];
		datList.push({dataIndex : 0, x : 0, y : 0, width : 437, height : 192, sx : 0, sy : 0});
		datList.push({dataIndex : 1, x : 0, y : 0, width : 437, height : 192, sx : 0, sy : 0});
		datList.push({dataIndex : 2, x : 0, y : 0, width : 437, height : 192, sx : 0, sy : 0});
		datList.push({dataIndex : 3, x : 0, y : 0, width : 437, height : 192, sx : 0, sy : 0});
		datList.push({dataIndex : 4, x : 0, y : 0, width : 437, height : 192, sx : 0, sy : 0});
		datList.push({dataIndex : 5, x : 0, y : 0, width : 437, height : 192, sx : 0, sy : 0});
	
	var playerRight = new LAnimationTimeline(covList,[datList]);
	playerRight.x = (1080 - playerRight.getWidth())/2;
	playerRight.y = 950;
	playerRight.speed = 25;
	coverLSprite.addChild(playerRight);
//	//按钮动画
//	LTweenLite.to(playNextBtn,0.8,{alpha:0.5,ease:Strong.easeIn,loop:true}).
//	to(playNextBtn,1,{delay:0.5,alpha:1,ease:Strong.easeIn});
	
	//分享好友 func toFriend
	var friendBtn = new LSprite();
	friendBtn.addChild(new LBitmap(new LBitmapData(imglist["friendbtn"])));
	friendBtn.x = (1080 - friendBtn.getWidth())/2;
	friendBtn.y = 1170;
	friendBtn.addEventListener(LMouseEvent.MOUSE_DOWN,toFriend);
	scoreLayer.addChild(friendBtn);
	//再次营救 func toAgain
	var againBtn = new LSprite();
	againBtn.addChild(new LBitmap(new LBitmapData(imglist["againbtn"])));
	againBtn.x = (1080 - againBtn.getWidth())/2;
	againBtn.y = 1360;
	againBtn.addEventListener(LMouseEvent.MOUSE_DOWN,toAgain);
	scoreLayer.addChild(againBtn);
	
	var logo = new LBitmap(new LBitmapData(imglist["logo"]));
	logo.x = (1080 - logo.getWidth())/2;
	logo.y = 1580;
	scoreLayer.addChild(logo);
}
/**
 * 前去探索
 */
function toNext(){
	_czc.push(["_trackEvent","页面引流高夫旗舰店","ToGaoFuJD","用户点击前去探究，跳转至京东旗舰店"]);
	location.href = "http://gaofu.jd.com/";
}
/**
 * 分享好友
 */
function toFriend(){
	initWeixinShare();
	_czc.push(["_trackEvent","分享给朋友","ToFriend","用户点击分享给朋友"]);
	window.confirm("点击右上方边栏分享到朋友圈...");
}
/**
 * 再次营救
 */
function toAgain(){
	scoreLayer.removeAllChild();
	againGame();
}

/**
 * 牢笼数列
 * @param {Object} cageTime
 */
function cagelist(cageTime){
	var personTemp = personList[personNum].name;
	
	var cageWithCharacter = [
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[4].name,index:1,open:6},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:personList[1].name,index:3,open:3},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag: personList[2].name ,index:6,open:4},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[0].name,index:2,open:1},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[1],index:4,open:3},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:personList[4],index:6,open:6},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[6].name,index:8,open:7}],
	[{x:0,y:0,flag:personList[0].name,index:0,open:1},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:personList[6].name,index:3,open:7},
		{x:1,y:1,flag:personList[3].name,index:4,open:5},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[2].name,index:7,open:4},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:personList[1].name,index:0,open:3},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:personList[3].name,index:3,open:5},
		{x:1,y:1,flag:"person_character",index:4,open:0},
		{x:2,y:1,flag:personList[2].name,index:5,open:4},
		{x:0,y:2,flag:personList[6].name,index:6,open:7},
		{x:1,y:2,flag:"person_character",index:7,open:0},
		{x:2,y:2,flag:"person_character",index:8,open:0}],
	[{x:0,y:0,flag:"person_character",index:0,open:0},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[0].name,index:2,open:1},
		{x:0,y:1,flag:personList[1].name,index:3,open:3},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:personList[3].name,index:5,open:5},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[4].name,index:7,open:6},
		{x:2,y:2,flag:"person_character",index:8,open:0}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[0].name,index:4,open:1},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_character",index:7,open:0},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_character",index:1,open:0},
		{x:2,y:0,flag:personList[0].name,index:2,open:1},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personTemp ,index:7,open:1},
		{x:2,y:2,flag:"person_character",index:8,open:0}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_character",index:1,open:0},
		{x:2,y:0,flag:personList[2].name,index:2,open:4},
		{x:0,y:1,flag:personList[6].name,index:3,open:7},
		{x:1,y:1,flag:"person_character",index:4,open:0},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:personList[4].name,index:6,open:6},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_character",index:8,open:0}],
	[{x:0,y:0,flag:personList[3].name,index:0,open:5},
		{x:1,y:0,flag:"person_character",index:1,open:0},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:personList[0].name,index:5,open:1},
		{x:0,y:2,flag:"person_character",index:6,open:0},
		{x:1,y:2,flag:personList[2].name,index:7,open:4},
		{x:2,y:2,flag:"person_character",index:8,open:0}],
	[{x:0,y:0,flag:"person_character",index:0,open:0},
		{x:1,y:0,flag:"person_character",index:1,open:0},
		{x:2,y:0,flag:personList[1].name,index:2,open:3},
		{x:0,y:1,flag:"person_character",index:3,open:0},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:personList[6].name,index:5,open:7},
		{x:0,y:2,flag:"person_character",index:6,open:0},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[1].name ,index:8,open:3}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[0].name,index:1,open:1},
		{x:2,y:0,flag:personList[3].name,index:2,open:5},
		{x:0,y:1,flag:"person_character",index:3,open:0},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_character",index:6,open:0},
		{x:1,y:2,flag:personList[4].name,index:7,open:6},
		{x:2,y:2,flag:personList[1].name,index:8,open:3}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_character",index:3,open:0},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[6].name,index:7,open:7},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:personList[3].name,index:0,open:5},
		{x:1,y:0,flag:personList[0].name,index:1,open:1},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:personList[2].name,index:3,open:4},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:personList[1].name,index:5,open:3},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_character",index:7,open:0},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[6].name,index:2,open:7},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[4].name,index:4,open:5},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[1].name,index:8,open:3}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[4].name,index:1,open:6},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:"person_character",index:3,open:0},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[0].name,index:8,open:1}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[0].name,index:1,open:1},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:"person_character",index:3,open:0},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:personList[1].name,index:6,open:3},
		{x:1,y:2,flag:personList[4].name,index:7,open:6},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[6].name ,index:1,open:7},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:personList[2].name,index:3,open:4},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_character",index:5,open:0},
		{x:0,y:2,flag:"person_character",index:6,open:0},
		{x:1,y:2,flag:personList[1].name,index:7,open:3},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[6].name,index:1,open:7},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[4].name,index:4,open:6},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_character",index:6,open:0},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[0].name,index:8,open:1}],
	[{x:0,y:0,flag:personList[3].name,index:0,open:5},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[4].name,index:4,open:6},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_character",index:7,open:0},
		{x:2,y:2,flag:personList[1].name,index:8,open:3}],
	[{x:0,y:0,flag:personList[2].name,index:0,open:4},
		{x:1,y:0,flag:"person_character",index:1,open:0},
		{x:2,y:0,flag:"person_character",index:2,open:0},
		{x:0,y:1,flag:personList[0].name,index:3,open:1},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_character",index:6,open:0},
		{x:1,y:2,flag:personList[3].name,index:7,open:5},
		{x:2,y:2,flag:"person_cage",index:8,open:2}]
	];
	
	var cageNoCharacter = [
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[3].name,index:1,open:5},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag: personList[6].name,index:6,open:7},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[0].name,index:8,open:1}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[4].name,index:1,open:6},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag: personList[1].name ,index:8,open:3}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[1].name,index:1,open:3},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag: personList[6].name,index:4,open:7},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[3].name,index:6,open:5},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[2].name,index:8,open:4}],
	[{x:0,y:0,flag:personList[1].name,index:0,open:3},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:personList[0].name,index:3,open:1},
		{x:1,y:1,flag:personList[6].name,index:4,open:7},
		{x:2,y:1,flag:personList[4].name,index:5,open:6},
		{x:0,y:2,flag:personList[3].name,index:6,open:5},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:personList[2].name,index:0,open:4},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[4].name,index:4,open:6},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_cage" ,index:7,open:2},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[1].name,index:1,open:3},
		{x:2,y:0,flag:personList[3].name,index:2,open:5},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[2].name,index:4,open:4},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[6].name,index:7,open:7},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[4].name,index:1,open:6},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:personList[0].name,index:3,open:1},
		{x:1,y:1,flag:personList[1].name,index:4,open:3},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[6].name,index:6,open:7},
		{x:1,y:2,flag:"person_cage" ,index:7,open:2},
		{x:2,y:2,flag:personList[2].name,index:8,open:4}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[2].name,index:2,open:4},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[3].name,index:6,open:5},
		{x:1,y:2,flag:personList[0].name,index:7,open:1},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:personList[0].name ,index:0,open:1},
		{x:1,y:0,flag:personList[1].name,index:1,open:3},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:personList[3].name,index:5,open:5},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[4].name,index:7,open:6},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[2].name,index:1,open:4},
		{x:2,y:0,flag:personList[4].name,index:2,open:6},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[6].name,index:6,open:7},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_cage" ,index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[3].name,index:4,open:5},
		{x:2,y:1,flag:personList[2].name,index:5,open:4},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[0].name,index:7,open:1},
		{x:2,y:2,flag:"person_cage" ,index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:personList[1].name,index:1,open:3},
		{x:2,y:0,flag:personList[6].name,index:2,open:7},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[4].name,index:7,open:6},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[1].name,index:4,open:3},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[3].name,index:7,open:5},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:personList[4].name,index:3,open:6},
		{x:1,y:1,flag:"person_cage" ,index:4,open:2},
		{x:2,y:1,flag:personList[6].name,index:5,open:7},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:personList[3].name,index:0,open:5},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[2].name,index:2,open:4},
		{x:0,y:1,flag:personList[6].name,index:3,open:7},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[0].name,index:6,open:1},
		{x:1,y:2,flag:personList[1].name,index:7,open:3},
		{x:2,y:2,flag:personList[4].name,index:8,open:6}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[0].name,index:4,open:1},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[4].name,index:6,open:6},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:personList[3].name,index:8,open:5}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage" ,index:1,open:2},
		{x:2,y:0,flag:personList[6].name,index:2,open:7},
		{x:0,y:1,flag:personList[2].name,index:3,open:4},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:"person_cage",index:2,open:2},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:"person_cage",index:4,open:2},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:personList[1].name,index:6,open:3},
		{x:1,y:2,flag:"person_cage",index:7,open:2},
		{x:2,y:2,flag:"person_cage",index:8,open:2}],
	[{x:0,y:0,flag:personList[0].name ,index:0,open:1},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[6].name,index:2,open:7},
		{x:0,y:1,flag:"person_cage",index:3,open:2},
		{x:1,y:1,flag:personList[3].name,index:4,open:5},
		{x:2,y:1,flag:personList[4].name,index:5,open:6},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[1].name,index:7,open:3},
		{x:2,y:2,flag:personList[2].name,index:8,open:4}],
	[{x:0,y:0,flag:"person_cage",index:0,open:2},
		{x:1,y:0,flag:"person_cage",index:1,open:2},
		{x:2,y:0,flag:personList[3].name,index:2,open:5},
		{x:0,y:1,flag:personList[4].name,index:3,open:6},
		{x:1,y:1,flag:personList[0].name,index:4,open:1},
		{x:2,y:1,flag:"person_cage",index:5,open:2},
		{x:0,y:2,flag:"person_cage",index:6,open:2},
		{x:1,y:2,flag:personList[1].name,index:7,open:3},
		{x:2,y:2,flag:"person_cage",index:8,open:2}]
	];
	
	if(cageTime>=10){
		CageMenu = cageWithCharacter;
	}else{
		CageMenu = cageNoCharacter;
	}
	
}

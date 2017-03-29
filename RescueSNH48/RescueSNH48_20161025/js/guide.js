init(10,"mylegend",1080,1761,main);

var loadingStartTime = new Date();

var loadingDataLayer;
var loadingLayer;
var loadingBtn;
var loadingText;
var textNum = 0;
var timer=0;
var myTimer;
var SceneLayer;
var musicLayer;
var gameLayer;
var coverLayer;
var cover;
var coverbtn;
var coverNum=0;
var switchState = true;
var pagePop;
var personNum =0;

var imglist = {};


//imgData = [
//	{name:"startgame",path:"./src/Imgwebp/00loading_bg.webp"},
//	{name:"loadingcircle",path:"./src/Imgwebp/00loading_circle.webp"},
//	{name:"disk_grey",path:"./src/Imgwebp/musicdisk_grey.webp"},
//	{name:"disk_white",path:"./src/Imgwebp/musicdisk_white.webp"},
//	{name:"cover_bg",path:"./src/Imgwebp/01cover_bg.webp"},
//	{name:"cover_btn",path:"./src/Imgwebp/01cover_btn.webp"},
//	{name:"cover_btn_grey",path:"./src/Imgwebp/01cover_btn_grey.webp"},
//	{name:"cover_SNH48",path:"./src/Imgwebp/01cover_SNH48.webp"},
//	{name:"cover_SNH48_bg",path:"./src/Imgwebp/01cover_SNH48_bg.webp"},
//	{name:"cover_title",path:"./src/Imgwebp/01cover_title.webp"},
//	{name:"guidepage1_bg",path:"./src/Imgwebp/02guidepage1_bg.webp"},
//	{name:"page1_character",path:"./src/Imgwebp/02guidepage1_monster.webp"},
//	{name:"guidepage2_bg",path:"./src/Imgwebp/03/03_bg.webp"},
//	{name:"page2_bg",path:"./src/Imgwebp/03/03_bg.webp"},
//	{name:"page2_p1",path:"./src/Imgwebp/03/person_1.webp"},
//	{name:"page2_p2",path:"./src/Imgwebp/03/person_2.webp"},
//	{name:"page2_p3",path:"./src/Imgwebp/03/person_3.webp"},
//	{name:"page2_p4",path:"./src/Imgwebp/03/person_4.webp"},
//	{name:"page2_p5",path:"./src/Imgwebp/03/person_5.webp"},
//	{name:"page2_p6",path:"./src/Imgwebp/03/person_6.webp"},
//	{name:"guidepage3_bg",path:"./src/Imgwebp/04guidepage3_bg.webp"},
//	{name:"page3_sos",path:"./src/Imgwebp/04_sos.webp"},
//	{name:"guidetitle1_bg",path:"./src/Imgwebp/02guidepage1_title.webp"},
//	{name:"guidetitle2_bg",path:"./src/Imgwebp/03guidepage2_title.webp"},
//	{name:"guidetitle3_bg",path:"./src/Imgwebp/04guidepage3_title.webp"},
//	{name:"guidepage_btn",path:"./src/Imgwebp/02guidepage_btn.webp"},
//	{name:"game_time",path:"./src/Imgwebp/060708game_lasttime.webp"},
//	{name:"game_progress",path:"./src/Imgwebp/060708game_progress.webp"},
//	{name:"game_progress_person",path:"./src/Imgwebp/060708game_progress_person.webp"},
//	{name:"rule",path:"./src/Imgwebp/060708game_rule.webp"},
//	{name:"win",path:"./src/Imgwebp/060708game_win.webp"},
//	{name:"win_10s",path:"./src/Imgwebp/10s.webp"},
//	{name:"win_20s",path:"./src/Imgwebp/20s.webp"},
//	{name:"win_30s",path:"./src/Imgwebp/30s.webp"},
//	{name:"lose",path:"./src/Imgwebp/060708game_lose.webp"},
//	{name:"bowl",path:"./src/Imgwebp/060708bowl.webp"},
//	{name:"bowl_no",path:"./src/Imgwebp/060708bowl_no.webp"},
//	{name:"radiopage",path:"./src/Imgwebp/09radiopage.webp"},
//	{name:"radiobtn",path:"./src/Imgwebp/09radiopage_btn.webp"},
//	{name:"person_cage",path:"./src/Imgwebp/person/images/person_no_05.webp"},
//	{name:"person_00",path:"./src/Imgwebp/person/images/person_09.webp"},
//	{name:"person_01",path:"./src/Imgwebp/person/images/person_11.webp"},  
//	{name:"person_02",path:"./src/Imgwebp/person/images/person_13.webp"},  
//	{name:"person_03",path:"./src/Imgwebp/person/images/person_23.webp"},  
//	{name:"person_04",path:"./src/Imgwebp/person/images/person_25.webp"},  
//	{name:"person_05",path:"./src/Imgwebp/person/images/person_27.webp"},  
//	{name:"person_06",path:"./src/Imgwebp/person/images/person_37.webp"},  
//	{name:"person_07",path:"./src/Imgwebp/person/images/person_39.webp"},
//	{name:"person_character",path:"./src/Imgwebp/person/images/person_41.webp"},  
//	{name:"progress_01light",path:"./src/Imgwebp/people/images/light_03.webp"},
//	{name:"progress_01grey",path:"./src/Imgwebp/people/images/grey_03.webp"},
//	{name:"progress_02light",path:"./src/Imgwebp/people/images/light_05.webp"},
//	{name:"progress_02grey",path:"./src/Imgwebp/people/images/grey_05.webp"},
//	{name:"progress_03light",path:"./src/Imgwebp/people/images/light_07.webp"},
//	{name:"progress_03grey",path:"./src/Imgwebp/people/images/grey_07.webp"},
//	{name:"progress_04light",path:"./src/Imgwebp/people/images/light_12.webp"},
//	{name:"progress_04grey",path:"./src/Imgwebp/people/images/grey_12.webp"},
//	{name:"progress_05light",path:"./src/Imgwebp/people/images/light_13.webp"},
//	{name:"progress_05grey",path:"./src/Imgwebp/people/images/grey_13.webp"},
//	{name:"progress_06light",path:"./src/Imgwebp/people/images/light_15.webp"},
//	{name:"progress_06grey",path:"./src/Imgwebp/people/images/grey_15.webp"},
//	{name:"radiopersonRightOne",path:"./src/Imgwebp/people/images/09right_09.webp"},
//	{name:"radiopersonRightTwo",path:"./src/Imgwebp/people/images/09right_10.webp"},
//	{name:"radiopersonGreyOne",path:"./src/Imgwebp/people/images/09grey_09.webp"},
//	{name:"radiopersonGreyTwo",path:"./src/Imgwebp/people/images/09grey_10.webp"},
//	{name:"radioLine",path:"./src/Imgwebp/09line_bg.webp"},
//	{name:"radioredLine",path:"./src/Imgwebp/09redline.webp"},
//	{name:"endbg",path:"./src/Imgwebp/10end_bg.webp"},
//	{name:"nextbtn",path:"./src/Imgwebp/10end_btn/images/10end_btn_05.webp"},
//	{name:"friendbtn",path:"./src/Imgwebp/10end_btn/images/10end_btn_11.webp"},
//	{name:"againbtn",path:"./src/Imgwebp/10end_btn/images/10end_btn_17.webp"},
//	{name:"logo",path:"./src/Imgwebp/10end_logo.webp"},
//	{type:"js",path:"./js/music/disk.js"},
//	{type:"js",path:"./js/music/whitedisk.js"},
//	{type:"js",path:"./js/cover/cover.js"},
//	{type:"js",path:"./js/cover/guideBtn.js"},
//	{type:"js",path:"./js/cover/guidepage.js"},
//	{type:"js",path:"./js/cover/popwindow.js"},
//	{type:"js",path:"./js/cover/weixin.js"},
//	{type:"js",path:"./js/game/Algorithm.js"},
//	{type:"js",path:"./js/game/Num.js"},
//	{type:"js",path:"./js/game/game.js"},
//	{type:"js",path:"./js/game/personcage.js"},
//	{type:"js",path:"./js/game/touchmouse.js"},
//	{type:"js",path:"./js/game/radioGet.js"},
//	{type:"js",path : "js/game/SoundPlayer.js"}];
//if(LGlobal.ios){
	imgData = [
	{name:"startgame",path:"./src/Img/00loading_bg.png"},
	{name:"loadingcircle",path:"./src/Img/00loading_circle.png"},
	{name:"disk_grey",path:"./src/Img/musicdisk_grey.png"},
	{name:"disk_white",path:"./src/Img/musicdisk_white.png"},
	{name:"cover_bg",path:"./src/Img/01cover_bg.png"},
	{name:"cover_btn",path:"./src/Img/01cover_btn.png"},
	{name:"cover_btn_1",path:"./src/Img/cover_btn/1.png"},
	{name:"cover_btn_2",path:"./src/Img/cover_btn/2.png"},
	{name:"cover_btn_3",path:"./src/Img/cover_btn/3.png"},
	{name:"cover_btn_4",path:"./src/Img/cover_btn/4.png"},
	{name:"cover_btn_grey",path:"./src/Img/01cover_btn_grey.png"},
	{name:"cover_SNH48",path:"./src/Img/01cover_SNH48.png"},
	{name:"cover_SNH48_bg",path:"./src/Img/01cover_SNH48_bg.png"},
	{name:"cover_title",path:"./src/Img/01cover_title.png"},
	{name:"guidepage1_bg",path:"./src/Img/02guidepage1_bg.png"},
	{name:"page1_character",path:"./src/Img/02guidepage1_monster.png"},
	{name:"guidepage2_bg",path:"./src/Img/03/03_bg.png"},
	{name:"page2_bg",path:"./src/Img/03/03_bg.png"},
	{name:"page2_p1",path:"./src/Img/03/person_1.png"},
	{name:"page2_p2",path:"./src/Img/03/person_2.png"},
	{name:"page2_p3",path:"./src/Img/03/person_3.png"},
	{name:"page2_p4",path:"./src/Img/03/person_4.png"},
	{name:"page2_p5",path:"./src/Img/03/person_5.png"},
	{name:"page2_p6",path:"./src/Img/03/person_6.png"},
	{name:"guidepage3_bg",path:"./src/Img/04guidepage3_bg.png"},
	{name:"page3_sos",path:"./src/Img/04_sos.png"},
	{name:"guidetitle1_bg",path:"./src/Img/02guidepage1_title.png"},
	{name:"guidetitle2_bg",path:"./src/Img/03guidepage2_title.png"},
	{name:"guidetitle3_bg",path:"./src/Img/04guidepage3_title.png"},
	{name:"guidepage_btn",path:"./src/Img/02guidepage_btn.png"},
	{name:"guidepage_btn1",path:"./src/Img/02guidepage_btn_1.png"},
	{name:"guidepage_btn2",path:"./src/Img/02guidepage_btn_2.png"},
	{name:"guidepage_btn3",path:"./src/Img/02guidepage_btn_3.png"},
	{name:"guidepage_btn4",path:"./src/Img/02guidepage_btn_4.png"},
	{name:"game_time",path:"./src/Img/060708game_lasttime.png"},
	{name:"game_progress",path:"./src/Img/060708game_progress.png"},
	{name:"game_progress_person",path:"./src/Img/060708game_progress_person.png"},
	{name:"rule",path:"./src/Img/060708game_rule.png"},
	{name:"win",path:"./src/Img/060708game_win.png"},
	{name:"win_10s",path:"./src/Img/10s.png"},
	{name:"win_20s",path:"./src/Img/20s.png"},
	{name:"win_30s",path:"./src/Img/30s.png"},
	{name:"lose",path:"./src/Img/060708game_lose.png"},
	{name:"bowl",path:"./src/Img/060708bowl.png"},
	{name:"bowl_no",path:"./src/Img/060708bowl_no.png"},
	{name:"radiopage",path:"./src/Img/09radiopage.png"},
	{name:"radiobtn",path:"./src/Img/09radiopage_btn.png"},
	{name:"person_cage",path:"./src/Img/person/images/person_no_05.png"},
	{name:"person_00",path:"./src/Img/person/images/person_09.png"},
	{name:"person_01",path:"./src/Img/person/images/person_11.png"},  
	{name:"person_02",path:"./src/Img/person/images/person_13.png"},  
	{name:"person_03",path:"./src/Img/person/images/person_23.png"},  
	{name:"person_04",path:"./src/Img/person/images/person_25.png"},  
	{name:"person_05",path:"./src/Img/person/images/person_27.png"},  
	{name:"person_06",path:"./src/Img/person/images/person_37.png"},  
	{name:"person_07",path:"./src/Img/person/images/person_39.png"},
	{name:"person_character",path:"./src/Img/person/images/person_41.png"},  
	{name:"progress_01light",path:"./src/Img/people/images/light_03.png"},
	{name:"progress_01grey",path:"./src/Img/people/images/grey_03.png"},
	{name:"progress_02light",path:"./src/Img/people/images/light_05.png"},
	{name:"progress_02grey",path:"./src/Img/people/images/grey_05.png"},
	{name:"progress_03light",path:"./src/Img/people/images/light_07.png"},
	{name:"progress_03grey",path:"./src/Img/people/images/grey_07.png"},
	{name:"progress_04light",path:"./src/Img/people/images/light_12.png"},
	{name:"progress_04grey",path:"./src/Img/people/images/grey_12.png"},
	{name:"progress_05light",path:"./src/Img/people/images/light_13.png"},
	{name:"progress_05grey",path:"./src/Img/people/images/grey_13.png"},
	{name:"progress_06light",path:"./src/Img/people/images/light_15.png"},
	{name:"progress_06grey",path:"./src/Img/people/images/grey_15.png"},
	{name:"radiopersonRightOne",path:"./src/Img/people/images/09right_091.png"},
	{name:"radiopersonRightTwo",path:"./src/Img/people/images/09right_10.png"},
	{name:"radiopersonGreyOne",path:"./src/Img/people/images/09grey_091.png"},
	{name:"radiopersonGreyTwo",path:"./src/Img/people/images/09grey_10.png"},
	{name:"radioLine",path:"./src/Img/09line_bg.png"},
	{name:"radioredLine",path:"./src/Img/09redline.png"},
	{name:"endbg",path:"./src/Img/10end_bg.png"},
	{name:"nextbtn",path:"./src/Img/10end_btn/images/10end_btn_05.png"},
	{name:"nextbtn1",path:"./src/Img/10end_btn/images/10end_btn_05_1.png"},
	{name:"nextbtn2",path:"./src/Img/10end_btn/images/10end_btn_05_2.png"},
	{name:"nextbtn3",path:"./src/Img/10end_btn/images/10end_btn_05_3.png"},
	{name:"nextbtn4",path:"./src/Img/10end_btn/images/10end_btn_05_4.png"},
	{name:"friendbtn",path:"./src/Img/10end_btn/images/10end_btn_11.png"},
	{name:"againbtn",path:"./src/Img/10end_btn/images/10end_btn_17.png"},
	{name:"logo",path:"./src/Img/10end_logo.png"},
	{type:"js",path:"./js/music/disk.js"},
	{type:"js",path:"./js/music/whitedisk.js"},
	{type:"js",path:"./js/cover/cover.js"},
	{type:"js",path:"./js/cover/guideBtn.js"},
	{type:"js",path:"./js/cover/guidepage.js"},
	{type:"js",path:"./js/cover/popwindow.js"},
	{type:"js",path:"./js/cover/weixin.js"},
	{type:"js",path:"./js/game/Algorithm.js"},
	{type:"js",path:"./js/game/Num.js"},
	{type:"js",path:"./js/game/game.js"},
	{type:"js",path:"./js/game/personcage.js"},
	{type:"js",path:"./js/game/touchmouse.js"},
	{type:"js",path:"./js/game/radioGet.js"},
	{type:"js",path : "js/game/SoundPlayer.js"}];
//}

var imgLoad = [
	{name:"startgame",path:"./src/Img/00loading_bg.png"},
	{name:"loadingcircle",path:"./src/Img/00loading_circle.png"}];
	
var screenWidth,screenHeight;
var startTime,nowNum,stageNumList;
var stageLayer;
var stageIndex = 0;
var stageMenu = [];
var cagelayer;
var stageCheck = false;
var cageCheck = false;
var score = 0;


var MySoundPlayer;
var dataList;
var loadData=[];

function main () {
	
	console.log("loading start time:"+loadingStartTime);
	//预读取音频
	var loadsound = true;
	var protocol = location.protocol;
	if (protocol == "http:" || protocol == "https:") {
		if (LGlobal.ios && !LSound.webAudioEnabled){
			//如果IOS环境，并且不支持WebAudio，则无法预先读取
			loadsound = false;
		}
	} else if (LGlobal.mobile) {
		//如果是移动浏览器本地访问，则无法预先读取
		loadsound = false;
	}
	if(loadsound){
		imgData.push({name : "sound_background",path : "src/sound/background.mp3"});
		if(LSound.webAudioEnabled || LGlobal.os == OS_PC){
			//浏览器支持WebAudio，或者环境为PC，则预先读取所有音频
			imgData.push({name : "sound_get",path : "src/sound/zyf.mp3"});
			imgData.push({name : "sound_fly",path : "src/sound/hpy.mp3"});
		}
	}
	
   	LGlobal.stageScale = LStageScaleMode.SHOW_ALL;
	LSystem.screen(LStage.FULL_SCREEN); 

	screenWidth = screen.width;
	screenHeight = screen.height;

	SceneLayer = new LSprite();
	addChild(SceneLayer);


	loadingDataLayer = new LoadingSampleAc();
	SceneLayer.addChild(loadingDataLayer);
	LLoadManage.load(
		imgLoad,
		function(progress){
			loadingDataLayer.setProgress(progress);
		},
		function(result){
			imglist = result;
			SceneLayer.removeChild(loadingDataLayer);
			loadingDataLayer = null;
			InitData();
		});
}
function InitData(){
	loadingDataLayer = new LoadingSample1();
	SceneLayer.addChild(loadingDataLayer);
	
	loadingLayer = new LBitmap(new LBitmapData(imglist["startgame"]));
	SceneLayer.addChild(loadingLayer);
	
	loadingBtn = new LBitmap(new LBitmapData(imglist["loadingcircle"]));
	loadingBtn.x = (1080 - loadingBtn.getWidth())/2;
	loadingBtn.y = 640;
	SceneLayer.addChild(loadingBtn);
	
	loadingText = new LTextField();
	loadingText.text = "99.99%";
	loadingText.color = "#fff";
	loadingText.size = "50";
	loadingText.x = (1080 - loadingText.getWidth())/2;
	loadingText.y = 640 + ((loadingBtn.getHeight()-loadingText.getHeight())/2);
	SceneLayer.addChild(loadingText);
	
	SceneLayer.addEventListener(LEvent.ENTER_FRAME,sceneOnFrame);
	
	myTimer = new LTimer(300,6);
    myTimer.addEventListener(LTimerEvent.TIMER, timerHandler);
    myTimer.start();
    addChild(myTimer);

	LLoadManage.load(
		imgData,
		function(progress){
			loadingDataLayer.setProgress(progress);
			loadingText.text = progress.toString().substring(0,5)+"%";
		},
		function(result){
			imglist = result;
//			SceneLayer.removeAllEventListener();
//			SceneLayer.removeChild(loadingLayer);
			SceneLayer.removeChild(loadingDataLayer);
			loadingDataLayer = null;
			
			coverInit();
			myTimer.stop();
			gameInit();
		});
}
function gameInit(){	 
	gameLayer = new LSprite();
	addChild(gameLayer);
	
	musicLayer = new LSprite();
	var disk = new diskObj();
	disk.init();
	musicLayer.addChild(disk);
//	MySoundPlayer.background.stop();
	musicLayer.x = 1080 - musicLayer.getWidth()-50;
	musicLayer.y = 50;
	addChild(musicLayer);
	musicLayer.addEventListener(LMouseEvent.MOUSE_DOWN,switchmusic);	
	musicLayer.addEventListener(LEvent.ENTER_FRAME,musicOnFrame);
	
    initWeixinShare();
    
    logLoadTime();
}
function sceneOnFrame(){
	loadingBtn.rotate += 2;
}
function musicOnFrame(){
	
	rotateDisk();
}
function onframe(){
	
}
function timerHandler(e){
    loadingText.text = "loading";
    
    var temp="";
    if(textNum > 2){
    	textNum=0;
    	loadingText.text="loading";
    	temp="";
    	console.log("aa");
    }else{  	
    	for(var i=0;i<=2;i++){
    		temp = temp+".";
    	}
    	console.log("ss:"+timer);
    	loadingText.text="loading"+temp;
    	textNum++;
    }
    timer++;
	if(timer >= 6){
		
		
	}
	
}
function coverInit(){
	SceneLayer.removeAllEventListener();
	SceneLayer.removeAllChild();
	
	cover = new coverObj();
	cover.init();
	SceneLayer.addChild(cover);
	
	
	
	coverbtn = new guideBtn();
	coverbtn.init("cover_btn_4");
	coverbtn.x = (1080 - coverbtn.getWidth())/2;
	coverbtn.y = 1430;
	SceneLayer.addChild(coverbtn);
	
//	LTweenLite.to(coverbtn,0.8,{alpha:0,ease:Strong.easeIn});

////按钮动画
//	LTweenLite.to(coverbtn,0.8,{delay:0.8,alpha:0.5,ease:Strong.easeIn,loop:true}).
//	to(coverbtn,1,{alpha:1,ease:Strong.easeIn});
	
	
	var coverLSprite = new LSprite();
	SceneLayer.addChild(coverLSprite);
	
	//图片数据
		var covList = [];
		covList.push(new LBitmapData(imglist["cover_btn_1"]));
		covList.push(new LBitmapData(imglist["cover_btn_2"]));
		covList.push(new LBitmapData(imglist["cover_btn_3"]));
		covList.push(new LBitmapData(imglist["cover_btn_4"]));
		covList.push(new LBitmapData(imglist["cover_btn_3"]));
		covList.push(new LBitmapData(imglist["cover_btn_2"]));
		
		var datList = [];
		datList.push({dataIndex : 0, x : 0, y : 0, width : 516, height : 213, sx : 0, sy : 0});
		datList.push({dataIndex : 1, x : 0, y : 0, width : 516, height : 213, sx : 0, sy : 0});
		datList.push({dataIndex : 2, x : 0, y : 0, width : 516, height : 213, sx : 0, sy : 0});
		datList.push({dataIndex : 3, x : 0, y : 0, width : 516, height : 213, sx : 0, sy : 0});
		datList.push({dataIndex : 4, x : 0, y : 0, width : 516, height : 213, sx : 0, sy : 0});
		datList.push({dataIndex : 5, x : 0, y : 0, width : 516, height : 213, sx : 0, sy : 0});
	
	var playerRight = new LAnimationTimeline(covList,[datList]);
	playerRight.x = (1080 - playerRight.getWidth())/2;
	playerRight.y = 1430;
	playerRight.speed = 25;
	coverLSprite.addChild(playerRight);

}
function logLoadTime(){
	var loadingEndTime = new Date();
	 console.log("loading end time:" + loadingEndTime);
	 var milliseconds =  loadingEndTime.getTime()-loadingStartTime.getTime()
	 console.log("loadding millisecond:" + milliseconds);
	 _czc.push(["_trackEvent","页面加载时间","LoaddingTime","页面加载所需时间",milliseconds]);
}
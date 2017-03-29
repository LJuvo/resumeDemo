init(10,"mylegend",450,800,main);

var loadingLayer;
var SceneLayer;
var backLayer;
var startLayer;
var startBtn;
var imglist = {};
var imgData = new Array(
	{name:"startgame",path:"./src/startgame.jpg"},
	{name:"startnext0",path:"./src/startnext0.jpg"},
	{name:"startnext1",path:"./src/startnext1.jpg"},
	{name:"startnext2",path:"./src/startnext2.jpg"},
	{name:"startnext3",path:"./src/startnext3.jpg"},
	{name:"startnext4",path:"./src/startnext4.jpg"},
	{name:"startnow0",path:"./src/startnow0.jpg"},
	{name:"startnow1",path:"./src/startnow1.jpg"},
	{name:"stage",path:"./src/stage.jpg"},
	{name:"go",path:"./src/go.jpg"});
var screenWidth,screenHeight;
var nextNum;
var musiclist = new Array(
	{name:"missyou",path:"./music/MissYouTonight.mp3"}
)


function main () {
   	LGlobal.stageScale = LStageScaleMode.SHOW_ALL;
	LSystem.screen(LStage.FULL_SCREEN); 

	screenWidth = screen.width;
	screenHeight = screen.height;
	nextNum = 0;

	SceneLayer = new LSprite();
	addChild(SceneLayer);

	loadingLayer = new LoadingSample3();
	SceneLayer.addChild(loadingLayer);
	LLoadManage.load(
		imgData,
		function(progress){
			loadingLayer.setProgress(progress);
		},
		function(result){
			imglist = result;
			SceneLayer.removeChild(loadingLayer);
			loadingLayer = null;
			gameInit();
		});
}
function gameInit(){
	backLayer = new LBitmap(new LBitmapData(imglist["startgame"]));
	SceneLayer.addChild(backLayer);

	startBtn = new LSprite();
	startBtn.graphics.drawRect(1,"#000",[0, 0, 180, 60],true,"rgba(111,111,111,0)");  
	startBtn.x = (450 - startBtn.getWidth())/2;
	startBtn.y = (800 - startBtn.getHeight()) - 85;
	startBtn.addEventListener(LMouseEvent.MOUSE_UP,testStart);
	SceneLayer.addChild(startBtn);

}
function testStart(event){
	if (nextNum <= 5) {
		SceneLayer.removeEventListener(LMouseEvent.MOUSE_UP,testStart);	
		SceneLayer.removeChild(backLayer);
		SceneLayer.removeChild(startBtn);

		var imgName = "startnext"+nextNum;
		console.log(imgName);
		backLayer = new LBitmap(new LBitmapData(imglist[imgName]));
		SceneLayer.addChild(backLayer);

		startBtn = new LSprite();
		startBtn.graphics.drawRect(1,"#000",[0, 0, 180, 60],true,"rgba(111,111,111,0)");  
		startBtn.x = (450 - startBtn.getWidth())/2;
		startBtn.y = (800 - startBtn.getHeight()) - 85;
		startBtn.addEventListener(LMouseEvent.MOUSE_UP,testStart);
		SceneLayer.addChild(startBtn);
		nextNum++;
	};
	if (nextNum > 5) {
		SceneLayer.removeEventListener(LMouseEvent.MOUSE_UP,testStart);	
		SceneLayer.removeChild(backLayer);
		SceneLayer.removeChild(startBtn);

		backLayer = new LBitmap(new LBitmapData(imglist["startnow0"]));
		SceneLayer.addChild(backLayer);
		return;
	};
}


function tipsInit(){
	
}



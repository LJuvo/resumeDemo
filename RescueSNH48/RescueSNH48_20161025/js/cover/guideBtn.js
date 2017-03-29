var gameBg;
var guideBtn = function(){
	base(this,LSprite,[]);
}
guideBtn.prototype.init = function(dataImg){
	var self = this;
	self.btn = new LBitmap(new LBitmapData(imglist[dataImg]));
	self.addEventListener(LMouseEvent.MOUSE_UP,numChange);
	self.addChild(self.btn);
}
function numChange(){
	coverNum++;

	if(coverNum <= 3){
		SceneLayer.removeAllEventListener();
		SceneLayer.removeAllChild();
	
		var guidepage = new guidePage();
		guidepage.init();
		SceneLayer.addChild(guidepage);
		
	}else{
		SceneLayer.removeAllEventListener();
		SceneLayer.removeAllChild();
		
		gameBg = new gameObj();
		gameBg.init();
//		SceneLayer.addChild(gameBg);	
	}
}
function startGame(){
	SceneLayer.removeChild(pagePop);
}
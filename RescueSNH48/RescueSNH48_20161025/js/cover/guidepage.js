var guidePage = function(){
	base(this,LSprite,[]);
}
var loadingLayer,charaLayer,stageLayer,sosLayer;
guidePage.prototype.init = function(){
	var self = this;
//	coverLayer.die();
	var coverImg = new LBitmap(new LBitmapData(imglist["guidepage"+coverNum+"_bg"]));
	self.addChild(coverImg);
	
	var coverTitle = new LBitmap(new LBitmapData(imglist["guidetitle"+coverNum+"_bg"]));
	coverTitle.x = (1080- coverTitle.getWidth())/2;
	self.addChild(coverTitle);
	
	coverbtn = new guideBtn();
	coverbtn.init("guidepage_btn1");
	coverbtn.x = (1080 - coverbtn.getWidth())/2;
	coverbtn.y = 1430;
	self.addChild(coverbtn);
	
	var coverLSprite = new LSprite();
	self.addChild(coverLSprite);
	
	//图片数据
		var covList = [];
		covList.push(new LBitmapData(imglist["guidepage_btn1"]));
		covList.push(new LBitmapData(imglist["guidepage_btn2"]));
		covList.push(new LBitmapData(imglist["guidepage_btn3"]));
		covList.push(new LBitmapData(imglist["guidepage_btn4"]));
		covList.push(new LBitmapData(imglist["guidepage_btn3"]));
		covList.push(new LBitmapData(imglist["guidepage_btn2"]));
		
		var datList = [];
		datList.push({dataIndex : 0, x : 0, y : 0, width : 290, height : 256, sx : 0, sy : 0});
		datList.push({dataIndex : 1, x : 0, y : 0, width : 290, height : 256, sx : 0, sy : 0});
		datList.push({dataIndex : 2, x : 0, y : 0, width : 290, height : 256, sx : 0, sy : 0});
		datList.push({dataIndex : 3, x : 0, y : 0, width : 290, height : 256, sx : 0, sy : 0});
		datList.push({dataIndex : 4, x : 0, y : 0, width : 290, height : 256, sx : 0, sy : 0});
		datList.push({dataIndex : 5, x : 0, y : 0, width : 290, height : 256, sx : 0, sy : 0});

	var playerRight = new LAnimationTimeline(covList,[datList]);
	playerRight.x = (1080 - playerRight.getWidth())/2;
	playerRight.y = 1430;
	playerRight.speed = 25;
	coverLSprite.addChild(playerRight);
	
//	//按钮动画
//	LTweenLite.to(coverbtn,0.8,{delay:0.8,alpha:0.5,ease:Strong.easeIn,loop:true}).
//	to(coverbtn,1,{alpha:1,ease:Strong.easeIn});
	
	switch(coverNum){
		case 1 :
			characterAction(self);
			break;
		case 2 :
			SNHAction(self);
			break;
		case 3 :
			sosAction(self);
			break;
		default :
			break;
	}
}
function characterAction(self){
	stageLayer = new LSprite();
	self.addChild(stageLayer);
	
	/*添加所有对象*/
	addCharacter();
	/*所有人物开始缓动*/
	var charaList = charaLayer.childList,chara,delayValue,duration;

	chara = charaList[0];
	chara.y = -200;
	chara.scaleX = chara.scaleY = 1;
	
	LTweenLite.to(chara,duration,{alpha:1,scaleX:chara.scale,scaleY:chara.scale,ease:Strong.easeOut})
	.to(chara,1,{y:chara.ty,ease:Strong.easeIn});
	
	LTweenLite.to(chara,0.1,{scaleX:1.2,scaleY:1.2,ease:Strong.easeInOut});

	LTweenLite.to(chara,0.5,{delay:1,scaleX:2,scaleY:2,ease:Elastic.easeIn});
}
function SNHAction(self){
	stageLayer = new LSprite();
	self.addChild(stageLayer);
	
	/*添加所有对象*/
	addSNH48();
	/*所有人物开始缓动*/
	var charaList = charaLayer.childList,chara,delayValue,duration;
	for(var i=0,l=charaList.length;i<l;i++){
		chara = charaList[i];
//		chara.y = 720;
		chara.scaleX = chara.scaleY = 1;
		delayValue = 0.1*i;
		if(i >= 5){
			delayValue = 0.1*(i - 5);
		}
		duration = 1 - delayValue;
//		chara.y = 720;
		LTweenLite.to(chara,duration,{delay:delayValue,alpha:1,scaleX:chara.scale,scaleY:chara.scale,ease:Strong.easeOut})
		.to(chara,1,{y:chara.ty,ease:Strong.easeOut});
	}
}
function sosAction(self){
	sosLayer = new LSprite();
	self.addChild(sosLayer);
	
	big_vs = new MiddleBitmap(new LBitmapData(imglist["page3_sos"]));
//	big_vs.rotate = -90;
	big_vs.x = LGlobal.width*0.5;
	big_vs.y = 1050;
	big_vs.alpha = 0;
//	big_vs.visible = false;
	sosLayer.addChild(big_vs);

//	big_vs.visible = true;
	
	//	/*VS缓动，变大变透明→然后消失*/
	LTweenLite.to(big_vs,0.1,{scaleX:1,scaleY:1,alpha:0,ease:Elastic.easeIn});
	LTweenLite.to(big_vs,1,{scaleX:2,scaleY:2,alpha:0.5,ease:Elastic.easeIn});
	
	/*VS标题缓动，延时→不透明缩小→缩小→添加特效并且进入第二个动画初始化*/
	LTweenLite.to(big_vs,0.5,{delay:0.2,alpha:1,scaleX:1.5,scaleY:1.5,ease:Elastic.easeOut})
	.to(big_vs,1,{scaleX:1,scaleY:1,alpha:1,ease:Elastic.easeOut});

}

/**
 * 将LBitmap对象的中心放到一个对象的原点，并返回这个对象
 * */
function MiddleBitmap(bitmapData){
	var self = this;
	base(self,LSprite,[]);
	self.bitmapTitle = new LBitmap(bitmapData);
	self.bitmapTitle.x = -self.bitmapTitle.getWidth()*0.5;
	self.bitmapTitle.y = -self.bitmapTitle.getHeight()*0.5;
	self.addChild(self.bitmapTitle);
}
function addCharacter(){
	charaLayer = new LSprite();
	stageLayer.addChild(charaLayer);
	var charaBitmap,sy = 750;
	var charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page1_character"]));
	charaBitmap.scale = 1;
	charaBitmap.x = 600;
	charaBitmap.ty = 900;
	charaBitmap.y = 1050;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);
}
function addSNH48(){
	setChara();
}
/**
 * 添加人物图片到界面里
 * */
function setChara(){
	charaLayer = new LSprite();
	stageLayer.addChild(charaLayer);
	var charaBitmap,sy = 750;
	var charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page2_p1"]));
	charaBitmap.scale = 1;
	charaBitmap.x = 250;
	charaBitmap.ty = 900;
	charaBitmap.y = 900;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);
	
	charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page2_p6"]));
	charaBitmap.scale = 1.1;
	charaBitmap.x = 850;
	charaBitmap.ty = 950;
	charaBitmap.y = 950;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);
	
	//good
	charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page2_p2"]));
	charaBitmap.scale = 1.1;
	charaBitmap.x = 350;
	charaBitmap.ty = 950;
	charaBitmap.y = 950;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);
	
	charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page2_p5"]));
	charaBitmap.scale = 1.1;
	charaBitmap.x = 810;
	charaBitmap.ty = 950;
	charaBitmap.y = 950;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);
	
	charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page2_p4"]));
	charaBitmap.scale = 1;
	charaBitmap.x = 600;
	charaBitmap.ty = 1050;
	charaBitmap.y = 1050;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);
	
	charaBitmap = new MiddleBitmap(new LBitmapData(imglist["page2_p3"]));
	charaBitmap.scale = 1;
	charaBitmap.x = 500;
	charaBitmap.ty = 1050;
	charaBitmap.y = 1050;
	charaBitmap.alpha = 0;
	charaLayer.addChild(charaBitmap);	
}
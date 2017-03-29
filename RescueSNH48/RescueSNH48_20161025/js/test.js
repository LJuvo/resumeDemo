function main() {
	if(LGlobal.canTouch) {
		LGlobal.stageScale = LStageScaleMode.SHOW_ALL;
		LSystem.screen(LStage.FULL_SCREEN);
	}
	loadingLayer = new LoadingSample4();
	addChild(loadingLayer);
	LLoadManage.load(loadData, function(progress) {
		loadingLayer.setProgress(progress);
	}, imgLoadComplete);
};

function imgLoadComplete(result) {
	datalist = result;
	removeChild(loadingLayer);
	loadingLayer = null;
	var background = new Background();

	function Background() {
		base(this, LSprite, []);
		this.init();
	};
	Background.prototype.init = function() {
		var self = this;
		backLayer = new LSprite;
		stageLayer = new LSprite;
		addChild(backLayer);
		self.bitmap = new LBitmap(new LBitmapData(datalist["background"], 0, 0, 640, 960));
		backLayer.addChild(this.bitmap);
		console.log(this.bitmap.childList);
		self.back = new LBitmap(new LBitmapData(datalist["backCove"], 0, 0, 640, 960));
		self.back.x = 0;
		self.back.y = 0;
		backLayer.addChild(self.back);

		timeLayer = new LSprite();
		backLayer.addChild(timeLayer);
		time = new Time();
		timeLayer.addChild(time);
		charaLayer = new LSprite();
		backLayer.addChild(charaLayer);
	}；

	function Character() {
		base(this, LSprite, []);
		this.init();
	};
	Character.prototype.init = function() {
		var self = this;
		self.x = adressData[adressNum][0];
		self.y = adressData[adressNum][1];
		self.adressNum = adressNum;
		var charaNum = parseInt(Math.random() * 4);
		self.index = charaNum;
		self.bitmap = new LBitmap(new LBitmapData(datalist[charaData[charaNum]]));
		self.addChild(self.bitmap);
		self.speed = 5;
		self.canClick = false;
		self.clickSpeed = 2;
	};

	Character.prototype.hide = function(obj) {
		var self = obj;
		self.bitmap = new LBitmap(new LBitmapData(datalist[charaData[self.index][0] + "J"]));
		charaLayer.addChild(self);
		self.canClick = true;
		self.addChild(self.bitmap);
		self.x = adressData[self.adressNum][0];
		self.y = adressData[self.adressNum][1];
		for(var key in charaLayer.childList) {
			charaLayer.childList[key].clickSpeed -= 1;
			if(self.canClick == true && charaLayer.childList[key].speed <= 0) {
				//移除该成员
				var that = charaLayer.childList[key];
				point += 100;
				arr.remove(that.adressNum);
				charaLayer.removeChild(charaLayer.childList[key]);
			}
		}
	};
	Character.prototype.run = function() {
		var self = this;
		for(var key in charaLayer.childList) {
			charaLayer.childList[key].speed -= 2;
			if(self.canClick == false && charaLayer.childList[key].speed <= 0) {
				//移除该成员
				arr.remove(charaLayer.childList[key].adressNum);
				charaLayer.removeChild(charaLayer.childList[key]);
			}
		}
	}
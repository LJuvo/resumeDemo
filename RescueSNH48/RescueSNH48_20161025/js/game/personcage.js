function personCage(){
	base(this,LSprite,[]);
	var self = this;
	
	for(var i=0;i<3;i++){
		for(var j=0;j<3;j++){
			var indextemp = (i+j)+(j*2);
			var opentemp = Math.random()%6*10;
			var flagtemp = "person_cage";
			var openState = false;
			if(opentemp < 3){
				flagtemp = "person_00";		
			}
			if(opentemp <5 && opentemp > 3){
				flagtemp = "person_character";
				openState = true;
			}
			var temp = {x:i,y:j,flag:flagtemp,index:indextemp,open:openState};
			stageMenu.push(temp);
		}
	}

	for(var i=0;i<stageMenu.length;i++){
		self.stageVsMenu(stageMenu[i]);
	}
};
personCage.prototype.stageVsMenu = function(obj){
	var self = this;
	
	var menuButton = new LSprite();
	var bitmap = new LBitmap(new LBitmapData(imglist[obj.flag]));
	menuButton.addChild(bitmap);

	menuButton.x = (1080/3)*obj.x +(((1080/3)-menuButton.getWidth())/2); 
	menuButton.y = (menuButton.getHeight() + 80)*obj.y +400;
	self.addChild(menuButton);
	menuButton.addEventListener(LMouseEvent.MOUSE_UP,function(event,self){
		gameStart(self.obj);
	});
	menuButton.obj = obj;
	
	
//	console.log("sdd;"+(menuButton.y));
	
}
function gameStart(obj){
	if(obj.open){
		score++;
		stageCheck = true;
	};
	
}
function getNumList(){
	var stage = stageMenu[stageIndex];
	if(stage.flag == 0){
		return randomNum01(stage.lv);
	}else{
		return randomNum02(stage.lv);
	}
}
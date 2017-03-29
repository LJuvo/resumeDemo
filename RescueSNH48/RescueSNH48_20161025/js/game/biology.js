var biologyObj = function(x,y,type,state){
	this.x = x;
	this.y = y;
	this.type = type;
	this.state = state;
	
	base(this,LSprite,[]);
	var live;
	if(type == "person"){
		live = new LBitmap(new LBitmapData(imglist[""]));
	}else{
		live = new LBitmap(new LBitmapData(imglist[""]));
	}
	
	if(state == "show"){
		this.addChild(live);
	
		setTimeout(function(){
			this.state = "hide";
			this.removeChild(live);
		},1000);
	}
}

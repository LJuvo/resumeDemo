var radioBgLayer,radioPLayer;
function radioGet(){
	
	
	var self = this;
	initRadio();
}
function initRadio(){
	radioBgLayer = new LSprite();
	
	var clueRadio = new LSprite();
	var coverImg = new LBitmap(new LBitmapData(imglist["radiopage"]));

	clueRadio.addChild(coverImg);
	radioBgLayer.addChild(clueRadio);
	SceneLayer.addChild(radioBgLayer);
}

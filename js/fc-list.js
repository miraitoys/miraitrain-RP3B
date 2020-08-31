function FC00(){
	
	var str;
	str = "def main(miraitoys,time):\n";
	
	return str;
}

function FC01(){
	
	var str;
	str = "	time.sleep(x)\n";
	
	return str;
}
function FC02(){
	
	var str;
	var str;
	str = "	motorfront = miraitoys.MotorDriver(1)\n";
	str += "	motorRear  = miraitoys.MotorDriver(2)\n";
	
	return str;
}
function FC03(){
	
	var str;
	str = "	motorfront.start(1,100)\n";
	str += "	motorRear.start(1,100)\n";
	
	return str;
}
function FC04(){
	
	var str;
	str = "	motorfront.stop()\n";
	str += "	motorRear.stop()\n";
	
	return str;
}

function FC05(){
	
	var str;
	str = "	led01 = miraitoys.Led(14)\n";
	
	return str;
}

function FC06(){
	
	var str;
	str = "	led01.on()\n";
	
	return str;
}

function FC07(){
	
	var str;
	str = "	led01.off()\n";
	
	return str;
}

function FC08(){
	
	var str;
	str = "	horn = miraitoys.Horn()\n";
	
	return str;
}

function FC09(){
	
	var str;
	str = "	horn.on()\n";
	
	return str;
}

function CTL01(){
	
	var str;
	str = "	slider.speed()\n";
	
	return str;
}

function SET01(){

	var str;
	str = "def main(time,motor,slider):\n";
	str += "	while True :\n";
	str += "		x = slider.speed()\n";
	str += "		\n";
	str += "		if x == 999 :\n";
	str += "			motor.stop()\n";
	str += "			break\n";
	str += "		elif x >= 0 :\n"
	str += "			motor.startPrev(x)\n";
	str += "		elif x < 0 : \n";
	str += "			motor.startBack(x)\n";
		
	return str;
}

function SET02(){
	
	var str;
	str = "def main(miraitoys,time):\n";
	str += "	motorfront = miraitoys.MotorDriver(1)\n";
	str += "	motorRear  = miraitoys.MotorDriver(2)\n";
	str += "	motorfront.start(1,100)\n";
	str += "	motorRear.start(1,100)\n";
	str += "	time.sleep(5)\n";
	str += "	motorfront.stop()\n";
	str += "	motorRear.stop()\n";
	
	return str;
}
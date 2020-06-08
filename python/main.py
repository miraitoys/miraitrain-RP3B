def main(miraitoy,time):

	motorRear  = miraitoy.MotorDriver(2)

	while True :
		motorRear.start(1,80)
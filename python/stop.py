import RPi.GPIO as GPIO
import miraitoy

#motorPrev = miraitoy.Motor(1)
#motorBack = miraitoy.Motor(2)
motorDriverPrev = miraitoy.MotorDriver(1)
motorDriverBack = miraitoy.MotorDriver(2)
#motorPrev.stop()
#motorBack.stop()
motorDriverPrev.stop()
motorDriverBack.stop()
GPIO.cleanup()
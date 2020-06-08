import RPi.GPIO as GPIO
import time
import main
import miraitoy


name = 'python/config/status.txt'

main.main(miraitoy,time)

GPIO.cleanup()

with open(name, mode='w') as f:
    f.write('0')

import RPi.GPIO as GPIO
import time
import function
import subprocess

#Motor Driver Hat
import wiringpi as pi, time
#from PCA9685 import PCA9685

#MotorDriverHAT
PWMA = 0
AIN1 = 1
AIN2 = 2
PWMB = 5
BIN1 = 3
BIN2 = 4

#MotorDriverBoard
PIN = 18
PWMA1 = 6 
PWMA2 = 13
PWMB1 = 20
PWMB2 = 21
D1 = 12
D2 = 26
GPIO.setwarnings(False)

class Motor:
    def __init__(self, which):
        self.which = which
        self.pwm = PCA9685(0x40, debug=False)
        
    def start(self, direction, speed):
        self.pwm.setPWMFreq(50)
        time.sleep(0.1)
        if self.which == 1:
            self.pwm.setDutycycle(PWMA, speed)
            if direction == 1:
                self.pwm.setLevel(AIN1, 0)
                self.pwm.setLevel(AIN2, 1)
            else:
                self.pwm.setLevel(AIN1, 1)
                self.pwm.setLevel(AIN2, 0)
        else:
            self.pwm.setDutycycle(PWMB, speed)
            if direction == 1:
                self.pwm.setLevel(BIN1, 0)
                self.pwm.setLevel(BIN2, 1)
            else:
                self.pwm.setLevel(BIN1, 1)
                self.pwm.setLevel(BIN2, 0)
    
    def stop(self):
        if self.which == 1:
            self.pwm.setDutycycle(PWMA, 0)
        else:
            self.pwm.setDutycycle(PWMB, 0)

class MotorDriver:
    def __init__(self, which):
        self.which = which
        GPIO.setmode(GPIO.BCM)
        GPIO.setup(PIN,GPIO.IN,GPIO.PUD_UP)
        GPIO.setup(PWMA1,GPIO.OUT)
        GPIO.setup(PWMA2,GPIO.OUT)
        GPIO.setup(PWMB1,GPIO.OUT)
        GPIO.setup(PWMB2,GPIO.OUT)
        GPIO.setup(D1,GPIO.OUT)
        GPIO.setup(D2,GPIO.OUT)
        
        if which == 1:
            self.p1 = GPIO.PWM(D1,500)
        else :
            self.p2 = GPIO.PWM(D2,500)
        
    def start(self, direction, speed):
        time.sleep(0.1)
        speed = speed * 0.8
        if self.which == 1:
            self.p1.start(speed)
            if direction == 1:
                GPIO.output(PWMA1,1)
                GPIO.output(PWMA2,0)
            else :
                GPIO.output(PWMA1,0)
                GPIO.output(PWMA2,1)
        else:
            self.p2.start(speed)
            if direction == 1:
                GPIO.output(PWMB1,1)
                GPIO.output(PWMB2,0)
            else :
                GPIO.output(PWMB1,0)
                GPIO.output(PWMB2,1)
    def stop(self):
        if self.which == 1 :
            GPIO.output(PWMA1,0)
            GPIO.output(PWMA2,0)
        else :
            GPIO.output(PWMB1,0)
            GPIO.output(PWMB2,0)

class Led:
    def __init__(self,port):
        #port = function.port_enabled(port)
        GPIO.setmode(GPIO.BCM)
        GPIO.setup(port, GPIO.OUT)
        
        self.port = port
        
    def on(self):
        GPIO.output(self.port, GPIO.HIGH)
        
    def off(self):
        GPIO.output(self.port, GPIO.LOW)

class LightSensor:
    def __init__(self, port):
        #port = function.port_enabled(port)
        pi.wiringPiSetupGpio()
        pi.pinMode(port,0)
        self.port = port
        
    def get(self):
        param = pi.digitalRead(self.port)
        return param
        
class Speaker:
    def __init__(self, port):
        #port = function.port_enabled(port)
        GPIO.setmode(GPIO.BCM)
        GPIO.setup(port, GPIO.OUT)
        TONE = 440
        self.port = port
        self.pwm = GPIO.PWM(self.port, TONE)
        self.pwm.ChangeFrequency(TONE)

    def on(self,sound):
        self.pwm.start(sound)
        
    def off(self):
        self.pwm.stop()
    
class Melody:
    def __init__(self, port, tone):
        #port = function.port_enabled(port)
        pi.wiringPiSetupGpio()
        pi.softToneCreate(port)
        self.port = port
        self.tone = tone
        
    def on(self):
        pi.softToneWrite(self.port,self.tone)

class Horn:
    def on(self):
        subprocess.call("mpg321 python/sound/train.mp3", shell=True)
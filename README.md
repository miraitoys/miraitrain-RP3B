# miraitoys-model-train-RP3BPlus-v1
ミライトイ用のソースコードです。
hatは、waveshareのmotor driver hatを使用します。

## 中身が書き換わるファイル
・python/config/speed.txt  
・python/config/status.txt  
・python/main.py  
  
  これらのファイルは、コンソール画面を表示時に、作成、パーミッションを変更する。  testtest
  
  
## 問題点
強制終了の際、モーターは停止するがその他の電子工作部品の制御が不可


## ラズパイを最新化する場合
開発／検証用
```
git pull origin develop
```

本番用
```
git pull origin master
```


## ルール
masterブランチはpushが不可。基本的にはdevelopからブランチを作成し、開発を行うこと  
pythonファイル内にコメントをするときは、日本語は禁止（Web上から動かなくなる）

## ラズパイの省電力化
https://rabbit-note.com/2017/04/29/raspberry-pi-3-model-b-power-save/  
echo 0 | sudo tee /sys/devices/platform/soc/3f980000.usb/buspower

## 関数の使い方
#### 関数宣言
必ず先頭行に以下の宣言を書くこと
```
def main(miraitoys,time):
```

例）
```
def main(miraitoys,time):
  (処理を書く)
```
宣言の下はタブを一つ必ずあける事。


### モーター
#### Motor Driver Board (高価版)
例)  
```
#モーターをセット
#()の中に1か2を入れる。1は前のモーター、2は後ろのモーター  
motor = miraitoys.MotorDriver(1)  

#モーターを発進
#()の中、左側の引数は、1は前進、2は後進。右側の引数はスピード。0〜100まで指定可。
motor.start(1,100)

#モーターを停止
motor.stop()
```

モーターの制御を行うことにより、以下のGPIOが使用される。  
・1モーター  
6,12,13    

・2モーター  
20,21,26  

モーターを使用している場合は上記のGPIOは使わないこと。

#### Motor Driver HAT (廉価版)
例)  
```
#モーターをセット
#()の中に1か2を入れる。1は前のモーター、2は後ろのモーター  
motor = miraitoys.Motor(1)  

#モーターを発進
#()の中、左側の引数は、1は前進、2は後進。右側の引数はスピード。0〜99まで指定可。
motor.start(1,100)

#モーターを停止
motor.stop()
```

### LED
例）  
```
#LEDを利用するポート番号をセット
#()の中にポート番号を入れる
led = miraitoys.Led(13)

#LEDを光らす
led.on()

#LEDを消す
led.off()
```

### 明暗センサー
例）  
```
#明暗センサーを利用するポート番号をセット
#()の中にポート番号を入れる
sensor = miraitoys.LightSensor(14)

#明暗の値を取得
#1はオン、0はオフ
x = sensor.get()
```

### 圧電スピーカー
例）  
```
#圧電スピーカーを利用するポート番号をセット
#()の中にポート番号を入れる
speaker = miraitoys.Speaker(11)

#音を鳴らす
#()内の値は音域。0〜100までセット可能。（ただし、圧電スピーカーの種類によって変わる）
speaker.on(30)

#音を消す
speaker.off()
```

### 警笛
例）
```
horn = miraitoys.Horn()
horn.on()
```



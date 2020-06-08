def port_enabled(num) :
    port_list = [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27]
    flg = False

    for port in port_list :
        if num == port :
            flg = True

    if flg == False :
        num = 27

    return num
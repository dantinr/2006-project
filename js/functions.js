const week = [
    '星期日',
    '星期一',
    '星期二',
    '星期三',
    '星期四',
    '星期五',
    '星期六',
]

//清除所有定时器
function clearAllTimers(t)
{
    for(var i=0;i<t.length;i++)
    {
        clearInterval(t[i])
    }
}

//格式化倒计时
function getDate2(seconds,type=1){

    //秒转天
    var d = seconds / 86400
    d = Math.floor(d)

    //小时
    var h = seconds / 3600
    h = Math.floor(h) % 24
    if(h<10){h='0'+h}

    //分钟
    var i = seconds / 60
    i = Math.floor(i) % 60
    if(i<10){i='0'+i}

    //秒
    s = seconds % 60
    if(s<10){s='0'+s}

    //时间显示格式
    if(type==1){        // hh:mm:ss
        return h + ":" + i + ":" + s
    }else{
        return d + "天" + h + "小时" + i + "分" + s + "秒"
    }
}

//获取当前时间
function getDate()
{
    var t = new Date()
    var year = t.getFullYear()          //年
    //console.log(year)
    var month = t.getMonth() + 1               //月
    //console.log(month)
    var day = t.getDate()           //日
    //console.log(day)
    var w = t.getDay()          //周x

    var hour = t.getHours()         //时
    if(hour<10){hour='0'+hour}
    //console.log(hour)

    var minute = t.getMinutes()     //分
    if(minute<10){minute='0'+minute}
    //console.log(minute)

    var second = t.getSeconds()     //秒
    if(second<10){second='0'+second}
    //console.log(second)

    var ymdhis = year + '-' + month + '-' + day + " " + hour + ':' + minute + ':' + second + " " + week[w]
    //console.log(ymdhis)
    return ymdhis
}
var f = document.forms[0]       //获取注册表单
f.addEventListener('submit',function(e){
    e.preventDefault()      //阻止表单提交的默认行为

    //通过Ajax将表单的数据发送给服务器
    // 1 实例化
    var xhr = new XMLHttpRequest()

    // 2 监听 readyState == 4
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status==200)
        {
            //接收服务器的响应数据
            var json_str = xhr.responseText

            var data = JSON.parse(json_str)
            //判断接口返回的状态码
            if(data.errno==0){      //成功
                alert("注册成功")
                window.location.href = "login.html"
            }else{
                alert(data.msg)
            }

        }
    }

    // 3 open
    xhr.open("POST","reg.php")

    // 4 send
    var inputs = f.querySelectorAll("input")    //获取所有input


    var form_param = ""     //拼接要发送的参数
    for(var i=0;i<inputs.length;i++)
    {
        if(inputs[i].getAttribute("name")===null ){
            continue;
        }

        form_param += inputs[i].getAttribute("name") + "=" + inputs[i].value + "&"
    }

    //设置 http请求头
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded")
    xhr.send(form_param)

})
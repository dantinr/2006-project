$(".btn").click(function(){
    var self = $(this)
    var id = self.parent().attr("data-id")

    //座位是否已被预订
    var status = self.parent().attr('data-status')  //1已被预订 0可预订
    if(status==1)
    {
        alert("座位已被预订了，请选择其他座位")
        return
    }

    if(confirm('确定预订吗？')){
        //请求后台
        $.ajax({
            url: 'seat.php',
            method: 'get',
            data:{id:id},
            dataType:'json',
        }).done(function(res){
            //判断错误码
            if(res.errno==400001)        //未登录
            {
                alert(res.msg)
                window.location.href = 'login.html'
                return
            }

            //修改当前页面状态
            self.parent().css('background-color','red')
            self.parent().attr('data-status',1)
            self.text('已预订').attr('disabled','disabled')

        })
    }

})

//重置
$("#reset").click(function(){
    if(confirm("确定重置吗？")){
        $.ajax({
            url: '/index.php?s=index/index/reserveCancel',
            method: 'get',
            dataType:'json',
        }).done(function(){
            //重新加载页面
            window.location.reload()
        })
    }

})
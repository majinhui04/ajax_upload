ajax_upload
===========

##ajax断点续传简易版##


    利用本地存储 localStore 实现单个文件的断点续传
    主要文件：upload.html ， upload.php
    
    服务器端 PHP 主要操作
    file_get_contents，file_put_contents
    
    实现过程：
        1.读取待上传的文件，将文件分割
        2.生成空的模拟表单数据 new FormData()，将分割好的一段文件流放进去
        3.XMLHttpRequest 传送数据，如此循环
    
    

<?php
/**
 * 该文件是一个配置文件. 通常来存放 数据库的信息和网站的一些默认信息
 */
return array(
    'DB'=>array(  //DB对应数据库的相关配置
        'host'=>'127.0.0.1',
        'user'=>'root',
        'password'=>'qpQP1021135325',
        'port'=>'3306',
        'dbname'=>'3time',
        'prefix'=>'v_'   //配置前缀
    ),
    'app'=>array(  //将来为项目提供默认值
        'default_platform'=>'Admin',
        'default_controller'=>'Login',
        'default_action'=>'index',
    ),
    //前台的配置信息
    'Admin'=>array(
        'PAGE_SIZE'=>2, //默认每页显示条数
        'group_wegit'=>array('A'=>'添加影片','B'=>'删除影片','C'=>'修改影片','D'=>'添加分类','E'=>'修改分类','F'=>'删除分类','G'=>'权限设置','H'=>'查看管理员','I'=>'添加管理员','J'=>'修改管理员','K'=>'删除管理员','L'=>'用户组权限设置','M'=>'查看注册用户'),
    ),
    'Home'=>array(),
    'ALLOW_IMAGE_TYPE'=>array('image/jpg','image/jpeg','image/png','image/gif')
);
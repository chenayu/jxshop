<?php
namespace controllers;

class MoController
{
    public function make()
    {
        $tableName = $_GET['name'];

        //生成控制器
        $cname = ucfirst($tableName).'Controller';
        ob_start();
        include(ROOT.'templates/controller.php');
        $str = ob_get_clean();
        file_put_contents(ROOT.'controllers/'.$cname.'.php',"<?php\r\n".$str);

        //生成模型
        $mname = ucfirst($tableName);
        ob_start();
        include(ROOT.'templates/model.php');
        $str = ob_get_clean();
        file_put_contents(ROOT.'models/'.$mname.'.php',"<?php\r\n".$str);

        //生成视图文件
        @mkdir(ROOT.'views/'.$tableName,0777);

        //create.html
        ob_start();
        include(ROOT.'templates/create.html');
        $str = ob_get_clean();
        file_put_contents(ROOT.'views/'.$tableName.'/create.html',$str);

        //edit.html
        ob_start();
        include(ROOT.'templates/edit.html');
        $str = ob_get_clean();
        file_put_contents(ROOT.'views/'.$tableName.'/edit.html',$str);

        //index.html
        ob_start();
        include(ROOT.'templates/index.html');
        $str = ob_get_clean();
        file_put_contents(ROOT.'views/'.$tableName.'/index.html',$str);
    }
}
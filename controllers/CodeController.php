<?php
namespace controllers;

class CodeController
{
    public function make()
    {
        $tableName = $_GET['name'];
        $cname = ucfirst($tableName).'Controller';

        ob_start();
        include(ROOT.'templates/controller.php');
        $str = ob_get_clean();
        file_put_contents(ROOT.'controllers/'.$cname.'.php',$str);

        //生成模型文件
        $mname = ucfirst($tableName);
        ob_start();
        include(ROOT.'templates/model.php');
        $str = ob_get_clean();
        file_put_contents(ROOT.'models/'.$mname.'.php',"<?php\r\n".$str);

        //生成视图文件
        @mkdir(ROOT.'views/'.$tableName,0777);
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
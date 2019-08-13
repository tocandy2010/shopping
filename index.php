<?php
/*
 * 網站入口文件
 */

// echo '<pre>';
// print_r($_GET);
// print_r($_SERVER);
// exit;
// var_dump($_SERVER);

require("./public/smraty3/smarty-3.1.33/libs/Smarty.class.php");
require('./config/path.php');
require('./helper/Helper.php');
// require('./public/tool/Pagetool.php');

 function loadlibs($class)
 {
    if (file_exists("./libs/{$class}.php")) {
       require("./libs/{$class}.php");
    }
 }

 spl_autoload_register("loadlibs");

 function loadtool($class)
 {
    if (file_exists("./public/tool/{$class}.php")) {
      require("./public/tool/{$class}.php");
    }
 }
 
 spl_autoload_register("loadtool");

$app = new Bootstrap();

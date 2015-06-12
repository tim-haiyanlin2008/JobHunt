<?php

require_once 'DB.php'; 
$dsn = 'mysql://teagroup:teagroup@localhost/teagroup'; 
$options = array( 
    'debug'       => 2, 
    'portability' => DB_PORTABILITY_ALL, 
); 
$db =& DB::connect($dsn, $options); 
if (DB::isError($db)) { 
    die($db->getMessage()); 
} 

//设置数据库的默认查询方式 
$db->setFetchMode(DB_FETCHMODE_ASSOC); 

//执行一个普通的查询语句 
$res =& $db->query('SELECT * FROM products'); 
//取得一个SQL查询的结果集行,列数 
printf("total%drow,%dcolumn", $res->numRows(), $res->numCols());
//当前表的结构信息 
/*
echo ("<pre>"); 
print_r($db->tableInfo($res)); 
echo ("</pre>");
*/



//执行一个带参数的查询 
$sql  = 'select  *  from products where id < ?'; 
$data = 50; 
$res =& $db->query($sql, $data); 
if (DB::isError($res)) { 
    die($res->getMessage()); 
} 
//按DB_FETCHMODE_ASSOC方式，循环显示，输出结果,这种方式下，以字段名称的方式来访问数据字段 
while ($row =& $res->fetchRow(DB_FETCHMODE_ASSOC)) { 
    echo $row['id'] .$row['name'] ."<br>"; 
} 
$res->free();
$db->disconnect(); 
?>

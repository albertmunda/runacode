<?php
require('database.php');

$obj=new LBDBManager("localhost","cmiddleware","distributed","loadbalancerDB");
$obj->createDB("localhost","cmiddleware","distributed","loadbalancerDB");
$obj->connectDB();


$sql= "CREATE TABLE IF NOT EXISTS backend_check  (
bend_server_id varchar(5),
bend_server_name varchar(20) NOT NULL,
bend_server_address varchar(15) NOT NULL,
bend_server_port int default 0,
bend_server_status int default 0,
PRIMARY KEY (bend_server_id)
)";

$obj->insertData($sql);

$sql="CREATE TABLE IF NOT EXISTS backend_load_check (
bend_server_id varchar(5),
bend_server_name varchar(20) NOT NULL,
load_usage int default 0,
FOREIGN KEY (bend_server_id) REFERENCES backend_check (bend_server_id)
)";

$obj->insertData($sql);



$sql = "INSERT INTO backend_check (bend_server_id,bend_server_name,bend_server_address,bend_server_port)
VALUES('{$_POST['server_id']}','{$_POST['server_name']}','{$_POST['server_address']}',{$_POST['server_port']})
ON DUPLICATE KEY UPDATE bend_server_id=VALUES(bend_server_id)";

//print($sql);
$obj->insertData($sql);
$obj=null;


?>

<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mysql_con = "localhost";
$database_mysql_con = "eudora";
$username_mysql_con = "root";
$password_mysql_con = "123";
$mysql_con = mysql_pconnect($hostname_mysql_con, $username_mysql_con, $password_mysql_con) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
<?php
$con=mysql_connect("studentmanage.mysql.database.azure.com", "student", "@Admin123", "studentrecorddb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
?>

<?php
$con=new mysqli("studentmanage.mysql.database.azure.com", "student", "@Admin123", "studentrecorddb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
?>

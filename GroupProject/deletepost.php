<?php
require('connect.inc.php');
ob_start();
session_start();

if(isset($_POST['id']) && !empty($_POST['id'])){
    $id=$_POST['id'];
    
    $query="select file_name,group_id from files where id='".$id."'";
    if(!$query_run=mysqli_query($con,$query)) die('Server Error');
    mysqli_data_seek($query_run,0);
    $row=mysqli_fetch_row($query_run);
    $file=$row[0];
    $groupid=$row[1];
    
    if($file!=""){
        $yes=@unlink('/xampp/htdocs/GroupProject/files/'.$groupid.'_'.$file);
        if($yes==false) die('Server Error. Post could not be deleted');
    }
    
    $query="delete from files where id='".$id."'";
    if(!mysqli_query($con,$query)) die('Server Error');
    
    $query="delete from tags where file_id='".$id."'";
    if(!mysqli_query($con,$query)) die('Server Error');

    $query="delete from comments where file_id='".$id."'";
    if(!mysqli_query($con,$query)) die('Server Error');

    $query="delete from notifs where file_id='".$id."'";
    if(!mysqli_query($con,$query)) die('Server Error');
}
else die('Error');

?>
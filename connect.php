 <?php
 $connection = mysqli_connect('localhost','root','');
 if(!$connection){
die("Darabase Connection Failed". mysqli_error($connection));
 }
  $select_db = mysqli_select_db($connection, 'cc');   
 if(!$select_db) 
    {
     die("Darabase Connection Failed". mysqli_error($connection));
 }
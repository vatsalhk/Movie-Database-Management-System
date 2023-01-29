<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>








<div class="w3-sidebar w3-light-grey w3-bar-block w3-card-2" style="width:25%">
    <h3 class="w3-bar-item w3-black">
      <a href="home.php" class="w3-bar-item w3-black">2CS402 Assignment</a>
  </h3>

  <div class="w3-blue w3-card-2 w3-container">
    <p>Input New Information</p>
  </div>

  <a href="addActorDirector.php" class="w3-bar-item w3-button">Add Person</a>
  <a href="addMovie.php" class="w3-bar-item w3-button">Add Movie</a>
  <a href="addMovieActor.php" class="w3-bar-item w3-button">Add Movie Actor</a>
  <a href="addMovieDirector.php" class="w3-bar-item w3-button">Add Movie Director</a>

    <div class="w3-container w3-red w3-card-2">
    <p>Search</p>
  </div>

  <a href="search.php" class="w3-bar-item w3-button">Search For Actor/Movie</a>

</div>











<div class="w3-container w3-card-2" style="margin-left:26%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Add New Actor/Director</h1>
    </div>

  
    <form action="./addActorDirector.php" id="addform" method="post">
  
  <br>

    <input class="w3-radio" type="radio" name="persontype" value="Actor" checked>
    <label>Actor</label>

    <input class="w3-radio" type="radio" name="persontype" value="Director">
    <label>Director</label>

    <br><br>




      <label>First Name</label>
        <input class="w3-input w3-border w3-round" type="text" name="firstname" form="addform">

        <label>Last Name</label>
        <input class="w3-input w3-border w3-round" type="text" name="lastname" form="addform">

        <br><br>

        <input class="w3-radio" type="radio" name="gender" value="Male" checked>
        <label>Male</label>

        <input class="w3-radio" type="radio" name="gender" value="Female">
        <label>Female</label>

        <br><br><br>

        <label>Date of Birth</label>
        <input class="w3-input w3-border w3-round" type="text" name="dob" form="addform">

        <label>Date of Death</label>
        <input class="w3-input w3-border w3-round" type="text" name="dod" form="addform">
	<input type="hidden" name="hide" value="1">

        <br><br>
        <input class="w3-btn w3-green" type="submit">
        <br><br>

    </form>
<?php

   $local_persontype=$_POST['persontype'];
   $local_gender=$_POST['gender'];
   $local_firstname=$_POST['firstname'];
   $local_lastname=$_POST['lastname'];
   $local_dob=$_POST['dob'];



   if ($local_lastname!="")
{

   
   $db_connection = mysqli_connect("localhost", "root", "","cs143");
   
   $query1="SELECT * FROM `maxpersonid`";
   $result1=mysqli_query($db_connection,$query1);
   while(@$row=mysqli_fetch_row(@$result1))
   {
      $lo_pid=$row[0]; 
   }
   

   $local_pid = $lo_pid+1;
   

   if ($local_persontype=="Director")
   {

    $query2="INSERT INTO `director` values('$local_pid', '$local_lastname', '$local_firstname', '$local_dob')";

   
   $result2=mysqli_query($db_connection,$query2);

   if ($result2)
   {
   $query3="UPDATE `maxpersonid` set id='$local_pid'";
   $result3=mysqli_query($db_connection,$query3);

   }

 }
   


   else if ($local_persontype=="Actor")
   {  
   $aquery2="INSERT INTO `actor` values('$local_pid','$local_lastname','$local_firstname','$local_gender','$local_dob')";

   
   $aresult2=mysqli_query($db_connection,$aquery2);
   if ($aresult2)
   {
   $aquery3="UPDATE `maxpersonid` set id='$local_pid'";
   $aresult3=mysqli_query($db_connection,$aquery3);

   }


  
   }



 
}
?>


</div>
</body>
</html>

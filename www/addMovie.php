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
        <h1>Add New Movie</h1>
    </div>

    <br><br>

    <form action="addMovie.php" id="addform" method="post">
        <label>Title</label>
        <input class="w3-input w3-border w3-round" type="text" name="title" form="addform">

        <br>

        <label>Company</label>
        <input class="w3-input w3-border w3-round" type="text" name="company" form="addform">

        <br>

        <label>Year</label>
        <input class="w3-input w3-border w3-round" type="text" name="year" form="addform">

        <br>

        <label>MPAA Rating</label>
        <select class="w3-select w3-border" name="rating">
            <option value="" disabled selected>Choose Rating</option>
            <option value="G">G</option>
            <option value="PG">PG</option>
            <option value="PG-13">PG-13</option>
            <option value="PG13">PG-13</option>
            <option value="R">R</option>
            <option value="NC-17">NC-17</option>
            <option value="surrendere">surrendere</option>
        </select>


        <br><br>

        <label>Genre</label>
        <select class="w3-select w3-border" name="option">
            <option value="" disabled selected>Choose Genre</option>
            <option value="Action">Action</option>
            <option value="Adult">Adult</option>
            <option value="Adventure">Adventure</option>
            <option value="Animation">Animation</option>
            <option value="Comedy">Comedy</option>
            <option value="Crime">Crime</option>
            <option value="Documentary">Documentary</option>
            <option value="Drama">Drama</option>
            <option value="Family">Family</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Horror">Horror</option>
            <option value="Musical">Musical</option>
            <option value="Mystery">Mystery</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Short">Short</option>
            <option value="Thriller">Thriller</option>
            <option value="War">War</option>
            <option value="Western">Western</option>
        </select>


        <label>Genre</label>
        <select class="w3-select w3-border" name="option1">
            <option value="" disabled selected>Choose Genre</option>
            <option value="Action">Action</option>
            <option value="Adult">Adult</option>
            <option value="Adventure">Adventure</option>
            <option value="Animation">Animation</option>
            <option value="Comedy">Comedy</option>
            <option value="Crime">Crime</option>
            <option value="Documentary">Documentary</option>
            <option value="Drama">Drama</option>
            <option value="Family">Family</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Horror">Horror</option>
            <option value="Musical">Musical</option>
            <option value="Mystery">Mystery</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Short">Short</option>
            <option value="Thriller">Thriller</option>
            <option value="War">War</option>
            <option value="Western">Western</option>
        </select>

	<input type="hidden" name="hide" value="1">

        <br><br>
        <input class="w3-btn w3-green" type="submit" name="submit">
        <br><br>

    </form>
<?php

@$flag = $_POST['submit'];
if($flag) {


$db_connection = mysqli_connect("localhost", "root", "","cs143");

$query = "SELECT * FROM MaxMovieID";
$result1 = mysqli_query($db_connection,$query);



while(@$row=mysqli_fetch_row(@$result1))
   {
      $lo_pid=$row[0]; 
   }
   

   $local_mid = $lo_pid+1;


   $local_title=$_POST['title'];
   $local_company=$_POST['company'];
   $local_year=$_POST['year'];
   $local_rating=$_POST['rating'];
   $local_option=$_POST['option'];
   $local_option1=$_POST['option1'];
   
   $insert_query ="insert into Movie values('$local_mid','$local_title',$local_year,'$local_rating','$local_company')";
//   echo $insert_query;
  
 $result = mysqli_query($db_connection,$insert_query);
 
 $query2="insert into MovieGenre values('$local_mid','$local_option')";
 $query21="insert into MovieGenre values('$local_mid','$local_option1')";
 if ($result)
 {

  $result2=mysqli_query($db_connection,$query2);
   $result2=mysqli_query( $db_connection,$query21);
 }
 $query3="update MaxMovieID set id='$local_mid'";
 echo $query3;
   
 if ($result and $result2)$result3=mysqli_query( $db_connection,$query3);

}

?>

</div>
</body>
</html>

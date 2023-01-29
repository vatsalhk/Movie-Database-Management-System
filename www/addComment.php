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
        <h1>Add Comment</h1>
    </div>

    <br>

    <form action="./addComment.php" id="addform" method="post">
        <label>Movie Title</label>
        <?php 

	   $local_mid=$_GET['movieId'];
	   $iquery="select title from Movie where id=$local_mid";
$db_connection = mysqli_connect("localhost", "root", "","cs143");


$iresult=mysqli_query($db_connection,$iquery);
$name=mysqli_fetch_row($iresult);
echo "$name[0]";


	   ?>
	<input type="hidden" name="valueid" value=<?php echo $local_mid;?>>
        <br><br>

        <label>Your Name</label>
        <input class="w3-input w3-border w3-round" type="text" name="reviewername" form="addform">

        <br>

        <label>Rating</label>
        <select class="w3-select w3-border" name="rating">
            <option value="" disabled selected>Choose Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <br><br>

        <label>Comments</label>
        <textarea class="w3-input w3-border" rows="4" cols="50" name="comment" form="addform">Write Your Comment Here</textarea>


        <br><br>
        <input class="w3-btn w3-green" type="submit">
        <br><br>

    </form>

<?php

$local_reviewername=$_POST['reviewername'];
$local_rating=$_POST['rating'];
$local_comment=$_POST['comment'];
 
$local_midvalue=$_POST['valueid'];
//echo $local_midvalue; 
$db_connection = mysqli_connect("localhost", "root", "","cs143");
$final_query="insert into Review values('$local_reviewername',NOW(),$local_midvalue,$local_rating,'$local_comment')";

$final_result=mysqli_query( $db_connection,$final_query);
?>
</div>
</body>
</html>

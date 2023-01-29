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
        <h1>Actor Information</h1>
    </div>

    <br><br>

    <form action="./actorInfo.php" id="addform" method="post">

        <table class="w3-table-all" style="width:100%">
        <caption>Biographical Information</caption>
        <tr>
        <th>Actor ID</th> <th>Name</th> <th>Sex</th> <th>Date of Birth</th> <th>Date of Death</th>
        </tr>


        <?php
            $actorName = $_GET['actorName'];
    
$db_connection = mysqli_connect("localhost", "root", "","cs143");
            $actorquery = "Select id, name, sex, dob, dod From (Select id, Concat(`first`, ' ', `last`) as name, sex, dob, dod From Actor) as full Where full.name='$actorName';";
            $result = mysqli_query($db_connection,$actorquery);


            while($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for($x = 0; $x < count($row); $x++) {
                    echo "<td>$row[$x]</td>";
                }
                echo "</tr>";
            }

        ?>


        
        </table>


        <br>
        <table class="w3-table-all" style="width:100%">
        <caption>Movies and Roles</caption>
        <tr>
        <th>Role</th> <th>Movie</th>
        </tr>


       <?php
            $aName = $_GET['actorName'];
            $aId = $_GET['actorId'];
    
   $db_connection = mysqli_connect("localhost", "root", "","cs143");
         $mquery = "Select role, title From MovieActor, Movie Where MovieActor.mid=Movie.id and aid=$aId;";
            $mresult = mysqli_query( $db_connection,$mquery);


            while($mrow = mysqli_fetch_row($mresult)) {
                echo "<tr>";
                for($x = 0; $x < count($mrow); $x++) {
                    echo "<td>$mrow[$x]</td>";
                }
                echo "</tr>";
            }

        ?>


        </table>

        <br><br>

    </form>

</div>
</body>
</html>



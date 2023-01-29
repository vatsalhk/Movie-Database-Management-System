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
  <a href="addComment.php" class="w3-bar-item w3-button">Add Movie Comments</a>
  <a href="addMovieActor.php" class="w3-bar-item w3-button">Add Movie Actor</a>
  <a href="addMovieDirector.php" class="w3-bar-item w3-button">Add Movie Director</a>


  <div class="w3-container w3-red w3-card-2">
    <p>Search</p>
  </div

  <a href="search.php" class="w3-bar-item w3-button">Search For Actor/Movie</a>

</div>





<div class="w3-container w3-card-2" style="margin-left:26%">
    <div class="w3-container w3-card-2 w3-teal">
        <h1>Movie Information</h1>
    </div>

    <br><br>

    <form action="./movieInfo.php" id="addform" method="post">

        <table class="w3-table-all" style="width:100%">
        <caption>Basic Information</caption>
        <tr>
        <th>Title</th> <th>Producer</th> <th>MPAA Rating</th> <th>Director</th> <th>Genre</th>
        </tr>
        

        <?php
            $movieId = $_GET['movieId'];
    
   $db_connection = mysqli_connect("localhost", "root", "","cs143");          $moviequery = "Select title, company, rating, Concat(`first`, ' ', `last`), genre From (((Movie join MovieDirector on Movie.id=MovieDirector.mid) join Director on MovieDirector.did=Director.id) join MovieGenre on Movie.id=MovieGenre.mid) Where MovieGenre.mid=$movieId;";
            $result = mysqli_query( $db_connection,$moviequery);


            while($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for($x = 0; $x < count($row); $x++) {
                    echo "<td>$row[$x]</td>";
                }
                echo "</tr>";
            }

        ?>


        </table>

        <br><br>


        <table class="w3-table-all" style="width:100%">
        <caption>Actors and Roles</caption>
        <tr>
        <th>Actor</th> <th>Role</th>
        </tr>
        

        <?php
            $movieId = $_GET['movieId'];
    
            $db_connection = mysqli_connect("localhost", "root", "","cs143");
           
            $moviequery = "Select Concat(`first`, ' ', `last`), role, id From MovieActor, Actor Where MovieActor.aid=Actor.id and mid=$movieId;";
            $result = mysqli_query($db_connection,$moviequery);


            while($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                for($x = 0; $x < count($row) - 1; $x++) {
                    echo "<td> <a href=\"actorInfo.php?actorName=$row[0]&actorId=$row[2]\"> $row[$x] </a> </td>";
                }
                echo "</tr>";
            }

        ?>


        </table>


    </form>

    <div>
        <div class="w3-panel w3-blue w3-card-4">
            <h3>User Reviews</h3>
        </div>

        <p>Average User Rating: <?php  
            $movieId = $_GET['movieId'];
    
                $db_connection = mysqli_connect("localhost", "root", "","cs143");
                
                $moviequery = "Select avg(rating) From Review Where mid=$movieId;";
                $result = mysqli_query( $db_connection,$moviequery);

            echo $result[0];
        
        
        
        
        ?></p>

        <table class="w3-table-all" style="width:100%">
        <caption>Actors and Roles</caption>
        <tr>
        <th>Name</th> <th>Time</th> <th>Rating</th> <th>Comment</th>
        </tr>
            <?php 
                $movieId = $_GET['movieId'];
    
  $db_connection = mysqli_connect("localhost", "root", "","cs143");              $moviequery = "Select name, time, rating, comment From Review Where mid=$movieId;";
                $result = mysqli_query( $db_connection,$moviequery);

                while($row = mysqli_fetch_row($result)) {
                    echo "<tr>";
                    for($x = 0; $x < count($row); $x++) {
                        echo "<td>$row[$x]</td>";
                    }
                    echo "</tr>";
                }

            ?>
        </ul>



        <br><br>
    </div>


    <div>
        <?php 
            $movieId = $_GET['movieId'];  
            echo "<a href=\"addComment.php?movieId=$movieId\" class=\"w3-green w3-btn\"> Add Comment </a>"

            ?>
    </div>


    <br><br>

</div>
</body>
</html>

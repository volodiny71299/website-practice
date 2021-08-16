<?php include("top.php");
            
    $find_sql = "SELECT * FROM `game_details`
    JOIN genre ON (game_details.GenreID = genre.GenreID)
    JOIN developer ON (game_details.DeveloperID = developer.ID)
    
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>All Results</h2>
            

            <?php
            
            if($count < 1) {

                ?>
                
                <div class="error">
                    Sorry! There are no results that match your search. Please use the search box in the side bar to try again.
                </div> <!-- end error -->

            <?php
            }

            else {
                do
                {
                    
                    ?>
            
            <!-- Results -->
            <div class="results">

                Title:
                <span class="sub_heading">
                    <a href="<?php echo $find_rs['URL']; ?>">
                        <?php echo $find_rs['Name']; ?>
                    </a>
                </span> - <?php echo $find_rs['Subtitle'] ?>
                </br>

                <p>
                    <b>Genre</b>:
                    <?php echo $find_rs['Genre'] ?>

                    </br>

                    <b>Developer</b>:
                    <?php echo $find_rs['Developer'] ?>

                    </br>
                    
                    <b>Rating</b>:
                    <?php echo $find_rs['User Rating'] ?> (based on <?php echo $find_rs['Rating Count'] ?> votes)

                </p>
                <hr />

                <?php echo $find_rs['Description'] ?>

            </div> <!-- end results-->

                </br>

            <?php

                } // End results 'do'

                while
                    ($find_rs=mysqli_fetch_assoc($find_query));

            } // End else

            ?>
            
        </div> <!-- / main -->

<?php include("bottom.php") ?>
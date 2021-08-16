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
                
                <!-- Heading and subtitle -->
                
                <div class="flex-container"> <!-- Title-->
                    <div>
                        <span class="sub_heading">
                            <a href="<?php echo $find_rs['URL']; ?>">
                                <?php echo $find_rs['Name']; ?>
                            </a>
                        </span>
                    </div> <!-- / Title -->

                <?php
                    if($find_rs['Subtitle'] != "")
                    
                    {

                        ?>
                        <div> <!-- Subtitle -->

                            &nbsp; &nbsp; | &nbsp; &nbsp;
                        
                            <?php echo $find_rs['Subtitle'] ?>

                        </div> <!-- / Subtitle-->

                        <?php 

                    }
                
                ?>
                </div>
                <!-- / Heading and subtitle -->
                
                <!-- Price-->
                
                <?php
                
                    if($find_rs['Price'] == 0) {
                        ?>
                        
                        <p>Free
                            <?php
                            if($find_rs['In App'] ==1)
                                {
                                    ?>
                                        (In App Purchase)
                                    <?php
                                }
                            ?>
                        </p>

                        <?php
                    } // End price if

                    else {
                        

                        ?>
                        <p>
                        <b>Price:</b> $<?php echo $find_rs['Price'] ?>
                        </p>
                        <?php

                    } // end price else (display cost)
                
                ?>
                
                <!-- / Price-->
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
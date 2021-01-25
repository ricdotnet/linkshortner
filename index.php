<?php

    require("header.php"); //connect to the database

    /**
     * url submit form
     * push url details to database
     */

    $message = "";

    if(isset($_POST["shorturl"])) { //if button send is clicked

        $urldestination = $_POST["urldestination"]; //assign urldestination input to $urldestination
        $urlname = $_POST["urlname"]; //assign urlname input to $urlname 

        $checkdatabase = "select * from urls where name = '$urlname'";
        $checkformatch = mysqli_query($connect, $checkdatabase) or die(mysqli_error());

        if(mysqli_num_rows($checkformatch) == 1) {

            $message = "A link with that name already exists.\n"
                ."Refreshing in...";
            header("refresh: 3.9; index.php");

        ?>

            <!-- output for error message -->
            <!--<div id='output' class='output'><?=$message?></div>-->
            <div id='showError' style="display: none;">error</div>
            <div id="outputerror" class="error-box output-error">Could not complete operation. Please try again.</div>

        <?php

        } else {

            //add results into database
            $senddetails = "insert into urls values (null, '$urlname', '$urldestination', 1)";
            mysqli_query($connect, $senddetails) or die(mysqli_error());

            $message = "<input value='http://rrocha.uk/linkshort/url.php?d=" . $urlname . "'>\n"
                . "Please save this link.\n"
                . "Refreshing in... ";
            header("refresh: 15.9; index.php");

        ?>

            <!-- output for success message -->
            <!--<div id='output-success' class='output'><?=$message?></div>-->
            <div id='showSuccess' style="display: none;">success</div>
            <div id="generatedLink" class="generated-link">http://rrocha.uk/linkshort/url.php?d=<?=$urlname?></div>
            <div id="outputsuccess" class="success-box output-success">Link shortened successfully.</div>

        <?php

        }

    }

?>
        

        <!-- form container start -->
        <div id="form" class="form-container">
            <form action="" method="post">
                <div class="label">Shorten a URL!</div>
                <input oninput="validateForm()" class="top-input" id="urldestination" name="urldestination" type="url" autocomplete="off" value="http://">
                <input oninput="validateForm()" class="bottom-input" id="urlname" name="urlname" type="text" autocomplete="off">
                <button id="urlsubmit" type="submit" name="shorturl" disabled>Shorten!</button>
            </form>
        </div>
        <!-- form container end -->

        <!-- import all .js scripts here -->
        <script type="text/javascript" src="extras/scripts.js" defer></script>
    </body>
</html>
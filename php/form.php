<?php
// Instantiate the AYAH object. You need to instantiate the AYAH object
// on each page that is using PlayThru.
require_once("ayah.php");
$ayah = new AYAH();

// Check to see if the user has submitted the form. You will need to replace
// 'my_submit_button_name' with the name of your 'Submit' button.
if (array_key_exists('my_submit_button_name', $_POST))
{
        // Use the AYAH object to see if the user passed or failed the game.
        $score = $ayah->scoreResult();

        if ($score)
        {
            // This happens if the user passes the game. In this case,
            // we're just displaying a congratulatory message.
                echo "Congratulations: you are a human!";
        }
        else
        {
        	// This happens if the user does not pass the game.
            echo "Sorry, but we were not able to verify you as human. Please try again.";
        }
}
?>

<!-- Now we’re going to build the form that PlayThru is attached to.
In this example, the form submits to itself.-->
<form method="post" action="">

        <p>Please enter your name: <input type="text" name="name" /></p>

        <?php
            // Use the AYAH object to get the HTML code needed to
            // load and run PlayThru. You should place this code
            // directly before your 'Submit' button.
            echo $ayah->getPublisherHTML();
        ?>
        
        <!-- Make sure the name of your ‘Submit’ matches the name on line 9. -->
        <input type="Submit" name="my_submit_button_name" value=" Submit ">
</form>

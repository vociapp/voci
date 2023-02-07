<?php
if ($_SESSION['side'] == 1){
?>
<html>
    <body>
        <div class="studyCards">
            <p><?php echo $_SESSION['front'];?></p>
            <form action="?action=study_deck" method="post">
                <input class = "mainButton" type="submit" value="flip">
            </form>
        </div>

<?php }
else { ?>
        <div class="studyCards">
            <p><?php echo $_SESSION['back'];?></p>
            <form action="?action=study_deck" method="post">
                        <input class = "mainButton" type="submit" value="next">
            </form>
        </div>  

<?php } ?>
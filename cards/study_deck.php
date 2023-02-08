<?php
if ($_SESSION['side'] == 1){
?>
<html>
    <body>
        <div class="studyCards">
            <p><?php echo $_SESSION['study_deck'][$_SESSION['index']]['front'];?></p>
            <form action="." method="post">
                <input type="hidden" name="initiate" value="0">
                <input type="hidden" name="action" value="study_deck">
                <input class = "mainButton" type="submit" value="flip">
            </form>
        </div>

<?php }
else { ?>
        <div class="studyCards">
            <p><?php echo $_SESSION['study_deck'][$_SESSION['index']]['back'];?></p>
            <form action="." method="post">
                <input type="hidden" name="initiate" value="0">
                <input type="hidden" name="action" value="study_deck">
                <input class = "mainButton" type="submit" value="next">
            </form>
        </div>  

<?php 
$_SESSION['index']--;
} 
?>
<?php
if (count($_SESSION['queue']) != 0 && $_SESSION['side'] == 1){
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
else if (count($_SESSION['queue']) != 0 && $_SESSION['side'] == 0) { 
?>
        <div class="studyCards">
            <p><?php echo $_SESSION['back'];?></p>
            <form action="?action=study_deck" method="post">
                        <input class = "mainButton" type="submit" value="next">
            </form>
        </div>  

<?php }
else {
?>
        <div class="studyCards">
            <p>Out of cards.</p>

            <form action="?action=study_deck" method = "post">
                <input type="hidden" name="deck_id" value='<?php echo $_SESSION['deck_id']; ?>'>
                <input type="hidden" name="initiate" value=1>
                <input class = "mainButton" type="submit" value="reshuffle">
            </form>

            <form action="?action=decks" method="post">
                <input class = "mainButton" type="submit" value="Decks">
            </form>
        </div>
    </body>
</html>
<?php } ?>
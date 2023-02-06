<?php
$deck_id = $_POST['deck_id'];
?>

<html>
    <body>
        <div class="decks" style="margin-top:20%;">
            <div class="deck">
                <form method="post" action="?action=edit_deck">
                    <input type = "text" name = "name" placeholder="New name">
                    <input type = "hidden" name = "deck_id" value = <?php echo $deck_id;?>>
                    <input type = "submit" value = "Change">
                </form>
            </div>
        </div>
    </body>
</html>
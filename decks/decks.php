<?php
$user_id = $_SESSION['user_id'];
$decks = get_decks($user_id);
?>

<html>
    <body>
        <div class="decks">
            <h>Decks</h>
            <br>
            <?php foreach ($decks as $deck){
                ?>
                <div class="deck">
                    <form method="post" onSubmit="return confirm('Are you sure you want to delete?')" action=".">
                        <input type="hidden" name="action" value="delete_deck">
                        <input type="hidden" name="deck_id" value=<?php echo $deck['deck_id']; ?>>
                        <input class="editButton" type="submit" value="Delete">
                    </form>
                    <form method="post" action=".">
                        <input type="hidden" name="action" value="edit_deck_view">
                        <input type="hidden" name="deck_id" value=<?php echo $deck['deck_id']; ?>>
                        <input class="editButton" type="submit" value="Edit">
                    </form>
                    <form method="post" action=".">
                        <input type="hidden" name="action" value="cards_view">
                        <input type="hidden" name="deck_id" value=<?php echo $deck['deck_id']; ?>>
                        <input type="hidden" name="deck_name" value="<?php echo $deck['name']; ?>">
                        <input class="mainButton" type="submit" value="<?php echo $deck['name'];?>">
                    </form>
                    <br>
                </div>
                <?php } ?>
            <div class="deck">
                <form action="." method="post">
                    <input type="hidden" name="action" value="add_deck">
                    <input type="hidden" name="user_id" value=<?php echo $_SESSION['user_id']; ?>>
                    <input tabindex="1" class = "mainButton" type="text" name="name" placeholder="Press tab">
                    <input tabindex="2" class="addButton" type="submit" value = "Add">
                </form>
            </div>
            <br>
            <form action="." method = "post">
                <input type="hidden" name="action" value="logout">
                <input class="editButton"type="submit" value="Log out">
             </form>
        </div>
    </body>
</html>
<?php $deck_id = $_SESSION['deck_id'];?>
<html>
    <body>
        <!--TODO return to decks-->
        <!--TODO study mode-->
        <!--TODO voci mode-->
        <!--Displaying all of the cards-->
        <div class="cards">
            <div class="cardsHeader">
                <h><?php echo $_SESSION['deck_name'];?></h>
                <div class="studyButtons">
                    <!-- Study button here -->
                    <form method="post" action="?action=study_deck">
                        <input type="hidden" name="deck_id" value=<?php echo $deck_id;?>>
                        <input type="hidden" name="initiate" value=1>
                        <input class="mainButton" style="width:100px; height:60%;" type="submit" value="Study">
                    <!-- Voci button here  -->
                    </form>
                        <input type="hidden" name="deck_id" value=<?php echo $deck_id;?>>
                        <input class="mainButton" style="width:100px; height:60%;" type="submit" value="Voci">
                    <form></form>
                </div>
            </div>
            <?php foreach ($cards as $card){?>

                <div class="card">
                    <p><?php echo $card['front'];?></p>
                    <br>
                    <p><?php echo $card['back'];?></p>
                    <br>
                    <form method="post" action="?action=delete_card">
                        <input type = "hidden" name="id" value=<?php echo $card['card_id'];?>>
                        <input class="editButton" type="submit" value="Delete">
                    </form>
                    <br>
                </div>
            <?php } ?>

            <!--Add a card-->
            <form method="post" action="?action=add_card">
                <input type="hidden" name="deck_id" value=<?php echo $deck_id;?>>
                <input tabindex="1" class="textField" style="width:100%;" type="text" name="front">
                <input tabindex="2" class="textField" style="width:100%;" type="text" name = "back">
                <input tabindex="3" class="mainButton" style="width:100px;" type="submit" value="Add">
            </form>
        </div>
    </body>
</html>
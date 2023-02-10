        
        <!-- Display Study modes to the left -->
        <aside class="cards-side">    
            <!-- Study Button -->
            <form method="post" action=".">
                <input type="hidden" name="action" value="study_deck">
                <input type="hidden" name="deck_id" value=<?php echo $_SESSION['deck_id'];?>>
                <input type="hidden" name="initiate" value=1>
                <input type="submit" value="study">
            </form>

            <!-- Voci Button  -->
            <form>
                <input type="hidden" name="deck_id" value=<?php echo $_SESSION['deck_id'];?>>
                <input type="submit" value="voci">
            </form>
            <!-- Rename -->
            <form method="post" action=".">
                <input type="hidden" name="action" value="rename_deck_view">
                <input type="hidden" name="deck_id" value=<?php echo $_SESSION['deck_id'];?>>
                <input type="submit" value="rename">
            </form>

            <!-- Delete  -->
            <form method="post" action="." onSubmit="return confirm('Are you sure you want to delete?')">
                <input type="hidden" name="deck_id" value=<?php echo $_SESSION['deck_id'];?>>
                <input type="hidden" name="action" value="delete_deck">
                <input type="submit" value="delete">
            </form>
        </aside>

        <main class="cards">

            <?php foreach ($cards as $card){?>

                <div class="card">
                    <p><?php echo $card['front'];?></p>
                    <br>
                    <p><?php echo $card['back'];?></p>
                    <br>
                    <!-- Delete a card -->
                    <form method="post" action=".">
                        <input type="hidden" name="action" value="delete_card">
                        <input type = "hidden" name="card_id" value=<?php echo $card['card_id'];?>>
                        <input class="delete" type="submit" value="Delete">
                    </form>
                    <br>
                </div>
            <?php } ?>

            <!--Add a card-->
            <div class="card">
                <form class="add-deck" method="post" action=".">
                    <input type="hidden" name="deck_id" value=<?php echo $_SESSION['deck_id'];?>>
                    <input type="hidden" name="action" value="add_card">
                    <input tabindex="1" class="text" type="text" name="front" placeholder="Press tab">
                    <br>
                    <input tabindex="2" class="text" type="text" name = "back">
                    <br>
                    <input tabindex="3" class="button" type="submit" value="Add">
                </form>
            </div>
        </main>
        <footer>
            <ul>
                <li><a href="?logout=true">log out</a></li>
                <li><a href="<?php echo $app_path . 'settings'; ?>">settings</a></li>
            </ul>
        </footer>
    </body>
</html>
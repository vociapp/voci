<?php
$user_id = $_SESSION['user_id'];
$decks = get_decks($user_id);
?>
<!-- Main Section -->
<main class="decks">
    <div class="scrollable">
        <?php foreach ($decks as $deck){ ?>
        <form class="deck" method="post" action=".">
            <input type="hidden" name="action" value="cards_view">
            <input type="hidden" name="deck_id" value=<?php echo $deck['deck_id']; ?>>
            <input type="hidden" name="deck_name" value="<?php echo $deck['name']; ?>">
            <input type="submit" value="<?php echo htmlspecialchars_decode($deck['name']);?>">
        </form>
        <br>
        <?php } ?>
        <!-- Add Deck Div -->
        <form action="." method="post">
            <input type="hidden" name="action" value="add_deck">
            <input type="hidden" name="user_id" value=<?php echo $_SESSION['user_id']; ?>>
            <input tabindex="1" class="add-text" type="text" name="name" placeholder="Press tab">
            <input tabindex="2" class="add-button" type="submit" value="Add">
        </form>
    </div>
</main>
<br>
<!-- Footer Section -->
<footer>
    <nav>
        <a href="?logout=true">log out</a>
        <a href="<?php echo $app_path . 'settings'; ?>">settings</a>
    </nav>
</footer>
</body>

</html>
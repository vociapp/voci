<?php
$deck_id = $_POST['deck_id'];
?>
<main class="decks" style="height:100%; align-content:center;">
    <form method="post" action=".">
        <input type="hidden" name="action" value="rename_deck">
        <input class="text" type="text" name="name" placeholder="New name">
        <input type="hidden" name="deck_id" value=<?php echo $deck_id;?>>
        <input class="button" type="submit" value="Change">
    </form>
</main>
</body>

</html>
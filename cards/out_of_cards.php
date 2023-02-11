<main class="study-cards">
    <div class="card">
        <p>Out of cards.</p>

        <form action="." method="post">
            <input type="hidden" name="action" value="study_deck">
            <input type="hidden" name="deck_id" value='<?php echo $_SESSION['deck_id']; ?>'>
            <input type="hidden" name="initiate" value=1>
            <input class="button" type="submit" value="reshuffle">
        </form>

        <form action="." method="post">
            <input type="hidden" name="action" value="decks_view">
            <input class="button" type="submit" value="Decks">
        </form>
    </div>
</main>
</body>

</html>
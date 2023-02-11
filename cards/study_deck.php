<main class="study-cards">
    <?php if ($_SESSION['side'] == 1){ ?>

    <div class="card">
        <p><?php echo $_SESSION['study_deck'][$_SESSION['index']]['front'];?></p>
        <form action="." method="post">
            <input type="hidden" name="initiate" value="0">
            <input type="hidden" name="action" value="study_deck">
            <input class="button" type="submit" value="flip">
        </form>
    </div>

    <?php } else { ?>
    <div class="card">
        <p><?php echo $_SESSION['study_deck'][$_SESSION['index']]['back'];?></p>
        <form action="." method="post">
            <input type="hidden" name="initiate" value="0">
            <input type="hidden" name="action" value="study_deck">
            <input class="button" type="submit" value="next">
        </form>
    </div>

    <?php $_SESSION['index']--; } ?>
</main>
</body>

</html>
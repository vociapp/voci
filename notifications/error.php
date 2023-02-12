<main>
    <div class="cards">
        <h1>Error</h1>
        <p style="margin: 0 auto;"><?php print_r($error_messages); ?></p>
        <form action="<?php echo $app_path?>">
            <input class="mainButton" type="submit" value="Home">
        </form>
    </div>
</main>
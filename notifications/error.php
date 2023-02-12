<main class=error>
        <h1>Error</h1>
        <p style="margin: 0 auto;"><?php print_r($error_messages); ?></p>
        <form action="<?php echo $app_path?>">
            <input class="error" type="submit" value="Home">
        </form>
</main>
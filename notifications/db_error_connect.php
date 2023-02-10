<?php include 'private/shared/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p>An error occurred connecting to the database.</p>
    <p>The database must be installed as described in appendix A.</p>
    <p>The database must be running as described in chapter 1.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <form action="<?php echo $app_path?>">
        <input type="submit" value="Home">
    </form>
</main>
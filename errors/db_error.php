<?php include 'private/shared/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p>A database error occurred.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <form action="<?php echo $app_path?>">
        <input type="submit" value="Home">
    </form>
</main>
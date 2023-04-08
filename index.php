<!DOCTYPE html>
<html lang="fr">
    <?php include './template/head.php'?>
    <body class="d-flex flex-column min-vh-100 bg-secondary text-white">
        <div class="container flex-grow-1">
            <?php include './template/header.php' ?>
            <main>
            <?php include './src/core/router.php' ?>
            <?php include './template/main.php' ?>
            </main>
        </div>
        <?php include './template/footer.php' ?>
    </body>
</html>
<!--header page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $pageTitle ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Motorcycles</h1>
            <p>Which one would you choose??</p>
        </div>
        <?php
        require_once __DIR__ . ('/_nav.php');
        ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php get_title(); ?></title>

    <!-- CSS, font styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Cutive+Mono" rel="stylesheet">
    <link rel="icon" href="images/icon.png" type="image/png">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- sweet alerts -->
    <script src="dist/sweetalert.js"></script>
    <link rel="stylesheet" href="dist/sweetalert.css">
</head>
    
<body>
<?php session_start(); ?>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <!-- Page Content -->
    <div class="container content">
        <div class="row">
            <div class="col-md-10">
                <?php display_content(); ?>
            </div>

            <div class="col-md-2">
                <?php require_once 'sidebar.php' ?>
            </div>
        </div>
    </div>
    
</body>

</html>

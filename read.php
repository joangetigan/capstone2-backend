<?php 
    $eBook = str_replace(".epub", "", $_GET['book']);
    $eTitle = $_GET['title'];
?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $eTitle ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- EPUBJS Renderer -->
    <script src="epub.min.js"></script>
    <link rel="stylesheet" href="basic.css" type="text/css">

    <style type="text/css">
        body {
        overflow: auto;
        background: #eee;
        }
        #wrapper {
        width: 480px;
        height: 640px;
        overflow: hidden;
        border: 1px solid #ccc;
        margin: 20px auto;
        background: #fff;
        border-radius: 0 5px 5px 0;
        }
        #area {
        width: 480px;
        height: 650px;
        margin: -5px auto;
        -moz-box-shadow:      inset 10px 0 20px rgba(0,0,0,.1);
        -webkit-box-shadow:   inset 10px 0 20px rgba(0,0,0,.1);
        box-shadow:           inset 10px 0 20px rgba(0,0,0,.1);
        padding: 40px 40px;
        }
    </style>
    
     <script>
        "use strict";
        var ebook = "<?php echo $eBook ?>";
        var Book = ePub("epub/" + ebook + "/", {
            width: 400,
            height: 600,
            spreads : false
        });
    </script>
</head>

<body>
    <div id="main">
        <div id="prev" onclick="Book.prevPage();" class="arrow">&#x276E</div>
        <div id="wrapper">
            <div id="area"></div>
        </div>
        <div id="next" onclick="Book.nextPage();" class="arrow">&#x276F</div>
    </div>

    <script>
        Book.renderTo("area");
    </script>
</body>

</html>
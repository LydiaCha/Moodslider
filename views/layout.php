<!DOCTYPE html>
<html>
    <head>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <!--CSS-->
        <link href="styles.css" rel="stylesheet" type="text/css"/>
        <title>Moodslider</title>
    </head>
    <body>
        <!--include navigation bar in every page--> 
        <div class="nav-bar">
            <?php require_once('views/navbar.php'); ?>           
        </div>
        <!--pages as per controller-->
        <div class="w3-container">
            <?php require_once('routes.php'); ?>
        </div>
        <!--include footer in every page-->
        <?php require_once('views/footer.php'); ?>    
    </body>
</html>
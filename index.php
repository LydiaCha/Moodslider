<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Moodslider</title>
    </head>
    <body>
        <?php
        if (isset($_GET['controller']) && isset($_GET['action'])) { //determines what controller to use
            $controller = $_GET['controller'];
            $action = $_GET['action'];
        } else {
            $controller = 'mood';
            $action = 'view';
        }
        if ($controller == "mood" && $action == "recommendations") {
            require_once('routes.php');
        } else {
            require_once('views/layout.php');
        }
        ?>
    </body>
</html>
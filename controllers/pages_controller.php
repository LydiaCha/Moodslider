<?php

//PagesController calls error page
class PagesController {

    public function error() {
        require_once('views/pages/error.php');
    }

}

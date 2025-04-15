<?php

namespace Framework\Layout;
final class layout{
    public function render($view,$data =[]){
        extract($data);
        
        require APP_DIR . '/views/partials/header.php';
        require APP_DIR . "/views/{$view}.php";
        require APP_DIR . '/views/partials/footer.php';
    }
}
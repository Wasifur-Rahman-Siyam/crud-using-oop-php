<?php

namespace App\classes;


class LoadPage {
    public function load_Page() {
        header('Location:action.php?page=home');
    }
}
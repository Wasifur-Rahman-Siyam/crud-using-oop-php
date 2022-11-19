<?php
require_once "vendor/autoload.php";
use App\classes\Slider;

include "pages/includes/header.php";

if (isset($_GET['page'])) {
    $slider = new Slider();
    if ('home'==$_GET['page']) {
        include "pages/fontend/home.php";
    }
    
    if ('slider-admin' == $_GET['page']) {
        include "pages/admin/slider-admin.php";
    }
    if ('add-slider' == $_GET['page']) {
        if (isset($_POST['add_slider_submit'])){
            $slider->addSliderItem($_POST,$_FILES);
           }
        include "pages/admin/add-slider.php";
    }
    if ('show-image' == $_GET['page']) {
        include "pages/admin/show-image.php";
    }
    if ('edit-slider-item' == $_GET['page']) {
        $id = $_GET['id'];
        $item =  mysqli_fetch_assoc($slider->selectItem($id));
        if (isset($_POST['update_slider_submit'])){
            $slider->updateSliderItem($id,$_POST,$_FILES);
        }
        include "pages/admin/edit-slider.php";
    }
    
    if ('delete-slider-item' == $_GET['page']) {
        $id = $_GET['id'];
        $isDeleted = $slider->deleteSliderItem($id);
        // header('Location:?page=slider-admin');    
    }
}

include "pages/includes/footer.php";
?>
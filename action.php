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
    if ('delete-slider-item' == $_GET['page']) {
        $id = $_GET['id'];
        $isDeleted = $slider->deleteSliderItem($id);
        header('Location:?page=slider-admin');   
        if($isDeleted) {
            echo '<script>alert("Item Deleted")</script>';
        }  
    }
    if ('edit-slider-item' == $_GET['page']) {
        $id = $_GET['id'];
        $item =  mysqli_fetch_assoc($slider->selectItem($id));
        echo "<pre>";
        print_r($item);
        echo "</pre>";
        include "pages/admin/edit-slider.php";
    }
    
}


include "pages/includes/footer.php";

?>
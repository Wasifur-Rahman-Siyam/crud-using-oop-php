<?php
namespace App\classes;

include "Database.php";
use App\classes\Database;

class Slider {
    public $db_connection;
    public function __construct(){
        $this->db = new Database('photo_gallery');
    }

    public function allItems() {
        $allSelectQuery = "SELECT * FROM slider_items WHERE status = 1";
        $allSelected = mysqli_query($this->db->dbConnect(),$allSelectQuery);
        return $allSelected;
    }

    public function selectItem($id) {
        $selectQuery = "SELECT * FROM slider_items WHERE id = $id";
        $selectedItem = mysqli_query($this->db->dbConnect(),$selectQuery);
        return $selectedItem;
    }
    
    public function addSliderItem($request,$files) {
        $title        =   $request['title'];
        $desc         =   $request['description'];
        $image        =   $files['image'];
        $imageName    =   "assets/images/slider/".time().$image['name'];
        $insertQuery        =   "INSERT INTO slider_items(title, description, image) VALUES ('$title','$desc','$imageName')";

        $query_inserted = mysqli_query($this->db->dbConnect(),$insertQuery);

        if($query_inserted){
            move_uploaded_file($image['tmp_name'],$imageName);
            echo "<p class = 'py-4 text-center bg-success text-white mb-0'>Data inserted successfully</p>";
        }
        else{
            echo "<p class = 'py-4 text-center bg-success text-white mb-0'>Data not inserted</p>";
        }
    }


    public function updateSliderItem($id,$request,$files) {
        $title        =   $request['title'];
        $desc         =   $request['description'];
        $image        =   $files['image'];
        $imageName    =   "assets/images/slider/".time().$image['name'];

        if (empty($image['name'])) {
            $updateQuery  =   "UPDATE slider_items SET title = '$title', description = '$desc' WHERE slider_items.id = $id";
        }  else {
            $item =  mysqli_fetch_assoc($this->selectItem($id));
            $resetImage = $item['image'];
            $updateQuery  =   "UPDATE slider_items SET title = '$title', description = '$desc', image = '$imageName' WHERE slider_items.id = $id";
        }

        $query_updated = mysqli_query($this->db->dbConnect(),$updateQuery);
        
        if($query_updated){
            move_uploaded_file($image['tmp_name'],$imageName);
            unlink($resetImage);
        }
        

        header('Location:?page=slider-admin'); 
        
    }
    
    public function deleteSliderItem($id) {
        
        $deleteQuery = "DELETE FROM slider_items WHERE id = $id";

        $deleted = mysqli_query($this->db->dbConnect(),$deleteQuery);
            return $deleted;
    }
}
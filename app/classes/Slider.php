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
        if(isset($request['title']) && isset($request['description']) && isset($files)){
            if(empty($request['title'])){
                echo "<script>alert('Title cannot empty');</script>";
            }
            else if(empty($request['description'])){
                echo "<script>alert('Description cannot empty');</script>";
            }
            else if(!file_exists($files['image']["tmp_name"])){
                echo "<script>alert('Choose image file to upload.');</script>";
            }
            else{
                $title        =   $request['title'];
                $desc         =   $request['description'];
                $image        =   $files['image'];
                $imageName    =   "assets/images/slider/".time().$image['name'];
                $insertQuery        =   "INSERT INTO slider_items(title, description, image) VALUES ('$title','$desc','$imageName')";
        
                $query_inserted = mysqli_query($this->db->dbConnect(),$insertQuery);
        
                if($query_inserted){
                    move_uploaded_file($image['tmp_name'],$imageName);
                    echo "<script>alert('Data inserted successfully');</script>";
                }
                else{
                    echo "<script>alert('Data insertion Failed');</script>";
                }
            }
        }

    }

    public function updateSliderItem($id,$request,$files,$item) {
        if(isset($request['title']) && isset($request['description']) && isset($files)){
            if(empty($request['title'])){
                echo "<script>alert('Title cannot empty');</script>";
            }
            else if(empty($request['description'])){
                echo "<script>alert('Description cannot empty');</script>";
            }
            else{
                $title        =   $request['title'];
                $desc         =   $request['description'];
                $image        =   $files['image'];
                $imageName    =   "assets/images/slider/".time().$image['name'];
        
                if (empty($image['name'])) {
                    $updateQuery  =   "UPDATE slider_items SET title = '$title', description = '$desc' WHERE slider_items.id = $id";
                }  else {
                    $resetImage = $item['image'];
                    $updateQuery  =   "UPDATE slider_items SET title = '$title', description = '$desc', image = '$imageName' WHERE slider_items.id = $id";
                }
        
                $query_updated = mysqli_query($this->db->dbConnect(),$updateQuery);
                
                if($query_updated){
                    move_uploaded_file($image['tmp_name'],$imageName);
                    unlink($resetImage);
                    echo "<script>alert('Item Updated');</script>";
                    echo "<script>window.location.href = '?page=slider-admin';</script>";
                }
            }
        }
    }
    
    public function deleteSliderItem($id) {
        $deleteQuery = "DELETE FROM slider_items WHERE id = $id";
        $item =  mysqli_fetch_assoc($this->selectItem($id));
        $deleteImage = $item['image'];
        $deleted = mysqli_query($this->db->dbConnect(),$deleteQuery);
        if($deleted){
            unlink($deleteImage);
            echo "<script>alert('Item deleted');</script>";
            echo "<script>window.location.href = '?page=slider-admin';</script>";
        }
    }
}
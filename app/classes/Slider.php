<?php
namespace App\classes;

include "Database.php";
use App\classes\Database;

class Slider {
    public $title,$desc,$image,$imageName,$db_connection, $allStQuery,$allSelected;
    public function __construct(){
        $this->db = new Database('photo_gallery');
    }

    public function allItems() {
        $this->allSelectQuery = "SELECT * FROM slider_items WHERE status = 1";
        $this->allSelected = mysqli_query($this->db->dbConnect(),$this->allSelectQuery);
        return $this->allSelected;
    }

    public function selectItem($id) {
        $selectQuery = "SELECT * FROM slider_items WHERE id = $id";
        $selectedItem = mysqli_query($this->db->dbConnect(),$selectQuery);
        return $selectedItem;
    }
    
    public function addSliderItem($request,$files) {
        $this->title        =   $request['title'];
        $this->desc         =   $request['description'];
        $this->image        =   $files['image'];
        $this->imageName    =   "assets/images/slider/".time().$this->image['name'];
        $insertQuery        =   "INSERT INTO slider_items(title, description, image) VALUES ('$this->title','$this->desc','$this->imageName')";

        $query_inserted = mysqli_query($this->db->dbConnect(),$insertQuery);

        if($query_inserted){
            move_uploaded_file($this->image['tmp_name'],$this->imageName);
            echo "<p class = 'py-4 text-center bg-success text-white mb-0'>Data inserted successfully</p>";
        }
        else{
            echo "<p class = 'py-4 text-center bg-success text-white mb-0'>Data not inserted</p>";
        }
    }


    public function updateSliderItem() {

    }
    
    public function deleteSliderItem($id) {
        
        $deleteQuery = "DELETE FROM slider_items WHERE id = $id";

        $deleted = mysqli_query($this->db->dbConnect(),$deleteQuery);
            return $deleted;
    }
}
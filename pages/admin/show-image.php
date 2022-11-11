<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <?php
            $id = $_GET['id'];
            $allItems = $slider->allItems();

            while($items = mysqli_fetch_assoc($allItems)){
            if($id==$items['id']){
            ?> 
            <img src="<?=$items['image'];?>" class="d-block w-100" alt="..." style="height:500px;object-fit:cover;">
            <?php
            }
        } 

            ?>
        </div>
    </div>
</div>
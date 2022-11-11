<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <?php
            $id = $_GET['id'];
            $item =  mysqli_fetch_assoc($slider->selectItem($id));
            ?> 
            <img src="<?=$item['image'];?>" class="d-block w-100" alt="..." style="height:500px;object-fit:cover;">
        </div>
    </div>
</div>
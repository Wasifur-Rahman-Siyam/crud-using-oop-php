<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-10 justify-content-center">
            <h1 class="my-4 text-center text-uppercase">Slider Admin panel</h1>
            <div class="text-center">
                <a href="?page=add-slider" class="btn btn-primary text-center text-uppercase mb-4 ms-auto">Add Sllider Items</a>
            </div>
            <table class="table table-bordered border-dark text-center">
                <thead>
                    <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Show Image</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 

                $allItems = $slider->allItems();

                if(mysqli_num_rows($allItems)>0){
                    while($items = mysqli_fetch_assoc($allItems)){
                        ?> 
                            <tr>
                                <th><?=$items['title'];?></th>
                                <td><?=$items['description'];?></td>
                                <td>
                                    <a href = "?page=show-image&id=<?=$items['id'];?>" target="_blank" class="btn btn-primary">Show Image</a>
                                </td>
                                <td>
                                    <a href = "?page=edit-slider-item&id=<?=$items['id'];?>" class="btn btn-warning">
                                    Edit  
                                    </a>
                                    <a href = "?page=delete-slider-item&id=<?=$items['id'];?>" class="btn btn-danger">
                                    Delete
                                    </a>
                                </td>
                            </tr>
                <?php
                    }
                }
                else{
                    ?>
                    <tr>
                    <th colspan="4">No Slider Items</th>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
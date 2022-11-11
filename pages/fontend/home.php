<div class="container">
<main>
    <section>
        <div id="carouselControls" class="carousel slide mt-1" data-bs-ride="true">
            <div class="carousel-inner">
            <?php
            $allItems = $slider->allItems();
            while($items = mysqli_fetch_assoc($allItems)){
            ?> 
            <div class="carousel-item active">
                <img src="<?=$items['image'];?>" class="d-block w-100" alt="..." style="height:500px;object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?=$items['title'];?></h5>
                    <p><?=$items['description'];?></p>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
</main>
</div>



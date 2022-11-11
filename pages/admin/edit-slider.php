<div class="container">
    <div class="row">
        <div class="col-md-10">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Slider title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?=$item['title'];?>">
                </div>
            <div class="mb-3">
                <label for="description" class="form-label">Slider description:</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5"><?=$item['description'];?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Slider image</label>
                <input class="form-control" type="file" id="image" name="image">
                <img src="<?=$item['image']; ?>" alt="" style="width: 500px;" class="mt-4">
            </div>
            <button type="submit" class="btn btn-primary" name="add_slider_submit">Submit</button>
        </form>
        </div>
    </div>
</div>
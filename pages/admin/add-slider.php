<div class="container">
    <div class="row">
        <div class="col-md-10">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Slider title</label>
                <input type="text" class="form-control" id="title" name="title">
                </div>
            <div class="mb-3">
                <label for="description" class="form-label">Slider description:</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5">
                </textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Slider image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary" name="add_slider_submit">Submit</button>
        </form>
        </div>
    </div>
</div>

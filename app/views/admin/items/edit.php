<?php
include(APPDIR.'views/layouts/header.php');
include(APPDIR.'views/layouts/nav.php');
include(APPDIR.'views/layouts/errors.php');
?>

<h1>Edit Item</h1>

<form method="post">

    <div class="row">

        <div class="col-md-6">

            <div class="control-group">
                <label class="control-label" for="ID"> ID</label>
                <input class="form-control" id="ID" name="ID" value="<?=$item->ID;?>" required  />
            </div>

            <div class="control-group">
                <label class="control-label" for="NAME"> NAME</label>
                <input class="form-control" id="NAME" name="NAME" value="<?=$item->NAME;?>" required  />
            </div>

        </div>

        <div class="col-md-6">

        </div>

    </div>

    <p><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Submit</button></p>

</form>

<?php include(APPDIR.'views/layouts/footer.php');?>

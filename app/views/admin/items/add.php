<?php
include(APPDIR.'views/layouts/header.php');
include(APPDIR.'views/layouts/nav.php');
include(APPDIR.'views/layouts/errors.php');
?>

<h1>Add Item</h1>

<form method="post">

    <div class="row">

        <div class="col-md-6">

            <div class="control-group">
                <label class="control-label" for="ID"> ID</label>
                <input class="form-control" id="ID" name="ID" value="<?=(isset($_POST['ID']) ? $_POST['ID'] : '');?>" required  />
            </div>

            <div class="control-group">
                <label class="control-label" for="NAME"> NAME</label>
                <input class="form-control" id="NAME" name="NAME" value="<?=(isset($_POST['NAME']) ? $_POST['NAME'] : '');?>" required  />
            </div>

        </div>

        <div class="col-md-6">

        </div>

    </div>

    <br>

    <p><button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check"></i> Submit</button></p>

</form>

<?php include(APPDIR.'views/layouts/footer.php');?>

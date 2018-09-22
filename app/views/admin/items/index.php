<?php
include(APPDIR.'views/layouts/header.php');
include(APPDIR.'views/layouts/nav.php');
?>

<h1>Items</h1>

<?php include(APPDIR.'views/layouts/errors.php');?>

<p><a href="/items/add" class="btn btn-xs btn-info">Add Item</a></p>

<div class='table-responsive'>
    <table class='table table-striped table-hover table-bordered'>
    <tr>
        <th>ID</th>
        <th>NAME</th>
    </tr>
    <?php foreach($items as $row) { ?>
    <tr>

        <td><?=htmlentities($row->ID);?></td>
        <td><?=htmlentities($row->NAME);?></td>

        <td>
            <a href="/items/edit/<?=$row->ID;?>" class="btn btn-xs btn-warning">Edit</a>
            <a href="javascript:del('<?=$row->ID;?>','<?=$row->NAME;?>')" class="btn btn-xs btn-danger">Delete</a>
        </td>
    </tr>
    <?php } ?>
    </table>
</div>

<script language="JavaScript" type="text/javascript">
function del(ID, title) {
    if (confirm("Are you sure you want to delete '" + title + "'?")) {
        window.location.href = '/items/delete/' + ID;
    }
}
</script>

<?php include(APPDIR.'views/layouts/footer.php');?>

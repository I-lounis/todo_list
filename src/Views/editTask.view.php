<?php
require_once(__DIR__ . "/partials/head.view.php");
?>

    <form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="title" class="form-label">Titre :</label>
            <textarea class="form-control" id="title" name="title" style="height: 100px"><?= $myList->getTitle(); ?></textarea>
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"><?= $myList->getDescription(); ?></textarea>
        </div>
        <button type="submit" name="editTask" class="btn btn-success mt-5">Modifier !</button>
    </div>
  
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
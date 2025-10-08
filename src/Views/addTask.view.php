<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1>Création d'une tâche</h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="title" class="form-label">Titre :</label>
            <textarea class="form-control" id="title" name="title" style="height: 100px"></textarea>
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
        </div>
    <button type="submit" name="addTask" class="btn btn-success mt-5">Ajouter !</button>
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
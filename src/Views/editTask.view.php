<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
    <div class="card-body">
        <p><?= $myList->getTitle(); ?></p>
        <p><?= $myList->getDescription(); ?></p>
    </div>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1>Votre tâche</h1>
        <?php
        if(isset($tasks)){
            foreach($tasks as $task)
            {
                ?>
                    <div class="card my-2 text-bg-info">
                        <div class="card-header">
                            <?= $task->getTitle(); ?>
                        </div>
                    <div class="card-body">
                        <figure>
                            <blockquote class="blockquote">
                                <p><?= $task->getDescription(); ?></p>
                            </blockquote>
                        </figure>
                    </div>
                    <a class="nav-link" href="/tache?id=<?= $task->getIdTask() ?>" >Voir +</a>
                    <div>
                        
                    </div>
                <?php
            }
        }
    ?>
    </div>
</div>
</details>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
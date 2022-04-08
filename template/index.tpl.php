<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <h1>Mes QCMs</h1>

    <a href="/new-qcm.php">Nouveau</a>
    <table class="table table-dark table-hover" border="1">
        <thead>
            <tr>
                <th>Id qcm</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($qcms as $qcm): ?>
            <tr>
                <td><?= $qcm->getId() ?></td>
                <td><?= $qcm->getTitle() ?></td>
                <td>
                    
                    <a href="./index-qcm.php?id=<?= $qcm->getId() ?>" class="link-primary">Modifier ou Sup QCM</a>
                    <a href="./new-question.php?id=<?= $qcm->getId() ?>" class="link-danger">Ajouter Question</a>
                    <a href="./index-question.php" class="link-warning">Modifier ou sup questions</a>
                    <a href="./new-answer.php?id=<?= $qcm->getId() ?>" class="link-info">Ajouter des reponses aux questions</a>
                    <a href="./index-answer.php?id=<?= $qcm->getId() ?>" class="link-light">Modifier et supprimer les reponses</a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>

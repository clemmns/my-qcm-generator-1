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
                    
                    <a href="/edit-qcm.php?id=<?= $qcm->getId() ?>">Modifier</a>
                    <a href="/delete-qcm.php?id=<?= $qcm->getId() ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/index.php">Retour</a>

</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>

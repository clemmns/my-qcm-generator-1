<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <h1>Mes reponses</h1>

    <a href="/new-answer.php">Nouveau</a>
    <table class="table table-dark table-hover" border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Texte</th>
                <th>Vrai ou faux</th>
                <th>id question</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($answers as $answer): ?>
            <tr>
                <td><?= $answer->getId() ?></td>
                <td><?= $answer->getText() ?></td>
                <td><?= $answer->getIsTheGoodAnswer() ?></td>
                <td><?= $answer->getIdQuestion() ?></td>
                <td>
                    <a href="/edit-answer.php?id=<?= $q->getId() ?>">Modifier</a>
                    <a href="/delete-answer.php?id=<?= $q->getId() ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/index.php">Retour</a>

</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>

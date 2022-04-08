<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <form action="" method="POST">
        <label class="form-label">Selectionner le QCM a modifier</label>
        <select name="id_qcm">
            <?php foreach($qcms as $qcm): ?>
                <option value="<?= $qcm->getId() ?>" <?php if($qcm->getId() == $qcm->getId()): ?>selected<?php endif; ?> >
                    <?= $qcm->getTitle() ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input class="form-control" type="text" name="title" value="<?= htmlspecialchars($qcm->getTitle()) ?>" required/>
        <input class="form-control" type="submit" name="submit" value="Enregistrer" />

        
    </form>
    <a href="/index-qcm.php">Retour</a>
    <a href="/index.php">Accueil</a>
    <?php if(!empty($message)): ?>
    <div class="alert">
        <?= $message ?>
    </div>
    <?php endif; ?>
</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>

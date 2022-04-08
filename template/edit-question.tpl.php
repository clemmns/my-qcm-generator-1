<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <form action="" method="POST">
        <label class="form-label">Intitulé de la question</label>
        <input class="form-control" type="text" name="title" value="<?= htmlspecialchars($question->getTitle()) ?>" required/>
        <input class="form-control" type="submit" name="submit" value="Enregistrer" />

        <select name="id_qcm">
            <?php foreach($qcms as $qcm): ?>
                <option value="<?= $qcm->getId() ?>" <?php if($question->getIdQcm() == $qcm->getId()): ?>selected<?php endif; ?> >
                    <?= $qcm->getTitle() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    <?php if(!empty($message)): ?>
    <div class="alert">
        <?= $message ?>
    </div>
    <?php endif; ?>
</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>

<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <form action=""  method="POST">
        <p>selectionner la question</p>
        <select name="title">
            <?php foreach($questions as $question): ?>
                <option value="<?= $question->getId() ?>"><?= $question->getTitle() ?></option>
            <?php endforeach; ?>
        </select>
        <label class="form-label">Ajouter une Reponse</label>
        <input class="form-control" type="text" name="text" required/>
        

        <p>Valeur:</p>
        <div class="form-check">
        <input class="form-check-input" type="radio" id="Vrai" name="is_the_good" value="1" checked>
        <label class="form-check-label" for="vrai">Vrai</label>
        </div>

        <div class="form-check">
        <input class="form-check-input" type="radio" id="faux" name="is_the_good" value="0">
        <label class="form-check-label" for="faux">Faux</label>

        <input class="form-control" type="submit" name="submit" value="Enregistrer" />
</div>

        
    </form>
    <?php if(!empty($message)): ?>
    <div class="alert">
        <?= $message ?>
    </div>
    <?php endif; ?>
</div>
<a href="/index.php">Retour</a>

<?php require '../template/partials/_bottom.tpl.php'; ?>

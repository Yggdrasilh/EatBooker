<form id="my-form" action="#" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= (isset($creation->title)) ? $creation->title : NULL ?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= (isset($creation->description)) ? $creation->description : NULL ?>">
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?= (isset($creation->date)) ? $creation->date : NULL ?>">
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Image de la création</label>
        <input type="file" class="form-control mb-2" id="picture" name="picture">
    </div>
    <input type="text" hidden id="hidden" name="hidden" value="<?= (isset($creation->picture)) ? $creation->picture : NULL ?>">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <button type="submit" class="btn btn-primary"><?= $submit ?></button>
</form>
<div id="response"></div>
<div id="error"></div>
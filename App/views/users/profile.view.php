<?= loadPartial('header'); ?>

<?= loadPartial('dashboard-header', [
    'screen' => ['settings']
]) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <?= loadPartial('errors', [
        'errors' => $errors ?? []
    ]) ?>

    <div class="row g-3">
        <form class="row g-3" method="POST" action="/profile/update">
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email">
            </div>
            <div class="col-md-4">
                <label for="first_name" class="form-label">First Name</label>
                <input type="first_name" class="form-control form-control-sm" id="first_name" name="first_name">
            </div>
            <div class="col-md-4">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="last_name" class="form-control form-control-sm" id="last_name" name="last_name">
            </div>
            <div class="col-12">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Update</button>
            </div>
        </form>

    </div>
</main>

<?= loadPartial('dashboard-footer'); ?>
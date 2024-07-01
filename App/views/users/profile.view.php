<?= loadPartial('header'); ?>

<?= loadPartial('dashboard-header', [
    'screen' => ['settings']
]) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php loadPartial('message') ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <?= loadPartial('errors', [
        'errors' => $errors ?? []
    ]) ?>

    <div class="row g-3">
        <form class="row g-3" method="POST" action="/user/profile/<?= $user->id ?>">
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?= $user->email ?>">
            </div>
            <div class="col-md-4">
                <label for="first_name" class="form-label">First Name</label>
                <input type="first_name" class="form-control form-control-sm" id="first_name" name="first_name" value="<?= $user->first_name ?>">
            </div>
            <div class="col-md-4">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="last_name" class="form-control form-control-sm" id="last_name" name="last_name" value="<?= $user->last_name ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Update</button>
            </div>
        </form>
    </div>

    <hr class="m-5" />
    <div class="row">

        <div class="col-md-4 mt-3 mb-3">
            <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Reset Password</h1>
                <div class="btn-toolbar mb-2 mb-md-0">

                </div>
            </div>
            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>

            <div class="row g-3">
                <form class="row g-3" method="POST" action="/user/profile/<?= $user->id ?>">
                    <div class="col-12">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="text" class="form-control form-control-sm" id="old_password" name="old_password">
                    </div>
                    <div class="col-12">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="new_password" class="form-control form-control-sm" id="new_password" name="new_password">
                    </div>
                    <div class="col-12">
                        <label for="new_password_confirm" class="form-label">Confirm New</label>
                        <input type="new_password_confirm" class="form-control form-control-sm" id="new_password_confirm" name="new_password_confirm">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Update</button>
                    </div>
                </form>

            </div>
        </div>


        <div class="col-md-6 mt-3 mb-3">
            <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">New Section</h1>
                <div class="btn-toolbar mb-2 mb-md-0">

                </div>
            </div>
            <?= loadPartial('errors', [
                'errors' => $errors ?? []
            ]) ?>

            <!-- <div class="row g-3">
                <form class="row g-3" method="POST" action="/user/profile/<?= $user->id ?>">
                    <div class="col-12">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="text" class="form-control form-control-sm" id="old_password" name="old_password">
                    </div>
                    <div class="col-12">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="new_password" class="form-control form-control-sm" id="new_password" name="new_password">
                    </div>
                    <div class="col-12">
                        <label for="new_password_confirm" class="form-label">Confirm New</label>
                        <input type="new_password_confirm" class="form-control form-control-sm" id="new_password_confirm" name="new_password_confirm">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Update</button>
                    </div>
                </form>

            </div> -->
        </div>
    </div>

</main>

<?= loadPartial('dashboard-footer'); ?>
<?= loadPartial('header') ?>
<?= loadPartial('navbar') ?>

<div class="flex justify-center items-center mt-20">
    <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-500 mx-6">
        <h2 class="text-4xl text-center font-bold mb-4">Profile</h2>
        <?= loadPartial('errors', [
            'errors' => $errors ?? []
        ]) ?>
        <form method="POST" action="/user/profile">
            <div class="mb-4">
                <input type="text" name="email" placeholder="Email Address" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $data->email ?? '' ?>" />
            </div>
            <div class="mb-4">
                <input type="text" name="first_name" placeholder="First Name" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $data->first_name ?? '' ?>" />
            </div>
            <div class="mb-4">
                <input type="text" name="last_name" placeholder="Last Name" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $data->last_name ?? '' ?>" />
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
                Save
            </button>

        </form>
    </div>
</div>

<?= loadPartial('footer') ?>
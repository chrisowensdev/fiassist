<?= loadPartial('header') ?>
<?= loadPartial('navbar') ?>

<div class="flex justify-center items-center mt-20">
    <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-500 mx-6">
        <h2 class="text-4xl text-center font-bold mb-4">Reset Password</h2>
        <?= loadPartial('errors', [
            'errors' => $errors ?? []
        ]) ?>
        <p class="mb-3 text-center">
            Enter your email address and you will be send an email with a link to reset your password.
        </p>
        <form method="POST" action="/user/profile/resetPassword">
            <div class="mb-4">
                <input type="text" name="email" placeholder="Email Address" class="w-full px-4 py-2 border rounded focus:outline-none" />
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
                Submit
            </button>
        </form>
    </div>
</div>

<?= loadPartial('footer') ?>
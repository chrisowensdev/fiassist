<?= loadPartial('header') ?>
<?= loadPartial('navbar') ?>

<div class="flex justify-center items-center mt-20">
    <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-500 mx-6">
        <h2 class="text-4xl text-center font-bold mb-4">Task</h2>
        <?= loadPartial('errors', [
            'errors' => $errors ?? []
        ]) ?>
        <form method="POST" action="/tasks/create">
            <div class="mb-4">
                <input type="text" name="title" placeholder="Title" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $data['title'] ?? '' ?>" />
            </div>
            <div class="mb-4">
                <input type="text" name="description" placeholder="Description" class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $data['description'] ?? '' ?>" />
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
                Add Task
            </button>

        </form>
    </div>
</div>

<?= loadPartial('footer') ?>
<?= loadPartial('header'); ?>
<?= loadPartial('dashboard-header'), [
    'data' => [
        'screen' => 'task'
    ]
]; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Task</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary bg-primary text-white">Create</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi">
                    <use xlink:href="#calendar3" />
                </svg>
                This week
            </button>
        </div>
    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
    <?= loadPartial('errors', [
        'errors' => $errors ?? []
    ]) ?>
    <form method="POST" action="/tasks/create" class="flex">
        <div class="mb-4">
            <input type="text" name="title" placeholder="Title" class="px-4 py-2 border rounded focus:outline-none" value="<?= $data['title'] ?? '' ?>" />
        </div>
        <div class="mb-4">
            <input type="text" name="description" placeholder="Description" class="px-4 py-2 border rounded focus:outline-none" value="<?= $data['description'] ?? '' ?>" />
        </div>
        <button type="submit" class=" bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
            Add Task
        </button>

    </form>

</main>

<?= loadPartial('dashboard-footer'); ?>
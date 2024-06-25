<?= loadPartial('header'); ?>
<?= loadPartial('dashboard-header', [
    'screen' => ['task']
]) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Task</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary bg-primary text-white">Create</button> -->
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

    <div class="row g-3">
        <form class="row g-3" method="POST" action="/tasks/create">
            <div class="col-md-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control form-control-sm" id="title" name="title">
            </div>
            <div class="col-md-10">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control form-control-sm" id="description" name="description">
            </div>
            <div class="col-md-3">
                <label for="inputState" class="form-label">Frequency</label>
                <select id="inputState" class="form-select form-select-sm" name="frequency">
                    <option value="DAILY" selected>Daily</option>
                    <option value="WEEKLY">Weekly</option>
                    <option value="MONTHLY">Monthly</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputState" class="form-label">Group</label>
                <select id="inputState" class="form-select form-select-sm" name="user_group_id">
                    <option selected value="1">Current Group</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Assign</label>
                <select id="inputState" class="form-select form-select-sm" name="status">
                    <option selected value="INITIAL">Unassigned</option>
                    <option value="ASSIGNED">Myself</option>
                </select>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" value="PRIVATE" name="private">
                    <label class="form-check-label" for="gridCheck">
                        Private?
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Create Task</button>
            </div>
        </form>

    </div>


</main>

<?= loadPartial('dashboard-footer'); ?>
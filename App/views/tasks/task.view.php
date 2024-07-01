<?= loadPartial('header'); ?>
<?= loadPartial('dashboard-header', [
    'screen' => ['task']
]) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Task</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary bg-primary text-white">Create</button> -->
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
            </div>
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi">
                    <use xlink:href="#calendar3" />
                </svg>
                This week
            </button> -->
        </div>
    </div>

    <?= loadPartial('errors', [
        'errors' => $errors ?? []
    ]) ?>

    <div class="row g-3">
        <form class="row g-3" method="POST" action="/tasks/maintain/<?= $task->id ?>">
            <div class="col-md-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control form-control-sm" id="title" name="title" value="<?= $task->title ?>" <?= $mode === 'EDIT' ? '' : 'disabled' ?>>
            </div>
            <div class="col-md-10">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control form-control-sm" id="description" name="description" value="<?= $task->description ?>" <?= $mode === 'EDIT' ? '' : 'disabled' ?>>
            </div>
            <div class="col-md-3">
                <label for="inputState" class="form-label">Frequency</label>
                <select id="inputState" class="form-select form-select-sm" name="frequency" <?= $mode === 'EDIT' ? '' : 'disabled' ?>>
                    <option value="DAILY" <?= $task->frequency === 'DAILY' ? 'selected' : '' ?>>Daily</option>
                    <option value="WEEKLY" <?= $task->frequency === 'WEEKLY' ? 'selected' : '' ?>>Weekly</option>
                    <option value="MONTHLY" <?= $task->frequency === 'MONTHLY' ? 'selected' : '' ?>>Monthly</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputState" class="form-label">Group</label>
                <select id="inputState" class="form-select form-select-sm" name="user_group_id" <?= $mode === 'EDIT' ? '' : 'disabled' ?>>
                    <option selected value="1">Current Group</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Assign</label>
                <select id="inputState" class="form-select form-select-sm" name="status" <?= $mode === 'EDIT' ? '' : 'disabled' ?>>
                    <option value="INITIAL">Unassigned</option>
                    <option selected value="ASSIGNED">Myself</option>
                </select>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" value="PRIVATE" name="private" <?= $mode === 'EDIT' ? '' : 'disabled' ?>>
                    <label class="form-check-label" for="gridCheck">
                        Private?
                    </label>
                </div>
            </div>
            <div class="col-12">
                <?php if ($mode === 'EDIT') : ?>
                    <input type="submit" name="function" value="Update" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
                <?php else : ?>
                    <?php if ($task->status !== 'COMPLETE') : ?>
                        <input type="submit" name="function" value="Complete" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
                    <?php endif; ?>
                    <?php if ($userId === $task->owner_id) : ?>
                        <button type="button" name="function" onclick="location.href='/tasks/<?= $task->id; ?>?mode=EDIT'" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Edit</button>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Complete Task</button> -->
            </div>
        </form>

    </div>


</main>

<?= loadPartial('dashboard-footer'); ?>
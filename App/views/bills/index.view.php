<?= loadPartial('header'); ?>

<?= loadPartial('dashboard-header', [
    'screen' => ['bill']
]) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bills</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary bg-primary text-white" onclick="location.href='/tasks/create'">Create</button>
                <button type="button" class="btn btn-sm btn-outline-secondary bg-primary text-white" onclick="location.href='/tasks/group'">Group</button>
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

    <h2>Upcoming Bills</h2>
    <div class="small m-3">
        <?php if (count($bills) > 0) : ?>
            <?php foreach ($bills as $bill) : ?>
                <div class="card m-2">
                    <div class="card-body flex justify-content-between">
                        <p><a href="/tasks/<?= $bill->id ?>"> <?= $bill->title ?> </a></p>
                        <p><?= $task->due_date ?></p>
                        <form method="POST" action="/tasks/complete/<?= $task->id ?>">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="status" value="COMPLETE">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </button>

                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>All bills paid</p>
        <?php endif; ?>
    </div>

    <br />

    <!-- <h2>Completed Tasks</h2>
    <div class="small m-3">
        <?php foreach ($completed_tasks as $task) : ?>
            <div class="card m-2">
                <div class="card-body flex justify-content-between">
                    <p><a href="/tasks/view/<?= $task->id ?>"> <?= $task->title ?> </a></p>
                    <p><?= $task->due_date ?></p>
                    <form method="POST" action="/tasks/complete/<?= $task->id ?>">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="status" value="ASSIGNED">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                            </svg>
                        </button>

                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div> -->
</main>

<?= loadPartial('dashboard-footer'); ?>
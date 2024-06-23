<?= loadPartial('header'); ?>
<?= loadPartial('dashboard-header', [
    'screen' => ['dashboard']
]) ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
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

    <h2>Section title</h2>
    <div class="card bg-warning">
        <a href="/tasks/">
            <div class="card-body">
                <p><?= $currentTaskCount; ?> tasks due!</p>
            </div>
        </a>

    </div>
</main>

<?= loadPartial('dashboard-footer'); ?>
<?= loadPartial('header'); ?>

<div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis">FiAssist: Home Personal Assistant</h1>
            <p class="lead">Personal assistant to help you handle your tasks, bills, and schedule for anything that is going on in your life. Enjoy the ability to have all of your important items at your fingertips.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                <button type="button" onclick="location.href='/auth/login'" class="btn btn-primary bg-blue-500 hover:bg-gray-100 btn-lg px-4 me-md-2 fw-bold">Login</button>
                <button type="button" onclick="location.href='/auth/register'" class="btn btn-outline-secondary btn-lg px-4">Sign Up</button>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
            <img class="rounded-lg-3" src="/img/waves.jpg" alt="" width="720">
        </div>
    </div>
</div>

<?= loadPartial('footer'); ?>
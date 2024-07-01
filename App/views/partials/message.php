<?php

use Framework\Session;
?>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="close" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
    </symbol>
</svg>

<?php $successMessage = Session::getFlashMessage('success_message'); ?>
<?php if ($successMessage !== null) : ?>
    <div class="message bg-green-100 p-3 my-3 flex justify-content-between">
        <?= $successMessage ?>
        <a href="<?= $_SERVER['REQUEST_URI']; ?>">
            <svg class="bi">
                <use xlink:href="#close" />
            </svg>
        </a>
    </div>
<?php endif; ?>

<?php $errorMessage = Session::getFlashMessage('error_message'); ?>
<?php if ($errorMessage !== null) : ?>
    <div class="message bg-red-100 p-3 my-3 flex justify-content-between">
        <?= $errorMessage; ?>
        <a href="<?= $_SERVER['REQUEST_URI']; ?>">
            <svg>
                <use xlink:href="#close" />
            </svg>
        </a>
    </div>
<?php endif; ?>
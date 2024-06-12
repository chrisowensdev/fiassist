<?php

use Framework\Session;
?>

<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="/">FiAssist</a>
        </h1>
        <nav class="space-x-4">
            <?php if (Session::has('user')) : ?>
                <div class="flex justify-between items-center gap-4">
                    <form method="POST" action="/auth/logout">
                        <button type="submit" class="text-white inline hover:underline">Logout</button>
                    </form>
                </div>
            <?php else : ?>
                <a href="/auth/login" class="text-white hover:underline">Login</a>
                <a href="/auth/register" class="text-white hover:underline">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
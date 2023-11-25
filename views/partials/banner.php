<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            <?php if(! isset($_SESSION['user'])) : ?>
                Hello, Guest
            <?php elseif(! isset($_SESSION['user']['name'])) : ?>
                Hello, User
            <?php else : ?>
                Hello, <?= $_SESSION['user']['name']?>
            <?php endif ;?>
        </h1>
    </div>
</header>
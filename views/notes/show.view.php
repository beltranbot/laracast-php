<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline ">go back...</a>
        </p>
        <p>
            <?= $note["body"] ?>
        </p>

        <form class="mt-6" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note["id"] ?>">
            <button class="text-me text-red-500">Delete</button>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>

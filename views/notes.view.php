<?php require("partials/head.php") ?>

<?php require("partials/nav.php") ?>

<?php require("partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note["id"] ?>">
                    <?= $note["body"] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </div>
</main>

<p class="mt-6">
    <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
</p>


<?php require("partials/footer.php") ?>

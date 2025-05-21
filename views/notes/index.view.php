<?php require base_path("views/partials/head.php") ?>

<?php require base_path("views/partials/nav.php") ?>

<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note["id"] ?>">
                    <?= htmlspecialchars($note["body"]) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </div>
</main>

<p class="mt-6">
    <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
</p>


<?php require base_path("views/partials/footer.php") ?>

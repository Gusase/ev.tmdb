<div class="container mx-auto p-8">
  <h1 class="text-3xl dark:text-white font-bold mb-3">
    All user
  </h1>

  <div class="max-w-md space-y-2">
    <?php foreach ($data['user'] as $user) : ?>
      <a href="<?= BASE_URL ?>profile/<?= $user->username ?>" class="block max-w-fit hover:underline"><?= $user->username ?></a>
    <?php endforeach; ?>
  </div>
</div>
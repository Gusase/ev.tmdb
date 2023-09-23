<div class="relative py-24 sm:py-28 bg-[url('<?= BD_ORIGINAL .  $data->backdrop_path ?>')] flex justify-center flex-wrap after:bg-black/70 after:absolute after:inset-0 bg-cover min-h-screen bg-no-repeat" style="background-position: left calc((50vw - 160px) - 390px) top;">
  <div class="max-w-[1400px] w-full z-20 px-10 relative flex flex-col md:flex-row">
    <div class="w-[300px] rounded-md overflow-hidden min-w-[300px] relative group shadow-xl">
      <img src="<?= PS_W500 . $data->poster_path ?>" alt="" id="poster">
      <a href="" class="absolute inset-0 bg-black/80 backdrop-blur-md flex justify-center items-center text-xl capitalize text-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300">More image</a>
    </div>
    <div class="flex content-center flex-col pl-10 justify-center">
      <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl"><?= $data->name ?> <span class="font-medium text-gray-300">(<?= date('Y', strtotime($data->first_air_date)) ?>)</span></h2>
      <div class="inline-flex gap-x-2 mt-1 mb-6">
        <?php foreach ($data->genres as $genre) : ?>
          <a href="" class="hover:underline underline-offset-2 decoration-white dark:hover:text-gray-400 duration-100 dark:text-gray-300"><?= $genre->name ?></a>
        <?php endforeach; ?>
      </div>

      <div class="flex items-center mb-5 space-x-2">
        <p class="bg-blue-100 text-blue-800 text-2xl border-2 border-indigo-500 font-semibold inline-flex items-center p-4 rounded-full dark:bg-blue-700/80 dark:text-blue-100"><?= number_format($data->vote_average, 1) ?></p>
        <p class="text-base text-gray-200 font-semibold leading-tight">User <br> Score</p>
      </div>

      <?php if (!empty($data->tagline)) : ?>
        <span class="italic text-gray-300 mb-3">
          <?= $data->tagline ?>
        </span>
      <?php endif; ?>

      <div>
        <h4 dir="auto" class="text-2xl font-semibold dark:text-white">Overview</h4>
        <div class="dark:text-gray-200 text-base mt-2" dir="auto">
          <p><?= $data->overview ?></p>
        </div>
      </div>

      <div class="flex relative top-0 left-0 mt-5">
        <?php if (!empty($data->created_by)) : ?>
          <?php foreach ($data->created_by as $creator) : ?>
            <div class="text-left basis-1/3 w-2/6">
              <h5 class="font-semibold dark:text-white text-lg"><?= $creator->name ?></h5>
              <span class="dark:text-gray-200 text-base">Creator</span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <div class="bg-gradient-to-r from-10% from-[#181818] w-full h-full absolute top-0 left-0 z-0"></div>
</div>
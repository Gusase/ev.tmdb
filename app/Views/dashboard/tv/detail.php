<div class="relative py-24 sm:py-28 bg-[url('<?= BD_ORIGINAL .  $x['dataTv']->backdrop_path ?>')] flex backdrop justify-center flex-wrap after:brightness-75 after:bg-# after:absolute after:inset-0 bg-cover min-h-screen bg-no-repeat" style="background-position: left calc((50vw - 160px) - 390px) top;">
  <div class="max-w-[1400px] w-full z-20 px-10 relative flex flex-col md:flex-row">
    <div class="w-[300px] rounded-md overflow-hidden min-w-[300px] group flex items-center">
      <div class="relative shadow-3xl w-full">
        <img src="<?= PS_W500 . $x['dataTv']->poster_path ?>" alt="" id="poster" crossorigin="anonymous">
        <a href="" class="absolute inset-0 bg-black/80 backdrop-blur-md flex justify-center items-center text-xl capitalize text-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible duration-300">More image</a>
      </div>
    </div>
    <div class="flex content-center flex-col pl-10 justify-center">
      <div class="mb-2 inline-flex items-center">
        <span class="font-medium text-gray-300"><?= date('Y', strtotime($x['dataTv']->first_air_date)) ?></span>
        <span class="w-1 h-1 mx-2 inline-block bg-gray-900 rounded-full dark:bg-gray-400"></span>
        <span class="font-medium text-gray-300 uppercase"><?= (!empty($x['dataTv']->number_of_seasons) && $x['dataTv']->number_of_seasons > 1) ? $x['dataTv']->number_of_seasons . ' Seasons' : $x['dataTv']->number_of_seasons . ' Season' ?></span>
      </div>
      <h2 class="text-3xl font-bold tracking-tight text-white sm:text-[2.4rem]"><?= $x['dataTv']->name ?> </h2>
      <div class="inline-flex gap-x-2 mt-1 mb-6">
        <?php foreach ($x['dataTv']->genres as $genre) : ?>
          <a href="" class="hover:underline underline-offset-2 decoration-white dark:hover:text-gray-400 duration-100 dark:text-gray-300"><?= $genre->name ?></a>
        <?php endforeach; ?>
      </div>

      <div class="flex items-center mb-5 space-x-2">
        <p class="bg-blue-100 text-blue-800 text-2xl border-2 border-indigo-500 font-semibold relative w-16 h-16 rounded-full dark:bg-blue-700/80 dark:text-blue-100 after:content-['<?= str_replace('.', '', number_format($x['dataTv']->vote_average, 1)) ?>%'] after:ml-px after:absolute after:inset-0 after:text-center after:leading-[63px]"></p>
        <p class="text-base text-gray-200 font-semibold leading-tight">User <br> Score</p>

        <a href="#" class="inline-flex items-center duration-150 justify-center p-4 text-base font-medium text-gray-500 group hover:text-gray-900 dark:text-gray-200 dark:hover:text-gray-400">
          <svg class="w-4 h-4 mr-2 text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
            <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
          </svg>
          <span class="w-full">Play Trailer</span>
        </a>

      </div>

      <?php if (!empty($x['dataTv']->tagline)) : ?>
        <span class="italic text-gray-300 mb-3">
          <?= $x['dataTv']->tagline ?>
        </span>
      <?php endif; ?>

      <div>
        <h4 dir="auto" class="text-2xl font-semibold dark:text-white">Overview</h4>
        <div class="dark:text-gray-200 text-base mt-2" dir="auto">
          <p><?= $x['dataTv']->overview ?></p>
        </div>
      </div>

      <div class="flex relative top-0 left-0 mt-5">
        <?php if (!empty($x['dataTv']->created_by)) : ?>
          <?php foreach ($x['dataTv']->created_by as $creator) : ?>
            <div class="text-left basis-1/3 w-2/6">
              <h5 class="font-semibold dark:text-white text-lg"><?= $creator->name ?></h5>
              <span class="dark:text-gray-200 text-base">Creator</span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <div class="bg-gradient-to-r from-10% from-black w-full h-full absolute top-0 left-0 z-0"></div>
</div>

<div class="relative pt-14">
  <div class="mx-auto max-w-[1300px]">
    <h2 class="capitalize text-4xl font-semibold mb-3 dark:text-gray-100 text-[#23272a]">series cast</h2>
  </div>
  <div id="scroll" class="w-full max-w-[1300px] mx-auto overflow-y-hidden overflow-x-scroll items-center flex pb-5 justify-start gap-x-6 items-start content-start relative">
    <?php foreach (array_slice($x['crew'], 0, 9) as $cast) : ?>
      <div class="flex min-w-[140px] w-[140px] bg-[#202020]/90 border border-gray-700 h-full flex-col items-start overflow-hidden rounded-md shadow hover:shadow-2xl hover:shadow-gray-800 duration-150">
        <a href="<?= BASE_URL ?>person/<?= $cast->id ?>" title="<?= $cast->name ?>" class="min-w-full">
          <img loading="lazy" class="rounded-ss-md transition-transform object-cover w-full h-full bg-gray-900" src="<?= PS_W92 . $cast->profile_path ?>" alt="">
        </a>
        <div class="p-2">
          <p class="text-gray-700 dark:text-gray-200 text-base font-semibold pr-px">
            <a href="<?= BASE_URL ?>person/<?= $cast->id ?>"><?= $cast->name ?></a>
          </p>
          <?php foreach ($cast->roles as $role) : ?>
            <p class="mt-px text-sm font-medium text-gray-700 dark:text-gray-300">
              <?= $role->character ?>
            </p>
            <p class="dark:text-gray-400 text-gray-600 text-sm"><?= $role->episode_count ?> Episodes</p>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div id="shd" class="w-14 absolute transition-all ease-[cubic-bezier(0.88, 0.27, 0.13, 1.42)] duration-500 right-0 inset-y-0 pointer-events-none bg-gradient-to-l from-[#121212] will-change-auto"></div>
</div>

<div class="bg-[#f9f9f9] pt-10 pb-16">
  <div class="max-w-6xl w-[90%] mx-auto">
    <h2 class="capitalize text-4xl font-semibold mb-10 text-[#23272a]">facts</h2>
    <div class="grid grid-cols-4 gap-5">
      <?php if ($x['dataTv']->original_name != $x['dataTv']->name) : ?>
        <div class="self-start">
          <h3 class="mb-5 text-black text-3xl font-bold"><?= $x['dataTv']->original_name ?></h3>
          <p class="text-xl text-gray-400 dark:text-gray-500 -mt-2 max-w-none font-normal">Original Name</p>
        </div>
      <?php endif; ?>
      <div class="self-start">
        <h3 class="mb-5 text-black text-3xl font-bold"><?= $x['dataTv']->status ?></h3>
        <p class="text-xl text-gray-400 dark:text-gray-500 -mt-2 max-w-none font-normal">Status</p>
      </div>
      <div class="self-start">
        <h3 class="mb-5 text-black text-3xl font-bold"><?= $x['dataTv']->type ?></h3>
        <p class="text-xl text-gray-400 dark:text-gray-500 -mt-2 max-w-none font-normal">Type</p>
      </div>
      <div class="self-start">
        <h3 class="mb-5 text-black text-3xl font-bold"><?= $x['dataTv']->spoken_languages[0]->english_name ?></h3>
        <p class="text-xl text-gray-400 dark:text-gray-500 -mt-2 max-w-none font-normal">Original Language</p>
      </div>
    </div>
  </div>
</div>


<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <h2 class="text-center text-2xl font-semibold leading-8 text-gray-900">Networks</h2>
    <div class="mx-auto mt-10 flex max-w-lg flex-wrap justify-center items-center gap-x-8 gap-y-10 sm:max-w-xl lg:mx-0 lg:max-w-none">
      <?php foreach ($x['dataTv']->networks as $network) : ?>
        <a href="https://www.themoviedb.org/network/<?= $network->id ?>">
          <img class="max-h-12 w-64 object-contain" src="<?= PS_W500 . $network->logo_path ?>" alt="<?= $network->name ?>" title="<?= $network->name ?>" width="158" height="48">
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- <iframe src="https://www.youtube.com/embed/cTlHQiRNVl0?autoplay=1" height="480" width="500 frameborder="0"></iframe> -->


<!-- <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
<img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
<script type="module">
  const colorThief = new ColorThief();
  const img = document.querySelector("#poster");
  const bd = document.querySelector(".backdrop");

  if (img.complete) {
    let hex = colorThief.getColor(img);
    //stackoverflow
    let hexColor = `#${hex[0].toString(16).padStart(2, '0')}${hex[1].toString(16).padStart(2, '0')}${hex[2].toString(16).padStart(2, '0')}`;

    bd.classList.remove('after:bg-#')
    bd.classList.add(`after:bg-[${hexColor}]/70`)

  } else {
    img.addEventListener("load", function() {
      let hex = colorThief.getColor(img);
      //stackoverflow
      let hexColor = `#${hex[0].toString(16).padStart(2, '0')}${hex[1].toString(16).padStart(2, '0')}${hex[2].toString(16).padStart(2, '0')}`;

      bd.classList.remove('after:bg-#')
      bd.classList.add(`after:bg-[${hexColor}]/70`)
    });
  }
</script>
<script>
  const scrollElement = document.getElementById('scroll');
  const shdow = document.getElementById('shd')

  scrollElement.addEventListener('scroll', function() {
    if (scrollElement.scrollLeft > 100) {
      shdow.style.opacity = '0';
    } else if (scrollElement.scrollLeft < 100) {
      shdow.style.opacity = '1';
    }
  });
</script>
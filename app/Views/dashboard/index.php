<div class="max-w-screen-xl mx-auto">
  <div class="relative my-8 isolate bg-[url('<?= BD_DUOTUNE . $data[2] ?>')] bg-cover overflow-hidden items-center bg-gray-900 pt-16 shadow-2xl sm:px-8 md:pt-28 md:pb-16 lg:flex lg:gap-x-20">
    <form class="w-full z-20">
      <div class="-mt-8 mb-14">
        <h1 class="text-[3em] font-bold capitalize dark:text-white ">Welcome.</h1>
        <h3 class="tracking-wide text-3xl font-semibold max-w-prose dark:text-gray-100 ">Millions of movies, TV shows and people to discover. Explore now.</h3>
      </div>
      <label for="anime-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search Anime</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
          </svg>
        </div>
        <input type="search" id="anime-search" class="block rounded-full w-full p-4 py-3 pl-10 text-base text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-800 dark:bg-white dark:border-gray-600 placeholder:text-slate-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for a movie, tv show, person......" required="">
        <button type="submit" class="text-white bbtn absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="display: none;">Search</button>
      </div>
    </form>
    <div class="bg-gradient-to-r from-blue-50 dark:from-[#022e4b] from-10% w-full h-full absolute top-0 left-0 z-0"></div>
  </div>
</div>

<div class="container p-10 space-y-10 mx-auto" id="content">
  <div class="relative">
    <h4 class="text-2xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Trending</h4>
    <div id="scroll" class="w-full max-w-[1300px] overflow-y-hidden overflow-x-scroll flex pb-5 justify-start gap-x-6 items-start content-start relative">
      <?php foreach ($data[1] as $trend) : ?>
        <?php if ($trend->media_type == 'tv') : ?>
          <a href="<?= BASE_URL ?>tv/<?= $trend->id ?>" title="<?= $trend->name ?>" class="group flex min-w-[160px] w-[160px] h-full flex-col items-start overflow-hidden rounded-md shadow">
            <img loading="lazy" class="rounded-md group-hover:brightness-105 transition-transform object-cover w-full h-full bg-gray-900" src="<?= PS_W92 . $trend->poster_path ?>" alt="">
            <div class="p-2">
              <p class="text-gray-700 dark:text-gray-200 text-sm font-semibold pr-px">
                <?= $trend->name ?>
              </p>
              <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-300"><?= date('M d ,Y', strtotime($trend->first_air_date)) ?></p>
            </div>
          </a>
        <?php else : ?>
          <a href="<?= BASE_URL ?>movie/<?= $trend->id ?>" title="<?= $trend->original_title ?>" class="group flex min-w-[160px] w-[160px] h-full flex-col items-start overflow-hidden rounded-md shadow">
            <img loading="lazy" class="rounded-md group-hover:brightness-105 transition-transform object-cover w-full h-full bg-gray-900" src="<?= PS_W92 . $trend->poster_path ?>" alt="">
            <div class="p-2 mt-2">
              <p class="text-gray-700 dark:text-gray-200 text-sm font-semibold pr-px">
                <?= $trend->original_title ?>
              </p>
              <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-300"><?= date('M d ,Y', strtotime($trend->release_date)) ?></p>
            </div>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <div id="shd" class="w-14 absolute transition-all ease-[cubic-bezier(0.88, 0.27, 0.13, 1.42)] duration-500 right-0 inset-y-0 pointer-events-none bg-gradient-to-l from-[#121212] will-change-auto"></div>
  </div>
</div>

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
<!doctype html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?= $data['title'] ?? 'Default' ?></title>
  <script>
    tailwind.config = {
      darkMode: 'class'
    }
  </script>
  <style>
    @keyframes fade {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    ::-webkit-scrollbar {
      width: 0 !important;
    }

    .fd {
      animation: fade .4s ease-in;
    }
  </style>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-[#121212] fd selection:bg-black selection:text-white">
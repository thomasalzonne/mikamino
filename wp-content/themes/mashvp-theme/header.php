<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= mashvp_get_title() ?></title>
  <?php wp_head() ?>
  <meta property="og:title" content="Mikamino" />
  <meta property="og:description" content="blablabla" />
  <meta property="og:image" content=""/>
  <meta property="og:image:alt" content="" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:secure_url" content="" />
  <meta property="og:type" content="website" />
  <script src="<?= get_home_url() ?>/wp-content/themes/mashvp-theme/js/index.js"></script>
  <noscript>
    <style>
      .simplebar-content-wrapper {
        overflow: auto;
      }
    </style>
  </noscript>
  <!-- <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"
  /> -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
  />
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <main>

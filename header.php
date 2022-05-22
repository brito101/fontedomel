<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <title><?php wp_title('|'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php
  $img_url = get_stylesheet_directory_uri() . '/img';
  $cart_count = WC()->cart->get_cart_contents_count();
  ?>

  <header class="header container">
    <a href="<?php bloginfo('url'); ?>"><img src="<?= $img_url; ?>/logo.webp" alt="<?php bloginfo('name') ?>" width="192" height="192" /></a>
    <div class="busca">
      <form action="<?php bloginfo('url'); ?>/loja/" method="get">
        <input type="text" name="s" id="s" placeholder="Buscar" value="<?php the_search_query(); ?>">
        <input type="text" name="post_type" value="product" class="hidden">
        <input type="submit" id="searchbutton" value="Buscar">
      </form>
    </div>
    <nav class="conta">
      <a href="<?php bloginfo('url'); ?>/minha-conta" class="minha-conta">Minha Conta</a>
      <a href="<?php bloginfo('url'); ?>/carrinho" class="carrinho">Carrinho
        <?php if ($cart_count) : ?>
          <span class="carrinho-count"><?= $cart_count; ?></span>
        <?php endif ?>
      </a>
    </nav>
  </header>

  <?php
  wp_nav_menu([
    'menu' => 'categorias',
    'container' => 'nav',
    'container_class' => 'menu-categorias'
  ])
  ?>
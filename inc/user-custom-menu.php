<?php

// Adicionar novo menu
function brito_custom_menu($menu_links)
{
  // $menu_links = array_slice($menu_links, 0, 5, true)
  //   + ['certificados' => 'Certificados']
  //   + array_slice($menu_links, 5, NULL, true);

  // Remove um item
  unset($menu_links['downloads']);
  return $menu_links;
}

add_filter('woocommerce_account_menu_items', 'brito_custom_menu');

// function brito_add_endpoint()
// {
//   add_rewrite_endpoint('certificados', EP_PAGES);
// }

// add_action('init', 'brito_add_endpoint');

// function brito_certificados()
// {
//   echo "<h2>Certificados</h2>";
//   echo "<p>Esses são os seus certificados</p>";
// }
// add_action('woocommerce_account_certificados_endpoint', 'brito_certificados');

<?php

//adicionando tema do woocommerce
function brito_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'brito_add_woocommerce_support');

//adicionando arquivo css
function brito_css()
{
  wp_register_style('brito-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', false);
  wp_enqueue_style('brito-style');
}
add_action('wp_enqueue_scripts', 'brito_css');

//cropagem de imagens customizada
function brito_custom_images()
{
  add_image_size('slide', 1000, 800, ['center', 'top']);
  update_option('medium_crop', 1);
}
add_action('after_setup_theme', 'brito_custom_images');

//quantidade de anúncios por página
function brito_loop_shop_per_page()
{
  return 6;
}
add_filter('loop_shop_per_page', 'brito_loop_shop_per_page');


function remove_some_body_class($classes)
{
  $woo_class = array_search('woocommerce', $classes);
  $woopage_class = array_search('woocommerce-page', $classes);
  $search = in_array('archive', $classes) || in_array('product-template-default', $classes);
  if ($woo_class && $woopage_class && $search) {
    unset($classes[$woo_class]);
    unset($classes[$woopage_class]);
  }
  return $classes;
}
add_filter('body_class', 'remove_some_body_class');

function format_products($products, $img_size = 'medium')
{
  $products_final = [];
  foreach ($products as $product) {
    $products_final[] = [
      'name' => $product->get_name(),
      'price' => $product->get_price_html(),
      'link' => $product->get_permalink(),
      'img' => wp_get_attachment_image_src($product->get_image_id(), $img_size)[0],
    ];
  }
  return $products_final;
}

function brito_product_list($products)
{ ?>
  <ul class="products-list">
    <?php foreach ($products as $product) : ?>
      <li class="product-item">
        <a href="<?= $product['link']; ?>">
          <div class="product-info">
            <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
            <h2><?= $product['name']; ?> - <span><?= $product['price']; ?></span></h2>
          </div>
          <div class="product-overlay">
            <span class="btn-link">Ver Mais</span>
          </div>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
<?php
}

/** Minha conta customizado */
include(get_template_directory() . '/inc/user-custom-menu.php');

/** Checkout Costumizado */
include(get_template_directory() . '/inc/checkout-customizado.php');

/** Desabilitando a nota de mensagens do checkout */
add_filter('woocommerce_enable_order_notes_field', '__return_false');

//adicionando widget de edição de menu na interface do WP
register_nav_menus([
  'categorias' => 'Categorias'
]);

/** Email */
// function brito_change_email_header() {
//   echo '<h2 style="text-align: center;">Mensagem Header</h2>';
// }

// add_action('woocommerce_email_header', 'brito_change_email_header');

// function brito_change_email_footer_text($text)
// {
//   echo 'Decora Mais Você
//   <ul style="padding: 0px; margin: 0px; list-style: none;">
//     <li><a href="/">Facebook</a></li>
//     <li><a href="/">Instagram</a></li>
//     <li><a href="/">YouTube</a></li>
//   </ul>';
// }
// add_filter('woocommerce_email_footer_text', 'brito_change_email_footer_text');

// function brito_add_email_meta($order)
// {
//   $mensagem = get_post_meta($order->get_id(), 'mensagem_personalizada', true);
//   $presente = get_post_meta($order->get_id(), '_billing_presente', true);

//   echo '<h2 style="margin: -20px 0 10px 0px;">Detalhes</h2>
//     <p style="font-size: 16px; border: 1px solid #e5e5e5; padding: 10px; margin-bottom: 0px;"><strong>Mensagem: </strong>' . $mensagem .  '</p>
//     <p style="font-size: 16px; border: 1px solid #e5e5e5; padding: 10px;"><strong>Presente: </strong>' . $presente .  '</p>
//   ';
// }
// add_action('woocommerce_email_order_meta', 'brito_add_email_meta');
// 
?>
<footer class="footer">
  <img src="<?= get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name') ?>" width="192" height="192">
  <div class="container footer-info">
    <section>
      <h3>Páginas</h3>
      <?php
      wp_nav_menu([
        'menu' => 'footer',
        'container' => 'nav',
        'container_class' => 'footer-menu'
      ]);
      ?>
    </section>
    <section>
      <h3>Redes Sociais</h3>
      <?php
      wp_nav_menu([
        'menu' => 'redes',
        'container' => 'nav',
        'container_class' => 'footer-redes'
      ]);
      ?>
    </section>
    <section>
      <h3>Contato</h3>
      <ul>
        <li>(11) 2307-1900</li>
        <li>(11) 4117-3536</li>
        <li><a href="https://wa.me/5511985861944" title="WhatsApp" target="_blank" rel="noreferrer">(11) 98586-1944</a></li>
        <li>
          <a title="Contato por e-mail" href="mailto:loja@fontedomel.com.br" rel="noreferrer">loja@fontedomel.com.br</a>
        </li>
      </ul>
    </section>
    <section>
      <h3>Pagamentos</h3>
      <ul>
        <li>Cartão de Crédito</li>
        <li>Boleto Bancário</li>
        <li>PagSeguro</li>
      </ul>
    </section>
  </div>
  <?php
  $countries = WC()->countries;
  $base_address = $countries->get_base_address();
  $base_city = $countries->get_base_city();
  $base_state = $countries->get_base_state();
  $complete_address = "$base_address, $base_city, $base_state";
  ?>
  <small class="footer-copy"><?= bloginfo(); ?> &copy; <?= date('Y'); ?> - <?= $complete_address; ?></small>
</footer>
<?php wp_footer(); ?>
<script src="<?= get_stylesheet_directory_uri(); ?>/js/slide.js"></script>
<script src="<?= get_stylesheet_directory_uri(); ?>/js/script.js"></script>
</body>

</html>
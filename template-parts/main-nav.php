<nav class="navbar navbar-expand-xl bg-body-tertiary sticky-top">
  <div class="container">
    <!-- Brand/Logo -->
    <a class="navbar-brand" href="<?php echo esc_url(home_url()) ?>">
      <?php if (defined('SHOW_LOGO_IMAGE') && SHOW_LOGO_IMAGE) : ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wp_modern_starter-logo.png"
             alt="<?php bloginfo('name')?>" 
             height="40"
             class="d-inline-block align-text-top" />
      <?php else : ?>
        <?php echo DOMAIN; ?>
      <?php endif; ?>
    </a>

    <!-- Navbar Toggler -->
    <button class="navbar-toggler mobile-toggle" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="toggle-line"></span>
      <span class="toggle-line"></span>
      <span class="toggle-line"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if (has_nav_menu('primary_navigation')) : ?>
        <?php 
          wp_nav_menu([
            'theme_location'    => 'primary_navigation',
            'container'         => false,
            'menu_class'        => 'navbar-nav ms-auto',
            'depth'             => 2,
            'walker'            => new bootstrap_5_wp_nav_menu_walker(),
            'fallback_cb'       => '__return_false',
          ]) 
        ?>
      <?php endif; ?>
    </div>
  </div>
</nav>


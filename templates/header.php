          <a class="navbar-brand" href="<?php echo home_url(); ?>" rel="nofollow">
<?php if ( get_theme_mod( 'custom_logo' ) ) :
$logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'));
      ?>
           <img src="<?php echo $logo[0]; ?>" alt="Logo <?php bloginfo('name'); ?>" itemprop="logo"/>
<?php endif; ?>
           <span><?php bloginfo('name'); ?></span>
          </a>
<?php $description = get_bloginfo( 'description', 'display' );
  if ( $description || is_customize_preview() ) : ?>
          <p class="navbar-text"><?php echo $description; ?></p>
<?php endif; ?>

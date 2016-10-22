<?php
/**
 * Ker WP BootStrap
 *
 * Site footer
 *
 * Author: Jules Clement <jules@ker.bz>
 */
?>
    </div>
    </section>
    <footer class="container-fluid" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

<?php if ( has_nav_menu( 'footer' ) ) : ?>
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-footer" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <p class="navbar-text"><?php do_action('footer_credits'); ?></p>
      </div>
<?php wp_nav_menu(array(
    'container'         => 'div',
    'container_id'      => 'navbar-footer',
    'container_class'   => 'collapse navbar-collapse',
    'menu'              => __( 'Footer Links', 'ker_wpbs' ),
    'menu_class'        => 'nav navbar-nav navbar-right',
    'theme_location'    => 'footer',
    'before'            => '',
    'after'             => '',
    'link_before'       => '',
    'link_after'        => '',
    'depth'             => 0,
    'fallback_cb'       => ''
)); ?>
      </nav>
<?php else: ?>
      <p><?php do_action('footer_credits'); ?></p>
<?php endif; ?>
    </footer>
<?php wp_footer(); ?>
  </body>
</html>

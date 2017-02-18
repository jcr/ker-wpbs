body>header, .navbar, .navbar a, body>footer {
    background-color: <?php echo get_theme_mod('header_footer_color'); ?>;
}
#sidebar {
    float: <?php echo get_theme_mod('layout_pos_sidebar', 'right'); ?> !important;
}
<?php if (get_theme_mod('layout_pos_highlight')): ?>
#highlight {
    float: <?php echo get_theme_mod('layout_pos_highlight'); ?> !important;
}
<?php endif; ?>

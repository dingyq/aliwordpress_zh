<header class="banner">
<nav class="navbar navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">导航菜单</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
<a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" title="首页"><img alt="<?php bloginfo('name'); ?>" src="<?php bloginfo('template_url');?>/assets/images/logo.jpg"></a>
</div>
<?php
wp_nav_menu( array(
'menu'              => 'primary_navigation',
'theme_location'    => 'primary_navigation',
'depth'             => 2,
'container'         => 'div',
'container_class'   => 'collapse navbar-collapse',
'container_id'      => 'bs-example-navbar-collapse-1',
'menu_class'        => 'nav navbar-nav',
'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
'walker'            => new wp_bootstrap_navwalker())
);
?>
</div>
</nav>
</header>
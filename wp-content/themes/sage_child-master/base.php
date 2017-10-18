<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
<?php
do_action('get_header');
get_template_part('templates/header');
?>
<?php if ( is_home() || is_front_page() )://首页 ?>
<div class="slide">
<div class="jumbotron">
<div class="container">
<h1><?php bloginfo('name'); ?></h1>
<p>除尘布袋，除尘骨架，30年专注除尘配件第一品牌！</p>
</div>
</div>
</div>
<?php endif; ?>
<?php if ( !is_home() || !is_front_page() )://非首页 ?>
<div class="slide-in"></div>
<?php endif; ?>
<div class="wrap container" role="document">
<div class="content">
<main class="main">
<?php include Wrapper\template_path(); ?>
</main><!-- /.main -->
</div><!-- /.content -->
</div><!-- /.wrap -->
<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
?>
</body>
</html>
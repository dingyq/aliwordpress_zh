<?php //get_template_part('templates/nav-img-0-3');//顶部下拉图片导航 ?>
<footer class="content-info">
<div class="container">
<div class="row">
<div class="col-sm-9">
<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();//面包屑 ?>
</div>
<?php if ( is_single() )://只有是内容页的时候才显示内容页全局翻页按钮 ?>
<div class="col-sm-3">
<nav class="navigation post-navigation" role="navigation">
<h2 class="screen-reader-text">文章导航</h2>
<div class="nav-links">
<span class="nav-previous"><?php
$prev_post = get_previous_post();
if (!empty( $prev_post )): ?>
<a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>" rel="prev" ><i class="fa fa-angle-left"></i></a><?php endif;//customizer.js有附属规则 ?></span>
<span class="nav-next"><?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
<a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>" rel="next" ><i class="fa fa-angle-right"></i></a><?php endif;//customizer.js有附属规则 ?></span>
</div>
</nav>
</div>
<?php endif; ?>
</div>
<div class="row">
<?php dynamic_sidebar('sidebar-footer'); ?>
</div>
<ul class="list-inline">
<li>&copy; <?php echo date('Y'); ?> <a href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> 版权所有</li>
<li><a href="<?= esc_url(home_url('/')); ?>terms">服务条款</a></li>
<li><a href="<?= esc_url(home_url('/')); ?>privacy">隐私条款</a></li>
<li><a href="<?= esc_url(home_url('/')); ?>about">关于我们</a></li>
<li><a href="<?= esc_url(home_url('/')); ?>sitemap.html">网站地图</a></li>
<li>冀ICP备14003630号</li>
<li>冀公网安备13090002006242号</li>
<li class="pull-right to-up"><a href="#" title="顶部"><i class="fa fa-angle-up"></i></a></li>
</ul>
</div>
</footer>
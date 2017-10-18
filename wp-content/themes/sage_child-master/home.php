<div class="item-accets">
<div class="row">
<div class="col-sm-6 col-md-6">
<div class="home-part-bd">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(5); //获取分类ID【布袋】的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="row">
<?php
$args=array(
'cat' => 5,   // 分类ID
'posts_per_page' => 2, // 显示篇数
//'post__not_in' => array(70,67), // 指定，不！显示！某个ID文章
//'post__in'     => array(70,67), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6">
<article class="cate-item">
<header>
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a>
<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
</header>
<div class="entry-summary">
<span class="price">价格：<?php the_field('价格');?>元起</span>
<span class="chengjiao">成交：<?php post_views('', ''); ?></span>
</div>
</article>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
<div class="item-title-links">
<div class="row">
<?php
$args=array(
'cat' => 5,   // 分类ID
'posts_per_page' => 100, // 显示篇数
'post__not_in' => array(), // 指定，不显示！某个ID文章，除尘布袋、除尘滤袋
//'post__in'     => array(70,67,61,64), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>">更多<?php echo $cat->name; ?> &gt;&gt;</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-6">
<div class="home-part-gj">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(6); //获取分类ID【骨架】的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="row">
<?php
$args=array(
'cat' => 6,   // 分类ID
'posts_per_page' => 2, // 显示篇数
//'post__not_in' => array(70,67), // 指定，不！显示！某个ID文章
//'post__in'     => array(70,67), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6">
<article class="cate-item">
<header>
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a>
<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
</header>
<div class="entry-summary">
<span class="price">价格：<?php the_field('价格');?>元起</span>
<span class="chengjiao">成交：<?php post_views('', ''); ?></span>
</div>
</article>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
<div class="parts-title-links">
<div class="row">
<?php
$args=array(
'cat' => 6,   // 分类ID
'posts_per_page' => 100, // 显示篇数
'post__not_in' => array(), // 指定，不！显示！某个ID文章
//'post__in'     => array(70,67,61,64), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>">更多<?php echo $cat->name; ?> &gt;&gt;</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6">
<div class="home-parts">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(4); //获取分类ID【配件】的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="row">
<?php
$args=array(
'cat' => 4,   // 分类ID
'posts_per_page' => 4, // 显示篇数
//'post__not_in' => array(70,67), // 指定，不！显示！某个ID文章
//'post__in'     => array(70,67), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6">
<article class="cate-item">
<header>
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a>
<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
</header>
<div class="entry-summary">
<span class="price">价格：<?php the_field('价格');?>元起</span>
<span class="chengjiao">成交：<?php post_views('', ''); ?></span>
</div>
</article>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
<div class="item-title-links">
<div class="row">
<?php
$args=array(
'cat' => 4,   // 分类ID
'posts_per_page' => 100, // 显示篇数
'post__not_in' => array(), // 指定，不显示！某个ID文章，电磁脉冲阀，
//'post__in'     => array(70,67,61,64), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>">更多<?php echo $cat->name; ?> &gt;&gt;</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-6">
<div class="home-item">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(3); //获取分类ID【设备】的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="row">
<?php
$args=array(
'cat' => 3,   // 分类ID
'posts_per_page' => 4, // 显示篇数
//'post__not_in' => array(70,67), // 指定，不！显示！某个ID文章
//'post__in'     => array(70,67), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6">
<article class="cate-item">
<header>
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'thumbnail' );//小型缩略图 ?>
</a>
<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
</header>
<div class="entry-summary">
<span class="price">价格：<?php the_field('价格');?>元起</span>
<span class="chengjiao">成交：<?php post_views('', ''); ?></span>
</div>
</article>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
<div class="parts-title-links">
<div class="row">
<?php
$args=array(
'cat' => 3,   // 分类ID
'posts_per_page' => 100, // 显示篇数
'post__not_in' => array(), // 指定，不显示！某个ID文章，布袋除尘器，脉冲除尘器
//'post__in'     => array(70,67,61,64), // 指定，显示！某个ID文章
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
<?php endwhile; endif; wp_reset_query(); ?>
<div class="col-xs-6 col-sm-6 col-md-4">
<a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>">更多<?php echo $cat->name; ?> &gt;&gt;</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="service-accets">
<div class="row">
<div class="col-sm-6 col-md-3">
<div class="content">
<h2>买家保障</h2>
<div class="row">
<div class="col-xs-4"><a href="/guarantee">保障范围</a></div>
<div class="col-xs-4"><a href="/guarantee">诚信保障</a></div>
<div class="col-xs-4"><a href="/guarantee">付款方式</a></div>
<div class="col-xs-4"><a class="h" href="/guarantee">物流发货</a></div>
<div class="col-xs-4"><a class="h" href="/guarantee">退货退款</a></div>
<div class="col-xs-4"><a href="/guarantee">联系客服</a></div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="content">
<h2>售后服务</h2>
<div class="row">
<div class="col-xs-4"><a href="/service">服务介绍</a></div>
<div class="col-xs-4"><a href="/service">服务理念</a></div>
<div class="col-xs-4"><a href="/service">服务承诺</a></div>
<div class="col-xs-4"><a href="/service">服务项目</a></div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="content">
<h2>特色服务</h2>
<div class="row">
<div class="col-xs-4"><a href="/wiki">技术指南</a></div>
<div class="col-xs-4"><a class="h" href="/help">在线联系</a></div>
<div class="col-xs-4 qrcode-home"><a href="<?= esc_url(home_url('/')); ?>">手机访问</a></div>
<div class="col-xs-4"><a class="h" href="/characteristic">提交需求</a></div>
<div class="col-xs-4"><a href="/characteristic">解决方案</a></div>
<div class="col-xs-4"><a href="/characteristic">免费拿样</a></div>
</div>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="content">
<h2>快捷入口</h2>
<div class="row">
<div class="col-xs-4"><a href="/help">询价采购</a></div>
<div class="col-xs-4"><a href="/entrance">帮你找货</a></div>
<div class="col-xs-4"><a href="/guestbook">客户留言</a></div>
<div class="col-xs-4"><a href="/faq">自助服务</a></div>
<div class="col-xs-4"><a class="h" href="/jiabao">价格保护</a></div>
<div class="col-xs-4"><a href="/entrance">交易认证</a></div>
</div>
</div>
</div>
</div>
</div>
<div class="docs-accets">
<div class="row">
<div class="col-sm-4 col-md-4">
<div class="panel panel-default">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(21); //获取分类ID的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2 class="panel-heading"><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="list-group">
<?php
$args=array(
'cat' => 21,   // 分类ID
'posts_per_page' => 5, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<a class="list-group-item" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php the_title(); ?>
</a>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
</div>
</div>
<div class="col-sm-4 col-md-4">
<div class="panel panel-default">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(14); //获取分类ID的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2 class="panel-heading"><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="list-group">
<?php
$args=array(
'cat' => 14,   // 分类ID
'posts_per_page' => 5, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<a class="list-group-item" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php the_title(); ?>
</a>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
</div>
</div>
<div class="col-sm-4 col-md-4">
<div class="panel panel-default">
<?php
//$cat=get_category_by_slug(''); //获取分类名称的分类数据
$cat=get_category(13); //获取分类ID的分类数据
$cat_links=get_category_link($cat->term_id); // 通过$cat数组里面的分类id获取分类链接
?>
<h2 class="panel-heading"><a href="<?php echo $cat_links; ?>" title="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></a></h2>
<div class="list-group">
<?php
$args=array(
'cat' => 13,   // 分类ID
'posts_per_page' => 5, // 显示篇数
);
query_posts($args);
if(have_posts()) : while (have_posts()) : the_post();
?>
<a class="list-group-item" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php the_title(); ?>
</a>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
</div>
</div>
</div>
</div>
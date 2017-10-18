<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$description = '';
$keywords = '';

if (is_home()) {
// 将以下引号中的内容改成你的主页description
$description = "最受欢迎的知名除尘器配件品牌官网，30年专注工业除尘器配件，心悦除尘，为您提供优质的除尘器布袋、除尘器骨架等除尘器配件，同时提供客户服务及售后支持。";

// 将以下引号中的内容改成你的主页keywords
$keywords = "除尘布袋,除尘骨架,除尘配件";
}
elseif (is_single() || is_page()) {
$description0 = get_the_excerpt();//系统文章摘要
$description1 = get_post_meta($post->ID, "description", true);
$description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

// 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
// 上面的描述已经不对啦。这段现在是：默认为系统文章摘要，否则用文章前200字作为描述
$description = $description0 ? $description0 : $description2;

// 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
$keywords = get_post_meta($post->ID, "keywords", true);
if($keywords == '') {
$tags = wp_get_post_tags($post->ID);    
foreach ($tags as $tag ) {        
$keywords = $keywords . $tag->name . ",";    
}
$keywords = rtrim($keywords, ',');
}
}
elseif (is_category()) {
// 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
$description = category_description();
$keywords = single_cat_title('', false);
}
elseif (is_tag()){
// 标签的description可以到后台 - 文章 - 标签，修改标签的描述
$description = tag_description();
$keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url');?>/dist/scripts/ie.min.js?ver=<?php echo wp_get_theme()->get( 'Version' );?>"></script>
<![endif]-->
<meta name="location" content="province=河北;city=沧州;coord=116.580699,38.089532">
<meta name="generator" content="sage_child v<?php echo wp_get_theme()->get( 'Version' );?>">
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?b5021cc5e33345484524c12ed0e829ae";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
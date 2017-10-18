<?php
/**
* Sage includes
*
* The $sage_includes array determines the code library included in your theme.
* Add or remove files to the array as needed. Supports child theme overrides.
*
* Please note that missing files will produce a fatal error.
*
* @link https://github.com/roots/sage/pull/1042
*/
$sage_includes = [
'lib/assets.php',    // Scripts and stylesheets
'lib/extras.php',    // Custom functions
'lib/setup.php',     // Theme setup
'lib/titles.php',    // Page titles
'lib/wrapper.php',   // Theme wrapper class
'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
if (!$filepath = locate_template($file)) {
trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
}

require_once $filepath;
}
unset($file, $filepath);

//在 function 有挂载 lib/content-post.php
require ('lib/content-post.php');

//移除头部多余.recentcomments样式
function Fanly_remove_recentcomments_style() {
global $wp_widget_factory;
remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'Fanly_remove_recentcomments_style' );

//移除菜单的多余CSS选择器
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
return is_array($var) ? array_intersect($var, array('current-menu-item','current-post-ancestor','current-menu-ancestor','current-menu-parent')) : '';
}

// Register Custom Navigation Walker
require_once('plug/wp-bootstrap-navwalker-master/wp_bootstrap_navwalker.php');

//自定义评论表单
add_filter('comment_form_default_fields', 'mytheme_remove_commentform_fields');
function mytheme_remove_commentform_fields($fields){
$fields['email'] = '';  // 后面的参数留空表示移除 email 字段
$fields['url'] = '';  // 移除 website 字段
return $fields;
}
function alter_comment_form_fields($fields){
$fields['author'] = '<p>' . '<label for="author">' . __( 'Your name, please' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
'<input id="author" name="author" type="text" placeholder="John Smith" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
$fields['email'] = '';  // 移除 email 字段
$fields['url'] = '';  // 移除 website 字段
return $fields;
}

//文章摘要，自定义结尾
function new_excerpt_more($more){
global $post;
//return '<a href="'.get_permalink($post->ID). '">[更多...]</a>';
return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//文章摘要，控制摘要字数
function new_excerpt_length($length) {
return 150;
}
add_filter("excerpt_length", "new_excerpt_length");

//仿成交功能，用访问量代替
/* 访问计数 */
function record_visitors()
{
	if (is_singular())
	{
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID)
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1)))
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');
/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}


//wordpress中使用canonical标签
function canonical_archive_link( $paged = true ) {
        $link = false;
  
        if ( is_front_page() ) {
                $link = home_url( '/' );
        } else if ( is_home() && "page" == get_option('show_on_front') ) {
                $link = get_permalink( get_option( 'page_for_posts' ) );
        } else if ( is_tax() || is_tag() || is_category() ) {
                $term = get_queried_object();
                $link = get_term_link( $term, $term->taxonomy );
        } else if ( is_post_type_archive() ) {
                $link = get_post_type_archive_link( get_post_type() );
        } else if ( is_author() ) {
                $link = get_author_posts_url( get_query_var('author'), get_query_var('author_name') );
        } else if ( is_archive() ) {
                if ( is_date() ) {
                        if ( is_day() ) {
                                $link = get_day_link( get_query_var('year'), get_query_var('monthnum'), get_query_var('day') );
                        } else if ( is_month() ) {
                                $link = get_month_link( get_query_var('year'), get_query_var('monthnum') );
                        } else if ( is_year() ) {
                                $link = get_year_link( get_query_var('year') );
                        }                                               
                }
        }
  
        if ( $paged && $link && get_query_var('paged') > 1 ) {
                global $wp_rewrite;
                if ( !$wp_rewrite->using_permalinks() ) {
                        $link = add_query_arg( 'paged', get_query_var('paged'), $link );
                } else {
                        $link = user_trailingslashit( trailingslashit( $link ) . trailingslashit( $wp_rewrite->pagination_base ) . get_query_var('paged'), 'archive' );
                }
        }
        return $link;
}


//WordPress 添加面包屑导航 
function cmp_breadcrumbs() {
	$delimiter = '<i class="fa fa-angle-right"></i>'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">'.__( '' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo ' <a itemprop="breadcrumb" href="' . $homeLink . '" title="首页">' . __( '<i class="fa fa-home"></i>' , 'cmp' ) . '</a> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</div>';
	}
}


//更改首页的标题
function Bing_pre_get_document_title(){
    if (is_home()) {//只筛选首页
        return '除尘布袋，除尘骨架 - 30年专注，除尘配件，第一品牌！';//自定义标题内容
   }
}
add_filter( 'pre_get_document_title', 'Bing_pre_get_document_title' );


//标题分隔符修由 &#8211; 改成 -
function Bing_title_separator_to_line(){
    return '-';//自定义标题分隔符
}
add_filter( 'document_title_separator', 'Bing_title_separator_to_line' );


//自动为文章标签添加该标签的链接 & 为tag关键词添加指定链接
$match_num_from = 1;  // 一个标签在文章中出现少于多少次不添加链接
$match_num_to = 1; // 一篇文章中同一个标签添加几次链接
add_filter('the_content','tag_link',1);
//按长度排序
function tag_sort($a, $b){
	if ( $a->name == $b->name ) return 0;
	return ( strlen($a->name) > strlen($b->name) ) ? -1 : 1;
}
//为符合条件的标签添加链接
function tag_link($content){
	global $match_num_from,$match_num_to;
	$posttags = get_tags();//获取网站内全部的 tag标签，然后给当前文章出现的关键词都加上链接，也就是当前文章出现的的关键词，只要这个关键词设置过 tag标签，当前文字就会链接到 tag标签页
//	$posttags = get_the_tags();//原版默认值
	if ($posttags) {
		usort($posttags, "tag_sort");
		foreach($posttags as $tag) {
			$link = get_tag_link($tag->term_id);
			$keyword = $tag->name;
			//链接的代码
			$cleankeyword = stripslashes($keyword);
      //筛选特殊重要指定关键词，单独分配链接
			$homeLink = home_url();//便于调用主域名
            switch ($keyword) {
			case "除尘配件":
			$link = $homeLink.'/'.'peijian';
			break;
			case "除尘布袋":
			$link = $homeLink.'/'.'chu-chen-bu-dai';
			break;
			case "除尘骨架":
			$link = $homeLink.'/'.'chu-chen-gu-jia';
			break;
            case "除尘器":
			$link = $homeLink.'/'.'shebei';
			break; 
			default:
			$link = $link;//可写可不写，不写也是默认这么执行，写上后理论还明白些吧
			}
//            $url = "<a href=\"$link\" title=\"".str_replace('%s',addcslashes($cleankeyword, '$'),__('查看 %s 的相关内容'))."\"";//原版
            $url = "<a href=\"$link\"";//去掉原版的 title=""
//			$url .= ' target="_blank"';//链接在新窗口打开连接
			$url .= ">".addcslashes($cleankeyword, '$')."</a>";
			$limit = rand($match_num_from,$match_num_to);
			//不链接的代码
			$content = preg_replace( '|(<a[^>]+>)(.*)('.$ex_word.')(.*)(</a[^>]*>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
			$content = preg_replace( '|(<img)(.*?)('.$ex_word.')(.*?)(>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
			$cleankeyword = preg_quote($cleankeyword,'\'');
//			$regEx = '\'(?!((<.*?)|(<h2.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</h2>))\'s' . $case;
            //忽略 h2 h3 a 标签也给关键词加链接的方案。后续如需增加、减少，找找规律，按规律来修改
            $regEx = '\'(?!((<.*?)|(<h2.*?)|(<h3.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</h2>)|([^>]*?</h3>)|([^>]*?</a>))\'s' . $case;
			$content = preg_replace($regEx,$url,$content,$limit);
			$content = str_replace( '%&&&&&%', stripslashes($ex_word), $content);
		}
	}
	return $content;
}


//正文内容页文章目录功能
function article_index($content) {
$matches = array();
$ul_li = '';
$r = "/<h2>([^<]+)<\/h2>/im";
$glyph_icon = "<i class=\"fa fa-link\"></i>";//给a标签内加的图标
if(is_singular() && preg_match_all($r, $content, $matches)) {
foreach($matches[1] as $num => $title) {
$title = trim(strip_tags($title));
$content = str_replace($matches[0][$num], '<h2 id="'.$title.'"><a href="#'.$title.'">'.$glyph_icon.'</a>'.$title.'</h2>', $content);
$ul_li .= '<li><a href="#'.$title.'">'.$title."</a></li>\n";
}
$content = "\n<div id=\"article-index\">
<strong>目录</strong>
<ol id=\"index-ul\">\n" . $ul_li . "</ol>
</div>\n" . $content;
}
return $content;
}
add_filter( 'the_content', 'article_index' );


//自动将文章第一个图设为WordPress特色图像
function autoset_featured() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
              if (!$already_has_thumb)  {
              $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                          if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
                           }
                        }
      }  //end function
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');



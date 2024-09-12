<?php

$change = array(
   'daily',
   'weekly',
   'monthly'
);

$priority = array(
   1,
   0.8,
   0.6,
   0.5,
);


// pr( route_list() );

// die();

header("Content-Type: application/xml; charset=UTF-8");
// Begin outputting the sitemap XML structure
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

$change_res = '';
$priority_res = '';
$mod_time = '';

if( route_list() ){
   $sl = 0;
   foreach( route_list() as $v ){

      if (strpos($v['uri'], 'dashboard') !== false || strpos($v['uri'], 'blank') !== false || strpos($v['uri'], 'login') !== false || strpos($v['uri'], 'test') !== false ) {
         
      }else{

         $url =  APP_URL.$v['uri'];
         $sl++;

         $change_res = $change[1];
         $priority_res = $priority[3];
         $mod_time = '';

         if( strpos($v['name'], 'home') !== false ){
            $change_res = $change[0];
            $priority_res = $priority[0];
            $mod_time = '';
         }else if( strpos($v['name'], 'journals') !== false ){
            $change_res = $change[0];
            $priority_res = $priority[0];
            $mod_time = '';
         }else if( strpos($v['name'], 'journal_page') !== false ){
            $change_res = $change[2];
            $priority_res = $priority[2];
            $mod_time = '';
         }else if( strpos($v['name'], 'current_issue') !== false ){
            $change_res = $change[3];
            $priority_res = $priority[2];
            $mod_time = '';
         }else if( strpos($v['name'], 'archive') !== false ){
            $change_res = $change[3];
            $priority_res = $priority[2];
            $mod_time = '';
         }else if( strpos($v['name'], 'all_article') !== false ){
            $change_res = $change[3];
            $priority_res = $priority[2];
            $mod_time = '';
         }else if( strpos($v['name'], 'article') !== false ){
            $change_res = $change[0];
            $priority_res = $priority[1];
            $mod_time = '';

            $arr = explode('/', $v['uri']);

            // pr($arr);
            if( isset( $arr[1] ) ){
               $guid = $arr[1];
               $article = get_first( get_on_condition( 'new_articles', "guid='$guid'", 'created_at'  ) );

               // pr($article);
               if( $article ){
                  $mod_time = $article->created_at;
               }

            }


         }

         // echo $sl.' ) '.$url."<br/>";

         echo "  <url>\n";

         echo "    <loc>{$url}</loc>\n";
         echo "    <changefreq>{$change_res}</changefreq>\n";
         echo "    <priority>{$priority_res}</priority>\n";
         if( $mod_time ){
            echo "    <lastmod>{$mod_time}</lastmod>\n";
         }

         echo "  </url>\n";

      }

   }
}

echo "</urlset>";
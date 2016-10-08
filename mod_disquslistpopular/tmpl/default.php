<div class="disquspopular" class="<?php echo $moduleclass_sfx ?>">
<?php
$forumid = $params['forumid'];
$apikey = $params['apikey'];
$limit = $params['limit'];
$interval = $params['interval'];
$with_top_post = $params['with_top_post'];
if ($params['apikey'] !='') {
$get_disquspopular = file_get_contents("https://disqus.com/api/3.0/threads/listPopular.json?forum=$forumid&api_key=$apikey&interval=$interval&limit=$limit&with_top_post=$with_top_post");
$contentdisquspopular = json_decode($get_disquspopular, true);
// SEE ALL DATA
// echo "<pre>";
// var_dump($contentdisquspopular);
// echo "</pre>";

foreach ($contentdisquspopular['response'] as $details) {
  $linktoarticles = $details['link'];
  $titledisquspopular = $details['title'];
  $postsdisquspopular = $details['posts'];
  $createdAtdisquspopular = $details['createdAt'];
  $createdAtformatdisquspopular = date('d.m.y H:i:s', strtotime($createdAtdisquspopular));
  echo "<blockquote>";
  echo "<p><a class='avatarandurlcomment' href='".$linktoarticles."'>".$titledisquspopular."</a></p>";
  echo "<span class='smalldate'>".$createdAtformatdisquspopular."</span>";
  echo("<footer>Кол-во комментариев: ".$postsdisquspopular)."</footer>";
  echo "</blockquote>";
  }
}
?>
</div>
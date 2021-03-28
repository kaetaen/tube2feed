<?php
header('Content-Type: Application/json');

if ($_GET)
{
  if (array_key_exists('channel_link', $_GET)):
    $tubefeeder = 'https://www.youtube.com/feeds/videos.xml?channel_id=';
    $channel_id = explode('/', $_GET['channel_link'])[4];
    echo gettype($channel_id);
    if ($channel_id != NULL):
      $podcast_feed_url = $tubefeeder . $channel_id;  
      echo json_encode(['podcast_url_feed' => $podcast_feed_url]);
    else:
      echo json_encode(['Error' => 'Invalid url param']);
    endif;
  endif;
}
else 
{
  echo json_encode([
    'What\'s this'  => 'YouTube Channel to Feed RSS Converter',
    'How to use'    => 'Put YouTube Channel link into url param [channel_link]',
    'About me'      => [
      'Who I am'  => 'Kaiten',
      'My Github' => 'http://github.com/kaetaen'
    ]
  ]);
}

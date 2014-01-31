<?php

require 'google-api-php-client/ga/analytics.class.php';

$keywords = 'error retrieving....';
$keywords = getKeywords();

function getKeywords() {

  try {
      
      $ga_id = '0000000'; // need to put this in
      $oAnalytics = new analytics('your-GOOGLE-email@domain.com', 'your-pass-word');
      $oAnalytics->useCache();
      $oAnalytics->setProfileById('ga:' . $ga_id);
      $oAnalytics->setMonth(date('n'), date('Y'));

      $dim = array();
      $dim['dimensions'] = 'ga:keyword';
      $dim['metrics'] = 'ga:entrances';
      $dim['segment'] = 'gaid::-5';
      $dim['sort'] = '-ga:entrances';
      $dim['max-results'] = 100;

      $keywords = $oAnalytics->getData($dim);

      $top_keywords = implode(', ', array_keys($keywords));

      return $top_keywords;
      
  } catch (Exception $e) { 

      echo 'Caught exception: ' . $e->getMessage(); 

  }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Google Analytics Keyworks Example</title>
    <meta http-equiv="refresh" content="1200">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body>

    <div class="container-fluid">

      <div class="row-fluid" id="keywords">
        <div class="span12">
          <div class="marquee"><?php echo $keywords; ?></div>
        </div>
      </div>

    </div><!--/.fluid-container-->

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.0.min.js"></script>
    <script src="js/jquery.marquee.js"></script>

    <script>
      $(function() {

        $('.marquee').marquee({  
            speed: 15000,
            gap: 50,
            delayBeforeStart: 0,
            direction: 'left'
        });

      });
    </script>

  </body>
</html>

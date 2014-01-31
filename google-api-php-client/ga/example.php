<?php
 
  // session_start for caching
  session_start();
  
  require 'analytics.class.php';
  
  try {
      
      // construct the class
      $oAnalytics = new analytics('tegan@bulubox.com', 'm0nd0w1g');
      
      // set it up to use caching
      $oAnalytics->useCache();
      
      //$oAnalytics->setProfileByName('[Google analytics accountname]');
      $oAnalytics->setProfileById('ga:57626978');
      
      // set the date range
      $oAnalytics->setMonth(date('n'), date('Y'));
      //$oAnalytics->setDateRange('2014-05-01', '2014-06-01');
      
      echo '<pre>';
      // print out visitors for given period
      //print_r($oAnalytics->getVisitors());
      
      // print out pageviews for given period
      //print_r($oAnalytics->getPageviews());
      
      // use dimensions and metrics for output
      // see: http://code.google.com/intl/nl/apis/analytics/docs/gdata/gdataReferenceDimensionsMetrics.html

      $dim = array();
      $dim['dimensions'] = 'ga:keyword';
      $dim['metrics'] = 'ga:entrances';
      $dim['segment'] = 'gaid::-5';
      $dim['sort'] = '-ga:entrances';
      $dim['max-results'] = 100;

      $keywords = $oAnalytics->getData($dim);

      foreach ($keywords as $key => $value) {
        if (strpos($key,'bulu') !== false || $key == '(not provided)' || is_numeric($key)) {
          unset($keywords[$key]);
        }
      }

      echo '<pre>';
      print_r($keywords);
      echo '</pre>';


      
  } catch (Exception $e) { 
      echo 'Caught exception: ' . $e->getMessage(); 
  }
?>
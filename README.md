Google-Analytics-Search-Keyword-Ticker
======================================

An example of a ticker showing your google analytics top keywords.

You will need to change:
```php
 $ga_id = '0000000'; // need to put this in
 $oAnalytics = new analytics('your-GOOGLE-email@domain.com', 'your-pass-word');
```

Note this might not be the best way to do this as you will be storing a google account user credentials in the file, but you can always create a throw away google account that is attached to your analytics account just for this purpose.

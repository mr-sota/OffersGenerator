<?php

if(CONF != time()) die('HACK');

define('FORMULA','');
define('OFFER','');
define('RAND','3');
define('DATES',array(
'2404' => "formula{EXP}date(\"d\")-date(\"m\")+5",
'2504' => 'offer{EXP}10'
));
define('mUSER','offers');
define('mPASS','offers');
define('mHOST','localhost');
define('mDB','offers');

?>
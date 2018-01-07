<?php
include("simple_html_dom.php");
$context = stream_context_create(array(
    'http' => array(
        'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
    ),
));

$html = file_get_html('https://www.fl.ru/projects/', false, $context);

foreach($html->find('a[class=b-post__link]') as $element) {
       echo $element->outertext . '<br>';
      
}
?>
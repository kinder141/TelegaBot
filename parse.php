<?php
include("simple_html_dom.php");
//parseFl();
function parseFl(){
$context = stream_context_create(array(
    'http' => array(
        'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
    ),
));
$link=array();
$linkname=array();
$resultlinkname=array();
for($i=1;$i<11;$i++){
    $html = file_get_html('https://www.fl.ru/projects/?page='.$i.'&kind=5', false, $context);
    foreach($html->find('a[class=b-post__link]') as $element) 
    {
       $link[]=$element->href ;
       $linkname[]=$element->innertext;
       $html = file_get_html('https://www.fl.ru'.$element->href, false, $context);
       if(!empty($html->find('a[href="/freelancers/razrabotka-sajtov/"]'))) 
       {
            
            $resultlinkname[]=$element->innertext;
            //echo '<a href=https://www.fl.ru'.$element->href.'>'.$element->innertext.'</a>'.'<br>';
       }

    }

//CountOrders($link,$context);
}
return $resultlinkname;
}
//listOfOrders($link,$context,$linkname);

//Вывод найденых заказов и ссылка на них
//function listOfOrders($link,$context,$linkname){
//    
//    for($i=0;$i<count($link);$i++){
//        $html = file_get_html('https://www.fl.ru'.$link[$i], false, $context);
//        
//        if(!empty($html->find('a[href="/freelancers/razrabotka-sajtov/"]')) {
//        
//         echo '<a href=https://www.fl.ru'.$link[$i].'>'.$linkname[$i].'</a>'.'<br>';
//       
//        }
//    }
//}



//Функция для отладки,показывает кол-во нужных заказов
function CountOrders($link,$context){
    $counter=0;
for($i=0;$i<count($link);$i++){
$html = file_get_html('https://www.fl.ru'.$link[$i], false, $context);


foreach($html->find('a[href="/freelancers/razrabotka-sajtov/"]') as $element) {
    if($element!='')
    $counter++;
       
}
   
}
 echo $counter;
}
?>


<!--<a href="/freelancers/razrabotka-sajtov/">Разработка сайтов</a>-->
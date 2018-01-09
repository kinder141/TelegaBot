<?php
include('vendor/autoload.php');
include('Bot.php');
include('parse.php');
//getMessage
$updates=null;
$telegramApi = new TelegramBot();
$updates = $telegramApi->getUpdates();
print_r($updates);
$start=true;
while($start){
sleep(2);
$updates = $telegramApi->getUpdates();
if($updates[0]->message->text=='/stop')
    {
    $start=false;
    //$updates[0]->message->text='/start';
    }
if($updates[0]->message->text=='/parse')
{
    $test=parseFl();
    var_dump($test);
    for($i=0;$i<count($test);$i++)
    {
     $telegramApi->sendMessage($updates[0]->message->chat->id,$test[$i]);
     }
}
print_r($updates);
foreach($updates as $update)
{
    $telegramApi->sendMessage($update->message->chat->id,'Alloha');
    
    
}
}
?>
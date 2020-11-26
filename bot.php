<?php
     

     if(!isset($argv[2])){
        echo "Username not specified. Usage: php script username \n";
        exit(1);
    }

    $username = $argv[2];

     if (!file_exists('madeline.php')){
         copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
     }
      
     include 'madeline.php';
      
      
      
     use \danog\MadelineProto\API;
      
      
     $api = new API('session.madeline');
      
     $api->async(true);
      
     
     
     $api->loop(function() use ($api, $username){
         yield $api->start();
         
         yield $api->messages->sendMessage(['peer' => $username, 'message' => 'Hello from MadelineProto']);
     });
 
 
 
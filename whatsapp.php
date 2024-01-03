
<?php
     $number = "393389059848"; //you can use POST, I tried GET for testing
     $template = array(
       'name'=>'hello_world', //your your own or any default template. The names and samples are listed under message templates
       'language'=>array('code'=>'en_us') //you can use yours
       );

     $endpoint = 'https://graph.facebook.com/v17.0/107783365709415/messages';
     $params = array('messaging_product'=>'whatsapp', 'to'=>$number, 'type'=>'template', 'from'=>'39098589206', 'access_token'=>'EAAyJbjO0WqABAKDGb05j7wsQFTMN30KKg8IfHHjhOuZAd5ZAGiMls6TbCCN9ujK2benhZCsnKXe0UNXd1ZBTjwjw6ZB8Aa1NdZAyFdJ1vkUFCaf3Vxvx1mfhs1gZAI54AWe9v9jPZBTk460EqLIrjWE0P6MVml7mOTUBZAyYuTrDrucjuEFElM8gMZA0N0qaIKunujscvBYy6s1kO932ou9W5B','template'=>json_encode($template));

       $headers = array('Authorization'=>'Bearer EAAyJbjO0WqABAKDGb05j7wsQFTMN30KKg8IfHHjhOuZAd5ZAGiMls6TbCCN9ujK2benhZCsnKXe0UNXd1ZBTjwjw6ZB8Aa1NdZAyFdJ1vkUFCaf3Vxvx1mfhs1gZAI54AWe9v9jPZBTk460EqLIrjWE0P6MVml7mOTUBZAyYuTrDrucjuEFElM8gMZA0N0qaIKunujscvBYy6s1kO932ou9W5B','Content-Type'=>'application/json', 'User-Agent'=>'(Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
       $url = $endpoint . '?' . http_build_query($params);
  //echo $params.'<br>';
       $ch = curl_init();
       curl_setopt( $ch,CURLOPT_URL, $endpoint);
       curl_setopt( $ch,CURLOPT_POST, true );
       curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
       curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
       curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
       curl_setopt( $ch,CURLOPT_POSTFIELDS, $params);
       $result = curl_exec($ch );
       echo $result; //you can skip this, I did it to check the results
       curl_close( $ch );


?>
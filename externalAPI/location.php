<?php
    if(isset($_POST['function']) && $_POST['function'] == "get_cur_location" && isset($_POST['lat']) && isset($_POST['long']))
    {
      $data =  array();
      $curl = curl_init('https://us1.locationiq.com/v1/reverse.php?key=9ec67c6624cc69&lat='.$_POST['lat'].'&lon='.$_POST['long'].'&format=json');

        curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER    =>  true,
          CURLOPT_FOLLOWLOCATION    =>  true,
          CURLOPT_MAXREDIRS         =>  10,
          CURLOPT_TIMEOUT           =>  30,
          CURLOPT_CUSTOMREQUEST     =>  'GET',
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $a_r = json_decode($response,true);
        //var_dump($a_r['address']['']);
        curl_close($curl);
        
        if ($err) {
          $data['msg'] = "cURL Error #:" . $err;
        } else {
          $data['data']= $a_r['address']['postcode'].', '.$a_r['address']['state'].', '.$a_r['address']['country'];
         // echo $response;
          
        }
        echo json_encode($data);
    }
?>
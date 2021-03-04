<?php

// echo hexdec(uniqid()) . "<br>";

// function generate_uuid() {
//     return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
//         mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
//         mt_rand( 0, 0xffff ),
//         mt_rand( 0, 0x0C2f ) | 0x4000,
//         mt_rand( 0, 0x3fff ) | 0x8000,
//         mt_rand( 0, 0x2Aff ), mt_rand( 0, 0xffD3 ), mt_rand( 0, 0xff4B )
//     );

// }

// echo $transationID = generate_uuid();

// function randomNumber($length){
//     $numbers = range(0,9);
//     $digits = '';
//     shuffle($numbers);
//     for($i = 0;$i < $length;$i++)
//        $digits .= $numbers[$i];
//     return $digits;
// }

// //generate random number
// echo $randomNum=randomNumber(10);

// $uniqueId= time().'-'.mt_rand();
// echo $uniqueId;

// $today = date("Ymd");
// $rand = strtoupper(substr(uniqid(sha1("axel septian")), 0,4));
// echo $unique = 'ADTR' . $today . $rand;
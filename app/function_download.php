<?php
//Membuat fungsi random_karakter() dengan Hurup dan Angka secara acak
function random_karakter()
{
    $karakter = array('a', 'A', 'b', 'B', 'c', 'C', 'd', 'D', 'e', 'E', 'f', 'F', 'g', 'G', 'h', 'H', 'i', 'I', 'j', 'J', 'k', 'K', 'l', 'L', 'm', 'M', 'n', 'N', 'o', 'O', 'p', 'P', 'q', 'Q', 'r', 'R', 's', 'S', 't', 'T', 'u', 'U', 'v', 'V', 'w', 'W', 'x', 'X', 'y', 'Y', 'z', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
    $max = (count($karakter) - 1);
    srand(((float)microtime() * 1000000));
    $kar1 = $karakter[rand(0, $max)];
    $kar2 = $karakter[rand(0, $max)];
    $kar3 = $karakter[rand(0, $max)];
    $kar4 = $karakter[rand(0, $max)];
    $kar5 = $karakter[rand(0, $max)];
    $kar6 = $karakter[rand(0, $max)];
    $kar7 = $karakter[rand(0, $max)];
    $kar8 = $karakter[rand(0, $max)];
    $kar9 = $karakter[rand(0, $max)];
    //Anda bisa menambahkan variabe nya seperti $kar10 dan seterusnya
    $random_karakter = $kar1 . $kar2 . $kar3 . $kar4 . $kar5 . $kar6 . $kar7 . $kar8 . $kar9;
    return $random_karakter;
}
//Membuat fungsi decode_url() untuk memecah dan menerjemahkan Request URL
function decode_url($isi)
{
    $explode_1 = explode('?', $isi);
    $explode_2 = $explode_1[1];
    $explode_3 = explode('&', base64_decode($explode_2));
    for ($i = 0; $i <= count($explode_3) - 1; $i++) {
        $explode_4 = explode('=', $explode_3[$i]);
        $decode_url[$explode_4[0]] = $explode_4[1];
    }
    return $decode_url;
}

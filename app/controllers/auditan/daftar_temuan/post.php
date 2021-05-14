<?php
    include 'app/controllers/auditan/daftar_temuan/function.php';
    include 'app/controllers/auditan/penilaian/function_penilaian.php';
    include 'app/flash_message.php';
    if(isset($_POST['submit_nilai'])){
        $id_penugasan = $_POST['id_penugasan'];
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $q5 = $_POST['q5'];
        $q6 = $_POST['q6'];
        $q7 = $_POST['q7'];
        $q8 = $_POST['q8'];
        $q9 = $_POST['q9'];
        $q10 = $_POST['q10'];
        $q11 = $_POST['q11'];
        $q12 = $_POST['q12'];
        $q13 = $_POST['q13'];
        $q14 = $_POST['q14'];
        $q15 = $_POST['q15'];
        $q16 = $_POST['q16'];
        $q17 = $_POST['q17'];
        $q18 = $_POST['q18'];
        $q19 = $_POST['q19'];
        $q20 = $_POST['q20'];
        $tgl = date('Y-m-d');
        $ic = $q6/100*100;
        $te = ($q5/100*50)+($q8/100*50);
        $er = ($q4/100*25)+($q7/100*25)+($q10/100*25)+($q13/100*25);
        $il = $q14/100*100;
        $om = $q16/100*100;
        $ct = $q17/100*100;
        $dc = ($q2/100*20)+($q3/100*20)+($q9/100*20)+($q15/100*20)+($q18/100*20);
        $rf = $q19/100*100;
        $ir = ($q1/100*25)+($q11/100*25)+($q12/100*25)+($q20/100*25);
        $trad = ($ic+$te+$er+$il+$om+$ct+$dc+$rf+$ir)/900*100;

        $sya = ($q1/100*50)+($q2/100*50);
        $bia = $q4/100*100;
        $wak = $q5/100*100;
        $kom = ($q8/100*50)+($q9/100*50);
        $psm = $q20/100*100;
        $per = ($q11/100*25)+($q12/100*25)+($q13/100*25)+($q14/100*25);
        $pro = ($q6/100*20)+($q7/100*20)+($q17/100*20)+($q18/100*20)+($q19/100*20);
        $sar = $q10/100*100;
        $smp = ($q3/100*33.33)+($q15/100*33.33)+($q16/100*33.33);
        $pnrb = ($sya+$bia+$wak+$kom+$psm+$per+$pro+$sar+$smp)/900*100;

        $prf = ($q2/100*14.29)+($q5/100*14.29)+($q6/100*14.29)+($q8/100*14.29)+($q10/100*14.29)+($q14/100*14.29)+($q18/100*14.29);
        $itg = ($q4/100*33.33)+($q7/100*33.33)+($q13/100*33.33);
        $orp = ($q1/100*16.67)+($q3/100*16.67)+($q15/100*16.67)+($q16/100*16.67)+($q19/100*16.67)+($q20/100*16.67);
        $nur = ($q9/100*50)+($q11/100*50);
        $ind = $q12/100*100;
        $res = $q17/100*100;
        $pion = ($prf+$itg+$orp+$nur+$ind+$res)/600*100;

        $simpan_nilai = $mysqli->query("INSERT INTO penilaian VALUES ('','$id_penugasan','$tgl','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$ic','$te','$er','$il','$om','$ct','$dc','$rf','$ir','$trad','$sya','$bia','$wak','$kom','$psm','$per','$pro','$sar','$smp','$pnrb','$prf','$itg','$orp','$nur','$ind','$res','$pion')");
        flash('msg_selesai','Penilaian Selesai');
    }
   

?>
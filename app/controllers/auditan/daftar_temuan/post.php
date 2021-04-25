<?php
    include 'app/controllers/auditan/daftar_temuan/function.php';
    include 'app/controllers/auditan/penilaian/function_penilaian.php';
    include 'app/flash_message.php';

    if(isset($_POST['persiapan'])){
        $id_penugasan = $_POST['id_penugasan'];
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];

        $persiapan = $mysqli->query("INSERT INTO penilaian (id_penilaian,id_penugasan,q1,q2,q3,q4) VALUES('','$id_penugasan','$q1','$q2','$q3','$q4')");
        flash("msg_persiapan","Nilai Tahap Persiapan Telah Diinput");
    }
    if(isset($_POST['pelaksanaan'])){
        $id_penugasan = $_POST['id_penugasan'];
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

        $pelaksanaan = $mysqli->query("UPDATE penilaian SET q5='$q5',q6='$q6',q7='$q7',q8='$q8',q9='$q9',q10='$q10',q11='$q11',q12='$q12',q13='$q13',q14='$q14' WHERE id_penugasan = '$id_penugasan'");
        flash("msg_pelaksanaan","Nilai Tahap Pelaksanaan Telah Diinput");
    }
    if(isset($_POST['penyelesaian'])){
        $id_penugasan = $_POST['id_penugasan'];
        $q15 = $_POST['q15'];
        $q16 = $_POST['q16'];
        $q17 = $_POST['q17'];
        $q18 = $_POST['q18'];
        $q19 = $_POST['q19'];
        $q20 = $_POST['q20'];

        $penyelesaian = $mysqli->query("UPDATE penilaian SET q15='$q15',q16='$q16',q17='$q17',q18='$q18',q19='$q19',q20='$q20' WHERE id_penugasan='$id_penugasan'");

        $result = $mysqli->query("SELECT * FROM penilaian WHERE id_penugasan = '$id_penugasan'");
        $row = mysqli_fetch_assoc($result);

        $x1 = $row['q1'];
        $x2 = $row['q2'];
        $x3 = $row['q3'];
        $x4 = $row['q4'];
        $x5 = $row['q5'];
        $x6 = $row['q6'];
        $x7 = $row['q7'];
        $x8 = $row['q8'];
        $x9 = $row['q9'];
        $x10 = $row['q10'];
        $x11 = $row['q11'];
        $x12 = $row['q12'];
        $x13 = $row['q13'];
        $x14 = $row['q14'];
        $x15 = $row['q15'];
        $x16 = $row['q16'];
        $x17 = $row['q17'];
        $x18 = $row['q18'];
        $x19 = $row['q19'];
        $x20 = $row['q20'];

        $ic = $x6/100*100;
        $te = ($x5/100*50)+($x8/100*50);
        $er = ($x4/100*25)+($x7/100*25)+($x10/100*25)+($x13/100*25);
        $il = $x14/100*100;
        $om = $x16/100*100;
        $ct = $x17/100*100;
        $dc = ($x2/100*20)+($x3/100*20)+($x9/100*20)+($x15/100*20)+($x18/100*20);
        $rf = $x19/100*100;
        $ir = ($x1/100*25)+($x11/100*25)+($x12/100*25)+($x20/100*25);
        $trad = ($ic+$te+$er+$il+$om+$ct+$dc+$rf+$ir)/900*100;

        $sya = ($x1/100*50)+($x2/100*50);
        $bia = $x4/100*100;
        $wak = $x5/100*100;
        $kom = ($x8/100*50)+($x9/100*50);
        $psm = $x20/100*100;
        $per = ($x11/100*25)+($x12/100*25)+($x13/100*25)+($x14/100*25);
        $pro = ($x6/100*20)+($x7/100*20)+($x17/100*20)+($x18/100*20)+($x19/100*20);
        $sar = $x10/100*100;
        $smp = ($x3/100*33.33)+($x15/100*33.33)+($x16/100*33.33);
        $pnrb = ($sya+$bia+$wak+$kom+$psm+$per+$pro+$sar+$smp)/900*100;

        $prf = ($x2/100*14.29)+($x5/100*14.29)+($x6/100*14.29)+($x8/100*14.29)+($x10/100*14.29)+($x14/100*14.29)+($x18/100*14.29);
        $itg = ($x4/100*33.33)+($x7/100*33.33)+($x13/100*33.33);
        $orp = ($x1/100*16.67)+($x3/100*16.67)+($x15/100*16.67)+($x16/100*16.67)+($x19/100*16.67)+($x20/100*16.67);
        $nur = ($x9/100*50)+($x11/100*50);
        $ind = $x12/100*100;
        $res = $x17/100*100;
        $pion = ($prf+$itg+$orp+$nur+$ind+$res)/600*100;
        $tgl = date('Y-m-d');
        $nilai = $mysqli->query("UPDATE penilaian SET
        tgl_nilai='$tgl', 
        ic='$ic',
        te='$te',
        er='$er',
        il='$il',
        om='$om',
        ct='$ct',
        dc='$dc',
        rf='$rf',
        ir='$ir',
        trad='$trad',
        sya='$sya',
        bia='$bia',
        wak='$wak',
        kom='$kom',
        psm='$psm',
        per='$per',
        pro='$pro',
        sar='$sar',
        smp='$smp',
        pnrb='$pnrb',
        prf='$prf',
        itg='$itg',
        orp='$orp',
        nur='$nur',
        ind='$ind',
        res='$res',
        pion='$pion' WHERE id_penugasan='$id_penugasan'");

        flash('msg_selesai','Penilaian Selesai');
    }

?>
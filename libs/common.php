<?php
function sendEmail($receiverEmail = array(), $subjectText, $bodyText, $msg_type = 'html') {
    $result = false;

    try {
        $transport = Swift_SmtpTransport::newInstance(SMTP_HOST, SMTP_PORT, 'ssl');
        $transport->setUsername(SMTP_EMAIL_USERNAME);
        $transport->setPassword(SMTP_EMAIL_PASSWORD);

        $message = Swift_Message::newInstance();
        $message->setSubject($subjectText);
        $message->setFrom(array(SENDER_EMAIL => SENDER_NAME));
        $message->setTo($receiverEmail);
        $message->setBody($bodyText, $msg_type == 'html' ? 'text/html' : 'text/plain');

        $mailer = Swift_Mailer::newInstance($transport);
        $result = $mailer->send($message);

    } catch (Swift_TransportException $e) {
        $result = false;
    }

    return $result;
}

function scriptFileName() {
    $fxpld = explode('/',$_SERVER['SCRIPT_NAME']);
    return $fxpld[2];
}

function getMonthINA() {
    $month = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );
    
    return $month;
}

function getDayINA() {
    $day = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' =>'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    
    return $day;
}

/*
 translateDate('2009-07-11 00:00:00') --> Sabtu, 11 Juli 2009
*/
function translateDate($date,$show_dayofmonth = false) {
    $split_date = explode(" ",$date);

    if (sizeof($split_date)>1) {
        $tanggal = explode("-",$split_date[0]);
        $waktu = " - ".$split_date[1];

    } else {
        $tanggal = explode("-",$split_date[0]);
        $waktu="";
    }

    $year = $tanggal[0];
    $month = $tanggal[1];
    $day = $tanggal[2];

    $inaday = getDayINA();
    $inamonth = getMonthINA();

    if ($show_dayofmonth) {
        $dayofmonth = date('l',mktime(0,0,0,$month,$day,$year));
        $translated_date = $inaday[$dayofmonth].", ".$day." ".$inamonth[$month]." ".$year;
    } else {
        $translated_date = $day." ".$inamonth[$month]." ".$year.$waktu;
    }
    
    return $translated_date;
}

function writeToFile($filename,$contents) {
    /* open and write file */
    if (!$handle = fopen($filename,'w+')) {
        echo "Can not open file";
        exit;
    }

    if (!fwrite($handle,$contents)) {
        echo "Can not writing to file";
    }

    fclose($handle);
}

function removeOneLastChar($str) {
    $str = substr($str,0,strlen($str)-1);
    return $str;
}

function pr($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function form_action($request_target, $params = null)
{
    return "?q={$request_target}&{$params}";
}

function redirect($location)
{
    return header("Location:index.php?q={$location}");
}

function add_javascript($js = array())
{
    $GLOBALS['__additional_javascripts'] = $js;
}
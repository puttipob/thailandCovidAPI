<?php
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //ที่มาของ API ข้อมูล
    curl_setopt($ch, CURLOPT_URL,"https://covid19.th-stat.com/api/open/today");

    $result=curl_exec($ch);

    curl_close($ch);

    $ApiCovid= json_decode($result, true);

    //ประกาศตัวแปรแยกเป็นแต่ละคอลัมภ์
    $Confirmed = $ApiCovid['Confirmed'] ; 
    $Recovered = $ApiCovid['Recovered'] ;
    $Hospitalized = $ApiCovid['Hospitalized'] ;
    $Deaths = $ApiCovid['Deaths'] ;
    $NewConfirmed = $ApiCovid['NewConfirmed'] ;
    $NewRecovered = $ApiCovid['NewRecovered'] ;
    $NewHospitalized = $ApiCovid['NewHospitalized'] ;
    $NewDeaths = $ApiCovid['NewDeaths'] ;
    $UpdateDate = $ApiCovid['UpdateDate'] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid</title>
</head>
<body>
    <!-- HTML + CSS -->
    <section class="container">
        <div class="block">
            <h1>Covid-19 Situation Reports</h1>
        </div>
        <div class="row">
            <div class="in-block-head">
                <img src="Images/date.png" alt="" width="100px" height="100px">
                <div>
                    <h2>อัพเดทข้อมูลประจำ : <?php echo $UpdateDate; ?>น.</h3> 
                    <span>จำนวนผู้ติดเชื้อเพิ่ม : <?php echo $NewConfirmed; ?></span><br>
                    <span>ราย จำนวนผู้ป่วยที่รักษาหายเพิ่ม : <?php echo $NewRecovered; ?></span><br>
                    <span>ราย และจำนวนผู้เสียชีวิตเพิ่ม : <?php echo $NewDeaths; ?> ราย</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="block-details">
                <img src="Images/virus.png" alt="" width="100px" height="100px">
                <h3>จำนวนผู้ติดเชื้อ : <?php echo $Confirmed; ?></h3>
                <p>เพิ่มขึ้นวันนี้ : <?php echo $NewConfirmed; ?></p>
            </div>
            <div class="block-details">
                <img src="Images/infection.png" alt="" width="100px" height="100px">
                <h3>ผู้ป่วย : <?php echo $Hospitalized; ?></h3>
                <p>เพิ่มขึ้นวันนี้ : <?php echo $NewHospitalized; ?></p>
            </div>
            <div class="block-details">
                <img src="Images/vaccine.png" alt="" width="100px" height="100px">
                <h3>รักษาหาย : <?php echo $Recovered; ?></h3>
                <p>เพิ่มขึ้นวันนี้ : <?php echo $NewRecovered; ?></p>
            </div>
            <div class="block-details">
                <img src="Images/skull.png" alt="" width="100px" height="100px">
                <h3>ผู้เสียชีวิต : <?php echo $Deaths; ?></h3>
                <p>เพิ่มขึ้นวันนี้ : <?php echo $NewDeaths; ?></p>
            </div>
        </div>
    </section>
    <div class="footer">
        <p>Data By กรมควบคุมโรค กระทรวงสาธารณสุข ทีมงาน TH-STAT.com และกลุ่ม TCDG</p>
    </div>
</body>
</html>

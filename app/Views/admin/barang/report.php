<html lang="en">
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$hariIni = tgl_indo(date('Y-m-d'));
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table align="center" style="border: 0px;">
        <tr>
            <td>
                <!-- <img src="#" width="80" height="80" alt=""> -->
            </td>
            <td>

                <center>
                    <font size="5"><b>PT. Indonesia Maju Jaya</b></font><br>
                    <font size="2"><i>JL. Jend. Ahmad Yani No.01 Telp/ Fax. ( 0548 ) 3551507 Kode Pos 7531</i></font><br>
                    <font size="2">BONTANG, KALIMANTAN TIMUR</font><br>
                </center>
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
    </table>
    <style>
        body {
            color: #333;
            text-align: left;
            font-size: 15px;
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;

        }

        .container {
            margin: 0 auto;
            margin-top: 35px;
            padding: 40px;
            width: auto;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .table-invoice {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: auto;
        }

        td.table-invoice,
        tr.table-invoice,
        th.table-invoice {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th.table-invoice {
            background-color: #f0f0f0;
        }

        .judul {
            text-align: center;
        }

        h4,
        p {
            margin: 0px;
        }
    </style>
</head>

<body>
    <h1>KONTRAK PENGERJAAN PROYEK</h1>

    <p>Perjanjian ini "<?= $proyek->judul ?>" dibuat pada <?php echo $hariIni ?>, antara:</p>

    <h2>Pihak Pertama: PT. Indonesia Maju Jaya</h2>
    <address>
        JL. Jend. Ahmad Yani No.01<br>
        Bontang, Kalimantan Timur<br>
        Telepon: ( 0548 ) 3551507<br>
    </address>

    <h2>Pihak Kedua: <?= $proyek->instansi ?></h2>
    <address>
        <?= $proyek->alamat ?><br>
        <?= $proyek->kota ?>, <?= $proyek->provinsi ?><br>
        Telepon: <?= $proyek->kontak ?><br>
    </address>

    <p><strong>1. Deskripsi Proyek:</strong></p>
    <p>Pihak Pertama menugaskan Pihak Kedua untuk melakukan pengerjaan proyek dengan deskripsi sebagai berikut: <?= $proyek->desc ?>.</p>

    <p><strong>2. Pekerja:</strong></p>
    <p>Pekerjaan yang akan dilakukan oleh Pihak Kedua melibatkan : <br>
        <?php foreach ($karyawan as $key => $data) { ?>
            <?= $key + 1 ?> <?= $data->nama ?> (<?= $data->nip ?>)
            <br>
        <?php } ?>
    </p>

    <p><strong>3. Biaya dan Pembayaran:</strong></p>
    <p>Pihak Pertama setuju untuk membayar Pihak Kedua sejumlah total <b> <?php echo "Rp " . number_format($proyek->biaya, 2, ',', '.'); ?></b> </p>

    <p><strong>4. Waktu Penyelesaian:</strong></p>
    <p>Pekerjaan ini dimulai tanggal <b><?= $proyek->start ?></b>, dan harus diselesaikan pada atau sebelum <b><?= $proyek->end ?></b>. Keterlambatan dalam penyelesaian proyek dapat mengakibatkan denda</p>

    <p>Demikianlah kontrak ini dibuat dan ditandatangani oleh kedua belah pihak pada tanggal yang disebutkan di atas.</p>

    <p align="center">
        PT. Indonesia Maju Jaya<br>
        <br><br><br><br><br>
        Tanggal: <?php echo $hariIni ?>
    </p>
    <br>
    <p align="center">
        <?= $proyek->instansi ?><br>
        <br><br><br><br><br>
        Tanggal: <?php echo $hariIni ?>
    </p>
</body>

</html>
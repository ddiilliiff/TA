<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="" rel="stylesheet" />
   <title>Laporan</title>

   <style>
   .kop {
      text-align: center;
      line-height: 0.8;
   }

   .isi {
      text-align: cneter;
   }
   </style>
</head>

<body>
   <div class="kop">
      <h3>DEWAN PERWAKILAN RAKYAT DAERAH</h3>
      <h3>KABUPATEN KEEROM</h3>
      <p style="font-style:italic;border-bottom: 3px double black;font-size:9px;">Jl.Trans Papua, No.Telp/E-Mail:
         .......,
         Arso–Keerom-Papua, Kode Pos 99468</p>
      <div class="isi">
         <h3>LAPORAN</h3>
         <p>Hari/Tanggal : <?php echo \App\Helpers\MyHelper::formatTanggalIndonesia(date('Y-m-d')); ?></p>
         <p>Laporan SK Terbit dan Jumlah Sidang yang telah dilakukan.</p>
      </div>
   </div>
   <div>
      JUMLAH SK : <?php echo count($sk); ?> SK Telah Terbit<br>
      JUMLAH SIDANG : <?php echo count($sidang); ?> Sidang Telah dilakukan
   </div>



</body>

</html>
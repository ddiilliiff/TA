<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link href="" rel="stylesheet" />
   <style>
   table {
      border-collapse: collapse;
      width: 215%;
      max-height: 10%;
      padding-bottom: 10px;
   }

   td {
      border: 1px solid white;
      padding: 1px;
   }

   .top-left {
      vertical-align: top;
      text-align: left;
      font-style: bold;
   }

   .kop {
      text-align: center;
      line-height: 0.8;
   }

   .isi {
      text-align: center;
      line-height: 0.8;
      position: relative;
      top: -20px;
   }

   .ttd {
      line-height: 0.8;
      border: 1px solid black;
      float: left;
      height: 150pt;
      width: 150pt;
      margin: 40px;
   }
   </style>
   <title>SK</title>
</head>

<body>
   <div class="kop">
      <h3>PIMPINAN DEWAN PERWAKILAN RAKYAT</h3>
      <h3>KABUPATEN KEEROM</h3>
      <h3>PROVINSI PAPUA</h3>
      <p style="font-style:italic;border-bottom: 3px double black;">Jl.Trans Papua, No.Telp/E-Mail: .......,
         Arso–Keerom-Papua, Kode Pos 99468</p>
   </div>

   <div class="isi">
      <h3>KEPUTUSAN</h3>
      <h3>DEWAN PERWAKILAN RAKYAT DAERAH</h3>
      <h3>KABUPATEN KEEROM</h3>
      <h3>NOMOR <?php echo $info[0]['nomor']; ?> TAHUN <?php echo $info[0]['tahun']; ?></h3>
      <div class="isi">
         <h3>TENTANG</h3>
         <h3><?php echo $info[0]['judul']; ?></h3>
         <div class="isi">
            <h3>DENGAN RAHMAT TUHAN YANG MAHA ESA</h3>
            <div class="isi">
               <h3>PIMPINAN DEWAN PERWAKILAN RAKYAT DAERAH</h3>
               <h3>KABUPATEN KEEROM</h3>
            </div>
         </div>
      </div>
   </div>

   <table>
      <?php foreach ($menimbang as $key => $row) { ?>
      <tr>
         <?php if ($key === 0) { ?>
         <td class="top-left" width="10%" rowspan="<?php echo count($menimbang); ?>">Menimbang :</td>
         <?php } ?>
         <td class="top-left" width="3%"><?php echo $row['nomor']; ?>.</td>
         <td style="text-align: justify;"><?php echo $row['isi']; ?></td>
      </tr>
      <?php } ?>
   </table>
   <table class="after-table">
      <?php foreach ($mengingat as $key => $row) { ?>
      <tr>
         <?php if ($key === 0) { ?>
         <td class="top-left" width="10%" rowspan="<?php echo count($mengingat); ?>">Mengingat :</td>
         <?php } ?>
         <td class="top-left" width="3%"><?php echo $row['nomor']; ?>.</td>
         <td style="text-align: justify;"><?php echo $row['isi']; ?></td>
      </tr>
      <?php } ?>
   </table>
   <table>
      <?php foreach ($memperhatikan as $key => $row) { ?>
      <tr>
         <?php if ($key === 0) { ?>
         <td class="top-left" width="10%" rowspan="<?php echo count($memperhatikan); ?>">Memperhatikan :</td>
         <?php } ?>
         <td width="2%"><?php echo $row['nomor']; ?>.</td>
         <td style="text-align: justify;"><?php echo $row['isi']; ?></td>
      </tr>
      <?php } ?>
   </table>

   <div style="text-align: center;">
      <p style="font-style:bold;">MEMUTUSKAN :</p>
   </div>
   <!-- Memutuskan -->
   <table>
      <tr>
         <td style="font-style:bold;">Menetapkan :</td>
         <td></td>
         <td></td>
      </tr>
      <?php foreach ($memutuskan as $key => $row) { ?>
      <tr>
         <?php if ($key === 0) { ?>
         <td class="top-left" width="10%" rowspan="<?php echo count($memutuskan); ?>">Memutuskan :</td>
         <?php } ?>
         <td width="3%"><?php echo $row['nomor']; ?>.</td>
         <td style="text-align: justify;"><?php echo $row['isi']; ?></td>
      </tr>
      <?php } ?>
   </table>

   <div></div>
   <table style="margin-top:100px;postion:absolute;">
      <tr style="height:200px;">
         <td class="top-left" width="10%"></td>
         <td class="top-left" width="14%"></td>
         <td class="top-left" width="22%" style="line-height:0.8;">
            <p style="margin-left:10px;"> Ditetapkan di Arso</p>
            <p> Pada tanggal <?php echo \App\Helpers\MyHelper::formatTanggal($info[0]['tanggal']); ?></p>
            <div style="text-align:center;line-height:0.5;">
               <p>DEWAN PERWAKILAN RAKYAT DAERAH</p>
               <p>KABUPATEN KEEROM</p>
               <p>KETUA,</p>
               <div id="qr-code-container">
                  <img
                     src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?php echo 'JUDUL : '.$info[0]['judul'].'. NOMOR SK: '.$info[0]['nomor'].'. TAHUN :'.$info[0]['tahun'].'. TANGGAL DITETAPKAN : '.$info[0]['tanggal']; ?>"
                     alt="Tanda Tangan">
               </div>
               <p>BAMBANG MUJIONO, SE</p>
            </div>
         </td>
      </tr>
   </table>
</body>

</html>
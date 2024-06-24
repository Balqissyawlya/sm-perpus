<?php
//menyisipkan koneksi dan skrip
include 'koneksi.php';
include 'buku_skrip.php';
?>

<?php
// Menampilkan DATA BUKU
if (empty($_GET['aksi'])){ 
  $no=1;
  $lihat=$mysqli->query("SELECT * FROM buku Order By kode_buku");
  $jml_data= $lihat->num_rows;
?>
  <h3 align="center">
  <img class="gambar_menu" src="ikon/buku.png" align="absmiddle" />
  DATA BUKU</h3>
  <table border="0" class="ISBN" align="center">
   <tr class="ISBN" align="center">
    <td class="nomor">No</td>
    <td class="data">ISBN</td>
    <td class="data">Judul Buku</td>
    <td class="data">Opsi</td>
    <td width="15">&nbsp;</td>
   </tr>
  </table>

  <div class="data">
  <table border="0" class="data" align="center">
  <?php while ($l= $lihat->fetch_array()){ ?>	
   <tr class="data">
    <td class="nomor"><?php echo"$no";?></td>
    <td class="data"><?php echo"$l[ISBN]";?> 
    <img src="ikon/detail_kosong.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=buku&opsi=deskripsi&id=<?php echo"$l[kode_buku]"; ?>">Desk</a>
    </td>
    <td class="data">
	<?php echo"$l[judul]";	?></td>
    <td class="data" align="center">
    
    <img src="ikon/ubah.png" width="20" height="20" 
    	 align="absmiddle" />
	<a href="?halaman=buku&opsi=ubah&id=<?php echo"$l[kode_buku]"; ?>">
	Ubah</a> | 
	<img src="ikon/hapus.png" width="20" height="20"
    	 align="absmiddle" /> 
	<a href="?halaman=buku&skrip=hapus&id=<?php echo"$l[kode_buku]";?>" 
   	   onClick="return hapus();">
	Hapus</a>
	</td>
   </tr>
   <?php $no++; }	?>
  </table>
  </div>

  <table border="0" class="status" align="center">
   <tr>
    <td width="200">Jumlah : <?php echo"$jml_data";?> buku</td>
    <td align="center" class="data">
    <a href="?halaman=buku&opsi=tambah">
    <img src="ikon/tambah.png" width="20" height="20" 
    	 align="absmiddle" />
	Tambah</a> | 
	<a href="?halaman=buku&opsi=ekspor">
	<img src="ikon/ekspor.png" width="20" height="20" 
    	 align="absmiddle" />
	Ekspor</a>
    </td>
   </tr>
  </table>
  <br>
<?php }	?>

<?php
// Form Untuk Menambahkan buku Baru
if (isset($_GET['opsi']) && $_GET['opsi'] == 'tambah'){ ?>
<form action="?halaman=buku&skrip=tambah" method="post" name="tambah_buku">
  <table border="0" align="center">
   <tr>
	<td>ISBN</td>
	<td><input type="text" name="ISBN" placeholder="ISBN"></td>
   </tr>
   <tr>
	<td>Judul Buku</td>
	<td><input type="text" name="judul" placeholder="Judul buku"></td>
   </tr>
   <tr>
     <td>Tanggal Entri</td>
     <td><input type="text" name="tgl_entri" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.tambah_buku.tgl_entri);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="kalender/kalender.png" width="34" height="29" border="0" alt=""></a></td>
   </tr>
   <tr>
	<td>Jenis Buku</td>
	<td><select name="kode_jenis">
      <?php
       $jenis=$mysqli->query("SELECT * FROM jenis_buku Order By nama_jenis ASC");
	   while ($j= $jenis->fetch_array()){
	   ?>
      <option value="<?php echo"$j[kode_jenis]"; ?>"><?php echo"$j[nama_jenis]"; ?></option>
      <?php } ?>
    </select></td>
   </tr>
   <tr>
     <td>Penulis</td>
     <td><select name="kode_penulis">
       <?php
       $penulis=$mysqli->query("SELECT * FROM penulis Order By nama_penulis ASC");
	   while ($ps=$penulis->fetch_array()){
	   ?>
       <option value="<?php echo"$ps[kode_penulis]"; ?>"><?php echo"$ps[nama_penulis]"; ?></option>
       <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Penerbit</td>
     <td><select name="kode_penerbit">
       <?php
       $penerbit=$mysqli->query("SELECT * FROM penerbit Order By nama_penerbit ASC");
	   while ($pb=$penerbit->fetch_array()){
	   ?>
       <option value="<?php echo"$pb[kode_penerbit]"; ?>"><?php echo"$pb[nama_penerbit]"; ?></option>
       <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Tahun Terbit</td>
     <td><input name="tahun_terbit" type="text" size="4" maxlength="4" placeholder="Tahun" /></td>
   </tr>
   <tr>
     <td>Jumlah Buku</td>
     <td><input name="jumlah_buku" type="text" size="4" maxlength="3" placeholder="Jumlah" /></td>
   </tr>
   <tr>
	<td>Nomor Rak</td>
	<td><input name="nomor_rak" type="text" size="4" maxlength="3" placeholder="Rak" /></td>
   </tr>
   <tr>
	<td colspan="2">
	<input type="submit" value="Buat Baru">
	<input type="button" value="Batal" onclick="self.history.back();">	</td>
   </tr>
  </table>
   <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } ?>

<?php
// Form Untuk Mengubah DATA BUKU
if (isset($_GET['opsi']) && $_GET['opsi'] == 'ubah'){
 $ubah=$mysqli->query("SELECT * FROM buku WHERE kode_buku='$_GET[id]'");
 while ($u=$ubah->fetch_array()){ ?>
 <form action="?halaman=buku&skrip=ubah" method="post" name="ubah_buku">
  <table border="0" align="center">
   <input type="hidden" name="id" value="<?php echo"$u[kode_buku]"; ?>">
   <tr>
     <td>ISBN</td>
     <td><input type="text" name="ISBN" value="<?php echo"$u[ISBN]"; ?>" placeholder="ISBN" /></td>
   </tr>
   <tr>
     <td>Judul Buku</td>
     <td><input type="text" name="judul" value="<?php echo"$u[judul]"; ?>" placeholder="Judul buku" /></td>
   </tr>
   <tr>
     <td>Tanggal Entri</td>
     <td><input type="text" name="tgl_entri" value="<?php echo"$u[tgl_entri]"; ?>" id="id_buku" placeholder="Tahun-Bulan-Tanggal"/>
       <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.ubah_buku.tgl_entri);return false;" ><img src="kalender/kalender.png" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" style="border:none" /></a></td>
   </tr>
   <tr>
     <td>Jenis Buku</td>
     <td><select name="kode_jenis">
         <?php
       $jenis=$mysqli->query("SELECT * FROM jenis_buku Order By nama_jenis ASC");
	   while ($j= $jenis->fetch_array()){ ?>
         <option value="<?php echo"$j[kode_jenis]"; ?>" <?php if($u['kode_jenis']==$j['kode_jenis']){ echo 'selected';} ?>><?php echo"$j[nama_jenis]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Penulis</td>
     <td><select name="kode_penulis">
         <?php
       $penulis=$mysqli->query("SELECT * FROM penulis Order By nama_penulis ASC");
	   while ($ps=$penulis->fetch_array()){ ?>
         <option value="<?php echo"$ps[kode_penulis]"; ?>" <?php if($u['kode_penulis']==$ps['kode_penulis']){ echo 'selected';} ?>><?php echo"$ps[nama_penulis]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Penerbit</td>
     <td><select name="kode_penerbit">
         <?php
       $penerbit=$mysqli->query("SELECT * FROM penerbit Order By nama_penerbit ASC");
	   while ($pb=$penerbit->fetch_array()){ ?>
         <option value="<?php echo"$pb[kode_penerbit]"; ?>" <?php if($u['kode_penerbit']==$pb['kode_penerbit']){ echo 'selected';} ?>><?php echo"$pb[nama_penerbit]"; ?></option>
         <?php } ?>
     </select></td>
   </tr>
   <tr>
     <td>Tahun Terbit</td>
     <td><input name="tahun_terbit" type="text" value="<?php echo"$u[tahun_terbit]"; ?>" size="4" maxlength="4" placeholder="Tahun" /></td>
   </tr>
   <tr>
     <td>Jumlah Buku</td>
     <td><input name="jumlah_buku" type="text" value="<?php echo"$u[jumlah_buku]"; ?>" size="4" maxlength="3" placeholder="Jumlah" /></td>
   </tr>
   <tr>
     <td>Nomor Rak</td>
     <td><input name="nomor_rak" type="text" value="<?php echo"$u[nomor_rak]"; ?>" size="4" maxlength="3" placeholder="Rak" /></td>
   </tr>
   <tr>
     <td colspan="2"><input type="submit" value="Simpan">
       <input type="button" value="Batal" onclick="self.history.back();" /></td>
   </tr>
 </table>
   <iframe width=174 height=189 name="gToday:normal:kalender/agenda.js" id="gToday:normal:kalender/agenda.js" src="kalender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</form>
<?php } ?>
<?php } ?>

<?php
// Menampilkan Deskripsi Buku
if (isset($_GET['opsi']) && $_GET['opsi'] == 'deskripsi'){ 
 $desk=$mysqli->query("SELECT * FROM buku WHERE kode_buku='$_GET[id]'");
 while ($d= $desk->fetch_array()){ ?>
 <h3 align="center"> 
 <img src="ikon/buku.png" align="absmiddle" />
 DESKRIPSI BUKU </h3>
 <div class="ISBN">
 <table border="0" align="center">
   <tr>
    <td width="90" class="nomor">ISBN</td>
    <td width="11">:</td>
    <td class="data"><?php echo"$d[ISBN]"; ?></td>
  </tr>
   <tr>
     <td class="nomor">Judul</td>
     <td>:</td>
     <td class="data"><?php echo"$d[judul]"; ?></td>
   </tr>
   <tr>
     <td class="nomor">Tanggal Entri</td>
     <td>:</td>
     <td class="data"><?php echo"$d[tgl_entri]"; ?></td>
   </tr>
   <tr>
     <td class="nomor">Jenis Buku</td>
     <td>:</td>
     <td class="data"><?php 
	 $jns=$mysqli->query("SELECT * FROM jenis_buku WHERE kode_jenis='$d[kode_jenis]'");
	 while ($j= $jns->fetch_array()){
	 echo"$j[nama_jenis]"; } ?></td>
   </tr>
   <tr>
     <td class="nomor">Penulis</td>
     <td>:</td>
     <td class="data"><?php 
	 $tulis=$mysqli->query("SELECT * FROM penulis WHERE kode_penulis='$d[kode_penulis]'");
	 while ($t=$tulis->fetch_array()){
	 echo"$t[nama_penulis]"; } ?></td>
   </tr>
   <tr>
     <td class="nomor">Penerbit</td>
     <td>:</td>
     <td class="data"><?php 
	 $terbit=$mysqli->query("SELECT * FROM penerbit WHERE kode_penerbit='$d[kode_penerbit]'");
	 while ($ter=$terbit->fetch_array()){
	 echo"$ter[nama_penerbit]"; } ?></td>
   </tr>
   <tr>
     <td class="nomor">Tahun Terbit</td>
     <td>:</td>
     <td class="data"><?php echo"$d[tahun_terbit]"; ?></td>
   </tr>
   <tr>
     <td class="nomor">Jumlah Buku</td>
     <td>:</td>
     <td class="data"><?php echo"$d[jumlah_buku]"; ?></td>
   </tr>
   <tr>
     <td class="nomor">Nomor Rak</td>
     <td>:</td>
     <td class="data"><?php echo"$d[nomor_rak]"; ?></td>
   </tr>
</table>
</div>
<table border="0" align="center">
 <tr>
  <td align="center">
  <a href="?halaman=buku">
  <img src="ikon/kembali.png" width="32" height="32" align="absmiddle" />
  Kembali</a></td>
 </tr>
</table>
<?php } } ?>

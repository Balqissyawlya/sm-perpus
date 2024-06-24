<?php
if ($_POST['ekspor'] == 'unduh') {
    include 'koneksi.php';
    $no = 1;
    $tanggal = date('D d-M-Y');
    $unduh = $mysqli->query("SELECT * FROM anggota ORDER BY kode_anggota ASC");
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Laporan_Data_Anggota.doc");

    ?>
    <table border="0" align="center" bgcolor="#FF9933">
        <tr>
            <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td><hr />
                <h4 align="center"><u>DATA ANGGOTA</u></h4>
                <?php while ($u = $unduh->fetch_array()) { ?>
                <b>
                    - Kode Anggota : <?php echo $u['kode_anggota']; ?><br />
                    - Tanggal Masuk : <?php echo $u['tgl_masuk']; ?>
                    <hr /></b>
                <table border="0" width="600">
                    <tr>
                        <td width="120" bgcolor="#FF9933">Nama</td>
                        <td width="470" bgcolor="#99CC33"><?php echo $u['nama_anggota']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9933">Alamat</td>
                        <td bgcolor="#99CC33"><?php echo $u['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9933">Telepon</td>
                        <td bgcolor="#99CC33"><?php echo $u['telepon']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9933">Keterangan</td>
                        <td bgcolor="#99CC33"><?php echo $u['keterangan']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Tanggal Cetak : <?php echo $tanggal; ?></td>
                    </tr>
                </table>
                <hr />
                <br /><br />
                <?php } ?>
            </td>
        </tr>
    </table>
    <?php
}

if ($_POST['ekspor'] == 'cetak') {
    include 'koneksi.php';
    $no = 1;
    $tanggal = date('D d-M-Y');
    $cetak = $mysqli->query("SELECT * FROM anggota ORDER BY kode_anggota ASC");
    ?>
    <table border="0" align="center" bgcolor="#FF9933">
        <tr>
            <td><font size="+2"><strong>Laporan : Data Perpustakaan</strong></font></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#ffffff">
            <td><hr />
                <h4 align="center"><u>DATA ANGGOTA</u></h4>
                <?php while ($c = $cetak->fetch_array()) { ?>
                <b>
                    - Kode Anggota : <?php echo $c['kode_anggota']; ?><br />
                    - Tanggal Masuk : <?php echo $c['tgl_masuk']; ?>
                    <hr /></b>
                <table border="0" width="600">
                    <tr>
                        <td width="120" bgcolor="#FF9933">Nama</td>
                        <td width="470" bgcolor="#99CC33"><?php echo $c['nama_anggota']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9933">Alamat</td>
                        <td bgcolor="#99CC33"><?php echo $c['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9933">Telepon</td>
                        <td bgcolor="#99CC33"><?php echo $c['telepon']; ?></td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF9933">Keterangan</td>
                        <td bgcolor="#99CC33"><?php echo $c['keterangan']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">Tanggal Cetak : <?php echo $tanggal; ?></td>
                    </tr>
                </table>
                <hr />
                <br /><br />
                <?php } ?>
            </td>
        </tr>
    </table>
    <?php
}
?>

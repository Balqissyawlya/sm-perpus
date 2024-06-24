<title>KONEKSI APLIKASI</title>
<form action="akses_masuk.php" method="post">
    <div class="box">
        <table border="0" align="center" class="tabel_versi1">
            <tr>
                <td colspan="2">
                    <h3 align="center">SISTEM INFORMASI PERPUSTAKAAN</h3>
                </td>
            </tr>
            <tr>
                <td width="261" rowspan="3" align="center">
                    <img src="ikon/logo.png" width="256" height="256" align="absmiddle" />
                </td>
                <td width="193" valign="bottom">
                    <select name="username">
                        <?php
                        include "koneksi.php";
                        $sql = $mysqli->query("SELECT * FROM pengelola ORDER BY username ASC");
                        while ($k = $sql->fetch_array()) {
                            ?>
                            <option value="<?php echo $k['username']; ?>"><?php echo $k['nama_peng']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <input type="password" name="password" placeholder="Kata Sandi" />
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <input type="submit" value="Masuk Aplikasi">
                </td>
            </tr>
            <tr>
                <td colspan="2">Kuasai Informasi, Kuasai Dunia!!!</td>
            </tr>
        </table>
    </div>
</form>

<?php
// Pastikan koneksi.php menggunakan MySQLi untuk koneksi
$mysqli = new mysqli("localhost", "root", "", "db_perpustakaan");

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>

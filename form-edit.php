<?php
include 'koneksi.php';

// Perbaikan pengambilan ID
if(isset($_GET['id_mhs'])) {  // Ubah 'id' menjadi 'id_mhs' sesuai dengan nama parameter di URL
    $id = $_GET['id_mhs'];
    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mhs='$id'");
    if($mahasiswa) {
        $row = mysqli_fetch_array($mahasiswa);
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
} else {
    echo "ID tidak ditemukan";
    exit;
}

// Array jurusan
$jurusan = array('TEKNIK INFORMATIKA','TEKNIK ELEKTRO','REKAMEDIS');

// Function untuk radio button
function active_radio_button($value,$input){
    return $value==$input?'checked':'';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Digital Talent</title>
    </head>
    <body>
        <form method="post" action="edit.php">
            <input type="hidden" value="<?php echo $row['id_mhs']; ?>" name="id_mhs">
            <table>
                <tr><td>NIM</td><td><input type="text" value="<?php echo $row['nim']; ?>" name="nim"></td></tr>
                <tr><td>NAMA</td><td><input type="text" value="<?php echo $row['nama']; ?>" name="nama"></td></tr>
                <tr><td>JENIS KELAMIN</td><td>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin'])?>>Laki Laki
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin'])?>>Perempuan
                </td></tr>
                <tr><td>JURUSAN</td><td>
                    <select name="jurusan">
                        <?php
                        foreach ($jurusan as $j){
                            $selected = ($row['jurusan']==$j) ? 'selected="selected"' : '';
                            echo "<option value='$j' $selected>$j</option>";
                        }
                        ?>
                    </select>
                </td></tr>
                <tr><td>ALAMAT</td><td><input value="<?php echo $row['alamat']; ?>" type="text" name="alamat"></td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan">SIMPAN PERUBAHAN</button>
                <a href="index.php">Kembali</a></td></tr>
            </table>
        </form>
    </body>
</html>
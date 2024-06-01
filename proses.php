<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
    // ambil data dari formulir
    if($_POST['aksi']=='add'){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $no_tel = $_POST['no_tel'];
    $email = $_POST['email'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $jurusan = $_POST['jurusan'];
    // Format tanggal sesuai dengan format MySQL (YYYY-MM-DD)
    $tanggal_mysql = date("Y-m-d", strtotime($tgl_lahir));
    // buat query
    $sql = "INSERT INTO pendaftaran (nama, alamat, jenis_kelamin, agama, sekolah_asal, tanggal_lahir, no_tel, email, desa, kecamatan, kota, provinsi, kode_pos, jurusan) 
    VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$tgl_lahir', '$no_tel', '$email', '$desa', '$kecamatan', '$kota', '$provinsi', '$kode_pos', '$jurusan')";
    $query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} 
else if($_POST['aksi']=='edit'){
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $no_tel = $_POST['no_tel'];
    $email = $_POST['email'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];
    $jurusan = $_POST['jurusan'];
    $tanggal_mysql = date("Y-m-d", strtotime($tgl_lahir));
    $sql = "UPDATE pendaftaran SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', tanggal_lahir='$tgl_lahir', no_tel='$no_tel', email='$email', desa='$desa', kecamatan='$kecamatan', kota='$kota', provinsi='$provinsi', kode_pos='$kode_pos', jurusan='$jurusan'
    WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);
    // apakah query hapus berhasil?
    if($query){
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
 } 
}
if( isset($_GET['hapus']) ){

    // ambil id dari query string
    $id_pendaftaran = $_GET['hapus'];

    //buat query hapus
    $sql = "DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);

    //apakah query hapus berhasil?
    if( $query){
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/lokasi_create.css'); ?>">
</head>

<body>
    <div class="container">
        <h1>Tambah Lokasi</h1>
        <form id="formLokasi" action="<?php echo site_url('lokasi/store'); ?>" method="post">
            <div class="form-group">
                <label for="namaLokasi">Nama Lokasi:</label>
                <input type="text" id="namaLokasi" name="namaLokasi" required>
            </div>
            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" id="negara" name="negara" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" id="provinsi" name="provinsi" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota:</label>
                <input type="text" id="kota" name="kota" required>
            </div>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>

</html>

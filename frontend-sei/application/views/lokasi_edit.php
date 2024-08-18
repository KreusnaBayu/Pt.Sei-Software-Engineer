<!DOCTYPE html>
<html>
<head>
    <title>Edit Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/lokasi_edit.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Edit Lokasi</h1>
        <form action="<?php echo site_url('lokasi/update/' . (isset($lokasi['id']) ? $lokasi['id'] : '')); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($lokasi['id']) ? $lokasi['id'] : ''); ?>">

            <div class="form-group">
                <label for="namaLokasi">Nama Lokasi:</label>
                <input type="text" id="namaLokasi" name="namaLokasi" value="<?php echo htmlspecialchars(isset($lokasi['namaLokasi']) ? $lokasi['namaLokasi'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" id="negara" name="negara" value="<?php echo htmlspecialchars(isset($lokasi['negara']) ? $lokasi['negara'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" id="provinsi" name="provinsi" value="<?php echo htmlspecialchars(isset($lokasi['provinsi']) ? $lokasi['provinsi'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="kota">Kota:</label>
                <input type="text" id="kota" name="kota" value="<?php echo htmlspecialchars(isset($lokasi['kota']) ? $lokasi['kota'] : ''); ?>" required>
            </div>

            <input type="submit" value="Update" class="btn-update">
        </form>

        <!-- Form untuk menghapus lokasi -->
        <form id="deleteForm" action="<?php echo site_url('lokasi/delete/' . (isset($lokasi['id']) ? $lokasi['id'] : '')); ?>" method="post" onsubmit="return confirm('Anda yakin ingin menghapus lokasi ini?');" class="delete-form">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($lokasi['id']) ? $lokasi['id'] : ''); ?>">
            <input type="submit" value="Delete" class="btn-delete">
        </form>

    </div>

</body>
</html>

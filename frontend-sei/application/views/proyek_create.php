<!DOCTYPE html>
<html>

<head>
    <title>Tambah Proyek</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/proyek_create.css'); ?>">
</head>

<body>
    <div class="container">
        <h1>Tambah Proyek</h1>
        <form id="formProyek" action="<?php echo site_url('proyek/store'); ?>" method="post">
            <div class="form-group">
                <label for="namaProyek">Nama Proyek:</label>
                <input type="text" id="namaProyek" name="namaProyek" required>
            </div>
            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" id="client" name="client" required>
            </div>
            <div class="form-group">
                <label for="tglMulai">Tanggal Mulai:</label>
                <input type="datetime-local" id="tglMulai" name="tglMulai" required>
            </div>
            <div class="form-group">
                <label for="tglSelesai">Tanggal Selesai:</label>
                <input type="datetime-local" id="tglSelesai" name="tglSelesai" required>
            </div>
            <div class="form-group">
                <label for="pimpinanProyek">Pimpinan Proyek:</label>
                <input type="text" id="pimpinanProyek" name="pimpinanProyek" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan">
            </div>
            
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select id="lokasi" name="lokasi"  required>
                    <?php if (!empty($lokasi) && is_array($lokasi)): ?>
                        <?php foreach ($lokasi as $lokasi_item): ?>
                            <option value="<?php echo $lokasi_item['id']; ?>">
                                <?php echo $lokasi_item['namaLokasi'] . ', ' . $lokasi_item['kota'] . ', ' . $lokasi_item['provinsi'] . ', ' . $lokasi_item['negara']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled class="no-locations">Tidak ada lokasi tersedia</option>
                    <?php endif; ?>
                </select>
            </div>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>

</html>
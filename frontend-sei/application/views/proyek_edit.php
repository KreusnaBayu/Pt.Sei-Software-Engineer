<!DOCTYPE html>
<html>

<head>
    <title>Edit Proyek</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/proyek_edit.css'); ?>">
</head>

<body>
    <div class="container">
        <h1>Edit Proyek</h1>
        <form action="<?php echo site_url('proyek/update/' . (isset($proyek['id']) ? $proyek['id'] : '')); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($proyek['id']) ? $proyek['id'] : ''); ?>">

            <div class="form-group">
                <label for="namaProyek">Nama Proyek:</label>
                <input type="text" id="namaProyek" name="namaProyek" value="<?php echo htmlspecialchars(isset($proyek['namaProyek']) ? $proyek['namaProyek'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" id="client" name="client" value="<?php echo htmlspecialchars(isset($proyek['client']) ? $proyek['client'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="tglMulai">Tanggal Mulai:</label>
                <input type="date" id="tglMulai" name="tglMulai" value="<?php echo htmlspecialchars(isset($proyek['tglMulai']) ? date('Y-m-d', strtotime($proyek['tglMulai'])) : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="tglSelesai">Tanggal Selesai:</label>
                <input type="date" id="tglSelesai" name="tglSelesai" value="<?php echo htmlspecialchars(isset($proyek['tglSelesai']) ? date('Y-m-d', strtotime($proyek['tglSelesai'])) : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="pimpinanProyek">Pimpinan Proyek:</label>
                <input type="text" id="pimpinanProyek" name="pimpinanProyek" value="<?php echo htmlspecialchars(isset($proyek['pimpinanProyek']) ? $proyek['pimpinanProyek'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars(isset($proyek['keterangan']) ? $proyek['keterangan'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <select id="lokasi" name="lokasi" required>
                    <?php if (!empty($lokasi) && is_array($lokasi)): ?>
                        <?php foreach ($lokasi as $lokasi_item): ?>
                            <option value="<?php echo $lokasi_item['id']; ?>" <?php if (count($proyek['lokasi']) > 0 && $lokasi_item['id'] == $proyek['lokasi'][0]['id']) echo 'selected'; ?> >
                                <?php echo $lokasi_item['namaLokasi'] . ', ' . $lokasi_item['kota'] . ', ' . $lokasi_item['provinsi'] . ', ' . $lokasi_item['negara']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled class="no-locations">Tidak ada lokasi tersedia</option>
                    <?php endif; ?>
                </select>
            </div>

            <input type="submit" value="Update" class="btn-update">
        </form>

        <!-- Form untuk menghapus proyek -->
        <form action="<?php echo site_url('proyek/delete/' . (isset($proyek['id']) ? $proyek['id'] : '')); ?>" method="post" onsubmit="return confirm('Anda yakin ingin menghapus proyek ini?');" class="delete-form">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars(isset($proyek['id']) ? $proyek['id'] : ''); ?>">
            <input type="submit" value="Delete" class="btn-delete">
        </form>
    </div>
</body>

</html>

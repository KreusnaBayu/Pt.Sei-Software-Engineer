<!DOCTYPE html>
<html>

<head>
    <title>Daftar Proyek</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/proyek_list.css'); ?>">
</head>

<body>
    <div class="container">
        <!-- Navigasi -->
        <div class="navigation">
            <a href="<?php echo site_url('lokasi'); ?>" class="nav-link">Ke Lokasi</a>
            <span class="separator">|</span>
            <a href="<?php echo site_url('proyek'); ?>" class="nav-link">Daftar Proyek</a>
        </div>

        <h1 class="h1">Daftar Proyek</h1>

        <?php if (!empty($proyek) && is_array($proyek)): ?>
            <?php foreach ($proyek as $proyek_item): ?>
                <div class="card">
                    <div class="card-header">
                        <?php echo htmlspecialchars($proyek_item['namaProyek']); ?>
                    </div>
                    <div class="card-content">
                        <ul>
                            <li><strong>Client:</strong> <?php echo htmlspecialchars($proyek_item['client']); ?></li>
                            <li><strong>Pimpinan Proyek:</strong> <?php echo htmlspecialchars($proyek_item['pimpinanProyek']); ?></li>
                            <li><strong>Keterangan:</strong> <?php echo htmlspecialchars($proyek_item['keterangan']); ?></li>
                            <li><strong>Tanggal Mulai:</strong> <?php echo date('d F Y H:i', strtotime($proyek_item['tglMulai'])); ?></li>
                            <li><strong>Tanggal Selesai:</strong> <?php echo date('d F Y H:i', strtotime($proyek_item['tglSelesai'])); ?></li>
                            <?php if (!empty($proyek_item['lokasi']) && is_array($proyek_item['lokasi'])): ?>
                                <ul>
                                    <?php foreach ($proyek_item['lokasi'] as $lokasi_item): ?>
                                        <li><strong>Nama Lokasi:</strong> <?php echo htmlspecialchars($lokasi_item['namaLokasi']); ?></li>
                                        <li><strong>Negara:</strong> <?php echo htmlspecialchars($lokasi_item['negara']); ?></li>
                                        <li><strong>Provinsi:</strong> <?php echo htmlspecialchars($lokasi_item['provinsi']); ?></li>
                                        <li><strong>Kota:</strong> <?php echo htmlspecialchars($lokasi_item['kota']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>Tidak ada lokasi untuk proyek ini.</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo site_url('proyek/edit/' . $proyek_item['id']); ?>" class="btn-edit">Edit Proyek</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada proyek yang tersedia.</p>
        <?php endif; ?>
        
        <a href="<?php echo site_url('proyek/create'); ?>" class="btn-add">Tambah Proyek</a>
    </div>
</body>

</html>

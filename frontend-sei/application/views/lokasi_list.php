<!DOCTYPE html>
<html>

<head>
    <title>Daftar Lokasi</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/lokasi_list.css'); ?>">
</head>

<body>
    <div class="container">
        <!-- Navigasi -->
        <div class="navigation">
            <a href="<?php echo site_url('lokasi'); ?>" class="nav-link">Ke Lokasi</a>
            <span class="separator">|</span>
            <a href="<?php echo site_url('proyek'); ?>" class="nav-link">Daftar Proyek</a>
        </div>

        <h1 class="h1">Daftar Lokasi</h1>
    

        <table>
            <thead>
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lokasi)): ?>
                    <?php foreach ($lokasi as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['namaLokasi']); ?></td>
                            <td><?php echo htmlspecialchars($item['negara']); ?></td>
                            <td><?php echo htmlspecialchars($item['provinsi']); ?></td>
                            <td><?php echo htmlspecialchars($item['kota']); ?></td>
                            <td>
                                <a href="<?php echo site_url('lokasi/edit/' . $item['id']); ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada lokasi tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url('lokasi/create'); ?>" class="btn btn-add">Tambah Lokasi</a>
    </div>
</body>

</html>

<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Biodata </h3>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data table</li>
            </ol>
        </nav> -->
    </div>
    <div class="card">
        <div class="card-body">
            <div class="grup d-flex align-items-center mb-3">
                <h4 class="card-title">Data Tabel Biodata</h4>
                <a href="/biodata/tambah" class="btn btn-gradient-success ml-auto"> <i class="mdi mdi-account-plus"></i> Tambah Data</a>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Cantik</th>
                                <th>Angkatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($bio as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <img src="<?= base_url('foto/' . $row['img']) ?>" class="mr-2" alt="image"> <?= $row['nama_lengkap'] ?>
                                    </td>
                                    <td><?= $row['nama_cantik'] ?></td>
                                    <td><?= $row['angkatan'] ?></td>
                                    <td>
                                        <a href="biodata/edit/<?= $row['id_biodata'] ?>" class="badge badge-pill badge-primary text-white"><i class="mdi mdi-pencil mr-2"></i>Edit</a>

                                        <a href="#" class="badge badge-pill badge-danger text-white"><i class="mdi mdi-delete mr-2"></i>Hapus</a>

                                        <div type="button" class="badge badge-pill badge-info text-white" data-toggle="modal" data-target="#exampleModal<?= $row['id_biodata'] ?>"><i class="mdi mdi-magnify-plus mr-2"></i>Detail</div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php
foreach ($bio as $row) :
?>
    <div class="modal fade" id="exampleModal<?= $row['id_biodata'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="card">
                        <img src="<?= base_url('foto/' . $row['img']) ?>" class="img-lg rounded-circle mt-3 mx-auto" alt="image">
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td><?= $row['nama_lengkap'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nama Cantik</td>
                                        <td>:</td>
                                        <td><?= $row['nama_cantik'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Angkatan</td>
                                        <td>:</td>
                                        <td><?= $row['angkatan'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?= tanggal_indo($row['tgl_lahir'])  ?></td>
                                    </tr>

                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $row['alamat'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>No WA</td>
                                        <td>:</td>
                                        <td><?= $row['no_wa'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal -->

<?= $this->endSection() ?>
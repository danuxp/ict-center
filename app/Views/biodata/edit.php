<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Edit Biodata </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('biodata') ?>">Biodata</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Biodata</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Biodata Anggota</h4>
                    <hr class="pb-3">
                    <form action="/biodata/update/<?= $bio->id_biodata ?>" class="forms-sample" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" class="form-control" name="id" value="<?= $bio->id_biodata ?>">

                        <div class="form-group <?= ($validation->hasError('nama_lengkap')) ? 'has-danger' : '' ?>">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" value="<?= $bio->nama_lengkap ?>">
                            <small class="form-text text-danger"> <?= $validation->getError('nama_lengkap') ?> </small>
                        </div>

                        <div class="form-group <?= ($validation->hasError('nama_cantik')) ? 'has-danger' : '' ?>">
                            <label>Nama Cantik</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Cantik" name="nama_cantik" value="<?= $bio->nama_cantik ?>">
                            <small class="form-text text-danger"> <?= $validation->getError('nama_cantik') ?> </small>
                        </div>

                        <div class="form-group <?= ($validation->hasError('angkatan')) ? 'has-danger' : '' ?>">
                            <label>Angkatan</label>
                            <input type="number" class="form-control" placeholder="Angkatan Berapa" name="angkatan" min="0" value="<?= $bio->angkatan ?>">
                            <small class="form-text text-danger"> <?= $validation->getError('angkatan') ?> </small>
                        </div>

                        <div class="form-group <?= ($validation->hasError('tgl_lahir')) ? 'has-danger' : '' ?>">
                            <label>Tanggal Lahir</label>
                            <div id="datepicker-popup" class="input-group date datepicker">
                                <input type="text" class="form-control" name="tgl_lahir" placeholder="Klik untuk tanggal lahir" value="<?= $bio->tgl_lahir ?>">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>
                            <small class="form-text text-danger"> <?= $validation->getError('tgl_lahir') ?> </small>
                        </div>

                        <div class="form-group <?= ($validation->hasError('no_wa')) ? 'has-danger' : '' ?>">
                            <label>No WA</label>
                            <input type="number" class="form-control" placeholder="Masukkan No WA" name="no_wa" min="0" value="<?= $bio->no_wa ?>">
                            <small class="form-text text-danger"> <?= $validation->getError('no_wa') ?> </small>
                        </div>

                        <div class="form-group <?= ($validation->hasError('alamat')) ? 'has-danger' : '' ?>">
                            <label>Alamat Lengkap</label>
                            <textarea class="form-control" rows="4" name="alamat"><?= $bio->alamat; ?></textarea>
                            <small class="form-text text-danger"> <?= $validation->getError('alamat') ?> </small>
                        </div>

                        <!-- <div class="form-group">
                            <label>Sosmed <span class="text-danger">(link sosial media, kosongkan jika tidak ada)</span> </label>
                            <input type="text" class="form-control mb-3" placeholder="Masukkan Link Instagram" name="instagram">

                            <input type="text" class="form-control" placeholder="Masukkan Link Facebook" name="facebook">
                        </div> -->

                        <div class="form-group <?= ($validation->hasError('img')) ? 'has-danger' : '' ?>">
                            <label>Foto</label><br>
                            <img src="<?= base_url('foto/' . $bio->img) ?>" class="mb-2 w-25" alt="image">

                            <input type="file" name="img" class="file-upload-default" value="<?= $bio->img ?>">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" name="img" value="<?= $bio->img ?>">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-info" type="button">Pilih File</button>
                                </span>
                            </div>
                            <small class="form-text text-danger"> <?= $validation->getError('img') ?> </small>
                        </div>

                        <button type="submit" class="btn btn-gradient-info mr-2">Simpan</button>
                        <a href="/biodata" class="btn btn-gradient-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
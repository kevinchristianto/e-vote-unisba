<div class="row">
    <div class="col">
        <h1 class="h3 mb-2 text-gray-800">Kelola Calon Ketua</h1>

        <div class="card">
            <div class="card-header py-2 d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title font-weight-bold text-primary m-0">Data Calon Ketua</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-calon">Tambah Calon</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped tabled-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>No.</th>
                                <th>Tipe Calon</th>
                                <th>NPM</th>
                                <th>Nama Calon</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
                                <th style="min-width: 24vw;">Visi</th>
                                <th style="min-width: 20vw;">Misi</th>
                                <th>Nilai Keagamaan</th>
                                <th>Nilai Kepemimpinan</th>
                                <th>Foto</th>
                                <th style="min-width: 80px;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($data as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= strtoupper($row->tipe_calon); ?></td>
                                    <td><?= $row->npm; ?></td>
                                    <td><?= $row->nama_calon; ?></td>
                                    <td><?= $row->nama_jurusan; ?></td>
                                    <td><?= $row->nama_kelas; ?></td>
                                    <td><?= $row->visi; ?></td>
                                    <td><?= $row->misi; ?></td>
                                    <td><?= $row->keagamaan; ?>%</td>
                                    <td><?= $row->kepemimpinan; ?>%</td>
                                    <td style="min-width: 240px;">
                                        <img src="<?= base_url('content/uploads/calon/' . $row->foto); ?>" class="img-fluid" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" title="Ubah" class="btn-ubah-calon" data-id="<?= $row->id_calon; ?>" data-jurusan="<?= $row->id_jurusan; ?>"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" title="Hapus" class="btn-delete-calon" data-nama="<?= $row->nama_calon; ?>" data-url="<?= base_url('calon/delete/' . $row->id_calon); ?>"><i class="fas fa-trash-alt text-danger ml-2"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-calon">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Calon Ketua</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('calon/insert'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tipe Calon</label>
                        <select class="custom-select" id="select-kelas-add-calon" name="tipe">
                            <option selected disabled>--- Pilih Tipe ---</option>
                            <option value="bem">BEM</option>
                            <option value="dam">DAM</option>
                            <option value="hima">HIMA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NPM</label>
                        <input type="text" name="npm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Calon</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="custom-select" id="add-calon-select-jurusan" name="jurusan">
                            <option selected disabled>--- Pilih Jurusan ---</option>
                            <?php foreach ($list_jurusan as $row) { ?>
                                <option value="<?= $row->id_jurusan; ?>"><?= $row->nama_jurusan; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="custom-select" id="add-calon-select-kelas" name="kelas">
                            <option selected disabled>--- Pilih Kelas ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Visi</label>
                        <textarea name="visi" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <textarea name="misi" class="form-control" rows="6"></textarea>
                        <small class="form-text text-muted">Masukkan teksnya saja tanpa <i>bullet</i> atau <i>numbering</i>. Setiap misi dipisah oleh garis baru. Contoh:</small>
                        <small class="form-text text-muted">Lorem ipsum 1.<br>Lorem ipsum 2.</small>
                    </div>
                    <div class="form-group">
                        <label>Nilai Keagamaan</label>
                        <input type="number" name="keagamaan" max="100" class="form-control">
                        <small class="form-text text-muted">Masukkan angkanya saja. Contoh: 80</small>
                    </div>
                    <div class="form-group">
                        <label>Nilai Kepemimpinan</label>
                        <input type="number" name="kepemimpinan" max="100" class="form-control">
                        <small class="form-text text-muted">Masukkan angkanya saja. Contoh: 80</small>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                            <label class="custom-file-label" for="customFile">Pilih foto</label>
                        </div>
                        <small class="form-text text-muted">Ukuran file maksimum 2MB</small>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ubah-calon">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Calon Ketua</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('calon/update'); ?>" method="POST" enctype="multipart/form-data" id="form-ubah-calon">
                    <div class="form-group">
                        <label>Tipe Calon</label>
                        <select class="custom-select" id="select-kelas-add-calon" name="tipe"></select>
                    </div>
                    <div class="form-group">
                        <label>NPM</label>
                        <input type="text" name="npm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Calon</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="custom-select" id="ubah-calon-select-jurusan" name="jurusan"></select>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="custom-select" id="ubah-calon-select-kelas" name="kelas"></select>
                    </div>
                    <div class="form-group">
                        <label>Visi</label>
                        <textarea name="visi" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <textarea name="misi" class="form-control" rows="6"></textarea>
                        <small class="form-text text-muted">Masukkan teksnya saja tanpa <i>bullet</i> atau <i>numbering</i>. Setiap misi dipisah oleh garis baru. Contoh:</small>
                        <small class="form-text text-muted">Lorem ipsum 1.<br>Lorem ipsum 2.</small>
                    </div>
                    <div class="form-group">
                        <label>Nilai Keagamaan</label>
                        <input type="number" name="keagamaan" max="100" class="form-control">
                        <small class="form-text text-muted">Masukkan angkanya saja. Contoh: 80</small>
                    </div>
                    <div class="form-group">
                        <label>Nilai Kepemimpinan</label>
                        <input type="number" name="kepemimpinan" max="100" class="form-control">
                        <small class="form-text text-muted">Masukkan angkanya saja. Contoh: 80</small>
                    </div>
                    <div class="form-group row d-flex align-items-center">
                        <label class="col-12">Foto</label>
                        <div class="col-4">
                            <img src="" class="img-fluid" name="prev_foto">
                        </div>
                        <div class="col-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="foto">
                                <label class="custom-file-label" for="customFile">Ubah foto</label>
                            </div>
                            <small class="form-text text-muted">Ukuran file maksimum 2MB</small>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
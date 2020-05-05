<div class="row">
    <div class="col">
        <div class="col-lg-6 mx-auto my-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-0">
                <h1 class="h3 mb-1 text-gray-800">Kelola Kelas</h1>
                <select class="custom-select d-inline-block col-lg-6 mb-2" id="select-jurusan">
                    <option selected disabled>--- Pilih Jurusan ---</option>
                    <?php foreach ($list_jurusan as $row) { ?>
                        <option value="<?= $row->id_jurusan; ?>"><?= $row->nama_jurusan; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="card">
                <div class="card-header py-2 d-flex flex-row justify-content-between align-items-center">
                    <h5 class="card-title font-weight-bold text-primary m-0">Data Kelas</h5>
                    <button class="btn btn-primary d-none" data-toggle="modal" data-target="#modal-add-kelas" id="btn-tambah-kelas">Tambah Kelas</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered" id="table-kelas">
                            <thead>
                                <tr align="center">
                                    <th>No.</th>
                                    <th>Nama Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-kelas">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kelas</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>kelas/insert" method="POST" id="form-add-kelas">
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="nama" />
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" />
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <input type="hidden" name="jurusan" value="" />
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ubah-kelas">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Kelas</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(); ?>kelas/update" method="POST" id="form-ubah-kelas">
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="nama" />
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" />
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <input type="hidden" name="jurusan" value="" />
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
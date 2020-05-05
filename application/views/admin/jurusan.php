<div class="row">
    <div class="col">
        <div class="col-lg-8 mx-auto">
            <h1 class="h3 mb-2 text-gray-800">Kelola Jurusan</h1>

            <div class="card">
                <div class="card-header py-2 d-flex flex-row justify-content-between align-items-center">
                    <h5 class="card-title font-weight-bold text-primary m-0">Data Jurusan</h5>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add-jurusan">Tambah Jurusan</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th>No.</th>
                                    <th>ID Jurusan</th>
                                    <th>Nama Jurusan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?>.</td>
                                        <td><?= $row->id_jurusan; ?></td>
                                        <td><?= $row->nama_jurusan; ?></td>
                                        <td align="center">
                                            <a href="javascript:void(0)" title='Ubah' class="btn-ubah-jurusan" data-id="<?= $row->id_jurusan; ?>"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('jurusan/delete/'.$row->id_jurusan) ?>" title='Hapus' onclick="return confirm('Hapus <?= $row->nama_jurusan; ?>?')"><i class="fas fa-trash-alt text-danger ml-2"></i></a>
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
</div>

<div class="modal fade" id="modal-add-jurusan">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Jurusan</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/jurusan/insert'); ?>" method="POST">
                    <div class="form-group">
                        <label>ID Jurusan</label>
                        <input type="text" name="id" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input type="text" name="nama" class="form-control" />
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-ubah-jurusan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Jurusan</h5>
                <div class="spinner-border spinner-border-sm text-primary mt-2 ml-2 d-none" role="status" id="loading-modal-ubah-jurusan">
                    <span class="sr-only">Loading...</span>
                </div>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/jurusan/update'); ?>" method="POST">
                    <div class="form-group">
                        <label>ID Jurusan</label>
                        <input type="text" name="id" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>nama Jurusan</label>
                        <input type="text" name="nama" class="form-control" />
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
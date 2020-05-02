<div class="row">
    <div class="col">
        <h1 class="h3 mb-4 text-gray-800">Kelola Jurusan</h1>

        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-primary">Data Jurusan</h5>
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
                                            <a href="#" title='Ubah' id="btn-ubah-jurusan"><i class="fas fa-edit"></i></a>
                                            <a href="#" title='Hapus'><i class="fas fa-trash text-danger ml-2"></i></a>
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

<div class="modal fade" id="modal-ubah-jurusan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Jurusan</h5>
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
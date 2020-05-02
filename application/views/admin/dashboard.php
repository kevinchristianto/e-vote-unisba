<div class="row">
    <div class="col">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pemilih</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1700</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sudah Memilih</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">1400</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo (1400/1700) * 100 ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Belum Memilih</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">300</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2" style="transform: rotate(180deg);">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo (300/1700) * 100 ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-times fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Calon</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary m-0">Perolehan Suara &mdash; BEM</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="chart-bem"></canvas>
                        </div>
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus explicabo sed recusandae. Cupiditate et amet dolore illum officia totam fuga consectetur quae magnam sed minus, saepe reiciendis aliquid placeat veniam.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary m-0">Perolehan Suara &mdash; DAM</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="chart-bem"></canvas>
                        </div>
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus explicabo sed recusandae. Cupiditate et amet dolore illum officia totam fuga consectetur quae magnam sed minus, saepe reiciendis aliquid placeat veniam.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary m-0">Perolehan Suara &mdash; HIMA PR</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="chart-bem"></canvas>
                        </div>
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus explicabo sed recusandae. Cupiditate et amet dolore illum officia totam fuga consectetur quae magnam sed minus, saepe reiciendis aliquid placeat veniam.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary m-0">Perolehan Suara &mdash; KMMK</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="chart-bem"></canvas>
                        </div>
                        
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus explicabo sed recusandae. Cupiditate et amet dolore illum officia totam fuga consectetur quae magnam sed minus, saepe reiciendis aliquid placeat veniam.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
 <div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="icon-screen-desktop"></i></h3>
              <p class="text-muted">TOTAL COMPRAS</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-primary">23</h2>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="progress">
            <div
              class="progress-bar bg-primary"
              role="progressbar"
              style="width: 85%; height: 6px;"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="icon-note"></i></h3>
              <p class="text-muted">TOTAL REFERIDOS</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-cyan">169</h2>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="progress">
            <div
              class="progress-bar bg-cyan"
              role="progressbar"
              style="width: 85%; height: 6px;"
              aria-valuenow="25"
              aria-valuemin="0"
              aria-valuemax="100"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">MIS COMPRAS</h5>
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Cod Referencia</th>
                      <th>Fecha de Compra</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($purachases as $purachase )
                      <tr>
                        <td class="link">{{ $purachase->id }}</td>
                        <td>{{ $purachase->codReference }}</td>
                        <td>{{ $purachase->created_at }}</td>
                      </tr>
                    @endforeach

                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
      <div class="card ">
          <img class="card-img" height="350" src="../assets/images/big/img1.jpg" alt="Card image">
          <div class="card-img-overlay card-inverse social-profile-first bg-over">
              <img src="../assets/images/users/1.jpg" class="img-circle" width="100">
              <h4 class="card-title text-white">John doe</h4>
              <h5 class="text-white">info@myadmin.com</h5>
          </div>
          <div class="card-body text-center">
              <div class="row">
                  <div class="col">
                      <h3 class="m-b-0">12K</h3>
                      <h5 class="font-light">Followers</h5></div>
                  <div class="col">
                      <h3 class="m-b-0">420</h3>
                      <h5 class="font-light">Following</h5></div>
                  <div class="col">
                      <h3 class="m-b-0">128</h3>
                      <h5 class="font-light">Tweets</h5></div>
              </div>
          </div>
      </div>
  </div>
</div>
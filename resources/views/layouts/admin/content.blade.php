 <div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="icon-screen-desktop"></i></h3>
              <p class="text-muted">TOTAL CLIENTES</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-primary">{{ $clients }}</h2>
            </div>
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
              <h2 class="counter text-cyan">2</h2>
            </div>
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
              <h3><i class="icon-doc"></i></h3>
              <p class="text-muted">TOTAL VENTAS</p>
            </div>
            <div class="ml-auto">
              <h2 class="counter text-purple">{{ $clientCount }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">BROWSER STATS</h5>
              <table class="table browser m-t-30 no-border">
                  <tbody>
                      <tr>
                          <td style="width:40px"><img src="../assets/images/browser/chrome-logo.png" alt="logo"></td>
                          <td>Google Chrome</td>
                          <td align="right"><span class="badge badge-pill badge-info">23%</span></td>
                      </tr>
                      <tr>
                          <td><img src="../assets/images/browser/firefox-logo.png" alt="logo"></td>
                          <td>Mozila Firefox</td>
                          <td align="right"><span class="badge badge-pill badge-success">15%</span></td>
                      </tr>
                      <tr>
                          <td><img src="../assets/images/browser/safari-logo.png" alt="logo"></td>
                          <td>Apple Safari</td>
                          <td align="right"><span class="badge badge-pill badge-primary">07%</span></td>
                      </tr>
                      <tr>
                          <td><img src="../assets/images/browser/internet-logo.png" alt="logo"></td>
                          <td>Internet Explorer</td>
                          <td align="right"><span class="badge badge-pill badge-warning">09%</span></td>
                      </tr>
                      <tr>
                          <td><img src="../assets/images/browser/opera-logo.png" alt="logo"></td>
                          <td>Opera mini</td>
                          <td align="right"><span class="badge badge-pill badge-danger">23%</span></td>
                      </tr>
                      <tr>
                          <td><img src="../assets/images/browser/internet-logo.png" alt="logo"></td>
                          <td>Microsoft edge</td>
                          <td align="right"><span class="badge badge-pill badge-cyan">09%</span></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="col-md-4">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">CPU LOAD</h5>
              <div class="stats-row m-t-20 m-b-20">
                  <div class="stat-item">
                      <h6>Usage</h6> <b>60GB</b></div>
                  <div class="stat-item">
                      <h6>Space</h6> <b>320 GB</b></div>
                  <div class="stat-item">
                      <h6>CPU</h6> <b>50%</b></div>
              </div>
              <div>
                  <div id="placeholder" class="demo-placeholder" style="width: 100%; height: 330px; padding: 0px; position: relative;"><canvas class="flot-base" width="437" height="412" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 350.263px; height: 330px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 313px; left: 10px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 250px; left: 4px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 188px; left: 3px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 125px; left: 3px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 63px; left: 3px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 0px; text-align: right;">100</div></div></div><canvas class="flot-overlay" width="437" height="412" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 350.263px; height: 330px;"></canvas></div>
              </div>
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
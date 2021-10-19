@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'sidebar-mini',
    'activePage' => 'icons',
])


@section('content')
  <div class="panel-header panel-header-lg" style="height:500px;">
    <canvas id="bigDashboardChart"></canvas>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-chart">
          <div class="card-header">

            <h5 class="card-category">Donors</h5>
            <h4 class="card-title">Plasma Donors</h4>
            <!-- <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div> -->
          </div>
          <div class="card-body">
            <div class="chart-area" style="height:300px;">
              <canvas id="barChartSimpleGradientsNumbersPlasma"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Donors</h5>
            <h4 class="card-title">Oxygen Cylinder Donors</h4>
           
            <!-- <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div> -->
          </div>
          <div class="card-body">
            <div class="chart-area" style="height:300px;">
              <canvas id="barChartSimpleGradientsNumbersOxygen"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- row 1 ends -->
  </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      var states =<?php echo ($state_arr );?>;
      var plasma =<?php echo ($plasma );?>;
      var oxygen =<?php echo ($oxygen );?>;

      demo.initDashboardPageCharts(states,plasma,oxygen);

    });
  </script>
@endpush
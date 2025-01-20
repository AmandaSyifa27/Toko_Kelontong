@extends('layout')
@section('content')

<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Grafik Data Produk</div>
                <div class="card-body"><canvas id="grafik_produk" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Grapik Data Transaksi</div>
                <div class="card-body"><canvas id="grafik_transaksi" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    
</div>
{{-- 
<script>
    var lbls = {{ Js::from($lbl) }};
    var produks = {{ Js::from($dt) }};

    var ctx = document.getElementById('grafik_produk');
    var grafik_produk = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lbls,
            datasets: [{
                label: 'Jumlah Stok Produk',
                backgroundColor: rgba(2, 117, 216, 1),
                borderColor: rgba(2, 117, 216, 1),
                data: produks
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: "Month"
                    },
                    gridlines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 1500,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: true
                    }
                }],
            },
            legend: {
                display: true //false
            }
        }
    });
</script> --}}
<script>
    var lbls = {{ Js::from($lbl) }};
    var produks = {{ Js::from($dt) }};
    
    var ctx = document.getElementById("grafik_produk");
    var grafik_produk = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: lbls,
        datasets: [{
          label: "Stok Produk",
          backgroundColor: "rgba(2,117,216,1)",
          borderColor: "rgba(2,117,216,1)",
          data: produks,
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'month'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 1500,
              maxTicksLimit: 5
            },
            gridLines: {
              display: true
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
       
    </script>
    <script>
    var transaksi = {{ Js::from($transaksi) }};
    console.log(transaksi[0].total_transaksi);
    

    var months = ["January","February","March","April","May","June","July",
    "August","September","October","November","December"];

    
    var ctx = document.getElementById("grafik_transaksi");
    var grafik_produk = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [months[transaksi[0].bulan - 1]],
        datasets: [{
          label: "Total Transaksi",
          backgroundColor: "rgba(2,117,216,1)",
          borderColor: "rgba(2,117,216,1)",
          data: [transaksi[0].total_transaksi],
        }],
      },
      options: {
        scales: {
          xAxes: [{
            // time: {
            //   unit: 'month'
            // },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 6
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 1500,
              maxTicksLimit: 5
            },
            gridLines: {
              display: true
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
    </script>

@endsection
@extends('profile.dashboard.dashboard')

@section('content')
@include('profile.dashboard.layouts.sidebar')

<div class="col-9 container-cards">
  <div class="row row-1 d-flex">
    <div class="col-6 komponent-dashboard">
      <div class="isi-komponent d-flex">
        <div class="col-2 col-icon d-flex align-items-center justify-content-center">
          <i class="material-icons-outlined mata">
            visibility
            </i>    
        </div>
        <div class="col-10 col-ket">
          <h4>Profil Dilihat</h4>
          <h2>{{ number_format($profile->profile_viewer, 0, ",", ".") }}</h2>
        </div>
      </div>
    </div>
    <div class="col-3 komponent-dashboard">
      <div class="isi-komponent">
        <div class="col-ket-2">
          <h4>
            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 6V2C20 0.89 19.1 0 18 0H2C0.9 0 0.00999999 0.89 0.00999999 2V6C1.11 6 2 6.9 2 8C2 9.1 1.11 10 0 10V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V10C18.9 10 18 9.1 18 8C18 6.9 18.9 6 20 6ZM18 4.54C16.81 5.23 16 6.53 16 8C16 9.47 16.81 10.77 18 11.46V14H2V11.46C3.19 10.77 4 9.47 4 8C4 6.52 3.2 5.23 2.01 4.54L2 2H18V4.54ZM9 11H11V13H9V11ZM9 7H11V9H9V7ZM9 3H11V5H9V3Z" fill="#797979"/>
            </svg>
            Event Aktif
          </h4>
          <h2 style="text-align: center;">{{ $count_active_event }} Event</h2>
        </div>
      </div>
    </div>
    <div class="col-3 komponent-dashboard">
      <div class="isi-komponent">
        <div class="col-ket-2 d-flex flex-column align-items-center">
          <div class="col-12">
            <h4 class="d-flex">
              <i class="material-icons-outlined jadwal-berlalu">
                today
                </i>
              Event Berlalu
            </h4>
          </div>
          <div class="col-12 d-flex justify-content-center  ">
            <h2>{{ $count_passed_event }} Event</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row row-1 d-flex">
    <div class="col-6 komponent-dashboard">
      <div class="isi-komponent d-flex">
        <div class="col-2 col-icon d-flex align-items-center justify-content-center">
          <i class="material-icons-outlined money-icon">
            attach_money
            </i>  
        </div>
        <div class="col-10 col-ket">
          <h4>Total Penjualan</h4>
          <h2>Rp {{ number_format($count_pendapatan, 0, ",", ".") }}</h2>
        </div>
      </div>
    </div>
    <div class="col-3 komponent-dashboard">
      <div class="isi-komponent">
        <div class="col-ket-2 d-flex flex-column align-items-center">
         
          <h4>
            <ion-icon name="document-outline" class="ion-paper"></ion-icon>
            
            Event Tersimpan
          </h4>
          <h2>{{ $count_drafted_event }} Event</h2>
        </div>
      </div>
    </div>
    <div class="col-3 komponent-dashboard">
      <div class="isi-komponent">
        <div class="col-ket-2 d-flex flex-column align-items-center">
          <div class="col-12">
            <h4 class="d-flex justify-content-center">
              <i class="material-icons-outlined icons-love">
                favorite
                </i>
              Favorit Event
            </h4>
          </div>
          <div class="col-12 d-flex justify-content-center  ">
            <h2>{{ $count_favorited_event }} Event</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row row-2 chart-mingguan">
    <div class="col-12 d-flex justify-content-center chart-container flex-column">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-6">
          <h4 class="judul-chart">Total Penjualan Tiket</h4>
        </div>
        <div class="col-6 d-flex justify-content-end">
          <button class="button-range">
            <i class="material-icons-outlined">
              chevron_left
              </i>
          </button>
          <p class="range-tanggal-tiket d-flex align-items-center">16 Agustus - 22 Agustus 2021</p>
          <button class="button-range">
            <i class="material-icons-outlined">
              chevron_right
              </i>
          </button>
        </div>
      </div>
      <div class="container-canvas">
        <canvas id="totalPenjualanTiket"></canvas>
      </div>
    </div>
  </div>

  <div class="row row-filter-dashboard">
    <div class="col-10">

    </div>
    <div class="col-2 d-flex align-items-center">
      <label for="filterChart">
        <i class="material-icons-outlined">
          filter_list
          </i>
      </label>
      <select id="filterChart" class="select-filter-chart" aria-label="Default select example">
        <option value="perbulan" selected>Perbulan</option>
        <option value="pertahun">Pertahun</option>
        <option value="2021">2021</option>
        <option value="2023">2020</option>
      </select>
    </div>
  </div>

  <div id="perbulan" class="row row-total-grafik">
    <div class="col-12 d-flex justify-content-center chart-container flex-column">
      <div class="row d-flex justify-content-center">
        <div class="col-6 d-flex align-items-start">
          <h4 class="judul-chart">Grafik Penjualan Perbulan</h4>
        </div>
        <div class="col-6 d-flex flex-column align-items-end">
         <p class="range-tanggal-total">
          01 Mei - 31 Mei
         </p>
         <p class="jumlah-perbulan">Rp 525.000</p>
         <div class="d-flex container-kenaikan">
          <i class="material-icons-outlined">
            trending_up
            </i>
            <p class="total-kenaikan">3%</p>
         </div>
        </div>
      </div>
      <div class="container-canvas">
      
        <canvas id="totalPenjualanBulan"></canvas>
      </div>
    </div>
  </div>

  <div id="pertahun" class="row row-total-grafik hide">
    <div class="col-12 d-flex justify-content-center chart-container flex-column">
      <div class="row d-flex justify-content-center">
        <div class="col-6 d-flex align-items-start">
          <h4 class="judul-chart">Grafik Penjualan Pertahun</h4>
        </div>
        <div class="col-6 d-flex flex-column align-items-end">
         <p class="range-tanggal-total">
         Tahun 2022 - 2023
         </p>
         <p class="jumlah-perbulan">Rp 3.000.000</p>
         <div class="d-flex container-kenaikan">
          <i class="material-icons-outlined">
            trending_up
            </i>
            <p class="total-kenaikan">3%</p>
         </div>
        </div>
      </div>
      <div class="container-canvas">
      
        <canvas id="totalPenjualanTahun"></canvas>
      </div>
    </div>
  </div>

  <div id="2021" class="row row-total-grafik hide">
    <div class="col-12 d-flex justify-content-center chart-container flex-column">
      <div class="row d-flex justify-content-center">
        <div class="col-6 d-flex align-items-start">
          <h4 class="judul-chart">Grafik Penjualan Tahun 2021</h4>
        </div>
        <div class="col-6 d-flex flex-column align-items-end">
         <p class="range-tanggal-total">
          Tahun 2021
         </p>
         <p class="jumlah-perbulan">Rp 3.000.000</p>
         <div class="d-flex container-kenaikan">
          <i class="material-icons-outlined">
            trending_up
            </i>
            <p class="total-kenaikan">3%</p>
         </div>
        </div>
      </div>
      <div class="container-canvas">
      
        <canvas id="totalPenjualanTahun2021"></canvas>
      </div>
    </div>
  </div>

  <div class="row row-doughnut">
    <div class="col-6">
      <div class="doughnut-container">
        <h4 class="judul-chart">Event Terlaris</h4>
        <canvas id="eventTerlaris"></canvas>
      </div>
    </div>
    <div class="col-6">
      <div class="doughnut-container">
        <h4 class="judul-chart">Kategori Terlaris</h4>
        <canvas id="kategoriTerlaris"></canvas>
      </div>  
    </div>
  </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/src/css/dasbor.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('javascript')
<script>  
  $(function() {
        $('#filterChart').change(function(){
            $('.row-total-grafik').hide();
            $('#' + $(this).val()).show();
        });
    });
</script>
<script>
  // You know what it is
  let kategoriTerlaris =  document.getElementById('kategoriTerlaris').getContext('2d');

  let eventTerlaris =  document.getElementById('eventTerlaris').getContext('2d');

  let totalPenjualanBulan =  document.getElementById('totalPenjualanBulan').getContext('2d');

  let totalPenjualanTahun =  document.getElementById('totalPenjualanTahun').getContext('2d');

  let totalPenjualanTahun2021 =  document.getElementById('totalPenjualanTahun2021').getContext('2d');

// Bar Chart Perhari
  const labels = [
  'Senin',
  'Selasa',
  'Rabu',
  'Kamis',
  'Jumat',
  'Sabtu',
  'Minggu'
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Penjualan Tiket Perhari',
      backgroundColor: ['#F1F1F1', '#F1F1F1', '#F1F1F1', '#F1F1F1', '#F1F1F1', '#ED3D3D'],
      borderColor: 'rgb(255, 99, 132)',
      data: [2100, 3500, 2320, 4300, 3201, 3000],
    }]
  };

  const config = {
  type: 'bar',
  data: data,
  options: {
    barThickness: 48,
    responsive: true,
    maintainAspectRatio: false,
    scales: {
            y: {
              beginAtZero: true,
                  ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 6,
                    padding: 20
                  },
                  gridLines: {
                    drawTicks: false,
                    display: false
                  }

            },
            x: {
                  grid: {
                    display: false,
                  },
                  ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                  }
            }
          }
  }
};

var totaljualTiket = new Chart(
    document.getElementById('totalPenjualanTiket'),
    config
  );

// Line chart Bulanan
  var gradientStroke = totalPenjualanBulan.createLinearGradient(500, 0, 100, 0);
  gradientStroke.addColorStop(0, '#219653');
  gradientStroke.addColorStop(1, '#219653');

  var gradientFill = totalPenjualanBulan.createLinearGradient(0, 250, 0, 50);
  gradientFill.addColorStop(1, "#219653");
  gradientFill.addColorStop(0, "rgba(111, 207, 151, 0)");

  const labelsBulan = [
   "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", 'Sep', 'Okt', 'Nov', 'Des'
  ];

  const dataBulan = {
    labels: labelsBulan,
    datasets: [{
            label: "Jumlah Penjualan",
            borderColor: gradientStroke,
            pointBorderColor: gradientStroke,
            pointBackgroundColor: gradientStroke,
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointBorderWidth: 1,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 3,
            data: [500000, 550000, 600000, 430000, 850000, 550000, 650000]
   }]
  }

  var myChart = new Chart(totalPenjualanBulan, {
    type: 'line',
    data: dataBulan,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: "bottom"
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 6,
                    padding: 20
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            },
            x: {
                grid: {
                    display: false,
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }
        }
    }
  });

  const labelsTahun = [
   2021, 2022, 2023, 2024, 2025
  ];

  const dataTahun = {
    labels: labelsTahun,
    datasets: [{
            label: "Jumlah Penjualan",
            borderColor: gradientStroke,
            pointBorderColor: gradientStroke,
            pointBackgroundColor: gradientStroke,
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointBorderWidth: 1,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 3,
            data: [500000, 550000, 600000, 430000, 850000]
   }]
  }

  // var gradientStroke = totalPenjualanTahun.createLinearGradient(500, 0, 100, 0);
  // gradientStroke.addColorStop(0, '#219653');
  // gradientStroke.addColorStop(1, '#219653');

  // var gradientFill = totalPenjualanTahun.createLinearGradient(0, 250, 0, 50);
  // gradientFill.addColorStop(1, "#219653");
  // gradientFill.addColorStop(0, "rgba(111, 207, 151, 0)");

  var myChart = new Chart(totalPenjualanTahun, {
    type: 'line',
    data: dataTahun,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: "bottom"
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 6,
                    padding: 20
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            },
            x: {
                grid: {
                    display: false,
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }
        }
    }
  });

  const labelsTahun2021 = [
  "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", 'Sep', 'Okt', 'Nov', 'Des'
  ];

  const dataTahun2021 = {
    labels: labelsTahun2021,
    datasets: [{
            label: "Jumlah Penjualan",
            borderColor: gradientStroke,
            pointBorderColor: gradientStroke,
            pointBackgroundColor: gradientStroke,
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointBorderWidth: 1,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 3,
            data: [500000, 550000, 600000, 430000, 850000, 400200, 530000, 52500, 1234567]
   }]
  }

  // var gradientStroke = totalPenjualanTahun.createLinearGradient(500, 0, 100, 0);
  // gradientStroke.addColorStop(0, '#219653');
  // gradientStroke.addColorStop(1, '#219653');

  // var gradientFill = totalPenjualanTahun.createLinearGradient(0, 250, 0, 50);
  // gradientFill.addColorStop(1, "#219653");
  // gradientFill.addColorStop(0, "rgba(111, 207, 151, 0)");

  var myChart = new Chart(totalPenjualanTahun2021, {
    type: 'line',
    data: dataTahun2021,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: "bottom"
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 6,
                    padding: 20
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            },
            x: {
                grid: {
                    display: false,
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }
        }
    }
  });

  var myChart = new Chart(eventTerlaris, {
    type: 'doughnut',
    data: {
        labels: ["Review SNMPTN & SBMPTN", "Motivasi bersama Al Faiz", "Vocafest Festival", "Becoming UX Designer", "Lainnya"],
        datasets: [{
            label: "Jumlah Penjualan",
            borderColor: 'white',
            pointBorderColor: gradientStroke,
            pointBackgroundColor: gradientStroke,
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointBorderWidth: 1,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: true,
            backgroundColor: [
              '#F6333F',
              '#36C94D',
              '#F2D42F',
              '#FF6A10',
              '#797979',
            ],
            borderWidth: 3,
            data: [243, 191, 97, 92, 75]
        }]
    },
    options: {
      aspectRatio: 2,
        plugins: {
          legend: {
            position: 'right'
          }
        }
    }
  });
  var myChart = new Chart(kategoriTerlaris, {
    type: 'doughnut',
    data: {
        labels: ["Edukasi", "Festival", "UI/UX", "Lainnya"],
        datasets: [{
            label: "Jumlah Penjualan",
            borderColor: 'white',
            pointBorderColor: gradientStroke,
            pointBackgroundColor: gradientStroke,
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointBorderWidth: 1,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: true,
            backgroundColor: [
              '#F2D42F',
              '#FF6A10',
              '#F6333F',
              '#797979',
            ],
            borderWidth: 3,
            data: [330, 280, 75, 93]
        }]
    },
    options: {
      aspectRatio: 2,
        plugins: {
          legend: {
            position: 'right'
          }
        }
    }
  });
</script>
<script>

const labels = [
  'Senin',
  'Selasa',
  'Rabu',
  'Kamis',
  'Jumat',
  'Sabtu',
  'Minggu'
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Penjualan Tiket Perhari',
      backgroundColor: ['#F1F1F1', '#F1F1F1', '#F1F1F1', '#F1F1F1', '#F1F1F1', '#ED3D3D'],
      borderColor: 'rgb(255, 99, 132)',
      data: [300, 3500, 2320, 4300, 3201, 3000],
    }]
  };

  const config = {
  type: 'line',
  data: data,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      scales: {
               y: {
                   beginAtZero: true,
                   ticks: {
                       fontColor: "rgba(0,0,0,0.5)",
                       fontStyle: "bold",
                       beginAtZero: true,
                       maxTicksLimit: 6,
                       padding: 20
                   },
                   gridLines: {
                       drawTicks: false,
                       display: false
                   }

               },
               x: {
                   grid: {
                       display: false,
                   },
                   ticks: {
                       padding: 20,
                       fontColor: "rgba(0,0,0,0.5)",
                       fontStyle: "bold"
                   }
               }
            }
          }
  }
};

var totalPenjualanBulan = new Chart(
    document.getElementById('totalPenjualanBulan'),
    config
  );

</script>
@endpush

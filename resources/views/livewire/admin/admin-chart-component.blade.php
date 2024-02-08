<main class="main">
    <style>
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #F7F8F9;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat:hover{
            border-bottom: 2px solid #7952B3;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;

        }
        .bg-primary {
            color: #fff;
        }

        .bg-secondary {
            color: #fff;
        }

        .bg-warning {
            color: #fff;
        }

        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.admin.page-link')
                        <div class="col-md-10">
                            <div class="row ">
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-stat shadow bg-light">
                                        <div class="row">
                                            <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label">Total Amount</span>
                                                <span class="icon-stat-value">&#2547; {{$totalAmount}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer">
                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-stat shadow bg-warning">
                                        <div class="row">
                                            <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label text-white">Total Sales</span>
                                                <span class="icon-stat-value">{{$totalSales}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer text-white">
                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-stat shadow bg-primary">
                                        <div class="row">
                                            <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label text-white">Today Amount</span>
                                                <span
                                                    class="icon-stat-value">&#2547; {{$todayAmount}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer text-white">
                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <div class="icon-stat shadow bg-secondary">
                                        <div class="row ">
                                            <div class="col-xs-8 text-left ">
                                                <span class="icon-stat-label text-white">Today Sales</span>
                                                <span class="icon-stat-value">{{$todaySales}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer text-white">
                                            <i class="fi-rs-time-oclock "></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="col-md-12 shadow">
                                        <div class="tab-content dashboard-content">
                                            <div class="tab-pane fade active show" id="orders" role="tabpanel"
                                                 aria-labelledby="orders-tab">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>Live Order Amount Chart </h4>
                                                    </div>
                                                        <canvas id="myChart" wire:ignore></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
     setInterval(()=>Livewire.emit('collectData'),3000);
        var chartData=JSON.parse(`<?php echo $order ?>`)
        console.log(chartData)
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.label,
                datasets: [{
                    label: '# Order Amount',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                layout: {
                    padding: {
                        left: 5
                    }
                },

                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 18
                            }
                        }
                    }
                }
            }
        });


    /* window.livewire.on('barhasiUpdate',event=>{
         var chartData=JSON.parse(event.data);
         console.log(chartData)
     })
*/

     document.addEventListener('DOMContentLoaded', () => {
         this.livewire.on('chartUpdate',event => {
             var chartData=JSON.parse(event.data);
             //console.log(chartData)
             myChart.data.labels=chartData.label;
             myChart.data.datasets.forEach((dataset) => {
                 dataset.data=chartData.data;
             });
             myChart.update();
         });
     });
    </script>

@endpush



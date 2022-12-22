/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);
function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}

function getRandomRgb() {
    var num = Math.round(0xffffff * Math.random());
    var r = num >> 16;
    var g = num >> 8 & 255;
    var b = num & 255;
    return 'rgb(' + r + ', ' + g + ', ' + b + ')';
  }
app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service;
    const CAPTION_DATA_ALUMNI=[];
    const BACKGROUND_GRAFIK_ALUMNI=[];
    const JUMLAH_DATA_GRAFIK_ALUMNI=[];

    const CAPTION_DATA_MAHASISWA=[];
    const BACKGROUND_GRAFIK_MAHASISWA=[];
    const JUMLAH_DATA_GRAFIK_MAHASISWA=[];

    fun.dataAlumni=()=>{

        service.dataAlumni(obj=>{

            obj.forEach((key)=>{
                CAPTION_DATA_ALUMNI.push(key.tahun_lulus);
                BACKGROUND_GRAFIK_ALUMNI.push(getRandomRgb());
                JUMLAH_DATA_GRAFIK_ALUMNI.push(key.jumlah);
            })

            var datagrafikalumni={
                labels: CAPTION_DATA_ALUMNI,
                datasets: [{
                    data: JUMLAH_DATA_GRAFIK_ALUMNI,
                    backgroundColor: BACKGROUND_GRAFIK_ALUMNI,
                    borderColor:BACKGROUND_GRAFIK_ALUMNI,
                    borderWidth: 1,

                }]
            }
            var opt = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                events: false,
                legend: {
                    display: false
                },
                layout: {
                    padding:{
                        top:10
                    }
                },
                tooltips: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItem) {
                               return tooltipItem.yLabel;
                        }
                     }
                },
                hover: {
                    animationDuration: 0
                },
                animation: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                      },
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize,
                             Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y);
                            });
                        });
                    }
                }
            };

            var ctx = document.getElementById("myChart"),
            myLineChart = new Chart(ctx, {
       type: 'bar',
       data: datagrafikalumni,
       options: opt
    });


        })
    }

    fun.dataMahasiswa=()=>{
        service.dataMahasiswa(obj=>{

            obj.forEach((key)=>{
                CAPTION_DATA_MAHASISWA.push(key.tahun_akademik);
                BACKGROUND_GRAFIK_MAHASISWA.push(getRandomRgb());
                JUMLAH_DATA_GRAFIK_MAHASISWA.push(key.jumlah);
            })


            var datagrafikmahasiswa={
                labels: CAPTION_DATA_MAHASISWA,
                datasets: [{
                    data: JUMLAH_DATA_GRAFIK_MAHASISWA,
                    backgroundColor: BACKGROUND_GRAFIK_MAHASISWA,
                    borderColor:BACKGROUND_GRAFIK_MAHASISWA,
                    borderWidth: 1,
                    minBarLength: 2
                }]
            }
            var opt = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                events: false,
                legend: {
                    display: false
                },
                layout: {
                    padding:{
                        top:10
                    }
                },
                tooltips: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItem) {
                               return tooltipItem.yLabel;
                        }
                     }
                },
                hover: {
                    animationDuration: 10
                },
                animation: {
                    tension: {
                        duration: 1000,
                        from: 1,
                        to: 0,
                        loop: true
                      },
                    onComplete: function () {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize,
                             Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(data, bar._model.x, bar._model.y);
                            });
                        });
                    }
                }
            };

            var ctx = document.getElementById("myChart2"),
            myLineChart = new Chart(ctx, {
            type: 'bar',
            data: datagrafikmahasiswa,
            options: opt
    });


        })
    }

    fun.dataAlumni();

    fun.dataMahasiswa();
});

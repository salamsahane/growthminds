    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/assets/js/admin/main.js"></script>
    <script src="/assets/js/profilePicture.js"></script>
    <script src="/assets/js/admin/admin.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="/assets/js/admin/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="/assets/js/admin/init/fullcalendar-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.7.0/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- AlertifyJS -->
    <!-- <script src="/libraries/AlertifyJS/build/alertify.min.js"></!-->
    <script src="<?= DIRECTORY_SEPARATOR .'libraries' . DIRECTORY_SEPARATOR . 'AlertifyJS' . DIRECTORY_SEPARATOR .  'build' . DIRECTORY_SEPARATOR . 'alertify.min.js'?>"></script>


    <?php
        if(isset($_SESSION['alertify'])){
            echo $_SESSION['alertify'];
            unset($_SESSION['alertify']);
        }
    ?>

    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            $('[data-toggle="popover"]').popover({
                html: true
            })

            // Pie chart flotPie1
            var prospect_male = $('.prospect_male').val();
            var prospect_female = $('.prospect_female').val();

            var options = {
                series: [Number(prospect_male), Number(prospect_female)],
                chart: {
                    type: 'donut',
                    width: 300
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                total:  {
                                    show: true,
                                    showAlways: true
                                }
                            }
                        }
                    }
                },
                stroke: {
                    width: 0
                },
                labels: ["Male Prospects", 'Female Prospects'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chartProspectGender = new ApexCharts(document.querySelector("#flotPie1"), options);
            chartProspectGender.render();
            // Pie chart flotPie1  End

            var prospect_active = $('.prospect_active').val();
            var prospect_not_active = $('.prospect_not_active').val();

            var options = {
                series: [Number(prospect_active), Number(prospect_not_active)],
                chart: {
                    type: 'donut',
                    width: 300
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                total:  {
                                    show: true,
                                    showAlways: true
                                }
                            }
                        }
                    }
                },
                stroke: {
                    width: 0
                },
                fill: {
                    colors: ['#00c292', '#fb9678']
                },
                labels: ["Active", 'Not Active'],
                legend: {
                    markers: {
                        fillColors: ['#00c292', '#fb9678']
                    }
                },
                tooltip: {
                    fillSeriesColor: true,
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chartProspectStatus = new ApexCharts(document.querySelector("#flotPie2"), options);
            chartProspectStatus.render();
            // Pie chart flotPie2  End

            var number_visits = $('.number_visits').val();
            var unique_visitors_nbr = $(".unique_visitors").val();
            var optionsVisitors = {
                series: [{
                    name: ["Total"],
                    data: [Number(number_visits), Number(unique_visitors_nbr)]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                        // console.log(chart, w, e)
                        }
                    }
                },
                colors: ['#ce2135', '#b3d8d8'],
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true
                    }
                },
                labels: ['Visits', 'Unique Visitors'],
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: [
                        'Visits',
                        'Unique Visitors'
                    ],
                    labels: {
                        style: {
                            colors: ['#ce2135', '#b3d8d8'],
                            fontSize: '12px'
                        }
                    }
                }
        };

        var chartVisitors = new ApexCharts(document.querySelector("#traffic-chart"), optionsVisitors);
        chartVisitors.render();

            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script>
</body>
</html>
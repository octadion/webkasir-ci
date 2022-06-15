$(function () {


    // Setting waku default

    var startDate = Date.create().addDays(-6), // 7 days ago

            endDate = Date.create(); // today


    var range = $('#range');


    // Tampilkan tanggal sesuai format

    range.val(startDate.format('{yyyy}-{MM}-{dd}') + ' - '

            + endDate.format('{yyyy}-{MM}-{dd}'));


    // Load chart atau statistik

    ajaxLoadChart(startDate, endDate);


    range.daterangepicker({

        startDate: startDate,

        endDate: endDate,

        ranges: {

            'Hari Ini': ['today', 'today'],

            'Kemarin': ['yesterday', 'yesterday'],

            '7 Hari yang Lalu': [Date.create().addDays(-6), 'today'],

            '30 Hari yang Lalu': [Date.create().addDays(-29), 'today']

        }

    }, function (start, end) {

        ajaxLoadChart(start, end);

    });


    // Fungsi untuk meload data menggunakan AJAX dan menampilkannya dalam chart

    function ajaxLoadChart(startDate, endDate) {

        // Jika data tidak ada chart akan dibersihkan

        if (!startDate || !endDate) {

            return;

        }

        // AJAX request

        $.post('http://localhost/highchart/index.php/statistik/get_chart_data', {

            start: startDate.format('{yyyy}-{MM}-{dd}'),

            end: endDate.format('{yyyy}-{MM}-{dd}')

        }, function (data) {

            if ((data.indexOf("No record found") > -1)

                    || (data.indexOf("Tanggal Wajib dipilih") > -1)) {

                $('#msg').html('<span style="color:red;">' + data + '</span>');

            } else {

                $('#msg').empty();

                $('#chart').highcharts({

                    chart: {

                        type: 'line',

                        zoomType: 'x'

                    },

                    title: {

                        text: 'Statistik cuaca'

                    },

                    xAxis: {

                        type: 'datetime'

                    },

                    yAxis: {

                        title: {

                            text: null

                        }

                    },

                    tooltip: {

                        crosshairs: true,

                        shared: true,

                        valueSuffix: '°C'

                    },

                    legend: {

                        enabled: false

                    },

                    series: [{

                            name: 'Temperatur',

                            data: data

                        }]

                });

            }

        }, 'json');

    }

});
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center">
            Total Lowongan Dibuka Berdasarkan Department per Bulan
        </h1>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <span class="fw-bold">Filter</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="kode_departement_1" class="form-label">Departement</label>
                            <select id="kode_departement_1" class="form-select">
                                <option value="">Semua Departemen</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->kode_department }}">
                                        {{ $departement->nama_department }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode_jabatan_1" class="form-label">Jabatan</label>
                            <select id="kode_jabatan_1" class="form-select">
                                <option value="">Semua Jabatan</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->kode_jabatan }}">
                                        {{ $jabatan->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5">
                <hr />
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h1 class="text-center">
            Total Pelamar Berdasarkan Department per Bulan
        </h1>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <span class="fw-bold">Filter</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="kode_departement_2" class="form-label">Departement</label>
                            <select id="kode_departement_2" class="form-select">
                                <option value="">Semua Departemen</option>
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->kode_department }}">
                                        {{ $departement->nama_department }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode_jabatan_2" class="form-label">Jabatan</label>
                            <select id="kode_jabatan_2" class="form-select">
                                <option value="">Semua Jabatan</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->kode_jabatan }}">
                                        {{ $jabatan->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5">
                <hr />
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h1 class="text-center">
            Total Lowongan Dibuka Expired
        </h1>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4 offset-md-4 col-lg-6 offset-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let kodeDepartement1 = $('#kode_departement_1')
        let kodeJabatan1 = $('#kode_jabatan_1')
        let chart1Wrapper = $('#chart1')

        let kodeDepartement2 = $('#kode_departement_2')
        let kodeJabatan2 = $('#kode_jabatan_2')
        let chart2Wrapper = $('#chart2')

        let chart3Wrapper = $('#chart3')

        let chart1 = new Chart(chart1Wrapper, {
            type: 'bar',
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                datasets: [{
                    label: '# Lowongan',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        },
                    }
                }
            }
        });

        let chart2 = new Chart(chart2Wrapper, {
            type: 'bar',
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                datasets: [{
                    label: '# Pelamar',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        },
                    }
                }
            }
        });

        $(window).resize(function() {
            chart1.update();
            chart2.update();
            chart3.update();
        });

        $(document).ready(() => {
            getChart1()
            kodeDepartement1.on('change', getChart1)
            kodeJabatan1.on('change', getChart1)

            getChart2()
            kodeDepartement2.on('change', getChart2)
            kodeJabatan2.on('change', getChart2)

            getChart3()
        })

        function getChart1() {
            console.log("get chart 1")
            $.ajax({
                url: `{{ route('report.chart1') }}`,
                method: 'get',
                dataType: 'json',
                data: {
                    kode_departement: $('#kode_departement_1').val(),
                    kode_jabatan: $('#kode_jabatan_1').val(),
                },
                beforeSend: () => {}
            }).always(() => {

            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)
                if (e.code == 200) {
                    showChart1(e.data_value)
                }
            })

        }

        function showChart1(value) {
            for (let i = 0; i < 12; i++) {
                console.log(value[i])
                let curval = value[i]
                chart1.data.datasets[0].data[i] = curval
            }
            chart1.update();
        }

        function getChart2() {
            console.log("get chart 2")
            $.ajax({
                url: `{{ route('report.chart2') }}`,
                method: 'get',
                dataType: 'json',
                data: {
                    kode_departement: $('#kode_departement_2').val(),
                    kode_jabatan: $('#kode_jabatan_2').val(),
                },
                beforeSend: () => {}
            }).always(() => {

            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)
                if (e.code == 200) {
                    showChart2(e.data_value)
                }
            })

        }

        function showChart2(value) {
            for (let i = 0; i < 12; i++) {
                console.log(value[i])
                let curval = value[i]
                chart2.data.datasets[0].data[i] = curval
            }
            chart2.update();
        }

        function getChart3() {
            console.log("get chart 3")
            $.ajax({
                url: `{{ route('report.chart3') }}`,
                method: 'get',
                dataType: 'json',
                beforeSend: () => {}
            }).always(() => {

            }).fail(e => {
                console.log(e.responseText)
            }).done(e => {
                console.log(e)
                if (e.code == 200) {
                    showChart3(e.data_label, e.data_value)
                }
            })
        }

        function showChart3(label, value) {
            new Chart(chart3Wrapper, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: '# Lowongan',
                        data: value,
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                            },
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIDARA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <style>
        table,
        thead,
        th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container d-flex flex-column">
                <div class="section-title" data-aos="fade-up">
                    <h2>SiDaRa</h2>
                    <p style="color: #07523D">Clustering Tanaman {{ $namaTanaman }}</p>
                </div>
                <div class="row" data-aos="fade-left">
                    <div class="container d-flex gap-5">
                        <div class="col-12">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab" tabindex="0">
                                <div class="p-3">
                                    <h4><b>Data Produksi</b></h4>
                                    <table class="table datatable-init">
                                        <thead>
                                            <th>No</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Produksi 2019/Kw</th>
                                            <th>Produksi 2020/Kw</th>
                                            <th>Produksi 2021/Kw</th>
                                            <th>Produksi 2022/Kw</th>
                                            <th>Produksi 2023/Kw</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($produksi as $index => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item['namaKabKota'] }}</td>
                                                    <td>{{ $item['tahun1'] }}</td>
                                                    <td>{{ $item['tahun2'] }}</td>
                                                    <td>{{ $item['tahun3'] }}</td>
                                                    <td>{{ $item['tahun4'] }}</td>
                                                    <td>{{ $item['tahun5'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                                tabindex="0">
                                <h4><b>Hasil Klaster</b></h4>
                                <!-- Canvas for Pie Chart -->

                                <h3 class="mt-2">Clusters dan Label</h3>
                                <div class="py-3">
                                    @php
                                        $clusterRangking = [];
                                        rsort($clusters);
                                    @endphp
                                    @foreach ($clusters as $clusterIndex => $clusterData)
                                        <h4 class="mt-2">Cluster {{ $clusterIndex + 1 }}</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Kabupaten/Kota</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $sumTotal = 0;
                                                    $numDataPoints = count($clusterData);
                                                @endphp
                                                @foreach ($clusterData as $dataPoint)
                                                    @php
                                                        $sumPerDataPoint = array_sum($dataPoint);
                                                        $sumTotal += $sumPerDataPoint;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $kabupaten[array_search($dataPoint, $dataInput)] }}
                                                        </td>
                                                        <td><strong>{{ $sumPerDataPoint }}</strong></td>
                                                    </tr>
                                                @endforeach
                                                @php
                                                    $averageSum = $sumTotal / $numDataPoints;
                                                    $clusterRangking[] = $averageSum;
                                                @endphp
                                                <tr>
                                                    <td><strong>Rata-rata</strong></td>
                                                    <td><strong>{{ number_format($averageSum, 2) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                    <h4 class="mt-2">Label</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Cluster</th>
                                                <th>Label</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sortedClusterRangking = $clusterRangking;
                                                rsort($sortedClusterRangking);
                                                $highCluster = $sortedClusterRangking[0];
                                                $mediumCluster = $sortedClusterRangking[1];
                                            @endphp
                                            @for ($i = 0; $i <= count($clusterRangking) - 1; $i++)
                                                <tr>
                                                    <td><strong>Cluster {{ $i + 1 }}</strong></td>
                                                    <td>
                                                        <strong>
                                                            @if ($clusterRangking[$i] == $highCluster)
                                                                Tinggi
                                                            @elseif ($clusterRangking[$i] == $mediumCluster)
                                                                Sedang
                                                            @else
                                                                Rendah
                                                            @endif
                                                        </strong>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->
    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assetsUser/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assetsUser/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assetsUser/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsUser/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assetsUser/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assetsUser/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <style>
        .container {
            display: flex;
        }

        .tabs-container {
            margin-left: 20px;
        }
    </style>
    <script src="{{ asset('assetsUser/assets/js/main.js') }}"></script>
    <script>
        function showTabs() {
            document.getElementById('tabs-container').style.display = 'block';
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>

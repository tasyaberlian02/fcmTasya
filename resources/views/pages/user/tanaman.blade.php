<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIDARA</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assetsUser/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assetsUser/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUser/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUser/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUser/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUser/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUser/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsUser/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsUser/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <svg width="119" height="27" viewBox="0 0 119 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.436 17.144C4.94 18.056 5.504 18.848 6.128 19.52C6.776 20.192 7.472 20.708 8.216 21.068C8.984 21.428 9.788 21.608 10.628 21.608C11.516 21.608 12.248 21.392 12.824 20.96C13.4 20.504 13.688 19.892 13.688 19.124C13.688 18.476 13.52 17.96 13.184 17.576C12.848 17.168 12.308 16.784 11.564 16.424C10.82 16.064 9.836 15.656 8.612 15.2C8.012 14.984 7.316 14.684 6.524 14.3C5.756 13.916 5.024 13.424 4.328 12.824C3.632 12.2 3.056 11.456 2.6 10.592C2.144 9.704 1.916 8.636 1.916 7.388C1.916 5.9 2.3 4.616 3.068 3.536C3.86 2.456 4.916 1.64 6.236 1.088C7.58 0.511999 9.068 0.223999 10.7 0.223999C12.38 0.223999 13.832 0.499999 15.056 1.052C16.304 1.604 17.336 2.3 18.152 3.14C18.968 3.98 19.592 4.832 20.024 5.696L15.38 8.288C15.02 7.688 14.6 7.172 14.12 6.74C13.664 6.284 13.148 5.936 12.572 5.696C12.02 5.432 11.42 5.3 10.772 5.3C9.908 5.3 9.248 5.492 8.792 5.876C8.336 6.236 8.108 6.692 8.108 7.244C8.108 7.82 8.324 8.324 8.756 8.756C9.212 9.188 9.848 9.584 10.664 9.944C11.504 10.304 12.512 10.688 13.688 11.096C14.576 11.432 15.404 11.828 16.172 12.284C16.94 12.716 17.612 13.244 18.188 13.868C18.788 14.492 19.256 15.212 19.592 16.028C19.928 16.844 20.096 17.78 20.096 18.836C20.096 20.108 19.832 21.248 19.304 22.256C18.8 23.24 18.104 24.068 17.216 24.74C16.352 25.412 15.356 25.916 14.228 26.252C13.124 26.612 11.984 26.792 10.808 26.792C9.176 26.792 7.652 26.504 6.236 25.928C4.844 25.328 3.632 24.524 2.6 23.516C1.568 22.508 0.764 21.404 0.188 20.204L4.436 17.144ZM23.3 3.212C23.3 2.348 23.612 1.652 24.236 1.124C24.86 0.571998 25.604 0.295998 26.468 0.295998C27.356 0.295998 28.1 0.571998 28.7 1.124C29.324 1.652 29.636 2.348 29.636 3.212C29.636 4.076 29.324 4.784 28.7 5.336C28.1 5.888 27.356 6.164 26.468 6.164C25.604 6.164 24.86 5.888 24.236 5.336C23.612 4.784 23.3 4.076 23.3 3.212ZM23.84 9.44H29.096V26H23.84V9.44ZM34.1132 0.799998H40.3772V26H34.1132V0.799998ZM43.1132 26H38.1452V20.6H42.8972C43.8572 20.6 44.7812 20.48 45.6692 20.24C46.5812 20 47.3732 19.604 48.0452 19.052C48.7412 18.5 49.2932 17.768 49.7012 16.856C50.1092 15.92 50.3132 14.768 50.3132 13.4C50.3132 12.032 50.1092 10.892 49.7012 9.98C49.2932 9.044 48.7412 8.3 48.0452 7.748C47.3732 7.196 46.5812 6.8 45.6692 6.56C44.7812 6.32 43.8572 6.2 42.8972 6.2H38.1452V0.799998H43.1132C45.8732 0.799998 48.2612 1.316 50.2772 2.348C52.2932 3.38 53.8532 4.832 54.9572 6.704C56.0612 8.576 56.6132 10.808 56.6132 13.4C56.6132 15.968 56.0612 18.2 54.9572 20.096C53.8532 21.968 52.2932 23.42 50.2772 24.452C48.2612 25.484 45.8732 26 43.1132 26ZM64.1876 20.816C64.1876 21.248 64.2956 21.62 64.5116 21.932C64.7276 22.22 65.0156 22.448 65.3756 22.616C65.7356 22.76 66.1316 22.832 66.5636 22.832C67.1876 22.832 67.7636 22.7 68.2916 22.436C68.8196 22.172 69.2516 21.776 69.5876 21.248C69.9236 20.72 70.0916 20.072 70.0916 19.304L70.6676 21.464C70.6676 22.52 70.3796 23.42 69.8036 24.164C69.2276 24.884 68.4836 25.436 67.5716 25.82C66.6596 26.18 65.6756 26.36 64.6196 26.36C63.5636 26.36 62.5796 26.168 61.6676 25.784C60.7796 25.376 60.0596 24.776 59.5076 23.984C58.9796 23.192 58.7156 22.232 58.7156 21.104C58.7156 19.52 59.2796 18.272 60.4076 17.36C61.5356 16.424 63.1316 15.956 65.1956 15.956C66.2036 15.956 67.1036 16.052 67.8956 16.244C68.7116 16.436 69.4076 16.676 69.9836 16.964C70.5596 17.252 70.9916 17.552 71.2796 17.864V20.276C70.7036 19.844 70.0316 19.52 69.2636 19.304C68.5196 19.064 67.7276 18.944 66.8876 18.944C66.2396 18.944 65.7236 19.016 65.3396 19.16C64.9556 19.304 64.6676 19.52 64.4756 19.808C64.2836 20.072 64.1876 20.408 64.1876 20.816ZM61.7756 14.516L59.9396 10.88C60.8756 10.424 62.0036 9.992 63.3236 9.584C64.6436 9.176 66.0836 8.972 67.6436 8.972C69.1076 8.972 70.4156 9.188 71.5676 9.62C72.7196 10.028 73.6316 10.628 74.3036 11.42C74.9756 12.212 75.3116 13.184 75.3116 14.336V26H70.0916V15.56C70.0916 15.152 70.0196 14.804 69.8756 14.516C69.7556 14.204 69.5636 13.94 69.2996 13.724C69.0356 13.508 68.6996 13.352 68.2916 13.256C67.9076 13.16 67.4636 13.112 66.9596 13.112C66.2156 13.112 65.4836 13.196 64.7636 13.364C64.0676 13.532 63.4556 13.736 62.9276 13.976C62.3996 14.192 62.0156 14.372 61.7756 14.516ZM86.2218 14.588H92.5218L100.406 26H93.2778L86.2218 14.588ZM79.9218 0.799998H86.0058V26H79.9218V0.799998ZM83.7378 5.948V0.799998H89.1018C91.2618 0.799998 93.0618 1.148 94.5018 1.844C95.9418 2.54 97.0338 3.512 97.7778 4.76C98.5218 5.984 98.8938 7.412 98.8938 9.044C98.8938 10.652 98.5218 12.08 97.7778 13.328C97.0338 14.552 95.9418 15.512 94.5018 16.208C93.0618 16.904 91.2618 17.252 89.1018 17.252H83.7378V12.536H88.6698C89.4858 12.536 90.1818 12.416 90.7578 12.176C91.3578 11.912 91.8138 11.54 92.1258 11.06C92.4378 10.556 92.5938 9.956 92.5938 9.26C92.5938 8.564 92.4378 7.976 92.1258 7.496C91.8138 6.992 91.3578 6.608 90.7578 6.344C90.1818 6.08 89.4858 5.948 88.6698 5.948H83.7378ZM106.902 20.816C106.902 21.248 107.01 21.62 107.226 21.932C107.442 22.22 107.73 22.448 108.09 22.616C108.45 22.76 108.846 22.832 109.278 22.832C109.902 22.832 110.478 22.7 111.006 22.436C111.534 22.172 111.966 21.776 112.302 21.248C112.638 20.72 112.806 20.072 112.806 19.304L113.382 21.464C113.382 22.52 113.094 23.42 112.518 24.164C111.942 24.884 111.198 25.436 110.286 25.82C109.374 26.18 108.39 26.36 107.334 26.36C106.278 26.36 105.294 26.168 104.382 25.784C103.494 25.376 102.774 24.776 102.222 23.984C101.694 23.192 101.43 22.232 101.43 21.104C101.43 19.52 101.994 18.272 103.122 17.36C104.25 16.424 105.846 15.956 107.91 15.956C108.918 15.956 109.818 16.052 110.61 16.244C111.426 16.436 112.122 16.676 112.698 16.964C113.274 17.252 113.706 17.552 113.994 17.864V20.276C113.418 19.844 112.746 19.52 111.978 19.304C111.234 19.064 110.442 18.944 109.602 18.944C108.954 18.944 108.438 19.016 108.054 19.16C107.67 19.304 107.382 19.52 107.19 19.808C106.998 20.072 106.902 20.408 106.902 20.816ZM104.49 14.516L102.654 10.88C103.59 10.424 104.718 9.992 106.038 9.584C107.358 9.176 108.798 8.972 110.358 8.972C111.822 8.972 113.13 9.188 114.282 9.62C115.434 10.028 116.346 10.628 117.018 11.42C117.69 12.212 118.026 13.184 118.026 14.336V26H112.806V15.56C112.806 15.152 112.734 14.804 112.59 14.516C112.47 14.204 112.278 13.94 112.014 13.724C111.75 13.508 111.414 13.352 111.006 13.256C110.622 13.16 110.178 13.112 109.674 13.112C108.93 13.112 108.198 13.196 107.478 13.364C106.782 13.532 106.17 13.736 105.642 13.976C105.114 14.192 104.73 14.372 104.49 14.516Z"
                        fill="white" />
                </svg>
            </div>

            <nav id="navbar" class="navbar">
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Selamat Datang <span>SiDaRa</span></h1>
                        <h2>Sistem Informasi Clustering Daerah Penghasil Tanaman Hortikultura</h2>
                    </div>
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container d-flex flex-column">
                <div class="section-title" data-aos="fade-up">
                    <h2>SiDaRa</h2>
                    <p style="color: #07523D">Jenis Tanaman</p>
                </div>
                <div class="row" data-aos="fade-left">
                    <div class="container d-flex gap-5">
                        <div>
                            <div class="card col-3" style="width: 18rem;">
                                <ul class="list-group list-group-flush">
                                    @foreach ($tanaman as $item)
                                        <a href="{{ route('landing', $item->id) }}">
                                            @if ($item->id == substr(request()->url(), -1))
                                                <li class="list-group-item-active">{{ $item->namaTanaman }}</li>
                                            @else
                                                <li class="list-group-item">{{ $item->namaTanaman }}</li>
                                            @endif
                                        </a>
                                    @endforeach
                                    <a href="{{ route('rekap') }}">
                                        <li class="list-group-item"><b>Rekap Data</b></li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-9">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab"
                                        aria-controls="nav-home" aria-selected="true">Data Produksi</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Hasil Klaster</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="card card-bordered card-preview p-3">
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
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                    <!-- Canvas for Pie Chart -->
                                    <div class="pt-4 col-5 mx-auto">
                                        <h3>Persentase Data per Cluster</h3>
                                        <canvas id="pieChart" width="400" height="400"></canvas>
                                    </div>

                                    <h3 class="mt-2">Clusters dan Label</h3>
                                    <div class="card card-bordered p-3">
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
                            <a href="/tanaman/{{ $tanamanId }}/ekspor">
                                <div class="btn btn-success my-2">Ekspor</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div style="text-align: center" class="copyright">
                &copy; Copyright <strong><span>SiDaRa</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari server
            const clusters = @json($clusters);
            const centroids = @json($centroids);

            // Pastikan data diterima dengan benar
            console.log(clusters);
            console.log(centroids);

            // Siapkan data untuk Chart.js Pie Chart
            const clusterSizes = Object.values(clusters).map(cluster => cluster.length);
            const clusterLabels = Object.keys(clusters).map(index => `Cluster ${parseInt(index) + 1}`);

            // Pastikan elemen canvas ada
            const pieCtx = document.getElementById('pieChart')?.getContext('2d');
            if (!pieCtx) {
                console.error('Elemen canvas dengan id "pieChart" tidak ditemukan.');
                return;
            }

            // Definisikan warna untuk setiap cluster
            const colors = ['red', 'blue', 'green', 'purple', 'orange'];

            if (colors.length < clusterLabels.length) {
                console.error('Jumlah warna tidak cukup untuk semua cluster.');
                return;
            }

            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: clusterLabels,
                    datasets: [{
                        label: 'Cluster Distribution',
                        data: clusterSizes,
                        backgroundColor: colors.slice(0, clusterLabels.length)
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw;
                                    const total = context.chart._metasets[0].total;
                                    const percentage = ((value / total) * 100).toFixed(2);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>

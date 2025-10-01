<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | Home</title>
    <meta name="description" content="Portofolio Muhammad Bangkit Sanjaya, Web Developer dari Bandar Lampung.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

    <!-- Styles / Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
    <x-navbar />

    <!-- Content -->
    <div class="container">
        <div class="container content">
            <div>
                <h1 class="text-des text-center"><b>Portofolio</b></h1>
            </div>
            <div class="d-flex justify-content-center align-items-center hero-section">
                <div class="col-auto text-section">
                    <h1 class="side-text left-text">Riz</h1>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-transparent btn-lg" id="openDualModal">
                        <img class="foto" src="{{ asset('foto.png') }}" alt="Muhammad Bangkit Sanjaya">
                    </button>
                </div>
                <div class="col-auto text-section">
                    <h1 class="side-text right-text">Dev</h1>
                </div>
            </div>
            <div>
                <h5 class="text-des text-center">FullStack Developer and UI/UX Designer</h5>
            </div>
        </div>

        <!-- Modal Responsif (Desktop: 2 kolom rapat | Mobile: Tab) -->
        <div class="modal fade" id="dualModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header">
                        <!-- Tab Navigation untuk Mobile -->
                        <ul class="nav nav-tabs border-0 d-md-none w-100 justify-content-center" id="modalTab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active text-light bg-transparent border-0 rounded-pill px-4 py-2 mx-1"
                                    id="prestasi-tab" data-bs-toggle="tab" data-bs-target="#prestasi" type="button"
                                    role="tab">
                                    <i class="fas fa-trophy me-2"></i>Prestasi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-light bg-transparent border-0 rounded-pill px-4 py-2 mx-1"
                                    id="biodata-tab" data-bs-toggle="tab" data-bs-target="#biodata" type="button"
                                    role="tab">
                                    <i class="fas fa-user me-2"></i>Biodata
                                </button>
                            </li>
                        </ul>

                        <!-- Title untuk Desktop -->
                        <h5 class="modal-title d-none d-md-block mb-0">
                            <i class="fas fa-info-circle me-2"></i>Informasi RizDev
                        </h5>

                        <!-- Close Button -->
                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-0">
                        <!-- Desktop Layout: 2 Kolom -->
                        <div class="row g-0 h-100 d-none d-md-flex">
                            <!-- Kolom Prestasi (Desktop) -->
                            <div class="col-md-8 border-end border-secondary">
                                <div class="p-4">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="icon-wrapper me-3">
                                            <i class="fas fa-trophy text-warning fs-4"></i>
                                        </div>
                                        <h5 class="mb-0 gradient-text">Prestasi dan Sertifikat</h5>
                                    </div>

                                    @if ($certifs->count() > 0)
                                        <div class="certificates-grid">
                                            @foreach ($certifs as $certif)
                                                <div class="certificate-card">
                                                    <div class="certificate-image">
                                                        <img src="{{ route('gambar.show', ['path' => $certif->file]) }}"
                                                            alt="{{ $certif->name }}" class="img-fluid">
                                                        <div class="certificate-overlay">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                    </div>
                                                    <div class="certificate-info">
                                                        <h6 class="certificate-title">{{ $certif->name }}</h6>
                                                        <p class="certificate-publisher">{{ $certif->publisher }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="empty-state">
                                            <div class="empty-icon">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <h6>Belum ada sertifikat</h6>
                                            <p class="text-muted mb-0">Sertifikat akan ditampilkan di sini</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Kolom Biodata (Desktop) -->
                            <div class="col-md-4">
                                <div class="p-4 h-100">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="icon-wrapper me-3">
                                            <i class="fas fa-user text-info fs-4"></i>
                                        </div>
                                        <h5 class="mb-0 gradient-text">Biodata</h5>
                                    </div>

                                    @foreach ($users as $user)
                                        <div class="biodata-content">
                                            <div class="profile-avatar mb-3">
                                                <div class="avatar-circle">
                                                    <img class="avatar bg-dark" src="{{ asset('foto.png') }}"
                                                        alt="Foto Profil"
                                                        onerror="this.style.display='none'; this.previousElementSibling.style.display='block';">
                                                </div>
                                            </div>


                                            <div class="profile-info">
                                                <h3 class="profile-name">{{ $user->name }}</h3>
                                                <p class="profile-job">{{ $user->jobs }}</p>

                                                <div class="contact-info">
                                                    <div class="contact-item">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span>{{ $user->alamat }}</span>
                                                    </div>
                                                    <div class="contact-item">
                                                        <i class="fas fa-phone"></i>
                                                        <span>{{ $user->phone }}</span>
                                                    </div>
                                                    <div class="contact-item">
                                                        <i class="fas fa-envelope"></i>
                                                        <span>{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Layout: Tab Content -->
                        <div class="tab-content d-md-none" id="modalTabContent">
                            <!-- Tab Prestasi (Mobile) -->
                            <div class="tab-pane fade show active" id="prestasi" role="tabpanel">
                                <div class="p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-wrapper me-3">
                                            <i class="fas fa-trophy text-warning fs-5"></i>
                                        </div>
                                        <h6 class="mb-0 gradient-text">Prestasi dan Sertifikat</h6>
                                    </div>

                                    @if ($certifs->count() > 0)
                                        <div class="certificates-grid-mobile">
                                            @foreach ($certifs as $certif)
                                                <div class="certificate-card-mobile">
                                                    <div class="certificate-image-mobile">
                                                        <img src="{{ route('gambar.show', ['path' => $certif->file]) }}"
                                                            alt="{{ $certif->name }}" class="img-fluid">
                                                    </div>
                                                    <div class="certificate-info-mobile">
                                                        <h6 class="certificate-title-mobile">{{ $certif->name }}</h6>
                                                        <p class="certificate-publisher-mobile">
                                                            {{ $certif->publisher }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="empty-state-mobile">
                                            <i class="fas fa-certificate text-muted fs-1 mb-3"></i>
                                            <p class="text-muted">Belum ada sertifikat</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Tab Biodata (Mobile) -->
                            <div class="tab-pane fade" id="biodata" role="tabpanel">
                                <div class="p-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-wrapper me-3">
                                            <i class="fas fa-user text-info fs-5"></i>
                                        </div>
                                        <h6 class="mb-0 gradient-text">Biodata</h6>
                                    </div>

                                    @foreach ($users as $user)
                                        <div class="biodata-content-mobile">
                                            <div class="profile-info-mobile">
                                                <h4 class="profile-name-mobile">{{ $user->name }}</h4>
                                                <p class="profile-job-mobile">{{ $user->jobs }}</p>

                                                <div class="contact-info-mobile">
                                                    <div class="contact-item-mobile">
                                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                                        <span>{{ $user->alamat }}</span>
                                                    </div>
                                                    <div class="contact-item-mobile">
                                                        <i class="fas fa-phone text-success"></i>
                                                        <span>{{ $user->phone }}</span>
                                                    </div>
                                                    <div class="contact-item-mobile">
                                                        <i class="fas fa-envelope text-warning"></i>
                                                        <span>{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dualModal = new bootstrap.Modal(document.getElementById('dualModal'));

            document.getElementById('openDualModal').addEventListener('click', function() {
                dualModal.show();
            });

            // Tutup modal dengan ESC
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    dualModal.hide();
                }
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | About</title>
    <meta name="description"
        content="About {{ $users->isNotEmpty() ? $users->first()->name : 'Developer' }}, Web Developer dari Bandar Lampung.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon & Custom CSS -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>

<body>
    <x-navbar />

    <div class="container-fluid text-light">

        <!-- PROFILE SECTION -->
        @if ($users->isNotEmpty())
            @php $user = $users->first(); @endphp
            <div class="row justify-content-center mb-5 bg-transparent">
                <div class="col-12 col-lg-10">
                    <div class="profile-header">
                        <div class="row g-0 align-items-center">
                            <!-- Foto dengan Efek Glitch -->
                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                <div class="photo-container">
                                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('gambar.png') }}"
                                        alt="{{ $user->name }}" class="profile-img"
                                        style="aspect-ratio: 3/4; object-fit: cover; object-position: top;">
                                </div>
                            </div>

                            <!-- Nama & Bio -->
                            <div class="col-12 col-md-6 d-flex flex-column justify-content-center p-4 p-md-5">
                                <div class="text-center text-md-start">
                                    <h1 class="display-4 fw-bold mb-3 text-light">
                                        <span class="text-name">RizDev</span>
                                    </h1>
                                    <h2 class="fs-5 mb-4 text-muted">
                                        Muhammad Bangkit Sanjaya
                                    </h2>
                                    <p class="lead mb-4 opacity-85">
                                        {{ $user->bio ?? 'Web Developer from Bandar Lampung — crafting digital experiences with code, creativity, and passion.' }}
                                    </p>
                                    <p class="mb-4 opacity-75">
                                        {{ $user->about ?? 'Building modern web apps with Laravel, React, and a touch of cyberpunk flair. Let’s build the future together.' }}
                                    </p>
                                    <a href="#contact" class="btn btn-glow px-4 py-2 rounded-pill fw-medium">
                                        <i class="bi bi-envelope-fill me-2"></i> Let’s Connect
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- SKILLS SECTION -->
        @if ($skills->isNotEmpty())
            <div class="row mb-5">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">My Skills & Technologies</h2>
                    <p class="text-light small">Technologies I use to build exceptional digital experiences</p>
                </div>
                <div class="col-12">
                    <div class="row g-4">
                        @foreach ($skills as $skill)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="skill-item text-center">
                                    <div class="skill-name">{{ $skill->name }}</div>
                                    <div class="skill-level-bar mt-2">
                                        <div class="skill-level-fill" style="width: {{ $skill->description ?? 85 }}%;">
                                        </div>
                                    </div>
                                    <div class="mt-2 text-warning fw-medium">
                                        {{ $skill->description ?? 85 }}%
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- EDUCATION SECTION -->
        @if ($sekolah->isNotEmpty())
            <div class="row mb-5">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Education Journey</h2>
                    <p class="text-light small">My academic path and milestones</p>
                </div>
                <div class="col-12 col-lg-10 offset-lg-1">
                    @foreach ($sekolah as $edu)
                        <div class="timeline-item">
                            <div class="edu-card">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-3">
                                    <div>
                                        <p class="opacity-100 mb-0">{{ $edu->jenjang ?? 'High School.' }}</p>
                                        <h4 class="fw-bold mb-1">{{ $edu->instansi }}</h4>
                                        <p class="text-edu mb-0">{{ $edu->jurusan ?? 'General Studies' }}</p>
                                    </div>
                                    <span class="badge bg-dark px-3 py-2 text-edu">{{ $edu->tahun_masuk }} –
                                        {{ $edu->tahun_lulus }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- ORGANIZATIONS SECTION -->
        @if ($eskuls->isNotEmpty())
            <div class="row mb-5">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Organizations & Activities</h2>
                    <p class="text-light small">Where I’ve grown beyond the classroom</p>
                </div>
                <div class="col-12">
                    <div class="row g-4">
                        @foreach ($eskuls as $org)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="org-card">
                                    <h5 class="fw-bold mb-3">{{ $org->name }}</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span
                                            class="badge bg-primary text-light">{{ $org->jabatan ?? 'Member' }}</span>
                                        <small class="text-muted">{{ $org->period ?? 'Active' }}</small>
                                    </div>
                                    <p class="flex-grow-1 opacity-75">
                                        {{ $org->deskripsi ?? 'Contributed to team projects and community initiatives.' }}
                                    </p>
                                    <span class="badge bg-dark px-3 py-2 text-edu">{{ $edu->tahun_masuk }} –
                                        {{ $edu->tahun_lulus }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- PROJECTS SECTION -->
        @if ($projects->isNotEmpty())
    <div class="row mb-5">
        <div class="col-12 text-center mb-5">
            <h2 class="section-title text-cyan">Featured Projects</h2>
            <p class="text-light small">Things I've built while learning and solving real problems</p>
        </div>
        <div class="col-12">
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-12 col-md-6 col-lg-4 text-light">
                        <div class="project-card bg-dark border-cyan rounded-4 overflow-hidden h-100 d-flex flex-column position-relative shadow-lg">
                            <div class="position-relative">
                                <img src="{{ $project->thumbnail ? asset('storage/' . $project->thumbnail) : asset('images/project-placeholder.jpg') }}"
                                    alt="{{ $project->title }}" class="img-fluid w-100"
                                    style="aspect-ratio: 16/9; object-fit: cover;">
                                <div class="project-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-75 opacity-0 transition-all">
                                    <div class="text-center">
                                        @if ($project->demo_link)
                                            <a href="{{ $project->demo_link }}" target="_blank"
                                                class="btn btn-sm btn-cyan me-2 mb-2">
                                                <i class="bi bi-eye"></i> Live Demo
                                            </a>
                                        @endif
                                        @if ($project->github_link)
                                            <a href="{{ $project->github_link }}" target="_blank"
                                                class="btn btn-sm btn-outline-cyan">
                                                <i class="bi bi-github"></i> Code
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="fw-bold mb-3 text-white">{{ $project->title }}</h5>
                                <p class="text-light opacity-75 mb-4 flex-grow-1">
                                    {{ Str::limit($project->description, 120) }}
                                </p>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach (explode(',', $project->tech_stack) as $tech)
                                        <span class="badge bg-cyan-dark text-light px-3 py-1 rounded-pill">
                                            {{ trim($tech) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

    </div>

    <x-footer />

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Animate Skill Bars on Scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const skillBars = document.querySelectorAll('.skill-level-fill');
            skillBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Contact</title>
    <meta name="description" content="Let's connect! Reach out via email, WhatsApp, or social media.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
    <x-navbar />

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="contact-header">
                    <h1 class="display-5 fw-bold mb-3">Let’s Connect!</h1>
                    <p class="lead opacity-75">I’m just a message away. Reach out via form, WhatsApp, email, or socials.
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <!-- Connect With Me Section -->
            <div class="col-12">
                <h2 class="section-title text-center mb-5">Connect With Me</h2>
                <div class="row g-4">
                    @forelse($contacts as $contact)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ $contact->link }}" target="_blank" class="text-decoration-none">
                                <div class="social-card {{ $contact->icon }}">
                                    <div class="social-icon">
                                        @if ($contact->platform == 'Whatsapp')
                                            <a href="{{ $contact->url }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>
                                        @elseif($contact->platform == 'email')
                                            <a href="{{ $contact->url }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-envelope"></i>
                                            </a>
                                        @elseif($contact->platform == 'instagram')
                                            <a href="{{ $contact->url }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-instagram"></i>
                                            </a>
                                        @elseif($contact->platform == 'github')
                                            <a href="{{ $contact->url }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-github"></i>
                                            </a>
                                        @elseif($contact->platform == 'linkedin')
                                            <a href="{{ $contact->url }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                        @elseif($contact->platform == 'twitter')
                                            <a href="{{ $contact->url }}" target="_blank" class="text-decoration-none">
                                                <i class="bi bi-twitter-x"></i>
                                            </a>
                                        @else
                                            <i class="bi bi-link-45deg"></i>
                                        @endif
                                    </div>
                                    <h5 class="fw-bold">{{ $contact->name }}</h5>
                                    <p class="text-muted small mb-0">{{ $contact->value }}</p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center" role="alert">
                                No contact methods available yet.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-12 col-lg-7">
                <div class="contact-card">
                    <h3 class="fw-bold mb-4">Send Me a Message</h3>

                    <!-- Alert Placeholder -->
                    <div id="alert-placeholder" class="mb-4"></div>

                    <form id="contactForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="john@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Project Inquiry" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5"
                                placeholder="Tell me about your project..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-glow w-100 text-dark">
                            <span id="btn-text">Send Message</span>
                            <span id="btn-spinner" class="spinner-border spinner-border-sm ms-2 d-none"
                                role="status"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="col-12 col-lg-5">
                <div class="contact-card h-100">
                    <h3 class="fw-bold mb-4">About Me</h3>

                    @if ($users->isNotEmpty())
                        @php $user = $users->first(); @endphp
                        <div class="text-center mb-4">
                            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('foto.png') }}"
                                alt="{{ $user->name }}" class="rounded-circle mb-3"
                                style="width: 120px; height: 120px; object-fit: cover; object-position: top; border: 3px solid #07b9ff;">
                            <h4 class="mb-1">{{ $user->name }}</h4>
                            <p class="text-contact">{{ $user->bio ?? 'Web Developer' }}</p>
                        </div>
                    @endif

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-geo-alt text-contact me-3 fs-4"></i>
                            <div>
                                <h6 class="mb-0">Location</h6>
                                <p class="mb-0 opacity-75">Bandar Lampung, Indonesia</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock text-contact me-3 fs-4"></i>
                            <div>
                                <h6 class="mb-0">Response Time</h6>
                                <p class="mb-0 opacity-75">Within 24 hours</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle text-contact me-3 fs-4"></i>
                            <div>
                                <h6 class="mb-0">Availability</h6>
                                <p class="mb-0 opacity-75">Open for projects & collabs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />

    <!-- jQuery (for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                // Show loading state
                $('#btn-text').text('Sending...');
                $('#btn-spinner').removeClass('d-none');
                $('button[type="submit"]').prop('disabled', true);

                // Clear previous alerts
                $('#alert-placeholder').empty();

                $.ajax({
                    url: "{{ route('contact.send') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            showAlert('success', response.message);
                            $('#contactForm')[0].reset();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation errors
                            let errors = xhr.responseJSON.errors;
                            let errorMessages = '';
                            for (let field in errors) {
                                errorMessages += errors[field][0] + '<br>';
                            }
                            showAlert('error', errorMessages);
                        } else {
                            showAlert('error', xhr.responseJSON.message ||
                                'Something went wrong!');
                        }
                    },
                    complete: function() {
                        // Reset button state
                        $('#btn-text').text('Send Message');
                        $('#btn-spinner').addClass('d-none');
                        $('button[type="submit"]').prop('disabled', false);
                    }
                });
            });

            function showAlert(type, message) {
                let alertClass = type === 'success' ? 'alert-success-custom' : 'alert-error-custom';
                let icon = type === 'success' ? 'bi-check-circle' : 'bi-exclamation-circle';

                let alertHtml = `
                    <div class="alert ${alertClass} alert-dismissible fade show rounded-3" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bi ${icon} me-2 fs-4"></i>
                            <div>${message}</div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;

                $('#alert-placeholder').html(alertHtml);
                setTimeout(() => {
                    $('.alert').alert('close');
                }, 5000);
            }
        });
    </script>
</body>

</html>

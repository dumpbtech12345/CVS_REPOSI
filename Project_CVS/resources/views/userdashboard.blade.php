<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
         body {
            background-color: #d0dbe6; /* Subtle, modern light blue-gray */
            color: #333;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }

        .footer a {
            color: #f8f9fa;
        }

        .footer a:hover {
            color: #adb5bd;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fa-solid fa-user-circle text-primary me-2"></i>
                <span>User Dashboard</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-home me-1"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user me-1"></i> {{ $user->firstname ?? 'Guest' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                           
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex ms-lg-3">
                    <input class="form-control me-2" type="search" id="searchInput" placeholder="Search by name" aria-label="Search">
                    <button class="btn btn-outline-primary" type="button" id="searchButton"><i class="fa-solid fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

  

  




  <!-- Main Content -->
  <main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-file-alt"></i> Your CVs</h2>
        <a href="{{ route('UserCreateCv') }}" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Create New CV
        </a>
    </div>

    @if($cvData->isEmpty())
    <div class="alert alert-warning text-center">
        <i class="fa-solid fa-exclamation-circle"></i> You haven't created any CVs yet.
    </div>
    @else
    <div class="row g-4" id="cvContainer">
        @foreach ($cvData as $index => $cv)
        <div class="col-md-6 cv-card" data-name="{{ strtolower($cv->personalInfo->first_name) }} {{ strtolower($cv->personalInfo->last_name) }}">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa-solid fa-user"></i>
                        {{ $cv->personalInfo->first_name }} {{ $cv->personalInfo->last_name }}
                    </h5>
                    <p class="card-text">
                        <strong>Status:</strong>
                        <span class="badge {{ $cv->Status == 'Created' ? 'bg-success' : 'bg-warning' }}">
                            {{ $cv->Status }}
                        </span><br>
                        <strong>Application Link:</strong>
                        <a href="{{ $cv->application_link }}" target="_blank" class="text-decoration-none">
                            {{ $cv->application_link }}
                        </a><br>
                        <strong>Scheduled Date:</strong>
                        {{ $cv->scheduled_date ? $cv->scheduled_date->format('Y-m-d H:i') : 'Not Scheduled' }}<br>
                        <strong>Created At:</strong> {{ $cv->created_at->format('Y-m-d') }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('viewCVUser', $cv->personalInfo->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-eye"></i> View CV
                        </a>
                        <a href="{{ route('edit_cvs', ['id' => $cv->personalInfo->id]) }}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-edit"></i> Edit CV
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</main>

   <script>
document.getElementById('searchButton').addEventListener('click', function() {
            let searchQuery = document.getElementById('searchInput').value.toLowerCase();
            let cvCards = document.querySelectorAll('.cv-card');

            cvCards.forEach(function(card) {
                let cardName = card.getAttribute('data-name');

                if (cardName.includes(searchQuery)) {
                    card.style.display = ''; // Show card if it matches
                } else {
                    card.style.display = 'none'; // Hide card if it doesn't match
                }
            });
        });

   </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

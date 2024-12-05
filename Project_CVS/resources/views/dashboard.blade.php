<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Management Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Poppins', sans-serif;
            color: #495057;
        }

        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: #adb5bd;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            font-size: 1.6rem;
            color: #fff;
            text-align: center;
            margin-bottom: 1.8rem;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 8px;
        }

        .sidebar a:hover {
            color: #fff;
            background-color: #495057;
        }

        .sidebar a.active {
            color: #fff;
            background-color: #007bff;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e5e5e5;
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 0.8rem 1.5rem;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
           
        }

       

        .card h4 {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card .card-title i {
            font-size: 1.8rem;
        }

        table thead {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px;
        }

        table {
            font-size: 0.75rem; /* Smaller font for tables */
        }

        th, td {
            padding: 0.5rem 0.75rem; /* Smaller padding for table cells */
        }

        .status-badge {
            padding: 5px 7px;
            border-radius: 20px;
            font-size: 0.7rem;
        }

        .status-rejected {
            background-color: #dc3545;
            color: #fff;
        }

        .status-for-interview {
            background-color: #ffc107;
            color: #fff;
        }

        .status-Pending {
            background-color: #17a2b8;
            color: #fff;
        }

        .status-create {
            background-color: #6c757d;
            color: #fff;
        }

        .status-completed {
            background-color: #04792b;
            color: #fff;
        }

.thaction1{
    position:relative;
    left:1rem;
}

.thaction2{
    position:relative;
    left:3rem;
}
           /* Ensure proper vertical centering and full responsiveness */
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh; /* Ensures it centers on short screens */
    }
    .modal-content {
        border-radius: 20px; /* For aesthetic rounded corners */
    }


    .scroll-container {
    scrollbar-width: thin; /* For Firefox */
    scrollbar-color: #1185eb #e9ecef; /* Thumb and track colors */
}

.scroll-container::-webkit-scrollbar {
    width: 10px; /* Scrollbar width */
    height: 10px; /* Horizontal scrollbar height */
}

.scroll-container::-webkit-scrollbar-thumb {
    background-color: #1e62e0; /* Scrollbar thumb color */
    border-radius: 10px; /* Rounded scrollbar */
    border: 2px solid #e9ecef; /* Thumb border to match track */
}

.scroll-container::-webkit-scrollbar-track {
    background: #e9ecef; /* Scrollbar track background */
    border-radius: 10px; /* Rounded track edges */
}

.btn {
            font-size: 0.65rem; /* Smaller font for buttons */
            padding: 0.4rem 0.5rem; /* Smaller button padding */
        }
    </style>
</head>

<body>
 <!-- Sidebar -->
 <div class="sidebar">
    <h3 class="text-center mb-4"><i class="fas fa-briefcase"></i> CV Manager</h3>
    <nav class="nav flex-column">
        <a href="#" class="nav-link active d-flex align-items-center mb-2">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('CreateCv') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-plus-circle me-2"></i> Add New CV
        </a>
        <a  href="{{ route('monitor') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-user-cog me-2"></i> Accounts
        </a>
        <a href="{{ route('register_user_view') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-user-plus me-2"></i> Register
        </a>
        <a href="#" class="nav-link d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </nav>
</div>

    <div class="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-light bg-light mb-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <span class="navbar-brand">CV Management Dashboard</span>
                <div>
                    <span class="me-3">Welcome, <strong>{{ session('user.firstname') ?? 'Guest' }}</strong></span>
                    <a href="{{ route('CreateCv') }}">
                        <button class="btn btn-primary"><i class="fa fa-plus me-2"></i>Add New CV</button>
                    </a>
                </div>
            </div>
        </nav>

    <!-- Cards -->
<div class="row mb-4">
    <!-- Total CVs Card -->
    <div class="col-md-3">
        <div class="card shadow-lg rounded-lg border-0">
            <div class="card-body text-center">
                <h4 class="card-title mb-3">
                    <i class="fa fa-file-alt text-primary" style="font-size: 2rem;"></i>
                </h4>
                <p class="card-text text-muted">Total CVs</p>
                <h5 class="card-text text-dark fw-bold" style="font-size: 1.5rem;">{{ $cvs->count() }}</h5>
            </div>
        </div>
    </div>

    <!-- Completed Applications Card -->
    <div class="col-md-3">
        <div class="card shadow-lg rounded-lg border-0">
            <div class="card-body text-center">
                <h4 class="card-title mb-3">
                    <i class="fa fa-check-circle text-success" style="font-size: 2rem;"></i>
                </h4>
                <p class="card-text text-muted">Completed Applications</p>
                <h5 class="card-text text-dark fw-bold" style="font-size: 1.5rem;">{{ $cvs->where('Status', 'Completed')->count() }}</h5>
            </div>
        </div>
    </div>

    <!-- Pending Applications Card -->
    <div class="col-md-3">
        <div class="card shadow-lg rounded-lg border-0">
            <div class="card-body text-center">
                <h4 class="card-title mb-3">
                    <i class="fa fa-hourglass-half text-warning" style="font-size: 2rem;"></i>
                </h4>
                <p class="card-text text-muted">Pending Applications</p>
                <h5 class="card-text text-dark fw-bold" style="font-size: 1.5rem;">{{ $cvs->where('Status', 'Pending')->count() }}</h5>
            </div>
        </div>
    </div>

    <!-- Rejected Applications Card -->
    <div class="col-md-3">
        <div class="card shadow-lg rounded-lg border-0">
            <div class="card-body text-center">
                <h4 class="card-title mb-3">
                    <i class="fa fa-times-circle text-danger" style="font-size: 2rem;"></i>
                </h4>
                <p class="card-text text-muted">Rejected Applications</p>
                <h5 class="card-text text-dark fw-bold" style="font-size: 1.5rem;">{{ $cvs->where('Status', 'Rejected')->count() }}</h5>
            </div>
        </div>
    </div>
</div>
   
       <!-- CV Table -->
<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">List of CVs</h5>
    </div>
    <div class="card-body">
        <div class="scroll-container" style="max-height: 400px; overflow-y: auto;"> <!-- Scrollable container -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Link Type</th>
                        <th>Scheduled Date</th>
                        <th class="thaction1">Status</th>
                        <th class="thaction2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cvs as $index => $cv)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($cv->personalInfo->image)
                                <img src="{{ asset($cv->personalInfo->image) }}" alt="Applicant Image" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $cv->personalInfo->first_name }} {{ $cv->personalInfo->last_name }}</td>
                        <td>{{ $cv->personalInfo->email }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $cv->link_type)) ?? 'N/A' }}</td>
                        <td>{{ $cv->scheduled_date ? \Carbon\Carbon::parse($cv->scheduled_date)->format('Y-m-d h:i:s A') : 'N/A' }}</td>
                        <td>
                            <span class="status-badge 
                                {{ $cv->Status === 'Completed' ? 'status-completed' : '' }}
                                {{ $cv->Status === 'Rejected' ? 'status-rejected' : '' }}
                                {{ $cv->Status === 'Interview' ? 'status-for-interview' : '' }}
                                {{ $cv->Status === 'Pending' ? 'status-Pending' : '' }}
                                {{ $cv->Status === 'Created' ? 'status-create' : '' }}">
                                {{ $cv->Status }}
                            </span>
                        </td>
                        <td class="actions-column" style="padding-left: 50px;">
                            <div class="d-flex flex-wrap gap-2">
                                <!-- View Button -->
                                <a href="{{ route('view_cv_after_creation', $cv->personalInfo->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye"></i> View
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('edit_cv', $cv->personalInfo->id) }}" class="btn btn-sm btn-warning" id="editButton{{ $cv->id }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <!-- Assign Link Button -->
                                <button class="btn btn-sm btn-primary assign-link-button" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#assignLinkModal" 
                                        data-cv-id="{{ $cv->id }}" 
                                        data-cv-link="{{ $cv->application_link }}"
                                        data-cv-scheduled-date="{{ \Carbon\Carbon::parse($cv->scheduled_date)->format('Y-m-d h:i:s A') }}">
                                    <i class="fa fa-link"></i> Assign Link
                                </button>
                                <!-- Change Status Dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" 
                                            type="button" 
                                            id="statusDropdown{{ $cv->id }}" 
                                            data-bs-toggle="dropdown" 
                                            aria-expanded="false">
                                        Change Status
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $cv->id }}">
                                        <form action="{{ route('update_cv_status', $cv->id) }}" method="POST" class="p-2">
                                            @csrf
                                            @method('PUT')
                                            <li>
                                                <button type="submit" name="status" value="Created" class="dropdown-item">Created</button>
                                            </li>
                                            <li>
                                                <button type="submit" name="status" value="Pending" class="dropdown-item">Pending</button>
                                            </li>
                                            <li>
                                                <button type="submit" name="status" value="Interview" class="dropdown-item">For Interview</button>
                                            </li>
                                            <li>
                                                <button type="submit" name="status" value="Completed" class="dropdown-item">Completed</button>
                                            </li>
                                            <li>
                                                <button type="submit" name="status" value="Rejected" class="dropdown-item">Rejected</button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No CVs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
        
@if(isset($cv) && $cv->exists)
<div class="modal fade" id="assignLinkModal" tabindex="-1" aria-labelledby="assignLinkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form id="assignLinkForm" method="POST" action="{{ route('assign-link', $cv->id) }}">
            @csrf
            @method('PUT') <!-- Spoof the PUT method -->
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="assignLinkModalLabel">
                        <i class="fas fa-link me-2"></i> Assign Application Link
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <!-- Application Link Input -->
                    <div class="mb-4">
                        <label for="application_link" class="form-label fw-bold">
                            <i class="fas fa-external-link-alt me-2 text-secondary"></i> Application Link
                        </label>
                        <input 
                            type="url" 
                            class="form-control border border-primary rounded-pill p-2" 
                            id="application_link" 
                            name="application_link" 
                            placeholder="Enter application link" 
                            value="{{ $cv->application_link ?? '' }}" />
                        <small class="form-text text-muted">Provide a valid URL for the application link.</small>
                    </div>
                    <!-- Link Type Dropdown -->
                    <div class="mb-4">
                        <label for="link_type" class="form-label fw-bold">
                            <i class="fas fa-list-alt me-2 text-secondary"></i> Link Type
                        </label>
                        <select 
                            class="form-select border border-primary rounded-pill p-2" 
                            id="link_type" 
                            name="link_type" 
                            required>
                            <option value="" {{ empty($cv->link_type) ? 'selected' : '' }}>Select Type</option>
                            <option value="online_interview" {{ $cv->link_type === 'online_interview' ? 'selected' : '' }}>Online Interview</option>
                            <option value="job_application" {{ $cv->link_type === 'job_application' ? 'selected' : '' }}>Job Application</option>
                        </select>
                        <small class="form-text text-muted">Choose the type of link being assigned.</small>
                    </div>
                    <!-- Scheduled Date Input -->
                    <div class="mb-4">
                        <label for="scheduled_date" class="form-label fw-bold">
                            <i class="fas fa-calendar-alt me-2 text-secondary"></i> Scheduled Date
                        </label>
                        <input 
                            type="datetime-local" 
                            class="form-control border border-primary rounded-pill p-2" 
                            id="scheduled_date" 
                            name="scheduled_date" 
                            value="{{ $cv->scheduled_date ? \Carbon\Carbon::parse($cv->scheduled_date)->format('Y-m-d\TH:i') : '' }}" 
                            required>
                        <small class="form-text text-muted">Specify the date and time for the application link.</small>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between bg-light">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> Close
                    </button>
                    <button type="submit" class="btn btn-primary rounded-pill">
                        <i class="fas fa-save me-2"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@else
<div class="alert alert-warning text-center">
   
</div>
@endif

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('user.loginForm') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
      



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const assignLinkButtons = document.querySelectorAll('.assign-link-button');
    const assignLinkModal = document.getElementById('assignLinkModal');
    const applicationLinkInput = document.getElementById('application_link');
    const linkTypeSelect = document.getElementById('link_type');
    const scheduledDateInput = document.getElementById('scheduled_date');
    const assignLinkForm = document.getElementById('assignLinkForm');

    assignLinkButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cvId = this.getAttribute('data-cv-id');
            const cvLink = this.getAttribute('data-cv-link');
            const cvScheduledDate = this.getAttribute('data-cv-scheduled-date');

            // Set form action dynamically
            assignLinkForm.action = `/cvs/${cvId}/assign-link`;

            // Populate modal inputs
            applicationLinkInput.value = cvLink ? cvLink : '';
            linkTypeSelect.value = ''; // Reset link type for new assignments
            scheduledDateInput.value = formatToDatetimeLocal(cvScheduledDate); // Format and populate date
        });
    });

    // Function to format a date string to "datetime-local" input value
    function formatToDatetimeLocal(datetime) {
        if (!datetime) return '';

        const date = new Date(datetime);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');

        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }
});
    </script>
    

</body>






</html>

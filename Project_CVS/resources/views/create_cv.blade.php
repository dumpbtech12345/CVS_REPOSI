<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your CV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #e8f0fe, #cce5ff);
          
            min-height: 100vh;
            overflow-x: hidden;
        }
     
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
          
        }
      
        .form-label {
            font-weight: bold;
            color: #495057;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border-radius: 30px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 30px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        h1, h3 {
            font-weight: bold;
        }
        .icon {
            color: #6c757d;
            margin-right: 10px;
        }
        .add-more-btn {
            font-size: 0.9rem;
        }
        .section-title {
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: #adb5bd;
        }
        .sidebar h3 {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 1.5rem;
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
        }
        .sidebar a:hover {
            color: #fff;
            background-color: #495057;
            border-radius: 5px;
        }
        .sidebar a.active {
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
        }

        /* Navbar Styling */
        .navbar {
            z-index: 10;
            position: fixed;
            top: 0;
            left: 220px;
            right: 0;
            background-color: #007bff;
        }
        .navbar .navbar-brand,
        .navbar .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }

        /* Main Content */
        .content {
            margin-left: 110px;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center mb-4"><i class="fas fa-briefcase"></i> CV Manager</h3>
    <nav class="nav flex-column">
        <a href= "{{ route('dashboard') }}" class="nav-link  d-flex align-items-center mb-2">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('CreateCv') }}" class="nav-link active d-flex align-items-center mb-2">
            <i class="fas fa-plus-circle me-2"></i> Add New CV
        </a>
        <a href="{{ route('monitor') }}" class="nav-link d-flex align-items-center mb-2">
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



<!-- Main Content -->
<div class="content mb-2">

  <!-- Back Button -->
  <div class=" ms-3">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left "></i>
    </a>
</div>

    <div class="container my-3 ms-2">
        <div class="card p-4">
            <h1 class="text-center mb-4"><i class="fas fa-file-alt icon"></i>Create Your CV</h1>
            <p class="text-center text-muted">Fill in your details to craft a professional and personalized CV.</p>
            <form action="{{ route('store-cv') }}" method="POST" enctype="multipart/form-data">
                @csrf

               <!-- Personal Information -->
<h3 class="section-title mb-3"><i class="fas fa-user icon"></i>Personal Information</h3>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="first_name" class="form-label">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="last_name" class="form-label">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
</div>

<!-- Image Input -->
<div class="mb-3">
    <label for="image" class="form-label">Upload Image</label>
    <input type="file" class="form-control" id="image" name="image">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
</div>
<div class="mb-3">
    <label for="phone" class="form-label">Phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
</div>
<div class="mb-3">
    <label for="address" class="form-label">Address:</label>
    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
</div>

<!-- New Fields -->
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="Height" class="form-label">Height (in cm):</label>
        <input type="number" class="form-control" id="Height" name="Height" min="0" step="0.01" placeholder="e.g., 170">
    </div>
    <div class="col-md-6 mb-3">
        <label for="weight" class="form-label">Weight (in kg):</label>
        <input type="number" class="form-control" id="weight" name="weight" min="0" step="0.1" placeholder="e.g., 65.5">
    </div>
</div>

<div class="mb-3">
    <label for="Marital_Status" class="form-label">Marital Status:</label>
    <select class="form-control" id="Marital_Status" name="Marital_Status">
        <option value="" disabled selected>Select your marital status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widowed">Widowed</option>
    </select>
</div>

<div class="mb-3">
    <label for="Objective" class="form-label">Objective:</label>
    <textarea class="form-control" id="Objective" name="Objective" rows="3" placeholder="Your career objective"></textarea>
</div>

<div class="mb-3">
    <label for="Facebook" class="form-label">Facebook URL:</label>
    <input type="url" class="form-control" id="Facebook" name="Facebook" placeholder="https://facebook.com/yourprofile">
</div>

<div class="mb-3">
    <label for="BirthDate" class="form-label">Birth Date:</label>
    <input type="date" class="form-control" id="BirthDate" name="BirthDate">
</div>


                <!-- Education -->
                <h3 class="section-title mt-4"><i class="fas fa-graduation-cap icon"></i>Education</h3>
                <div id="education-container"></div>
                <button type="button" class="btn btn-secondary add-more-btn mb-3" id="add-education">
                    <i class="fas fa-plus-circle"></i> Add Education
                </button>

                <!-- Skills -->
                <h3 class="section-title mt-4"><i class="fas fa-lightbulb icon"></i>Skills</h3>
                <div id="skills-container"></div>
                <button type="button" class="btn btn-secondary add-more-btn mb-3" id="add-skill">
                    <i class="fas fa-plus-circle"></i> Add Skill
                </button>

                <!-- Work Experience -->
                <h3 class="section-title mt-4"><i class="fas fa-briefcase icon"></i>Work Experience</h3>
                <div id="experience-container"></div>
                <button type="button" class="btn btn-secondary add-more-btn mb-3" id="add-experience">
                    <i class="fas fa-plus-circle"></i> Add Work Experience
                </button>

                <!-- Certificates -->
                <h3 class="section-title mt-4"><i class="fas fa-certificate icon"></i>Certificates</h3>
                <div id="certificate-container"></div>
                <button type="button" class="btn btn-secondary add-more-btn mb-3" id="add-certificate">
                    <i class="fas fa-plus-circle"></i> Add Certificate
                </button>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane"></i> Submit CV
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addMoreHandlers = {
            'add-education': {
                container: 'education-container',
                template: `
                    <div class="mb-3">
                        <input type="text" class="form-control mb-2" name="education_name[]" placeholder="Education Name">
                        <input type="text" class="form-control mb-2" name="education_degree[]" placeholder="Degree">
                        <input type="text" class="form-control mb-2" name="education_school_name[]" placeholder="School Name">
                        <select class="form-control mb-2" name="education_Educlevel[]">
                            <option value="" disabled selected>Select Education Level</option>
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="Elementary School">Elementary School</option>
                            <option value="Junior High School">Junior High School</option>
                            <option value="Senior High School">Senior High School</option>
                            <option value="College">College</option>
                        </select>
                        <input type="date" class="form-control mb-2" name="education_start_date[]" placeholder="Start Date">
                        <input type="date" class="form-control mb-2" name="education_graduation_date[]" placeholder="Graduation Date (Optional)">
                    </div>`
            },
            'add-skill': {
                container: 'skills-container',
                template: `
                    <div class="mb-3">
                        <input type="text" class="form-control" name="skills[]" placeholder="Skill">
                    </div>`
            },
            'add-experience': {
                container: 'experience-container',
                template: `
                    <div class="mb-3">
                        <input type="text" class="form-control mb-2" name="job_title[]" placeholder="Job Title">
                        <input type="text" class="form-control mb-2" name="company_name[]" placeholder="Company Name">
                        <input type="text" class="form-control mb-2" name="location[]" placeholder="Location">
                        <input type="date" class="form-control mb-2" name="start_date[]" placeholder="Start Date">
                        <input type="date" class="form-control mb-2" name="end_date[]" placeholder="End Date (Optional)">
                        <textarea class="form-control mb-2" name="responsibilities[]" rows="3" placeholder="Responsibilities"></textarea>
                    </div>`
            },
            'add-certificate': {
                container: 'certificate-container',
                template: `
                    <div class="mb-3">
                        <input type="text" class="form-control mb-2" name="certificate_names[]" placeholder="Certificate Name">
                        <input type="text" class="form-control mb-2" name="issuing_organizations[]" placeholder="Issuing Organization">
                        <input type="date" class="form-control mb-2" name="issue_dates[]" placeholder="Issue Date">
                    </div>`
            },
        };

        for (const [btnId, { container, template }] of Object.entries(addMoreHandlers)) {
            document.getElementById(btnId).addEventListener('click', function () {
                const containerEl = document.getElementById(container);
                const div = document.createElement('div');
                div.className = 'mb-3 d-flex align-items-center';
                div.innerHTML = `
                    <div style="flex: 1;">
                        ${template}
                    </div>
                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-btn">
                        <i class="fas fa-minus-circle"></i> Remove
                    </button>`;
                containerEl.appendChild(div);

                // Add remove functionality
                div.querySelector('.remove-btn').addEventListener('click', () => containerEl.removeChild(div));
            });
        }
    });
</script>

    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CV</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f4f8;
           
        }
        .container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
        h1, h3 {
            color: #333;
            font-weight: bold;
        }
        h3 {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-primary, .btn-success, .btn-danger {
            border-radius: 20px;
        }
        .form-control {
            border-radius: 10px;
            font-size: 0.95rem;
        }
        .section-title {
            border-bottom: 2px solid #dedede;
            margin-bottom: 20px;
            padding-bottom: 5px;
        }
        .border {
            border-radius: 10px !important;
        }
        .add-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            transition: background-color 0.3s;
            font-size: 0.95rem;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
        .icon {
            color: #007bff;
        }
        .remove-btn {
            background: #f8d7da;
            color: #dc3545;
            border-radius: 20px;
        }
        .remove-btn:hover {
            background: #dc3545;
            color: white;
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


    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center mb-4 ms-4"><i class="fas fa-briefcase"></i> CV Manager</h3>
    <nav class="nav flex-column">
        <a href= "{{ route('dashboard') }}" class="nav-link active  d-flex align-items-center mb-2">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('CreateCv') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-plus-circle me-2"></i> Add New CV
        </a>
        <a href="{{ route('monitor') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-user-cog me-2"></i> Accounts
        </a>
        <a href= "{{ route('register_user_view') }}" class="nav-link  d-flex align-items-center mb-2">
            <i class="fas fa-user-plus me-2"></i> Register
        </a>
        <a href="#" class="nav-link d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </nav>
</div>


 <!-- Main Content -->
 <div class="content">




    <div class="container">
        <!-- Back Button -->
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <h1 class="text-center mb-4"><i class="fas fa-edit icon"></i> Edit CV</h1>
        <form action="{{ route('cv.update', $personalInfo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
            @endif

           <!-- Personal Information -->
<div class="mb-5">
    <h3 class="section-title"><i class="fas fa-user-circle icon"></i> Personal Information</h3>
    <div class="row g-3">
        <div class="col-md-6">
            <label for="first_name" class="form-label"><i class="fas fa-user"></i> First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $personalInfo->first_name }}" required>
        </div>
        <div class="col-md-6">
            <label for="last_name" class="form-label"><i class="fas fa-user"></i> Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $personalInfo->last_name }}" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $personalInfo->email }}" required>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label"><i class="fas fa-phone"></i> Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $personalInfo->phone }}" required>
        </div>
        <div class="col-md-12">
            <label for="address" class="form-label"><i class="fas fa-map-marker-alt"></i> Address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $personalInfo->address }}" required>
        </div>
        <div class="col-md-6">
            <label for="birthdate" class="form-label"><i class="fas fa-calendar"></i> Birthdate</label>
            <input type="date" id="birthdate" name="BirthDate" class="form-control" value="{{ $personalInfo->BirthDate }}">
        </div>
        <div class="col-md-6">
            <label for="height" class="form-label"><i class="fas fa-ruler-vertical"></i> Height (e.g., 170")</label>
            <input type="text" id="height" name="Height" class="form-control" value="{{ $personalInfo->Height }}" required>
        </div>
        <div class="col-md-6">
            <label for="weight" class="form-label"><i class="fas fa-weight"></i> Weight (e.g., 70kg)</label>
            <input type="text" id="weight" name="weight" class="form-control" value="{{ $personalInfo->weight }}" required>
        </div>
        <div class="col-md-6">
            <label for="marital_status" class="form-label"><i class="fas fa-heart"></i> Marital Status</label>
            <select id="marital_status" name="Marital_Status" class="form-select" required>
                <option value="" disabled {{ empty($personalInfo->Marital_Status) ? 'selected' : '' }}>Select Status</option>
                <option value="Single" {{ $personalInfo->Marital_Status == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="Married" {{ $personalInfo->Marital_Status == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Divorced" {{ $personalInfo->Marital_Status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="Widowed" {{ $personalInfo->Marital_Status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="objective" class="form-label"><i class="fas fa-bullseye"></i> Objective</label>
            <textarea id="objective" name="Objective" class="form-control" rows="3">{{ $personalInfo->Objective }}</textarea>
        </div>
    </div>
</div>
            <!-- Skills -->
            <div class="mb-5">
                <h3 class="section-title"><i class="fas fa-lightbulb icon"></i> Skills</h3>
                <div id="skills-container" class="row">
                    @foreach ($personalInfo->skills as $skill)
                        <div class="col-md-6 d-flex align-items-center mb-2">
                            <input type="text" name="skills[]" class="form-control me-2" value="{{ $skill->name }}">
                            <button type="button" class="btn remove-btn btn-sm remove-skill"><i class="fas fa-trash"></i></button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="add-button" id="add-skill"><i class="fas fa-plus"></i> Add Skill</button>
            </div>

            <!-- Work Experience -->
            <div class="mb-5">
                <h3 class="section-title"><i class="fas fa-briefcase icon"></i> Work Experience</h3>
                <div id="work-experience-container">
                    @foreach ($personalInfo->workExperiences as $experience)
                        <div class="border p-3 mb-3">
                            <input type="text" name="job_title[]" class="form-control mb-2" placeholder="Job Title" value="{{ $experience->job_title }}">
                            <input type="text" name="company_name[]" class="form-control mb-2" placeholder="Company Name" value="{{ $experience->company_name }}">
                            <input type="text" name="location[]" class="form-control mb-2" placeholder="Location" value="{{ $experience->location }}">
                            <input type="date" name="start_date[]" class="form-control mb-2" value="{{ $experience->start_date }}">
                            <input type="date" name="end_date[]" class="form-control mb-2" value="{{ $experience->end_date }}">
                            <textarea name="responsibilities[]" class="form-control mb-2" placeholder="Responsibilities">{{ $experience->responsibilities }}</textarea>
                            <button type="button" class="btn remove-btn btn-sm remove-experience"><i class="fas fa-trash"></i> Remove</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="add-button" id="add-work-experience"><i class="fas fa-plus"></i> Add Work Experience</button>
            </div>

          <!-- Education -->
<div class="mb-5">
    <h3 class="section-title"><i class="fas fa-graduation-cap icon"></i> Education</h3>
    <div id="education-container">
        @foreach ($personalInfo->educations as $index => $education)
            <div class="border p-3 mb-3">
                <input type="text" name="education_school_name[{{ $index }}]" class="form-control mb-2" placeholder="School Name" value="{{ $education->school_name }}">
                <input type="text" name="education_degree[{{ $index }}]" class="form-control mb-2" placeholder="Degree" value="{{ $education->degree }}">
                
                <select name="education_Educlevel[{{ $index }}]" class="form-select mb-2">
                    <option value="" disabled {{ empty($education->Educlevel) ? 'selected' : '' }}>Select Education Level</option>
                    <option value="Elementary" {{ $education->Educlevel == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                    <option value="High School" {{ $education->Educlevel == 'High School' ? 'selected' : '' }}>High School</option>
                    <option value="Junior High School" {{ $education->Educlevel == 'Junior High School' ? 'selected' : '' }}>Junior High School</option>
                    <option value="Senior High School" {{ $education->Educlevel == 'Senior High School' ? 'selected' : '' }}>Senior High School</option>
                    <option value="College" {{ $education->Educlevel == 'College' ? 'selected' : '' }}>College</option>
                </select>
                
                <input type="date" name="education_start_date[{{ $index }}]" class="form-control mb-2" value="{{ $education->start_date }}">
                <input type="date" name="education_graduation_date[{{ $index }}]" class="form-control mb-2" value="{{ $education->graduation_date }}">
                <button type="button" class="btn remove-btn btn-sm remove-education"><i class="fas fa-trash"></i></button>
            </div>
        @endforeach
    </div>
    <button type="button" class="add-button" id="add-education"><i class="fas fa-plus"></i> Add Education</button>
</div>

            <!-- Certificates -->
            <div class="mb-5">
                <h3 class="section-title"><i class="fas fa-certificate icon"></i> Certificates</h3>
                <div id="certificates-container">
                    @foreach ($personalInfo->certificates as $certificate)
                        <div class="border p-3 mb-3">
                            <input type="text" name="certificate_names[]" class="form-control mb-2" placeholder="Certificate Name" value="{{ $certificate->name }}">
                            <input type="text" name="issuing_organizations[]" class="form-control mb-2" placeholder="Issuing Organization" value="{{ $certificate->issuing_organization }}">
                            <input type="date" name="issue_dates[]" class="form-control mb-2" value="{{ $certificate->issue_date }}">
                            <button type="button" class="btn remove-btn btn-sm remove-certificate"><i class="fas fa-trash"></i></button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="add-button" id="add-certificate"><i class="fas fa-plus"></i> Add Certificate</button>
            </div>

            <button type="submit" class="btn btn-success w-100"><i class="fas fa-save"></i> Save Changes</button>
        </form>
    </div>


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




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add Field Script -->
    <script>
        const addDynamicField = (containerId, fieldHTML) => {
            const container = document.getElementById(containerId);
            container.insertAdjacentHTML('beforeend', fieldHTML);
        };

        document.getElementById('add-skill').addEventListener('click', () => {
            addDynamicField('skills-container', `
                <div class="col-md-6 d-flex align-items-center mb-2">
                    <input type="text" name="skills[]" class="form-control me-2" placeholder="New Skill">
                    <button type="button" class="btn remove-btn btn-sm remove-skill"><i class="fas fa-trash"></i></button>
                </div>
            `);
        });

        document.getElementById('add-work-experience').addEventListener('click', () => {
            addDynamicField('work-experience-container', `
                <div class="border p-3 mb-3">
                    <input type="text" name="job_title[]" class="form-control mb-2" placeholder="Job Title">
                    <input type="text" name="company_name[]" class="form-control mb-2" placeholder="Company Name">
                    <input type="text" name="location[]" class="form-control mb-2" placeholder="Location">
                    <input type="date" name="start_date[]" class="form-control mb-2">
                    <input type="date" name="end_date[]" class="form-control mb-2">
                    <textarea name="responsibilities[]" class="form-control mb-2" placeholder="Responsibilities"></textarea>
                    <button type="button" class="btn remove-btn btn-sm remove-experience"><i class="fas fa-trash"></i></button>
                </div>
            `);
        });

        document.getElementById('add-education').addEventListener('click', () => {
    addDynamicField('education-container', `
        <div class="border p-3 mb-3">
            <input type="text" name="education_school_name[]" class="form-control mb-2" placeholder="School Name">
            <input type="text" name="education_degree[]" class="form-control mb-2" placeholder="Degree">
            
            <select name="education_Educlevel[]" class="form-select mb-2">
                <option value="" disabled selected>Select Education Level</option>
                <option value="Elementary">Elementary</option>
                <option value="High School">High School</option>
                <option value="Junior High School">Junior High School</option>
                <option value="Senior High School">Senior High School</option>
                <option value="College">College</option>
            </select>
            
            <input type="date" name="education_start_date[]" class="form-control mb-2">
            <input type="date" name="education_graduation_date[]" class="form-control mb-2">
            <button type="button" class="btn remove-btn btn-sm remove-education"><i class="fas fa-trash"></i></button>
        </div>
    `);
});

        document.getElementById('add-certificate').addEventListener('click', () => {
            addDynamicField('certificates-container', `
                <div class="border p-3 mb-3">
                    <input type="text" name="certificate_names[]" class="form-control mb-2" placeholder="Certificate Name">
                    <input type="text" name="issuing_organizations[]" class="form-control mb-2" placeholder="Issuing Organization">
                    <input type="date" name="issue_dates[]" class="form-control mb-2">
                    <button type="button" class="btn remove-btn btn-sm remove-certificate"><i class="fas fa-trash"></i></button>
                </div>
            `);
        });

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-skill')) e.target.closest('div').remove();
            if (e.target.classList.contains('remove-experience')) e.target.closest('div').remove();
            if (e.target.classList.contains('remove-education')) e.target.closest('div').remove();
            if (e.target.classList.contains('remove-certificate')) e.target.closest('div').remove();
        });
    </script>
</body>
</html>

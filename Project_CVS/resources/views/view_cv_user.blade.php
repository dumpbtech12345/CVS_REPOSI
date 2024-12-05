<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $personalInfo->first_name }} {{ $personalInfo->last_name }}'s Resume</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            
        }
        .resume-card {
            background-color: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        .resume-header {
            background: linear-gradient(45deg, #73869b, #615a6b);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        .resume-header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            margin-bottom: 15px;
        }
        .resume-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .resume-header p {
            font-size: 1rem;
        }
        .resume-section {
            margin-bottom: 20px;
            padding: 20px;
        }
        .resume-section h2 {
            font-size: 1.75rem;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #0056b3;
        }
        .resume-item h5 {
            font-weight: bold;
            color: #343a40;
        }
        .badge {
            font-size: 0.9rem;
            padding: 10px 15px;
            border-radius: 30px;
            transition: all 0.3s;
        }
        .badge:hover {
            transform: scale(1.1);
        }
        .resume-item {
            margin-bottom: 15px;
        }
        .icon {
            color: #007bff;
            margin-right: 8px;
        }
        .back-button {
            margin-bottom: 20px;
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
            margin-left: 30px;
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





          /* Work Experience & Education */
          .work-experience, .education {
            display: flex;
            flex-direction: column;
        }
        .experience-item, .education-item {
            margin-bottom: 15px;
        }
        .experience-item h3, .education-item h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .experience-item p, .education-item p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* Skills Section */
        .skills {
            display: flex;
            flex-wrap: wrap;
        }
        .skill-item {
            background: #002b5c;
            color: white;
            margin: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        /* Certificates & Courses */
        .certificates ul, .courses ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .certificates li, .courses li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }

        .badge{
            background-color: #002b5c;
        }





      

        /* Header Section */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #002b5c;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 3px solid white;
        }
        .header-info {
            flex-grow: 1;
            margin-left: 20px;
        }
        .header-info h1 {
            margin: 0;
            font-size: 24px;
        }
        .header-info p {
            margin: 5px 0;
        }

        /* Section Titles */
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 2px solid #f4f4f9;
            padding-bottom: 5px;
        }

        /* Content Sections */
        .section {
            margin-bottom: 20px;
        }

        /* Work Experience & Education */
        .work-experience, .education {
            display: flex;
            flex-direction: column;
        }
        .experience-item, .education-item {
            margin-bottom: 15px;
        }
        .experience-item h3, .education-item h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .experience-item p, .education-item p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* Skills Section */
        .skills {
            display: flex;
            flex-wrap: wrap;
        }
        .skill-item {
            background: #002b5c;
            color: white;
            margin: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        /* Certificates & Courses */
        .certificates ul, .courses ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .certificates li, .courses li {
            margin-bottom: 10px;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }

        .badge{
            background-color: #002b5c;
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
                    <a class="nav-link" href="{{ route('userdashboard') }}"><i class="fa-solid fa-home me-1"></i> Home</a>
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
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>

    <div class="content">
        <div class="container">
            <!-- Back Button -->
            <a href="{{ route('userdashboard') }}">
            <button class="btn btn-secondary back-button">
                <i class="fas fa-arrow-left"></i> Back
            </button>
        </a>
        <div class="card resume-card mx-auto" style="max-width: 1100px;">
            <!-- Header -->
            <div class="resume-header d-flex align-items-center">
                <div class="text-center me-4">
                    @if($personalInfo->image)
                        <img src="{{ asset($personalInfo->image) }}" alt="Profile Picture">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Picture">
                    @endif
                </div>
                <div class="text-light text-center ">
                    <h1 class="mb-2">{{ $personalInfo->first_name }} {{ $personalInfo->last_name }}</h1>
                    <p class="mb-0">
                        <i class="fas fa-envelope icon"></i> {{ $personalInfo->email }}
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-phone icon"></i> {{ $personalInfo->phone }}
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-map-marker-alt icon"></i> {{ $personalInfo->address }}
                    </p>
                </div>
                
            </div>
        
            <!-- Personal Details -->
            <div class="resume-section">
                <h2><i class="fas fa-id-card icon"></i> Personal Details</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Birthdate:</strong> {{ $personalInfo->BirthDate ?? 'N/A' }}</p>
                        <p><strong>Height:</strong> {{ $personalInfo->Height }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Weight:</strong> {{ $personalInfo->weight }}</p>
                        <p><strong>Marital Status:</strong> {{ $personalInfo->Marital_Status }}</p>
                    </div>
                </div>
            </div>
        
            <!-- Objective -->
            @if ($personalInfo->Objective)
                <div class="resume-section">
                    <h2><i class="fas fa-quote-left icon"></i> Objective</h2>
                    <blockquote class="blockquote">{{ $personalInfo->Objective }}</blockquote>
                </div>
            @endif
        
            <!-- Skills -->
            @if ($personalInfo->skills && count($personalInfo->skills) > 0)
                <div class="resume-section">
                    <h2><i class="fas fa-tools icon"></i> Skills</h2>
                    <div class="d-flex flex-wrap">
                        @foreach ($personalInfo->skills as $skill)
                            <span class="badge  text-light m-1">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
        
            <!-- Work Experience -->
            @if ($personalInfo->workExperiences && count($personalInfo->workExperiences) > 0)
                <div class="resume-section">
                    <h2><i class="fas fa-briefcase icon"></i> Work Experience</h2>
                    @foreach ($personalInfo->workExperiences as $experience)
                        <div class="resume-item border-bottom pb-3 mb-3">
                            <h5 class="mb-1">{{ $experience->job_title }}</h5>
                            <p class="mb-0"><i class="fas fa-building"></i> {{ $experience->company_name }} | {{ $experience->location }}</p>
                            <p class="mb-0"><i class="fas fa-calendar"></i> {{ $experience->start_date }} - {{ $experience->end_date ?? 'Present' }}</p>
                            <p>{{ $experience->responsibilities }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        
            <!-- Education -->
            @if ($personalInfo->educations && count($personalInfo->educations) > 0)
                <div class="resume-section">
                    <h2><i class="fas fa-graduation-cap icon"></i> Education</h2>
                    @foreach ($personalInfo->educations as $education)
                        <div class="resume-item border-bottom pb-3 mb-3">
                            <h5 class="mb-1">{{ $education->degree }}</h5>
                            <p class="mb-0"><i class="fas fa-school"></i> {{ $education->school_name }}</p>
                            <p><i class="fas fa-calendar"></i> {{ $education->start_date }} - {{ $education->graduation_date ?? 'Ongoing' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        
            <!-- Certificates -->
            @if ($personalInfo->certificates && count($personalInfo->certificates) > 0)
                <div class="resume-section">
                    <h2><i class="fas fa-award icon"></i> Certificates</h2>
                    @foreach ($personalInfo->certificates as $certificate)
                        <div class="resume-item border-bottom pb-3 mb-3">
                            <h5 class="mb-1">{{ $certificate->name }}</h5>
                            <p><i class="fas fa-certificate"></i> Issued By: {{ $certificate->issuing_organization }}</p>
                            <p><i class="fas fa-calendar"></i> Issue Date: {{ $certificate->issue_date }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
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
      




    </body>
    </html>
    

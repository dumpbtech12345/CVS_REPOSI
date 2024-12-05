<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\Skill;
use App\Models\WorkExperience;
use App\Models\Education;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\CreatorResume;
use Illuminate\Support\Facades\Session;

class CVController extends Controller
{
    /**
     * Show the CV creation form.
     *
     * @return \Illuminate\View\View
     */
    public function creates()
    {
        return view('create_cv'); // Ensure this matches your blade file's location
    }


    public function usercreates()
    {
        return view('create_cv_user'); // Ensure this matches your blade file's location
    }
    /**
     * Store the CV data submitted from the form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validate incoming data
    $validatedData = $request->validate([
        // Validation rules
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:500',
        'Objective' => 'nullable|string|max:255',
        'Facebook' => 'nullable|string|url|max:255',
        'BirthDate' => 'nullable|date',
        'Height' => 'required|string|max:255',
        'weight' => 'required|string|max:255',
        'Marital_Status' => 'required|string|max:255',
        'skills' => 'nullable|array',
        'skills.*' => 'string|max:255',
        'job_title' => 'nullable|array',
        'job_title.*' => 'string|max:255',
        'company_name' => 'nullable|array',
        'company_name.*' => 'string|max:255',
        'location' => 'nullable|array',
        'location.*' => 'string|max:255',
        'start_date' => 'nullable|array',
        'start_date.*' => 'date',
        'end_date' => 'nullable|array',
        'end_date.*' => 'nullable|date',
        'responsibilities' => 'nullable|array',
        'responsibilities.*' => 'string',
        'education_name' => 'nullable|array',
        'education_name.*' => 'string|max:255',
        'education_degree' => 'nullable|array',
        'education_degree.*' => 'string|max:255',
        'education_school_name' => 'nullable|array',
        'education_school_name.*' => 'string|max:255',
        'education_Educlevel' => 'nullable|array',
        'education_Educlevel.*' => 'string|max:255',
        'education_start_date' => 'nullable|array',
        'education_start_date.*' => 'date',
        'education_graduation_date' => 'nullable|array',
        'education_graduation_date.*' => 'nullable|date',
        'certificate_names' => 'nullable|array',
        'certificate_names.*' => 'string|max:255',
        'issuing_organizations' => 'nullable|array',
        'issuing_organizations.*' => 'string|max:255',
        'issue_dates' => 'nullable|array',
        'issue_dates.*' => 'date',
    ]);

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/images'), $imageName);
        $validatedData['image'] = 'uploads/images/' . $imageName;
    } else {
        $validatedData['image'] = null;
    }

    // Save personal info
    $personalInfo = PersonalInfo::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'image' => $validatedData['image'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'address' => $validatedData['address'],
        'Objective' => $validatedData['Objective'] ?? null,
        'Facebook' => $validatedData['Facebook'] ?? null,
        'BirthDate' => $validatedData['BirthDate'] ?? null,
        'Height' => $validatedData['Height'] ?? null,
        'weight' => $validatedData['weight'] ?? null,
        'Marital_Status' => $validatedData['Marital_Status'] ?? null,
    ]);

    // Save skills
    if (!empty($validatedData['skills'])) {
        foreach ($validatedData['skills'] as $skill) {
            Skill::create([
                'personal_info_id' => $personalInfo->id,
                'name' => $skill,
            ]);
        }
    }

    // Save work experiences
    if (!empty($validatedData['job_title'])) {
        foreach ($validatedData['job_title'] as $index => $jobTitle) {
            WorkExperience::create([
                'personal_info_id' => $personalInfo->id,
                'job_title' => $jobTitle,
                'company_name' => $validatedData['company_name'][$index] ?? null,
                'location' => $validatedData['location'][$index] ?? null,
                'start_date' => $validatedData['start_date'][$index] ?? null,
                'end_date' => $validatedData['end_date'][$index] ?? null,
                'responsibilities' => $validatedData['responsibilities'][$index] ?? null,
            ]);
        }
    }

    // Save educations
    if (!empty($validatedData['education_name'])) {
        foreach ($validatedData['education_name'] as $index => $educationName) {
            Education::create([
                'personal_info_id' => $personalInfo->id,
                'degree' => $validatedData['education_degree'][$index] ?? null,
                'school_name' => $validatedData['education_school_name'][$index] ?? null,
                'Educlevel' => $validatedData['education_Educlevel'][$index] ?? null,
                'start_date' => $validatedData['education_start_date'][$index] ?? null,
                'graduation_date' => $validatedData['education_graduation_date'][$index] ?? null,
            ]);
        }
    }

    // Save certificates
    if (!empty($validatedData['certificate_names'])) {
        foreach ($validatedData['certificate_names'] as $index => $certificateName) {
            Certificate::create([
                'personal_info_id' => $personalInfo->id,
                'name' => $certificateName,
                'issuing_organization' => $validatedData['issuing_organizations'][$index] ?? null,
                'issue_date' => $validatedData['issue_dates'][$index] ?? null,
            ]);
        }
    }

    $userId = Session::get('user.id'); // Retrieve the logged-in user ID
    CreatorResume::create([
        'personal_info_id' => $personalInfo->id,
        'CreatorResume' => $userId, // Ensure `user_id` column exists in CreatorResume table
        'Link' => route('view_cv_after_creation', ['id' => $personalInfo->id]),
        'Status' => 'Created', // Example status
    ]);

    return redirect()->route('view_cv_after_creation', ['id' => $personalInfo->id]);
}

    
// For users create CV
public function store_cv_user(Request $request)
{
    // Validate only the required fields
    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:500',
        'Objective' => 'nullable|string|max:255',
        'Facebook' => 'nullable|string|url|max:255',
        'BirthDate' => 'nullable|date',
        'Height' => 'required|string|max:255',
        'weight' => 'required|string|max:255',
        'Marital_Status' => 'required|string|max:255',
    ]);

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/images'), $imageName);
        $validatedData['image'] = 'uploads/images/' . $imageName;
    } else {
        $validatedData['image'] = null;
    }

    // Save personal info
    $personalInfo = PersonalInfo::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'image' => $validatedData['image'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'address' => $validatedData['address'],
        'Objective' => $validatedData['Objective'] ?? null,
        'Facebook' => $validatedData['Facebook'] ?? null,
        'BirthDate' => $validatedData['BirthDate'] ?? null,
        'Height' => $validatedData['Height'] ?? null,
        'weight' => $validatedData['weight'] ?? null,
        'Marital_Status' => $validatedData['Marital_Status'] ?? null,
    ]);

    // Save skills if provided
    if ($request->filled('skills')) {
        foreach ($request->input('skills') as $skill) {
            Skill::create([
                'personal_info_id' => $personalInfo->id,
                'name' => $skill,
            ]);
        }
    }

    // Save work experiences if provided
    if ($request->filled('job_title')) {
        foreach ($request->input('job_title') as $index => $jobTitle) {
            WorkExperience::create([
                'personal_info_id' => $personalInfo->id,
                'job_title' => $jobTitle,
                'company_name' => $request->input("company_name.$index"),
                'location' => $request->input("location.$index"),
                'start_date' => $request->input("start_date.$index"),
                'end_date' => $request->input("end_date.$index"),
                'responsibilities' => $request->input("responsibilities.$index"),
            ]);
        }
    }

    // Save educations if provided
    if ($request->filled('education_name')) {
        foreach ($request->input('education_name') as $index => $educationName) {
            Education::create([
                'personal_info_id' => $personalInfo->id,
                'degree' => $request->input("education_degree.$index"),
                'school_name' => $request->input("education_school_name.$index"),
                'Educlevel' => $request->input("education_Educlevel.$index"),
                'start_date' => $request->input("education_start_date.$index"),
                'graduation_date' => $request->input("education_graduation_date.$index"),
            ]);
        }
    }

    // Save certificates if provided
    if ($request->filled('certificate_names')) {
        foreach ($request->input('certificate_names') as $index => $certificateName) {
            Certificate::create([
                'personal_info_id' => $personalInfo->id,
                'name' => $certificateName,
                'issuing_organization' => $request->input("issuing_organizations.$index"),
                'issue_date' => $request->input("issue_dates.$index"),
            ]);
        }
    }

    // Link resume to creator
    $userId = Session::get('user.id'); // Retrieve the logged-in user ID
    CreatorResume::create([
        'personal_info_id' => $personalInfo->id,
        'CreatorResume' => $userId, // Ensure `user_id` column exists in CreatorResume table
        'Status' => 'Created', // Example status
    ]);

    return redirect()->route('viewCVUser', ['id' => $personalInfo->id]);
}



//other-----------------------------------------------------

/**
 * Display the created CV.
 *
 * @param int $id
 * @return \Illuminate\View\View
 */
public function viewCV($id)
{
    $personalInfo = PersonalInfo::with(['skills', 'workExperiences', 'educations', 'certificates'])
        ->findOrFail($id);

    return view('view_cv_after_creation', compact('personalInfo'));
}


public function viewCVUser($id)
{
    $personalInfo = PersonalInfo::with(['skills', 'workExperiences', 'educations', 'certificates'])
        ->findOrFail($id);

    return view('view_cv_user', compact('personalInfo'));
}


public function dashboard()
{
    $cvs = CreatorResume::with('personalInfo')->get();
    return view('dashboard', compact('cvs'));
}
public function userdashboard()
{
    $user = session('user');

    if (is_array($user)) {
        $user = (object) $user; // Ensure $user is an object
    }

    if (!isset($user->name)) {
        $user->firstname = 'Guest'; // Fallback if name is missing
    }

    $userId = $user->id;

    $cvData = CreatorResume::where('CreatorResume', $userId)->get();

    return view('userdashboard', compact('user', 'cvData'));
}


public function updateStatus(Request $request, $id)
{
    $cv = CreatorResume::findOrFail($id); // Correct model
    $cv->Status = $request->input('status'); // Retrieve the selected status
    $cv->save();

    return redirect()->back()->with('success', 'Status updated successfully.');
}

public function edit($id)
{
    $personalInfo = PersonalInfo::with(['skills', 'workExperiences', 'educations', 'certificates'])
        ->findOrFail($id);

    return view('edit_cv', compact('personalInfo'));
}

public function update(Request $request, $id)
{
    $personalInfo = PersonalInfo::findOrFail($id);

    // Update personal info
    $personalInfo->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'Objective' => $request->input('Objective', null),
        'Facebook' => $request->input('Facebook', null),
        'BirthDate' => $request->input('BirthDate', null),
        'Height' => $request->input('Height'),
        'weight' => $request->input('weight'),
        'Marital_Status' => $request->input('Marital_Status'),
    ]);

    // Update skills
    Skill::where('personal_info_id', $id)->delete();
    if ($request->has('skills')) {
        foreach ($request->input('skills') as $skill) {
            Skill::create(['personal_info_id' => $id, 'name' => $skill]);
        }
    }

    // Update work experiences
    WorkExperience::where('personal_info_id', $id)->delete();
    if ($request->has('job_title')) {
        foreach ($request->input('job_title') as $index => $jobTitle) {
            WorkExperience::create([
                'personal_info_id' => $id,
                'job_title' => $jobTitle,
                'company_name' => $request->input("company_name.$index"),
                'location' => $request->input("location.$index"),
                'start_date' => $request->input("start_date.$index"),
                'end_date' => $request->input("end_date.$index"),
                'responsibilities' => $request->input("responsibilities.$index"),
            ]);
        }
    }

    // Update education
Education::where('personal_info_id', $id)->delete();

if ($request->has('education_school_name')) {
    foreach ($request->input('education_school_name') as $index => $schoolName) {
        Education::create([
            'personal_info_id' => $id,
            'school_name' => $schoolName,
            'degree' => $request->input("education_degree.$index"),
            'Educlevel' => $request->input("education_Educlevel.$index"), // Handle Educlevel
            'start_date' => $request->input("education_start_date.$index"),
            'graduation_date' => $request->input("education_graduation_date.$index"),
        ]);
    }
}
    // Update certificates
    Certificate::where('personal_info_id', $id)->delete();
    if ($request->has('certificate_names')) {
        foreach ($request->input('certificate_names') as $index => $certificateName) {
            Certificate::create([
                'personal_info_id' => $id,
                'name' => $certificateName,
                'issuing_organization' => $request->input("issuing_organizations.$index"),
                'issue_date' => $request->input("issue_dates.$index"),
            ]);
        }
    }

    return redirect()->route('view_cv_after_creation', ['id' => $id])
        ->with('success', 'CV updated successfully.');
}


public function assignLink(Request $request, $id)
{
    $request->validate([
        'application_link' => 'required|url',
        'link_type' => 'required|string',
        'scheduled_date' => 'required|date',
    ]);

    // Convert scheduled date to 24-hour format if necessary
    $cv = CreatorResume::findOrFail($id);
    $cv->update([
        'application_link' => $request->application_link,
        'link_type' => $request->link_type,
        'scheduled_date' => \Carbon\Carbon::parse($request->scheduled_date)->format('Y-m-d h:i:s A'), // Store in 24-hour format
    ]);

    return redirect()->back()->with('success', 'Link assigned successfully.');
}


//for usersystems

public function edituser($id)
{
    $personalInfo = PersonalInfo::with(['skills', 'workExperiences', 'educations', 'certificates'])
        ->findOrFail($id);

    return view('user_edit_cv', compact('personalInfo'));
}

public function updateuser(Request $request, $id)
{
    $personalInfo = PersonalInfo::findOrFail($id);

    // Update personal info
    $personalInfo->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'Objective' => $request->input('Objective', null),
        'Facebook' => $request->input('Facebook', null),
        'BirthDate' => $request->input('BirthDate', null),
        'Height' => $request->input('Height'),
        'weight' => $request->input('weight'),
        'Marital_Status' => $request->input('Marital_Status'),
    ]);

    // Update skills
    Skill::where('personal_info_id', $id)->delete();
    if ($request->has('skills')) {
        foreach ($request->input('skills') as $skill) {
            Skill::create(['personal_info_id' => $id, 'name' => $skill]);
        }
    }

    // Update work experiences
    WorkExperience::where('personal_info_id', $id)->delete();
    if ($request->has('job_title')) {
        foreach ($request->input('job_title') as $index => $jobTitle) {
            WorkExperience::create([
                'personal_info_id' => $id,
                'job_title' => $jobTitle,
                'company_name' => $request->input("company_name.$index"),
                'location' => $request->input("location.$index"),
                'start_date' => $request->input("start_date.$index"),
                'end_date' => $request->input("end_date.$index"),
                'responsibilities' => $request->input("responsibilities.$index"),
            ]);
        }
    }

 // Update education
Education::where('personal_info_id', $id)->delete();

if ($request->has('education_school_name')) {
    foreach ($request->input('education_school_name') as $index => $schoolName) {
        Education::create([
            'personal_info_id' => $id,
            'school_name' => $schoolName,
            'degree' => $request->input("education_degree.$index"),
            'Educlevel' => $request->input("education_Educlevel.$index"), // Handle Educlevel
            'start_date' => $request->input("education_start_date.$index"),
            'graduation_date' => $request->input("education_graduation_date.$index"),
        ]);
    }
}

    // Update certificates
    Certificate::where('personal_info_id', $id)->delete();
    if ($request->has('certificate_names')) {
        foreach ($request->input('certificate_names') as $index => $certificateName) {
            Certificate::create([
                'personal_info_id' => $id,
                'name' => $certificateName,
                'issuing_organization' => $request->input("issuing_organizations.$index"),
                'issue_date' => $request->input("issue_dates.$index"),
            ]);
        }
    }

    return redirect()->route('viewCVUser', ['id' => $id])
        ->with('success', 'CV updated successfully.');
}

}
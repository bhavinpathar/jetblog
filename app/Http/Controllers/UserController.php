<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

// use Session;


class UserController extends Controller
{
    public function add_user()
    {
        $countries = Country::all();
        return view('home', compact('countries'));
    }


    public function create_user(Request $request)
    {
        // Validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'country' => 'required|string',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'phone' => 'required|string|max:10|',
            'hobby' => 'required|array',
            'address' => 'required|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];

        $messages = [
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be greater than :max characters.',

            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than :max characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',

            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',

            'country.required' => 'The country field is required.',
            'country.string' => 'The country must be a string.',

            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The selected gender is invalid.',

            'dob.required' => 'The date of birth field is required.',
            'dob.date' => 'The date of birth must be a valid date.',

            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than :max characters.',

            'hobby.required' => 'The hobby field is required.',
            'hobby.array' => 'The hobby must be an array.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than :max characters.',

            'profile.required' => 'The profile picture field is required.',
            'profile.image' => 'The profile picture must be an image.',
            'profile.mimes' => 'The profile picture must be a file of type: :values.',
            'profile.max' => 'The profile picture may not be greater than :max kilobytes.',
        ];


        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], 422);
            // return view('your_view')->withErrors($validator);

        }

        // Handle file upload
        // $profilePic = $request->file('profile');

        // Handle file upload
        $profilePicPath = $request->file('profile')->storePublicly('profiles', 'public');

        // Create new user
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->country = $request->input('country');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->phone = $request->input('phone');
        $user->hobby = json_encode($request->input('hobby'));
        $user->address = $request->input('address');
        $user->profile = asset('storage/' . $profilePicPath); // Generate public URL
        $user->save();

        Session::flash('insert', 'User created successfully.');

        return response()->json(['status' => 'true', 'message' => 'User created successfully', 'profile' => $user->profile], 200);
    }

    public function index()
    {
        return view('show');
    }
    public function get_users_list()
    {
        // $req = User::with('countryData')->get();
        // return view('show', ['users' => $req]);

        $users = User::with('countryData')->get();
        // dd($users);
        return DataTables::of($users)
            ->addColumn('full_name', function ($user) {
                return '<div class="symbol symbol-50px me-3 "><img src="'. $user->profile.'" alt="profile Picture" width="100"
                height="100"></div>'.
                $user->first_name . ' ' . $user->last_name;
            })
            ->addColumn('country', function ($user) {
                return '<div class="symbol symbol-50px me-3 "><img src=" '.asset('vendor/blade-flags/country-' . $user->countryData->iso . '.svg').'"></div>';
            })
            ->addColumn('update', function ($user) {
                return '<a class="btn btn-warning" href="'.route('users.edit_user', $user->id).'">UPDATE</a>';
            })
            ->addColumn('delete', function ($user) {
                return '<button class="btn btn-danger" onclick="openConfirmDeleteModal(' . $user->id . ')">Delete</button>';
            })
            ->addColumn('hobby', function ($user) {
                return implode(', ', json_decode($user->hobby));
            })
            ->rawColumns(['full_name','country','hobby','update', 'delete'])
            ->make(true);
    }

    function delete_user(Request $req)
    {
        $id = $req->user_id;
        $data = User::find($id);
        // dd($data);
        $data->delete();
        Session::flash('delete', 'User deleted successfully.');
        return response()->json(['status' => 'true', 'message' => 'User deleted successfully'], 200);

        // return redirect('show');
    }

    public function edit_user($id)
    {
        $data = User::findOrFail($id);
        $countries = Country::all();
        return view('updateuser', compact('data', 'countries'));
    }

    function update_user(request $req, $id)
    {

        // Validation rules

        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'country' => 'required|string',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'phone' => 'required|string|max:10|',
            'hobby' => 'required|array',
            'address' => 'required|string|max:255',
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
        if (empty($req->old_profile)) {
            $rules['profile'] .= '|required';
        }

        $messages = [
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be greater than :max characters.',

            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than :max characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',

            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',

            'country.required' => 'The country field is required.',
            'country.string' => 'The country must be a string.',

            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The selected gender is invalid.',

            'dob.required' => 'The date of birth field is required.',
            'dob.date' => 'The date of birth must be a valid date.',

            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than :max characters.',

            'hobby.required' => 'The hobby field is required.',
            'hobby.array' => 'The hobby must be an array.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than :max characters.',

            'profile.required' => 'The profile picture must be required.',
            'profile.image' => 'The profile picture must be an image.',
            'profile.mimes' => 'The profile picture must be a file of type: :values.',
            'profile.max' => 'The profile picture may not be greater than :max kilobytes.',
        ];




        // Validate the request
        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => 'false', 'errors' => $validator->errors()], 422);
        }


        $data = User::findOrFail($id);
        if ($req->hasFile('profile')) {
            $profilePicPath = $req->file('profile')->storePublicly('profiles', 'public');
            $data->profile = asset('storage/' . $profilePicPath);
        } elseif ($req->has('old_profile')) {
            $data->profile = $req->old_profile;
        }

        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->email = $req->email;
        $data->country = $req->country;
        $data->gender = $req->gender;
        $data->dob = $req->dob;
        $data->phone = $req->phone;
        $data->hobby = json_encode($req->hobby);
        $data->address = $req->address;
        $data->save();


        Session::flash('update', 'User updated successfully.');


        return response()->json(['status' => 'true', 'message' => 'User updated successfully', 'profile' => $data->profile], 200);
    }
}

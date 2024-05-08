<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::where('is_admin', '!=', 4)->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->first();
        return view('pages.account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'min:11', 'numeric', 'unique:users,phone,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'agree' => ['boolean'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'fax' => ['nullable', 'string', 'max:255'],
            'authorize' => ['boolean'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->filled('password')) {
            $request->merge(['password' => Hash::make($request->input('password'))]);
        } else {
            $request->request->remove('password');
        }

        $user->update($request->all());

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if(auth()->user()->is_admin === 1) {
            $user->delete(); // Delete the user
            return back()->with('success', 'User deleted successfully');
        } else {
            return back()->with('error', 'Unauthorized action');
        }
    }

    /**
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $user->is_admin = $request->input('role');
        $user->save();

        return redirect()->back()
            ->with('success', 'User role updated successfully');
    }

    /**
     * @return Factory|View
     */
    public function caseManager()
    {
        $users = User::where('is_admin', 3)->get();
        return view('admin.users.caseManager', compact('users'));
    }

    /**
     * @return Factory|View
     */
    public function partners()
    {
        $partners = User::where('is_admin', 4)->get();
        return view('admin.users.partners', compact('partners'));
    }
    public function addPartner()
    {
        return view('admin.users.add-partner');
    }
    protected function createPartner(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:11', 'numeric', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
            ],
            // Additional fields validation
            'company_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'agree' => ['boolean'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'fax' => ['nullable', 'string', 'max:255'],
            'authorize' => ['boolean'],
        ]);

        $agree = $request->has('agree');
        $authorize = $request->has('authorize');

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            // Additional fields
            'company_name' => $data['company_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'agree' => $agree,
            'country' => $data['country'],
            'address' => $data['address'],
            'state' => $data['state'],
            'city' => $data['city'],
            'zip' => $data['zip'],
            'fax' => $data['fax'],
            'authorize' => $authorize,
            'is_admin' => 4,
        ]);

        return redirect()->route('users.partners')->with('success', 'Partner added successfully.');
    }
}

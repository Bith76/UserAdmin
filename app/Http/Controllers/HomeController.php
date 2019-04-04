<?php

namespace App\Http\Controllers;

use App\User;
use App\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * How many users listed on one page.
     */
    private $perPage = 5;

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate($this->perPage);
        return view('home', ['users' => $users]);
    }

    /**
     * Add user method.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|unique:user,name',
            'dob' => 'required|date_format:Y-m-d|before_or_equal:today|after:1900-01-01',
            'email' => 'required|comma_emails',
        ]);

        if (empty($errors)) {
            DB::beginTransaction();
            try {
                $userid = User::create([
                    'name' => $request->name,
                    'dob' => $request->dob,
                ])->id;
                $emails = preg_split('/,\s*/', $request->email);
                foreach ($emails as $email) {
                    Email::create([
                        'user_id' => $userid,
                        'email' => $email,
                    ]);
                }
            } catch (\Exception $e) {
                DB::rollback();
                return $e->getMessage();
            }
            DB::commit();
        }

        $users = User::paginate($this->perPage);
        return redirect()->route('home', ['users' => $users, 'page' => $request->page]);
    }
}

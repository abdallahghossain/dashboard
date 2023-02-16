<?php

namespace App\Http\Controllers;

use App\Mail\AdminWelcomeEmail;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('admins')->get();

        return response()->view('cms.admins.index', ['admins' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string|min:4|max:20',
            'email' => 'required|string|unique:admins,email,',
            'mobile' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => [
                'required', 'string',
               Password::min(5)->letters()
                // ->mixedCase()->symbols()->uncompromised(),
            ],
        ]);
            if (!$validator->fails()) {
                $admin = new admin();
                $admin->name = $request->input('name');
                $admin->email = $request->input('email');
                $admin->mobile = $request->input('mobile');
                $admin->password = Hash::make($request->input('password'));
                $isSaved = $admin->save();
                if ($isSaved) {
                    Mail::to($admin)->send(new AdminWelcomeEmail($admin));
                }
                return response()->json(
                    [
                        'message' => $isSaved ? "Admin saved success" : " faild to save Admin",
                        'icon' => $isSaved ? 'success' : 'error'
                    ]
                );
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST;
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first(), 'icon' => 'error'], Response::HTTP_BAD_REQUEST);
            }
            return response()->json(["message" => "wellcome in js", 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $admin = DB::table('admins')->where('id', '=', $id)->first();
        return response()->view('cms.admins.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:4|max:20',
            'email' => 'required|string|unique:admins,email,',
            'mobile' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password'=>'nullable|string',
        ]);
        if (!$validator->fails()) {
        $admin =admin::findOrFail($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->mobile = $request->input('mobile');
        $admin->password = Hash::make($request->input('password'));

        $isSaved = $admin->save();
        return response()->json(
            [
                'message' => $isSaved ? "Admin saved successfully" : "Failed to save Admin",
                'icon' => $isSaved ? 'success' : 'error',
            ],
            $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    } else {
        //
        return response()->json(['message' => $validator->getMessageBag()->first(), 'icon' => 'error'], Response::HTTP_BAD_REQUEST);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleteCount = admin::destroy($id);
        $deleted = $deleteCount == 1;
        return response()->json(
            ['message' => $deleted ? "Deleted successfully" : "Delete failed!"],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );

    }
}

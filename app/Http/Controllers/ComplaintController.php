<?php

namespace App\Http\Controllers;

use App\Mail\NewRequestEmail;
use App\Mail\StudentWelcomeEmail;
use App\Models\complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('complaints')->get();

        return response()->view('cms.students.index', ['students' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4|max:50',
            'message' => 'required|string|min:5|max:150',
            'name' => 'required|string|min:4|max:50 ',
            // 'student_id' => 'required|digits:10|unique:complaints,student_id',
            'student_id' => 'required|numeric',
            'email' => 'required|unique:complaints,email',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:3025',
            'type' => 'required|string|in:Complaint,Suggestion',
            // 'status' => 'nullable|string|in:Open,Close',
            // 'urgent' => 'nullable|string|in:on',
        ]);
        $student = new complaint();
        $student->title = $request->input('title');
        $student->message = $request->input('message');
        $student->type = $request->input('type');
        $student->student_id = $request->input('student_id');
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->urgent = $request->input('urgent');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // $imageName=Carbon::now()->millisecond();
            // $imageName=now();
            $imageName = time() . '_image_' . $student->name . '.' . $file->getClientOriginalExtension();
            // $file->storePubliclyAs('students', $imageName, ['disk' => 'public']);
            $file->storeAs('users', $imageName, ['disk' => 'public']);
            $student->image = "users/" . $imageName;
        }
        $saved = $student->save();
        if ($saved) {
            Mail::to($student)->send(new StudentWelcomeEmail($student));
        }
        return redirect()->back();

        //     $validator=validator($request->all(), [
            //         'title'=>'required|string|min:4|max:50',
            //         'message'=>'required|string|min:5|max:150',
            //         'name' => 'required|string|min:4|max:50 ',
            //         'student_id'=>'required',
            //         'email' => 'required|unique:complaints,email',
            //         // 'image' => 'required|image|mimes:jpg,png,jpeg|max:3025',
            //         'type'=>'required|string|in:Complaint,Suggestion',
            //         'status'=>'nullable|string|in:Open,Close',
            //         'urgent'=>'required|boolean',
            //     ]);
            //     if (!$validator->fails()) {
            //     $student = new complaint();
            //     $student->title = $request->input('title');
            //     $student->message = $request->input('message');
            //     $student->type = $request->input('type');
            //     $student->student_id = $request->input('student_id');
            //     $student->name = $request->input('name');
            //     $student->email = $request->input('email');
            //     $student->urgent = $request->input('urgent');
            //     if ($request->hasFile('image')) {
            //         $file = $request->file('image');
            //         // $imageName=Carbon::now()->millisecond();
            //         // $imageName=now();
            //         $imageName = time() . '_image_' . $student->name . '.' . $file->getClientOriginalExtension();
            //         // $file->storePubliclyAs('students', $imageName, ['disk' => 'public']);
            //         $file->storeAs('users', $imageName, ['disk' => 'public']);
            //         $student->image = "users/" . $imageName;
            //     }
            //     $saved = $student->save();
            //     if ($saved) {
            //         Mail::to($student)->send(new StudentWelcomeEmail($student));
            //     }
            //     return response()->json(
            //         [
            //             'message' => $saved ? "Student saved success" : " faild to save Student",
            //             'icon' => $saved ? 'success' : 'error'
            //         ]
            //     );
            //     $saved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST;
            // } else {
            //     return response()->json(['message' => $validator->getMessageBag()->first(), 'icon' => 'error'], Response::HTTP_BAD_REQUEST);

            // }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = complaint::findOrFail($id);
        return response()->view('cms.students.showresponse', ['student' => $student]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = complaint::findOrFail($id);
        return response()->view('cms.students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
             'status'=>'nullable|string|in:Close,Open',
            'response' => 'required|string|min:5|max:100',
        ]);
        $student = complaint::findOrFail($id);
        $student->updated_at;
        $student->status = $request->input('status');
        $student->response = $request->input('response');
        $saved = $student->save();
        if ($saved) {
            Mail::to($student)->send(new StudentWelcomeEmail($student));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleteCount = complaint::destroy($id);
        $deleted = $deleteCount == 1;
        if ($deleted==true) {
            return redirect()->back();

        }
    }
}

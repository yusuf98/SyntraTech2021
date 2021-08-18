<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupComplete;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('course')->get();
        return view('student', compact('students'));
       
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $courses = Course::all();
       return view('signup', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $student = new Student;
        // $student->name = request('name');
        // $student->email = request('email');
        // $student->save();

        // validation rules for form (duh)
        $validate = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'bdate' => 'required',
            'phone' => 'required',
            'profilepic' => 'required|max:2048'
        ]);
        // dd(request('profilepic'));
        // // dd($request->profilepic->getClientOriginalName());

        // Check if exists and create row (with request retrieval)
        // https://laravel-news.com/firstornew-firstorcreate-firstor-updateorcreate
        
        $timestamp = now()->timestamp;
        $filename= request('profilepic')->getClientOriginalName();
        $student = Student::firstOrCreate(
            ['email' => $request->email],
            
            [
              'name' => $request->name,
              'bdate' => $request->bdate,
              'phone' => $request->phone,
              'profilepic' =>$timestamp.'_'.$filename
            ]


        );  
        $request->profilepic->move(public_path('storage'),$timestamp.'_'.$filename);
        
        
        // check if our model row was created or not

        if ($student->wasRecentlyCreated){
            // created yay
            // toast Modal window and Toast position, can be 'top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', or 'bottom-end'.
            toast('Yay','success')->autoClose(5000)->position('top-end');
            // Chain the attach method on the freshly created student object... we attach the course value from the signup form
            $student->course()->attach(request('course'));

            // Here we will unleash our mails...Short compact admin notification!
            // Mail::raw('Nieuwe inschrijving:'.request('name').' - '.request('email'),function($message){
            //     $message->to(request('email'))->subject('Nieuwe inschrijving van'.request('name'));
            // });

            // Sendmail with view and html template...
            // With this eloquent, we retrieve the name of the course, and then pass it on to signup sendmail html template
            $course = Course::find(request('course'))->pluck('name')->first();
            // Conversion to object - not mandatory, but handy -> arrow use in template $validate->name iso $validate['name']
            $validate = (object) $validate;
            // "OLD 5.2 method";
            Mail::send('mails.signup', compact('validate','course'), function($message){
                $message->to(request('email'))
                ->subject('Inschrijving van'. request('name'))
                ->bcc('admin@syntratech.be')
                ;
            });


            // the Laravel mailables method instead of the traditional (but stil useable 5.2 method - above)

            Mail::to(request('email'))->send(new SignupComplete($validate));

            // Before we head to the view, we would like to post some student data to an external API
            $response = Http::post('https://reqres.in/api/users',[
                'name' => $request->name,
                'email' => $request->email
            ]);
            dd($response->successful());



            return view('signupok', compact('student'));
        } else {
            // already exists
            toast('Nay','warning')->autoClose(5000)->position('top-end');
            return view('signuperror', compact('student'));
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
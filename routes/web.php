<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Student;
use App\Models\Location;
use App\Models\Teacher;
use App\Models\Course;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    toast('Nieuwe opleidingen beschikbaar','success');
    // eerst mijn datasources bepalen
    $countStudent = Student::all()->count();
    $countTeacher = Teacher::all()->count();
    $countLocation = Location::all()->count();
    $locations = Location::all();
    //dd($locations);
    // With compact (native PHP method) -> Pass/transform the datasets to an array -> view

    // weather api request ->
    $response = Http::get('https://api.openweathermap.org/data/2.5/weather?q=zonhoven&appid=0404c984d549fe4cdedaf43613488470&units=metric');
    $weather = $response->json();
    //$weather = (object) $weather;
   
    return view('home',compact('weather','countStudent', 'countTeacher', 'countLocation','locations'));
});



// Routes for the courses overview

Route::get('/courses', 'CourseController@index');
Route::get('/course/{id}', 'CourseController@detail');



Route::get('/mailtest', function () {
    Mail::raw('bonjour', function($message) {
        $message->subject('Email de test')
                ->to('test2@example.org');
     });
});

// Specific API Get case. If we to make our courses available trough 
// A REST Api endpoint... Just use this little snippet.
Route::get('/api/{$key}/courses', function(){
$api = Course::get()->toJson();
return $api;
}); 

// It's time to fetch some rest api data with our guzzle GET request.
Route::get('/api/soccer', function(){
$result= Http::get('https://www.thesportsdb.com/api/v1/json/1/searchteams.php?t=Galatasaray');
//dd($result->json());

foreach ($result->json() as $data) {
    foreach ($data as $row) {
        // convert an array to an object: (not needed, optional, you can also use the array notation $row['strSport'])
        $row = (object) $row;
        echo $row->strSport."<hr>";
    }
}

});



// Route::get('/location', function () {
//     return view('location');
// });
Route::get('/location','LocationController@index');

Route::get('/order', function () {
   // return view('order');
   $current = Carbon::now();

   //return $trialExpires = $current->addDays(10)->formatLocalized('%d %B %Y');
   // Format always in the end...
   return $current->addDays(29)->format('d/m/Y');

});

Route::get('/student','StudentController@index');

Route::get('studentpdf/{id}', function ($id) {
    $student = \App\Models\Student::where('id',$id)->with('course')->firstOrFail();
    //dd($student);
    $pdf = PDF::loadView('pdf.student', compact('student'));
    return $pdf->download('student_'.$id.'.pdf');

})->middleware('auth.basic');


Route::get('/signup', 'StudentController@Create');
Route::post('/signup', 'StudentController@Store');

Route::get('/teacher', function () {
   return view('teacher');
   
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
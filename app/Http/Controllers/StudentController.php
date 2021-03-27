<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\Orders;
use App\Http\Resources\Students as StudentResource;
use App\Http\Resources\StudentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;
use Validator;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('login');
        if(isset(Auth::user()->email)){
            if(Auth::user()->email == 'admin@admin.com'){
                $students = Student::all();
                return view('student',['students'=>$students,'layout'=>'index']);
            }
            else{
                $student = DB::table('students')->where('email', Auth::user()->email)->value('balance');
                $students = Student::all();
                return view('student',['students'=>$students,'student'=>$student,'layout'=>'student']);
            }
        }
        else{
            return view('login');
        }
    }

    public function formSubmit(Request $request)
    {
        return response()->json([$request->all()]);
    }

    public function checklogin(Request $request)
    {
        // 'email' => 'required|email',
        // 'password' => 'required|alphaNum|min:3'
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            // return redirect('/');
            return response()->json([
                'status' => 'success',
                'redirect' => '/'
            ]);
        }
        else{
            return response()->json([$request->all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset(Auth::user()->email)){
            if(Auth::user()->email == 'admin@admin.com'){
                $students = Student::all();
                return view('student',['students'=>$students,'layout'=>'create']);
            }
            else{
                $students = Student::all();
                return redirect('/');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->cne = $request->input('cne');
        $student->FirstName = $request->input('firstName');
        $student->LastName = $request->input('lastName');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->password = Hash::make('123456');
        $student->specialty = $request->input('specialty');
        $student->balance = $request->input('balance');
        $student->save();
        $user_data = new User();
        $user_data->name = $request->input('firstName');
        $user_data->email = $request->input('email');
        $user_data->password = Hash::make('123456');
        $user_data->remember_token = Str::random(10);
        $user_data->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students,'students'=>$students,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $students = Student::all();
        $student->cne = $request->input('cne');
        $student->FirstName = $request->input('firstName');
        $student->LastName = $request->input('lastName');
        $student->age = $request->input('age');
        $student->specialty = $request->input('specialty');
        $student->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }

    public function checkout(Request $request)
    {
        $student = DB::table('students')->where('email', Auth::user()->email)->value('balance');
        Stripe::setApiKey('sk_test_51IVftMB2JF2oH8DvKxhCzRVu5hU56cPR08Om3J3mutZlZr4oIzXp4YfD1wE3EDavgF4hkQnZF331EB8KroIOJKHK00xXzZQqPc');
        try{
            $charge = Charge::create(array(
                "amount" => $request->input('amount') * 100,
                "currency" => "PHP",
                "source" => "tok_mastercard", //obtained with Stripe.js
                "description" => "Test Charge"
            ));

        $order = new Orders();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->card_name = $request->input('card-name');
        $order->card_number = $request->input('card-number');
        $order->exp_mon = $request->input('exp-mon');
        $order->exp_year = $request->input('exp-year');
        $order->cvc = $request->input('cvc');
        $order->amount = $request->input('amount');
        $order->payment_id = $charge->id;
        $order->save();
        $remain = $student - $request->input('amount');
        $students = DB::table('students')->where('email', Auth::user()->email)->update(array('balance'=>$remain));
        return redirect('/');


        }catch(\Exception $e){
            return redirect('/')->with('error',$e->getMessage());

        }

        
    }

    public function shows()
    {
        return new StudentCollection(Student::all());
    }

    public function showone($id)
    {
        return Student::find($id);
    }

    public function stores(Request $request)
    {
        $student = new Student();
        $student->cne = $request->input('cne');
        $student->FirstName = $request->input('firstName');
        $student->LastName = $request->input('lastName');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->password = Hash::make('123456');
        $student->specialty = $request->input('specialty');
        $student->balance = $request->input('balance');
        $student->save();
        $user_data = new User();
        $user_data->name = $request->input('firstName');
        $user_data->email = $request->input('email');
        $user_data->password = Hash::make('123456');
        $user_data->remember_token = Str::random(10);
        $user_data->save();
    }

    public function updates(Request $request, $id)
    {
        $student = Student::find($id);
        $students = Student::all();
        $student->cne = $request->input('cne');
        $student->FirstName = $request->input('firstName');
        $student->LastName = $request->input('lastName');
        $student->age = $request->input('age');
        $student->email = $request->input('email');
        $student->specialty = $request->input('specialty');
        $student->balance = $request->input('balance');
        $student->save();
        return redirect('/');
    }

    public function deletes($id)
    {
        $student = Student::find($id);
        $student->delete();
    }


    // public function register(Request $request)
    // {
    //     return view('/register');
    // }
    // public function registeruser(Request $request)
    // {
    //     $user_data = new User();
    //     $student->name = $request->input('name');
    //     $student->email = $request->input('email');
    //     $student->password = $request->input(Hash::make('password'));
    //     $student->remember_toker = $request->input(str_random(10));
    //     $student->save();
    //     return redirect('/');
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\User;
use App\Models\Roles;
use App\Models\Project;
use Illuminate\Support\Facades\Http;
use App\Logger;
use App\LoggerInterface;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home'); 
        return redirect('/herramientas/tickets');     
    }

    public function lw()
    {
        // $datos_estatus = Estatus::all();
        // return $datos_estatus;

        return view('viewlw');
    }

    public function test()
    {
        /////HAS
        // $collection = collect(['account_id' => 1, 'product' => 'Desk', 'amount' => 5]);
        // $datos_estatus = collect(Estatus::first());

        // if($datos_estatus->has('id')){
        //     return 'estatus';
        // }        
        // return $datos_estatus;

        // $collection = collect(Estatus::first());
        // $datos_estatus = Estatus::all()->pluck('id','estatus')->toarray();

        // $datos_usuarios = Roles::all();
        // $user = User::find(1);
        // $user = User::find(1)->roles()->orderBy('name')->get();
        // foreach ($user as $role) {
        //     echo $role, '<br>';
        // }

        //anexar y eliminar registro de tabla Roles
        // $user = User::where('id', 1)->first();    
        // // $user->roles()->attach([3]);
        // $user->roles()->detach(Roles::where('id', 3)->first());

        // $user = User::find(1);
        // foreach ($user->roles as $role) {
        //     echo $role->name;
        // }

        // $project = Project::all();
        // foreach ($project as $key => $value) {
        //     echo $value->name,'<br>';
        //     foreach ($value->deployments as $key => $value2) {
        //         echo $value2, '<br>';
        //     }
        // }

        $user = User::all();
        foreach ($user as $key => $value) {
            // echo $value->name, $value->tipos, '<br><br>';
        }

        // $user = Estatus::latest()->get();
        // $user = Estatus::oldest()->get();
        // $user = Estatus::findOrFail(1);

        // $response = json_decode(Http::get('https://jsonplaceholder.typicode.com/users'), true);
        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer 1|dsZPch6IGMJh6YP0GaBFvoRgyvkisiSBiT3gjsyL',            
        //     // 'Accept' => 'application/json'
        // ])->post('https://walletdev.holacloud.com/api/checkLicense', [
        //     'email' => 'drbetancourt6@gmail.com',
        //     'state' => 'FL',
        //     'platform' => 'xxx',
        // ]);

        $response = Http::withToken('1|dsZPch6IGMJh6YP0GaBFvoRgyvkisiSBiT3gjsyL')->post('http://local.wallet.com/api/checkLicense', [
            'email' => 'drbetancourt6@gmail.com',
            'state' => 'FL',
            'platform' => 'xxx'
        ]);
        // $resultado = json_decode($response, true);
        // // echo $resultado['success'];
        // if(boolval($resultado['success']) === true){
        //     echo $resultado['success'];
        // }

        // $user = Estatus1::all();
     
        return $response;
    }

    public function socket_ms(Request $request){
        set_time_limit(0);
        ini_set("memory_limit", "-1");
        header('Access-Control-Allow-Origin: *');

    	$message['user'] = "usuario xx";
	    $message['message'] =  "Prueba mensaje desde Pusher";
	    $success = event(new \App\Events\sUpdate($message));
	    return $success;

    }

    public function lcz(){
        $user = User::first();
        // return view('lcz')->withUser3('userX');
        // $tk = $user->createToken('token')->accessToken;
        return view('lcz')->with('user', $user);
    }

    public function claseTest(LoggerInterface $logger){
        // return 'ct';
        // dump('test');
        // $logger = new \App\Logger();
        // $logger->debug('test3');
        $logger->debug('test5');
    }

    public function authTF(){
        $user = Auth::user();
        // return $user;
        return view('auth.two-factor-auth', compact('user'));
    }
    
}

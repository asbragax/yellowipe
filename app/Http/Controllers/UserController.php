<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();

            return redirect()->intended('home');

            return back()->withErrors([
                'email' => 'O e-mail não está cadastrado',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function index()
    {
        $users = $this->user::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        
        if($data['password'] == $data['password_confirmation']){

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            flash('Usuário cadastrado com sucesso')->success();
            return redirect()->route('users.index');
        }else{
            flash('As senhas digitadas não correspondem')->warning();
            return view('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);
        if(strlen($data['password']) <= 8){
            $user->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);

            flash('Usuário alterado com sucesso')->success();
            return redirect()->route('users.index');

        }elseif($data['password'] == $data['password_confirmation']){

            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            flash('Usuário alterado com sucesso')->success();
            return redirect()->route('users.index');
            
        }else{
            flash('As senhas digitadas não correspondem')->warning();
            return view('users.edit', compact('user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash('Médico removido com sucesso')->success();
        return redirect()->route('users.index');
    }
}

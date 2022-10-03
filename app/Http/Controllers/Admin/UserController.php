<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OpenWeatherMapService;
use Illuminate\Http\Request;
use App\Models\User;
use View;
use Session;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $rules = [
        'email' => 'email|unique:users'
    ];

    private $messages = [
        'email.email'  => 'Digite um Email Válido',
        'email.unique' => 'Já existe um usuário com esse email'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $items = $request->items ?? 10;

        $usuarios = DB::table('users')
        ->limit($items)
        ->paginate($items);    

        $clima = json_decode(OpenWeatherMapService::consultaApi());

		return View::make('admin.usuarios.index')
        ->with(compact('usuarios'))
        ->with(compact('clima'));
    }

    public function search(Request $request)
    {
        
        $search = $request->search ?? '';
        $items = $request->items ?? 10;

        $usuarios = User::where('nome', 'like', '%'.$search.'%')
        ->orWhere('email', 'like', '%'.$search.'%')
        ->orWhere('cpf_cnpj', 'like', '%'.$search.'%')
        ->orWhere('telefone', 'like', '%'.$search.'%')
        ->limit($items)
        ->paginate($items);    

        $clima = json_decode(OpenWeatherMapService::consultaApi());

		return View::make('admin.usuarios.index')
        ->with(compact('usuarios'))
        ->with(compact('clima'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.usuarios.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request, $this->rules, $this->messages);

        $input['email'] = strtolower($input['email']);

        try {
           User::create([
                'nome' => $input['nome'],
                'email' => $input['email'],
                'cpf_cnpj' => $input['cpf_cnpj'],
                'telefone' => $input['telefone'],
                'mensagem' => $input['mensagem']
            ]);
                                            
            Session::flash('flash_message', 'Usuário Adicionado com Sucesso!');

            return redirect()->route('home');

        } catch (Exception $e) {
           $result['success'] = false;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
        }

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.edit')
                ->with('usuario', $usuario);
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
        $usuario = User::findOrFail($id);

        $input = $request->all();

        try {
            $usuario->fill($input)->save();

            Session::flash('flash_message', 'Usuário atualizado com sucesso!');

            return redirect()->route('home');

        } catch (Exception $e) {
           $result['success'] = false;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
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
        $usuario = User::findOrFail($id);
        $usuario->delete();

        Session::flash('flash_message', 'Usuário Excluido!');

        return redirect()->route('home');
    }
    

}

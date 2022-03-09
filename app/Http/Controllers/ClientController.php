<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Client;
use App\Models\Category;
use App\Models\User;

class ClientController extends Controller
{
    public function create() {
        $categories = Category::all();
     
    return View('clients.create', compact('categories'));
    }

    public function store(Request $request) {
        
        $client = new Client();
        $client->name_client = $request->name_client;
        $client->phone = $request->phone;
        $client->cpf = $request->cpf;
        $client->observation = $request->observation;
        $client->profile = $request->profile;
        $client->category_id = $request->category_id;
        
        $user = auth()->user();
        $client->user_creator_id = $user->id;

        $client->save();

        
    return redirect('/clients/dashboard')->with('mensagem', 'Cliente Cadastrado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }

    public function dashboard() {
        $categories = Category::all();
        $clients = DB::table('clients')

        ->orderByRaw('id ASC')   
        ->join('categories', 'clients.category_id', '=', 'categories.id')
        ->select('clients.id', 'clients.category_id', 'clients.name_client',  
        'categories.name_category')
        ->get();
       // dd($clients);
    return View('clients.dashboard', ['clients' => $clients], compact('categories')); 
    }

    public function show($id) {

        $client = Client::findOrFail($id);
       
    return view('clients.show', ['client' => $client]);    
    }

    public function edit($id) {
        $client = Client::findOrFail($id);
        $categories = Category::all();

    return view('clients.edit', ['client' => $client], compact('categories')); 
    }


    public function update(Request $request) {

        $data = $request->all(); 

        Client::findOrFail($request->id)->update($data);
    return redirect('/clients/dashboard')->with('mensagem', 'Cliente editado com Sucesso!', ['data' => $data]);
    }


    public function destroy($id) {

        Client::findOrFail($id)->delete();

    return redirect('/clients/dashboard')->with('mensagem', 'Cliente deletado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;


class UserProfileController extends Controller
{
    public function create()
    {
        return view('users_profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
            'imagem_perfil' => 'nullable|image|max:2048'
        ]);

        $imagemPath = null;
        if ($request->hasFile('imagem_perfil')) {
            $imagemPath = $request->file('imagem_perfil')->store('imagens', 'public');
        }

        UserProfile::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'biografia' => $request->biografia,
            'imagem_perfil' => $imagemPath
        ]);

        $perfis = \App\Models\UserProfile::all();

        return view('users_profiles.index', ['perfis' => $perfis]);
    }


    public function index(Request $request)
    {
        $query = \App\Models\UserProfile::query();

        if ($request->filled('busca')) {
            $busca = $request->input('busca');
            $query->where('nome', 'like', '%' . $busca . '%');
        }

        $perfis = $query->get();

        return view('users_profiles.index', ['perfis' => $perfis]);
    }


    public function edit($id)
    {
        $perfil = \App\Models\UserProfile::find($id);

        return view('users_profiles.edit', ['perfil' => $perfil]);
    }

    public function update(Request $request)
    {
        $perfil = \App\Models\UserProfile::find($request->id);

        $imagemPath = $perfil->imagem_perfil;
        if ($request->hasFile('imagem_perfil')) {
            $imagemPath = $request->file('imagem_perfil')->store('imagens', 'public');
        }

        $perfil->update([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'biografia' => $request->biografia,
            'imagem_perfil' => $imagemPath,
        ]);

        return redirect('/user_profiles');
    }


    public function destroy($id)
    {
        $perfil = \App\Models\UserProfile::find($id);

        if ($perfil) {
            $perfil->delete();
        }

        return redirect('/user_profiles');
    }
}

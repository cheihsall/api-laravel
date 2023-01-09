<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Utilisateurs;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class PostController extends Controller
{




/* creation d'une fonction pour l'ajout des matricules pour chaque utilisateur */
    function generateMatricule($n = 3) /* creation de la fonction avec ses parametres */
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
/* cette boucle nous permet de parcourir la chaine de caractére et d'incrementé de 3 lettre aléatoirement */
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return '2022-' . $randomString;
    }




    public function create(Request $request)
    { $etat = '1';
        $user =new Utilisateur;
        $user->matricule = $this->generateMatricule(); // autogerer le matricule
        $user->nom = $request->get('nom');
        $user->prenom = $request->get('prenom');
        $user->email = $request->get('email');
        $user->motdepasse = $request->get('motdepasse');
        $user->role = $request->get('role');
        $user->etat = $etat;
        $user->photo = 'avatarr.jpg'; // il y'a un avatar par defaut
        $user->save();

        return response()->json($user);
    }


    public function show(string $id)
    {
        $users = Utilisateur::findOrFail($id);

        return response()->json($users);
    }

    public function update(string $id)
    {
        $users = Utilisateur::all();
        return response()->json($users);
    }

    public function destroy(string $id)
    {
        Utilisateur::destroy($id);
        $users = Utilisateur::all();
        return response()->json($users);

    }

    public function data()
    {
        $users = Utilisateur::all();
        return response()->json($users);

    }
}

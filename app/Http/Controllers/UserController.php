<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\UserApi; // For bonus

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        try {
            $response = Http::timeout(5)->get('https://jsonplaceholder.typicode.com/users');
            if (!$response->successful()) {
                throw new \Exception('API Error: ' . $response->status());
            }
            $users = $response->json();

            // Filter by name if search is present
            if ($search) {
                $users = array_filter($users, function ($user) use ($search) {
                    return stripos($user['name'], $search) !== false;
                });
            }
            $error = null;
        } catch (\Exception $e) {
            $users = [];
            $error = $e->getMessage();
        }

        return view('users', [
            'users' => $users,
            'error' => $error,
            'search' => $search,
        ]);
    }

    // Bonus: Load from DB
    public function db(Request $request)
    {
        $search = $request->query('search');
        $query = UserApi::query();
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $users = $query->get();
        return view('users', [
            'users' => $users,
            'error' => null,
            'search' => $search,
        ]);
    }
}

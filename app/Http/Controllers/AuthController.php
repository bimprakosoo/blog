<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{

  public function showLoginForm() {
    return view('login');
  }
  
  public function login(Request $request) {
    $credentials = $request->only('email', 'password');
    
    $client = new Client();
    $response = $client->post('http://127.0.0.1:8000/api/login', [
      'form_params' => $credentials,
    ]);
    
    $data = json_decode($response->getBody(), true);
    
    session(['access_token' => $data['token']]);
    $accessToken = session('access_token');
    return redirect()
      ->route('posts')
      ->withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
      ]);
  }
  
  public function showRegistrationForm() {
    return view('register');
  }

  public function register(Request $request) {
    $data = $request->only('name', 'email', 'password');
    
    $client = new Client();
    $response = $client->post('http://127.0.0.1:8000/api/register', [
      'form_params' => $data,
    ]);
    return redirect()->route('login');
  }
}


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
    $response = $client->post(env('API_URL') . '/login', [
      'form_params' => $credentials,
    ]);
    
    $data = json_decode($response->getBody(), true);
    
    session(['access_token' => $data['token']]);
    session(['user' => $data['user']]);
    return redirect()
      ->route('posts');
  }
  
  public function showRegistrationForm() {
    return view('register');
  }

  public function register(Request $request) {
    $data = $request->only('name', 'email', 'password');
    
    $client = new Client();
    $response = $client->post(env('API_URL') . '/register', [
      'form_params' => $data,
    ]);
    return redirect()->route('login');
  }
  
  public function logout() {
    $accessToken = session('access_token');
    
    $client = new Client();
    $response = $client->post(env('API_URL') . '/logout', [
      'headers' => [
        'Authorization' => 'Bearer ' . $accessToken,
      ],
    ]);
  
    session()->forget('access_token');
    return redirect()->route('posts');
  }
}


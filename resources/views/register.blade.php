@extends('layout')

@section('content')
  <div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded shadow">
      <h1 class="text-2xl font-bold mb-4">Register</h1>
      <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
          </label>
          <input class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-500"
                 id="name" type="text" name="name" required autofocus>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
          </label>
          <input class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-500"
                 id="email" type="email" name="email" required>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Password
          </label>
          <input class="border border-gray-300 rounded px-3 py-2 w-full focus:outline-none focus:border-blue-500"
                 id="password" type="password" name="password" required>
        </div>
        <div class="flex items-center justify-between">
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Register
          </button>
          <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
             href="{{ route('login') }}">
            Login
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection

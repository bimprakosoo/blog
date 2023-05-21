<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-6">
  <div class="flex justify-end">
    @if(empty($token))
      <div class="mb-4">
        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Login
        </a>
        <a href="{{ route('register') }}"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
          Register
        </a>
      </div>
    @else
      <div class="mb-4">
        <p class="text-lg">Logged in as: {{ $user['name'] }}</p>
        <a href="{{ route('logout') }}"
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @endif
  </div>
</div>
@yield('content')
</body>
</html>

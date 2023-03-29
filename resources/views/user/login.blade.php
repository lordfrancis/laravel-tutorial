@include('partials.header')
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4x1 font-bold text-white text-center"> {{$title}}</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
    <section>
        <h3 class="font-bold text-2x1"> Welcome to Student System </h3>
        <p class="text-gray-600 pt-2"> Sign in to your account </p>
    </section>
    <section class="mt-10">
         <form action="/login/process" method="POST" class="flex flex-col">
            @csrf
            @error('email')
            <p class="text-red-500 text-xs mt-2">
                {{$message}}
            </p>
            @enderror
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                <input type="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none">
            </div>

            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none">
            </div>
            <button type="submit" class="bg-black hover:bg-gray-600 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"> Login </button>
         </form>
    </section>
</main>

@include('partials.footer')

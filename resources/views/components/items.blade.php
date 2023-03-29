<ul class="flex flex-col md:flex-row">
    <li>
        <a href="/login" class="block pr-4 pl-3">Sign In</a>
    </li>
    <li>
        <a href="/register" class="block pr-4 pl-3">Sign Up</a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button class="block pr-4 pl-3">logout</button>
        </form>
    </li>
</ul>

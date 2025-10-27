<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pico.yellow.min.css">
    <title>Navbar Role - RSHP UNAIR</title>
</head>
<body>
    <div class="container">
        <header>
            <nav style="postion: sticky; top: 0">
                <ul>
                    <li><strong>RSHP</strong></li>
                </ul>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;"> @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
</body>
</html>
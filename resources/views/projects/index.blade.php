<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('constant.app_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    <style>
        /* footer down */
        body, hrml {
            height: 100%;
        }
        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }

        .header1{
            background: #157094;
            background: linear-gradient(90deg,rgba(21, 112, 148, 1) 0%, rgba(87, 199, 133, 1) 100%, rgba(121, 128, 92, 1) 51%, rgba(237, 221, 83, 1) 100%);
        }

        .main-header {
            background: #2A7B9B;
            background: linear-gradient(90deg,rgba(42, 123, 155, 1) 0%, rgba(70, 115, 87, 1) 100%, rgba(237, 221, 83, 1) 100%);
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg sticky-top header1 border-bottom py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">{{ config('constant.app_name') }}</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a href="#" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Projects</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="#" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Task</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="#" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">Status Update</a>
                    </li>
                </ul>

                <form class="d-flex me-3" role="search">
                    <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="wrapper">
        <main class="container">

            <header class="mt-3 p-2 main-header">
                <div class="d-flex justify-content-between">
                    <div class="me-3">
                        <h4>Projects Details</h4>
                        <small>description</small>
                    </div>
                    <div>
                        Add New
                    </div>
                </div>
            </header>
            
            <div class="card mt-3">
                <div class="card-header">
                    <h5>Projets Details</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-primary">
                                <tr>
                                    <th>SN.</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Start date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($records as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ $row->start_date }}</td>
                                        <td>{{ $row->end_date }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->id }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No projects found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $records->appends(request()->query())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    {{-- Footer --}}
    <footer class="py-3 my-4"> 
        <p class="text-center text-body-secondary">© {{ date('Y') }} Company, Inc</p> 
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>
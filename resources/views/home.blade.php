<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body class="container-fluid">
    <main>
        <article class="row">
            <section class="col-12">
                <div class="card">
                    @if(Route::has('create'))
                    <div class="car-header">
                        <nav class="navbar justify-content-end w-100">
                            <div class="mx-3 px-3 w-100">
                                <a class="btn btn-rounded btn-outline-success w-100" href="{{ route('create') }}">
                                    {{ __('Hinzufügen') }}
                                </a>
                            </div>
                        </nav>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('Benutzung') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('IP') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('Port') }}
                                        </th>
                                        <th style="width: 2.5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($host as $row)
                                    {{-- <tr onclick="window.open('http://{{ $row->ip }}{{ $row->port ?? '' }}')"> --}}
                                    <tr>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                        <td>
                                            {{ $row->usage }}
                                        </td>
                                        <td>
                                            @if ($row->web_based == 1)
                                                @if($row->port == '443')
                                                    <a href="https://{{ $row->ip }}" target="_blank">
                                                        {{ $row->ip }}
                                                    </a>
                                                @else
                                                    <a href="http://{{ $row->ip }}:{{ $row->port }}" target="_blank">
                                                        {{ $row->ip }}
                                                    </a>
                                                @endif
                                            @else
                                                {{ $row->ip }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $row->port }}
                                        </td>
                                        <td>
                                            <a href="{{ route('show', $row->id) }}">
                                                {{ __('Anzeigen') }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
        </article>
    </main>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>

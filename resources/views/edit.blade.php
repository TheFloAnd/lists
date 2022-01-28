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
        <article class="row g-3">
            <section class="col-12">
                <div class="card">
                    <div class="car-header">
                        <nav class="navbar mx-3">
                            <h1>
                                {{ __('Bearbeiten') }}: {{ $item->ip }}
                            </h1>
                        </nav>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('home.update', $item->id) }}">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="card-body">
                                <div class="row g-3 justify-content-center">
                                    <div class="col-10">
                                        <div class="form-check form-switch">
                                            @php
                                            if($item->web_based == 1){
                                            $checked = 'checked';
                                            }else{
                                            $checked = '';
                                            }
                                            @endphp
                                            <input type="checkbox" role="switch"
                                                class="form-check-input @error('name') is-invalid @enderror"
                                                value="{{ old('web_based') }}" name="web_based" id="web_based"
                                                placeholder="{{ __('web_based') }}" {{ $checked }} />

                                            @error('web_based')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <label for="web_based">
                                                {{ __('Web Basiert') }}
                                                <span style="color: red">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                value="{{ $item->name ?? old('name') }}" name="name" id="name"
                                                placeholder="{{ __('Name') }}" require />

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <label for="name">
                                                {{ __('Server Name') }}
                                                <span style="color: red">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('usage') is-invalid @enderror"
                                                value="{{ old('usage') }}" name="usage" id="usage"
                                                placeholder="{{ __('Benutzung') }}" require />

                                            @error('usage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <label for="usage">
                                                {{ __('Benutzung') }}
                                                <span style="color: red">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="ip-address">
                                                        {{ __('IP-Addresse') }}
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"
                                                            id="basic-addon1">192.168.178.</span>
                                                        <input type="number" min="1"
                                                            class="form-control @error('ip-address') is-invalid @enderror"
                                                            value="{{ substr($item->ip, 12) ?? old('ip-address') }}"
                                                            name="ip-address" id="ip-address"
                                                            placeholder="{{ __('Please enter a valid IP address') }}"
                                                            require />

                                                        @error('ip-address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="ip">
                                                        {{ __('Port') }}
                                                    </label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">:</span>
                                                        <input type="number" min="0"
                                                            class="form-control @error('port') is-invalid @enderror"
                                                            value="{{ $item->port[1] ?? old('port') }}" name="ip"
                                                            id="port" placeholder="Port" />

                                                        @error('port')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row g-2 justify-content-center">
                                    <div class="col-sm-8 col-lg-6">
                                        <button type="submit" class="btn btn-rounded btn-outline-success w-100">
                                            {{ __('Speichern') }}
                                            <span class="btn-icon-right pull-right mr-auto">
                                                <i class="fas fa-check"></i>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        @if(Route::has('dashboard'))
                                        <a class="btn btn-rounded btn-outline-secondary w-100"
                                            href="{{ route('show', $id) }}">
                                            {{ __('Zurück') }}
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-lg-10">
                                        <button type="button" class="btn btn-rounded btn-outline-danger w-100"
                                            data-bs-toggle="modal" data-bs-target="#delete">
                                            {{ __('Löschen') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>
        </article>
    </main>
    <div class="modal fade" id="delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Löschen') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$txt ?? 'Wollen sie den Eintrag wirklich Löschen?'}}
                </div>
                <form method="post" action="{{ route('home.destroy', $item->id) }}">
                    {{ method_field('DELETE') }}
                    @csrf
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-rounded btn-outline-danger w-100">
                            {{ __('Löschen') }}
                        </button>
                        <button type="button" class="btn btn-sm btn-rounded btn-outline-secondary w-100"
                            data-dismiss="modal">
                            {{ __('Schließen') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>

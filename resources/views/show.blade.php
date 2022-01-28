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
                                {{ __('Anzeigen') }}: {{ $item->ip }}
                            </h1>
                        </nav>
                    </div>
                    <div class="card-body">
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
                                            placeholder="{{ __('Name') }}" require readonly />

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
                                            placeholder="{{ __('Benutzung') }}" require readonly />

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
                                                    <span class="input-group-text" id="basic-addon1">192.168.178.</span>
                                                    <input type="text" min="1"
                                                        class="form-control @error('ip-address') is-invalid @enderror"
                                                        value="{{ substr($item->ip, 12) ?? old('ip-address') }}"
                                                        name="ip-address" id="ip-address"
                                                        placeholder="{{ __('Please enter a valid IP address') }}"
                                                        require readonly />

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
                                                        value="{{ $item->port ?? old('port') }}" name="ip" id="port"
                                                        placeholder="Port" readonly />

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
                                <div class="col-sm-8 col-lg-5">
                                    <a type="button" href="{{ route('edit', $id) }}"
                                        class="btn btn-rounded btn-outline-success w-100">
                                        {{ __('Bearbeiten') }}
                                        <span class="btn-icon-right pull-right mr-auto">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-lg-2">
                                    @if(Route::has('dashboard'))
                                    <a class="btn btn-rounded btn-outline-secondary w-100"
                                        href="{{ route('dashboard') }}">
                                        {{__('Zurück')}}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </article>
    </main>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>

</html>

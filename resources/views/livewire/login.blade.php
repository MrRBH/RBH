<div>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
             {{-- bootstrap icons   --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <script>
                function showpassword() {
                    var passwordInput = document.getElementById("password");
                    var icon = document.getElementById("password");
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                      
                    } else {
                        passwordInput.type = "password";
                       
                    }
                }
            </script>
            <livewire:styles />
    </head>

    <body>
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <h3 class="card-header text-center">Login</h3>
                            <div class="card-body">
                                <form method="POST" action="{{ route('livevwire.customlogin') }}" wire:submit="customLogin" novalidate>
                                    @csrf
                                    <div>
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" wire:model.live='email' class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" wire:model.live="password"  class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus>
                                            <button type="button" class="btn btn-secondary"  onclick="showpassword()">
                                                <i id="eye-icon" class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                 
                                    @if (session('success'))
                                        <div class="alert alert-danger mt-2">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="form-group mb-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-grid mx-auto">
                                        <button type="submit" wire:click='customLogin' class="btn btn-dark btn-block">Signin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <livewire:scripts />
    </body>

    </html>

</div>

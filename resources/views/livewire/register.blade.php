<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        {{-- bootstrap icons   --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script>
            function showpassword() {
                var passwordInput = document.getElementById("password");
                // var icon = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }
        </script>
    </head>
    <body>
        <div>
            <div class="col-md-6 m-auto">
                <main class="login-form">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <h3 class="card-header text-center">Register</h3>
                                    <div class="card-body">
                                        <form wire:submit.prevent="customRegistration" novalidate>
                                            @csrf
                                            <div>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" wire:model="name" class="form-control" id="name" required autofocus>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div>
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" wire:model="email" class="form-control" id="email" required>
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                                                    <button type="button" class="btn btn-secondary"  onclick="showpassword()">
                                                        <i id="eye-icon" class="bi bi-eye"></i>
                                                    </button>
                                                </div>
                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div>
                                                <label for="role" class="form-label">Role</label>
                                                <select wire:model="role" wire:change="updateRole" class="form-control" id="role" required>
                                                    <option value="Other">Other</option>
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                                @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            {{-- <div>
                                                <label for="Role">Role</label>
                                                <input type="text" wire:model='role' class="form-control" name="" id="">
                                                @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div> --}}
                                            <div class="d-grid mx-auto mt-2">
                                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
              
            </div>
        </div>
    </body>
    </html>
</div>

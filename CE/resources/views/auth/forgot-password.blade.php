<x-guest-layout>
    <x-authentication-card>
        <style>
            body {
                background: linear-gradient(135deg, #4A90E2, #50BFE6);
                font-family: 'Arial', sans-serif;
                color: #333;
            }

            .card {
                background: white;
                border-radius: 10px;
                padding: 30px;
                max-width: 500px;
                margin: 50px auto;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                animation: fadeIn 0.5s ease-in-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .card-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .card-header h2 {
                font-size: 24px;
                color: #2C3E50;
            }

            .description {
                text-align: center;
                font-size: 14px;
                color: #666;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                color: #34495E;
                margin-bottom: 5px;
            }

            .form-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
                transition: border-color 0.3s, box-shadow 0.3s;
            }

            .form-group input:focus {
                border-color: #2980B9;
                box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);
                outline: none;
            }

            .btn {
                display: block;
                width: 100%;
                background: #2980B9;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn:hover {
                background: #21618C;
            }

            .alert {
                background: #E74C3C;
                color: white;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
                margin-bottom: 15px;
                font-size: 14px;
            }
        </style>

        <div class="card">
            <div class="card-header">
                <h2>Recuperar Contraseña</h2>
            </div>

            <div class="description">
                {{ __('¿Olvidaste tu contraseña? Ingresa tu correo y te enviaremos un enlace para restablecerla.') }}
            </div>

            <!-- Mensaje de estado -->
            @session('status')
                <div class="alert">
                    {{ $value }}
                </div>
            @endsession

            <!-- Mensajes de error -->
            <x-validation-errors class="mb-4 alert" />

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <button type="submit" class="btn">
                    {{ __('Enviar Enlace de Restablecimiento') }}
                </button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>

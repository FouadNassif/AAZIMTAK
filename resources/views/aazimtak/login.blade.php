<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Aazimtak</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            /* Blue gradient */
        }

        .error-message {
            animation: shake 0.5s ease-in-out;
            color: red;
        }

        @keyframes shake {
            0% {
                transform: translateX(-10px);
            }

            25% {
                transform: translateX(10px);
            }

            50% {
                transform: translateX(-10px);
            }

            75% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen m-0 text-white">
    <div class="bg-black bg-opacity-70 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-semibold mb-6 text-center">Login to Aazimtak</h1>
        <form id="login-form" action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium">Username</label>
                <input type="text" id="username" name="username" placeholder="Username"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-900 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Password"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-900 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="terms" name="terms"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="terms" class="text-sm">I agree to the <a href="/terms"
                        class="text-blue-400 underline">Terms of Service</a> and <a href="/privacy"
                        class="text-blue-400 underline">Privacy Policy</a></label>
                <span id="error-message" class="hidden error-message ml-2 text-sm">You must accept the terms and
                    policy</span>
            </div>
            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md transition-colors duration-300">Login</button>
        </form>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            const termsCheckbox = document.getElementById('terms');
            const errorMessage = document.getElementById('error-message');

            if (!termsCheckbox.checked) {
                event.preventDefault(); // Prevent form submission
                errorMessage.classList.remove('hidden'); // Show error message
                setTimeout(() => {
                    errorMessage.classList.add('hidden'); // Hide error message after 2 seconds
                }, 2000);
            }
        });
    </script>
</body>

</html>

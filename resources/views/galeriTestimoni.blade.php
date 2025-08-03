<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ushapp - Cuci Sepatu Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('img/logo_ushapp.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in-up': 'fadeInUp 1s ease-out',
                        'fade-in': 'fadeIn 1.2s ease-in-out'
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 max-w-7xl mx-auto">
        @foreach(range(1, 15) as $i)
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="{{ asset('img/testimoni/' . $i . '.jpeg') }}" alt="Gambar {{ $i }}">
            </div>
        @endforeach
    </div>
</body>

</html>

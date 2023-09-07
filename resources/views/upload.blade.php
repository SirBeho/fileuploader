<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-xl font-semibold mb-4">Subir Archivo</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Seleccionar archivo</label>
                <input type="file" name="file" id="file" class="mt-1 p-2 border rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600">Subir Archivo</button>
        </form>

        <h2 class="text-lg font-semibold mt-8 mb-4">Archivos Subidos</h2>
        @if(isset($uploadedFiles) && count($uploadedFiles) > 0)
            <ul>
                @foreach ($uploadedFiles as $file)
                    <li class="mb-2">{{ $file }}</li>
                @endforeach
            </ul>
        @else
            <p>No se han subido archivos.</p>
        @endif
    </div>
</body>
</html>

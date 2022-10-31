<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buzzvel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cinza: {
                            claro: '#eeeeee',
                            escuro: '#616161',
                            hover: '#9e9e9e'
                        },
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif']    
                    },
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-cinza-claro flex justify-center items-center h-screen">

    <main class="flex px-6 drop-shadow-2xl lg:w-3/4">


        <section class="bg-white p-10 gap-6 flex flex-col rounded-lg lg:w-2/3 justify-center">

            <div class="text-center">
                <h1 class="text-4xl mb-2">QR Code Image Generator</h1>
            </div>

            @isset($QRCode)
            <div class="flex justify-center">
                {{$QRCode}}
            </div>
            @endisset

            <form action="{{route('get.card')}}" method="post">
                @csrf

                <label class="text-sm font-bold text-gray-700 mb-2" for="nome">Nome</label>
                <input class="text-sm w-full mb-4 pl-3 rounded border py-2 shadow focus:outline-none hover:border-cinza-claro hover:ring-1 hover:ring-cinza-escuro focus:border-cinza-escuro focus:ring-1 focus:ring-cinza-escuro" id="nome" type="text" name="name" placeholder="Jhon">    

                <label class="text-sm font-bold text-gray-700 mb-2" for="linkedin">Linkedin URL</label>
                <input class="text-sm w-full mb-4 pl-3 rounded border py-2 shadow focus:outline-none hover:border-cinza-claro hover:ring-1 hover:ring-cinza-escuro focus:border-cinza-escuro focus:ring-1 focus:ring-cinza-escuro" id="linkedin" type="url" name="linkedin" placeholder="https://www.linkedin.com/company/buzzvel">

                <label class="text-sm font-bold text-gray-700 mb-2" for="github">Github URL</label>
                <input class="text-sm w-full mb-4 pl-3 rounded border py-2 shadow focus:outline-none hover:border-cinza-claro hover:ring-1 hover:ring-cinza-escuro focus:border-cinza-escuro focus:ring-1 focus:ring-cinza-escuro" id="github" type="url" name="github" placeholder="https://www.github.com/buzzvel">
                <button type="submit" class="font-bold text-white bg-cinza-escuro w-full py-2 rounded-full shadow-2xl hover:bg-cinza-hover duration-150">
                    Generate Image
                </button>
            </form>
        </section>
    </main>

</body>

</html>
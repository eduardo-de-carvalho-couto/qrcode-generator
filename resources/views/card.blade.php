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

            Hello, my name is {{$name}}

            <h1 class="font-bold text-2xl">My history</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum ligula quis massa sollicitudin, sed porttitor lorem tempus.</p>

            <ul class="border flex justify-center space-between">
                <li class=" space-x-20">
                    <a  href="{{$linkedin}}" class="font-bold text-white bg-cinza-escuro w-full px-9 py-2.5 mr-2 mb-2 rounded-full shadow-2xl hover:bg-cinza-hover duration-150">
                        LinkedIn
                    </a>
                    <a  href="{{$github}}" class="font-bold text-white bg-cinza-escuro w-full px-12 py-2.5 mr-2 mb-2 rounded-full shadow-2xl hover:bg-cinza-hover duration-150">
                        Github
                    </a>
                </li>
            </ul>
        </section>
    </main>

</body>

</html>
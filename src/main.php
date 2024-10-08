<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="./css/output.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        h1 {
            font-family: Lexend;
            font-weight: 500;
            font-size: 60px;
        }

        h6 {
            font-family: Lexend;
            font-weight: 200;
            font-size: 14px;
        }

        p {
            font-family: Lexend, sans-serif;
            font-weight: 100;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <?php include 'template/sidebar.php'; ?>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <h1>Hospital Billing</h1>
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div class="grid grid-rows-3 h-36 rounded bg-gray-50 dark:bg-gray-800 col-span-2 bg-blues2">
                    <p class="flex justify-center items-center text-2xl text-gray-400 dark:text-gray-500  card-title">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        New User
                    </p>
                    <h1 class="flex justify-center items-center"></h1>
                    <div class="flex justify-end items-center">
                        <button class="btn-xs rounded bg-blues2 hover:bg-blues hover:text-white mr-5">more info...</button>
                    </div>
                </div>
                <div class="grid grid-rows-3 h-36 rounded bg-gray-50 dark:bg-gray-800 col-span-2 bg-blues2">
                    <p class="flex justify-center items-center text-2xl text-gray-400 dark:text-gray-500  card-title">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-nav" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        New Orders
                    </p>
                    <h1 class="flex justify-center items-center"></h1>
                    <div class="flex justify-end items-center">
                        <button class="btn-xs rounded bg-blues2 hover:bg-blues hover:text-white mr-5">more info...</button>
                    </div>
                </div>
                <div class="grid grid-rows-3 h-36 rounded bg-gray-50 dark:bg-gray-800 col-span-2 bg-blues2">
                    <p class="flex justify-center items-center text-2xl text-gray-400 dark:text-gray-500  card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M0,12V6C0,3.243,2.243,1,5,1h14c2.757,0,5,2.243,5,5v6h-3v-1c0-2.206-1.794-4-4-4h-2c-1.2,0-2.266,.542-3,1.382-.734-.84-1.8-1.382-3-1.382h-2c-2.206,0-4,1.794-4,4v1H0Zm9-3h-2c-1.103,0-2,.897-2,2v1h6v-1c0-1.103-.897-2-2-2Zm10,2c0-1.103-.897-2-2-2h-2c-1.103,0-2,.897-2,2v1h6v-1ZM0,14v6c0,.553,.448,1,1,1s1-.447,1-1v-2H22v2c0,.553,.447,1,1,1s1-.447,1-1v-6H0Z" />
                        </svg>
                        Rooms
                    </p>
                    <h1 class="flex justify-center items-center"></h1>
                    <div class="flex justify-end items-center">
                        <button class="btn-xs rounded bg-blues2 hover:bg-blues hover:text-white mr-5">more info...</button>
                    </div>
                </div>
                <div class="grid grid-rows-3 h-36 rounded bg-gray-50 dark:bg-gray-800 col-span-2 bg-blues2">
                    <p class="flex justify-center items-center text-2xl text-gray-400 dark:text-gray-500  card-title">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="m8,15.5c0,1.381-1.119,2.5-2.5,2.5s-2.5-1.119-2.5-2.5,1.119-2.5,2.5-2.5,2.5,1.119,2.5,2.5ZM24,4.5v18.5c0,.552-.448,1-1,1s-1-.448-1-1v-2H2v2c0,.552-.448,1-1,1s-1-.448-1-1V1C0,.448.448,0,1,0s1,.448,1,1v6h7v-2.5c0-2.481,2.019-4.5,4.5-4.5h6c2.481,0,4.5,2.019,4.5,4.5ZM2,19h7v-2.5c0-2.481,2.019-4.5,4.5-4.5h8.5v-3H2v10Zm3.5-13c1.381,0,2.5-1.119,2.5-2.5s-1.119-2.5-2.5-2.5-2.5,1.119-2.5,2.5,1.119,2.5,2.5,2.5Z" />
                        </svg>
                        Room Types
                    </p>
                    <h1 class="flex justify-center items-center"></h1>
                    <div class="flex justify-end items-center">
                        <button class="btn-xs rounded bg-blues2 hover:bg-blues hover:text-white mr-5">more info...</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>


</html>
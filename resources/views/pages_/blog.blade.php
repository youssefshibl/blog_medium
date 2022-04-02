<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../css/main_one.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <div class="cont">
        <div class="cont-editor">
            <?php include('../layout/nav_editor.php'); ?>

            <div class="body_art" contenteditable="true">
                <p class="input-active">
                    {{-- <span class="icon-span">
                        <svg class="svgIcon-use" width="25" height="25">
                            <path d="M20 12h-7V5h-1v7H5v1h7v7h1v-7h7" fill-rule="evenodd"></path>
                        </svg>
                        <span class="icon-span-bar">

                            <svg class="svgIcon-use" width="25" height="25"><g fill-rule="evenodd"><path d="M4.042 17.05V8.857c0-1.088.842-1.85 1.935-1.85H8.43C8.867 6.262 9.243 5 9.6 5.01L15.405 5c.303 0 .755 1.322 1.177 2 0 .077 2.493 0 2.493 0 1.094 0 1.967.763 1.967 1.85v8.194c-.002 1.09-.873 1.943-1.967 1.943H5.977c-1.093.007-1.935-.85-1.935-1.937zm2.173-9.046c-.626 0-1.173.547-1.173 1.173v7.686c0 .625.547 1.146 1.173 1.146h12.683c.625 0 1.144-.53 1.144-1.15V9.173c0-.626-.52-1.173-1.144-1.173h-3.025c-.24-.63-.73-1.92-.873-2 0 0-5.052.006-5 0-.212.106-.87 2-.87 2l-2.915.003z"></path><path d="M12.484 15.977a3.474 3.474 0 01-3.488-3.49A3.473 3.473 0 0112.484 9a3.474 3.474 0 013.488 3.488c0 1.94-1.55 3.49-3.488 3.49zm0-6.08c-1.407 0-2.59 1.183-2.59 2.59 0 1.408 1.183 2.593 2.59 2.593 1.407 0 2.59-1.185 2.59-2.592 0-1.406-1.183-2.592-2.59-2.592z"></path></g></svg>




                        </span>
                    </span>  --}}
                    the is test
                </p>
            </div>
        </div>
        <div class="box_options">
            <div class="sec">
                <div class="icon-box">
                    <i class="fa-solid fa-bold iconi" id="bold"></i>
                    <i class="fa-solid fa-italic iconi" id="Italic"></i>
                    <i class="fa-solid fa-link iconi" id="link"></i>
                    <span></span>
                    <i class="fa-solid fa-t iconi" id="upper"></i>
                    <i class="fa-regular fa-t small- iconi" id="lower"></i>
                    <i class="fa-solid fa-quote-left iconi" id="comma"></i>
                    <span></span>
                    <i class="fa-regular fa-message iconi"></i>
                </div>
                <div class="link_input">
                    <input type="text" name="link">
                    <button class="add-link"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path xmlns="http://www.w3.org/2000/svg" d="m507.606 4.394c-3.902-3.902-9.632-5.346-14.917-3.761l-458.881 137.665c-20.222 6.066-33.808 24.326-33.808 45.445 0 20.826 13.985 39.367 34.011 45.089l193.789 55.368 55.368 193.789c5.722 20.025 24.263 34.011 45.097 34.011 21.111 0 39.371-13.586 45.438-33.808l137.664-458.882c1.586-5.285.142-11.014-3.761-14.916zm-477.606 179.342c0-7.761 4.994-14.473 12.428-16.703l401.896-120.569-208.756 208.756-193.316-55.233c-7.213-2.062-12.252-8.741-12.252-16.251zm314.968 285.836c-2.23 7.434-8.942 12.428-16.711 12.428-7.503 0-14.182-5.038-16.243-12.252l-55.233-193.316 208.756-208.756z" fill="#ffffff" data-original="#000000" class=""></path>
                            </g>
                        </svg></button>
                </div>
                <strong></strong>

            </div>
        </div>
    </div>

    <script src="../js/blog.js"></script>
</body>

</html>

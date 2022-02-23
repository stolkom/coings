<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>coings</title>

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="/favicon.svg">
    </head>
    <body>
        <div id="app">
            <div class="container my-2">
                <div class="logo">
                    <svg width="181" height="56" viewBox="0 0 181 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.25" d="M47.2033 16.8933L28 28L8.79668 16.8933C9.19089 16.2108 9.75316 15.6405 10.43 15.2367L25.6667 6.43998C27.1133 5.62332 28.8867 5.62332 30.3333 6.43998L45.57 15.2367C46.2467 15.6403 46.809 16.212 47.2033 16.8933V16.8933Z" fill="#4299E1"/>
                        <path opacity="0.5" d="M28 28V50.1667C27.2643 50.1656 26.5384 49.9981 25.8767 49.6767L10.5 40.7866C9.79175 40.3769 9.20348 39.7885 8.79401 39.0801C8.38454 38.3717 8.16821 37.5682 8.16666 36.75V19.25C8.17052 18.4233 8.3875 17.6116 8.79666 16.8933L28 28Z" fill="#4299E1"/>
                        <path d="M47.8333 19.25V36.75C47.8318 37.5682 47.6155 38.3717 47.206 39.0801C46.7965 39.7885 46.2082 40.3769 45.5 40.7866L30.0533 49.7C29.4117 50.0033 28.7093 50.162 28 50.1667V28L47.2033 16.8933C47.6117 17.612 47.8287 18.424 47.8333 19.25V19.25Z" fill="#4299E1"/>
                        <path d="M74.816 38.128C73.1093 38.128 71.584 37.744 70.24 36.976C68.9173 36.1867 67.872 35.1307 67.104 33.808C66.3573 32.464 65.984 30.9493 65.984 29.264C65.984 27.536 66.3573 26 67.104 24.656C67.8507 23.312 68.8747 22.2667 70.176 21.52C71.4773 20.752 72.9707 20.368 74.656 20.368C77.1733 20.368 79.264 21.328 80.928 23.248C81.2267 23.5893 81.3333 23.9413 81.248 24.304C81.1627 24.6667 80.928 24.9867 80.544 25.264C80.2453 25.4773 79.9147 25.552 79.552 25.488C79.1893 25.4027 78.8587 25.2107 78.56 24.912C77.5147 23.8027 76.2133 23.248 74.656 23.248C73.0133 23.248 71.68 23.8027 70.656 24.912C69.632 26 69.12 27.4507 69.12 29.264C69.12 30.416 69.3547 31.44 69.824 32.336C70.3147 33.232 70.9867 33.9467 71.84 34.48C72.6933 34.992 73.6853 35.248 74.816 35.248C76.2667 35.248 77.44 34.8747 78.336 34.128C78.6773 33.8507 79.0293 33.7013 79.392 33.68C79.7547 33.6373 80.0747 33.7333 80.352 33.968C80.7147 34.2667 80.9173 34.608 80.96 34.992C81.0027 35.3547 80.8747 35.6853 80.576 35.984C79.04 37.4133 77.12 38.128 74.816 38.128ZM94.9948 38.128C93.2667 38.128 91.7414 37.7547 90.4187 37.008C89.0961 36.24 88.0507 35.1947 87.2827 33.872C86.5361 32.528 86.1627 30.992 86.1627 29.264C86.1627 27.5147 86.5361 25.9787 87.2827 24.656C88.0507 23.312 89.0961 22.2667 90.4187 21.52C91.7414 20.752 93.2667 20.368 94.9948 20.368C96.7014 20.368 98.2161 20.752 99.5387 21.52C100.861 22.2667 101.896 23.312 102.643 24.656C103.411 25.9787 103.795 27.5147 103.795 29.264C103.795 30.992 103.421 32.528 102.675 33.872C101.928 35.1947 100.893 36.24 99.5708 37.008C98.2481 37.7547 96.7228 38.128 94.9948 38.128ZM94.9948 35.248C96.1041 35.248 97.0854 34.992 97.9387 34.48C98.7921 33.968 99.4534 33.264 99.9227 32.368C100.413 31.472 100.659 30.4373 100.659 29.264C100.659 28.0907 100.413 27.056 99.9227 26.16C99.4534 25.2427 98.7921 24.528 97.9387 24.016C97.0854 23.504 96.1041 23.248 94.9948 23.248C93.8854 23.248 92.9041 23.504 92.0507 24.016C91.1974 24.528 90.5254 25.2427 90.0347 26.16C89.5441 27.056 89.2987 28.0907 89.2987 29.264C89.2987 30.4373 89.5441 31.472 90.0347 32.368C90.5254 33.264 91.1974 33.968 92.0507 34.48C92.9041 34.992 93.8854 35.248 94.9948 35.248ZM111.564 38C111.095 38 110.7 37.8507 110.38 37.552C110.082 37.232 109.932 36.8373 109.932 36.368V22.128C109.932 21.6373 110.082 21.2427 110.38 20.944C110.7 20.6453 111.095 20.496 111.564 20.496C112.055 20.496 112.45 20.6453 112.748 20.944C113.047 21.2427 113.196 21.6373 113.196 22.128V36.368C113.196 36.8373 113.047 37.232 112.748 37.552C112.45 37.8507 112.055 38 111.564 38ZM111.564 17.648C110.988 17.648 110.487 17.4453 110.06 17.04C109.655 16.6133 109.452 16.112 109.452 15.536C109.452 14.96 109.655 14.4693 110.06 14.064C110.487 13.6373 110.988 13.424 111.564 13.424C112.14 13.424 112.631 13.6373 113.036 14.064C113.463 14.4693 113.676 14.96 113.676 15.536C113.676 16.112 113.463 16.6133 113.036 17.04C112.631 17.4453 112.14 17.648 111.564 17.648ZM121.861 38.032C121.391 38.032 120.997 37.8827 120.677 37.584C120.378 37.264 120.229 36.8693 120.229 36.4V22.128C120.229 21.6373 120.378 21.2427 120.677 20.944C120.997 20.6453 121.391 20.496 121.861 20.496C122.351 20.496 122.746 20.6453 123.045 20.944C123.343 21.2427 123.493 21.6373 123.493 22.128V22.48C124.154 21.8187 124.954 21.296 125.893 20.912C126.831 20.528 127.845 20.336 128.933 20.336C130.405 20.336 131.717 20.656 132.869 21.296C134.042 21.9147 134.959 22.832 135.621 24.048C136.303 25.264 136.645 26.7573 136.645 28.528V36.4C136.645 36.8693 136.485 37.264 136.165 37.584C135.866 37.8827 135.482 38.032 135.013 38.032C134.543 38.032 134.149 37.8827 133.829 37.584C133.53 37.264 133.381 36.8693 133.381 36.4V28.528C133.381 26.7147 132.89 25.392 131.909 24.56C130.949 23.7067 129.743 23.28 128.293 23.28C127.397 23.28 126.586 23.4613 125.861 23.824C125.135 24.1867 124.559 24.6773 124.133 25.296C123.706 25.8933 123.493 26.5867 123.493 27.376V36.4C123.493 36.8693 123.343 37.264 123.045 37.584C122.746 37.8827 122.351 38.032 121.861 38.032ZM150.297 38.128C148.697 38.128 147.279 37.7547 146.041 37.008C144.825 36.24 143.865 35.1947 143.161 33.872C142.457 32.528 142.105 30.992 142.105 29.264C142.105 27.5147 142.479 25.9787 143.225 24.656C143.993 23.312 145.039 22.2667 146.361 21.52C147.684 20.752 149.209 20.368 150.937 20.368C152.644 20.368 154.159 20.752 155.481 21.52C156.804 22.2667 157.839 23.312 158.585 24.656C159.353 25.9787 159.737 27.5147 159.737 29.264V36.176C159.737 37.8613 159.364 39.3867 158.617 40.752C157.871 42.1387 156.825 43.2373 155.481 44.048C154.159 44.8587 152.623 45.264 150.873 45.264C149.359 45.264 147.94 44.9653 146.617 44.368C145.295 43.7707 144.175 42.896 143.257 41.744C142.98 41.3813 142.873 41.008 142.937 40.624C143.023 40.24 143.236 39.9307 143.577 39.696C143.961 39.44 144.356 39.3547 144.761 39.44C145.188 39.5253 145.529 39.7387 145.785 40.08C146.361 40.8053 147.087 41.3707 147.961 41.776C148.836 42.1813 149.828 42.384 150.937 42.384C151.961 42.384 152.9 42.1387 153.753 41.648C154.628 41.1573 155.321 40.432 155.833 39.472C156.345 38.512 156.601 37.3387 156.601 35.952V34.384C155.94 35.536 155.065 36.4533 153.977 37.136C152.889 37.7973 151.663 38.128 150.297 38.128ZM150.937 35.248C152.047 35.248 153.028 34.992 153.881 34.48C154.735 33.968 155.396 33.264 155.865 32.368C156.356 31.472 156.601 30.4373 156.601 29.264C156.601 28.0907 156.356 27.056 155.865 26.16C155.396 25.2427 154.735 24.528 153.881 24.016C153.028 23.504 152.047 23.248 150.937 23.248C149.828 23.248 148.847 23.504 147.993 24.016C147.14 24.528 146.468 25.2427 145.977 26.16C145.487 27.056 145.241 28.0907 145.241 29.264C145.241 30.4373 145.487 31.472 145.977 32.368C146.468 33.264 147.14 33.968 147.993 34.48C148.847 34.992 149.828 35.248 150.937 35.248ZM171.923 38.128C170.43 38.128 169.043 37.904 167.763 37.456C166.504 36.9867 165.523 36.4 164.819 35.696C164.499 35.3547 164.36 34.9707 164.403 34.544C164.467 34.096 164.68 33.7333 165.043 33.456C165.47 33.1147 165.886 32.976 166.291 33.04C166.718 33.0827 167.08 33.264 167.379 33.584C167.742 33.9893 168.318 34.3733 169.107 34.736C169.918 35.0773 170.814 35.248 171.795 35.248C173.032 35.248 173.971 35.0453 174.611 34.64C175.272 34.2347 175.614 33.712 175.635 33.072C175.656 32.432 175.347 31.8773 174.707 31.408C174.088 30.9387 172.947 30.5547 171.283 30.256C169.128 29.8293 167.56 29.1893 166.579 28.336C165.619 27.4827 165.139 26.4373 165.139 25.2C165.139 24.112 165.459 23.216 166.099 22.512C166.739 21.7867 167.56 21.2533 168.563 20.912C169.566 20.5493 170.611 20.368 171.699 20.368C173.107 20.368 174.355 20.592 175.443 21.04C176.531 21.488 177.395 22.1067 178.035 22.896C178.334 23.2373 178.472 23.6 178.451 23.984C178.43 24.3467 178.248 24.656 177.907 24.912C177.566 25.1467 177.16 25.2213 176.691 25.136C176.222 25.0507 175.827 24.8587 175.507 24.56C174.974 24.048 174.398 23.696 173.779 23.504C173.16 23.312 172.446 23.216 171.635 23.216C170.696 23.216 169.896 23.376 169.235 23.696C168.595 24.016 168.275 24.4853 168.275 25.104C168.275 25.488 168.371 25.84 168.563 26.16C168.776 26.4587 169.182 26.736 169.779 26.992C170.376 27.2267 171.251 27.4613 172.403 27.696C174.814 28.1653 176.478 28.8373 177.395 29.712C178.334 30.5653 178.803 31.6213 178.803 32.88C178.803 33.8613 178.536 34.7467 178.003 35.536C177.491 36.3253 176.723 36.9547 175.699 37.424C174.696 37.8933 173.438 38.128 171.923 38.128Z" fill="#2D3748"/>
                    </svg>
                </div>
                <vue-main></vue-main>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
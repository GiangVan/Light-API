<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gaming Community</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <!-- fontawesome -->
    <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/fontawesome/css/solid.css" rel="stylesheet">
    <!-- style -->
    <style>
    .block {
        width: 120px;
        height: 120px;
    }

    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    pre {
        margin: unset;
    }

    a:hover {
        text-decoration: none;
    }

    a {
        color: black;
    }

    .main {
        background-color: #FFF2E6;
    }

    .main-container {
        width: 100vw;
        background-color: #F7F7FF;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.27);
    }

    @media (min-width: 768px) {
        .main-container {
            width: 84vw;
            height: 92vh;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .border-radius-10 {
            border-radius: 10px;
            overflow: hidden;
        }

        .border-radius-15 {
            border-radius: 15px;
            overflow: hidden;
        }

        .border-radius-20 {
            border-radius: 20px;
            overflow: hidden;
        }

        .border-radius-30 {
            border-radius: 30px;
            overflow: hidden;
        }
    }

    .w-max-content {
        width: max-content;
        max-width: 100%;
    }

    pre {
        white-space: pre-wrap;
        word-break: break-all;
    }

    .profile-container {
        background-color: white;
    }

    .profile-header {
        background-color: #292A4A;
    }

    .profile-footer {
        background-color: #FF6D6A;
    }

    .global-chat-container {
        background-color: #FFF2E6;
    }

    .image {
        background-image: url(https://lh4.googleusercontent.com/-VgOUe0Pjdik/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reMj97xjg27gazBPCstY4S_jKM36g/mo/photo.jpg?sz=32);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .user-avatar {
        width: 60px;
        height: 60px;
    }

    .friend-avatar {
        width: 48px;
        height: 48px;
    }

    .room-joined-list {
        min-height: 280px;
        white-space: nowrap;
    }

    .room-joined-tab {
        width: 160px;
        height: 220px;
        overflow: hidden;
    }


    .room-joined-name {
        background-color: white;
        width: 100%;
        height: 110px;
    }



    .room-joined-image {
        width: 100%;
        height: 110px;
    }

    .room-tab {
        background-color: white;
    }

    .room-image {
        width: 180px;
        height: 180px;
    }

    .global-chat-body {
        border-top: 1px solid gray;
        border-bottom: 1px solid gray;
    }

    .room-body {
        background-color: green;
    }

    .message-image {
        width: 30px;
        height: 30px;
    }

    .message-tab {
        background-color: white;
    }

    .custom-select {
        width: 230px;
    }


    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: rgb(255, 224, 224);
        border-radius: 69px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgb(251, 196, 196);
    }

    .light-border {
        border: 1px solid rgba(0, 0, 0, 0.07);
    }

    .white-text-hover:hover,
    .white-text-hover:hover * {
        color: white !important;
    }

    .hover,
    .hover * {
        transition: all .6s ease;
    }

    .pink-bg-hover:hover {
        background-color: #FF6D6A !important;
        cursor: pointer;
    }

    .translate-hover:hover {
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.27);
        transform: translate(-10px, 10px);
        border-bottom: 5px solid rgb(234, 30, 50);
    }

    .member-avatar {
        width: 60px;
        height: 60px;
        border: 4px solid #FF6D6A;
    }

    .channel-header {
        min-height: 100px;
        white-space: nowrap;
    }
    </style>
</head>

<body>
    <!-- jquery -->
    <script src="/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap -->
    <script src="/js/bootstrap/bootstrap.popper.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>


    <iv class='main'>
        <div class='main-container border-radius-30'>
            <div class='row m-0 h-100'>
                <div class='col-sm-4 col-md-3 p-0 h-100'>
                    <div class='profile-container border-radius-30 h-100'>
                        <div class='d-flex flex-column h-100'>
                            <div class='profile-header row m-0 pt-5 px-3 pb-3'>
                                <a class='user-avatar image border-radius-20' href="#"></a>
                                <h5 class='user-name p-1 text-white'>User name</h5>
                            </div>
                            <div class='profile-body flex-grow-1 overflow-auto py-2'>
                                <div class='friend-list'>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                    <a class='friend-tab row py-2 px-5 hover pink-bg-hover white-text-hover' href="#">
                                        <div class='friend-avatar image border-radius-15'></div>
                                        <p class="friend-name p-1">friend name</p>
                                    </a>
                                </div>
                            </div>
                            <div class='profile-footer px-4 py-3 d-flex align-items-center'>
                                <div class='btn btn-light bg-transparent border-0 ml-2 border-radius-15'>
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class='btn btn-light bg-transparent border-0 ml-2 border-radius-15 ml-auto'>
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-6 p-0 h-100'>
                    <div class='channel-container d-flex flex-column h-100'>
                        <div class="channel-header p-2 mt-4 overflow-auto">
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                            <a href="#" class="mx-2 member-avatar d-inline-block image rounded-circle">

                            </a>
                        </div>
                        <div class="channel-content flex-grow-1 p-4 overflow-auto">
                            <div class="message-tab mb-3 border-radius-20 pb-1 hover translate-hover w-max-content">
                                <a class="message-header row m-0 p-2 w-max-content" href="#">
                                    <div class="message-image image border-radius-10"></div>
                                    <p class="message-name m-0 pl-1">Name</p>
                                </a>
                                <div class="message-body">
                                    <pre class="message-content p-2 m-0">contentcontentcontent
                                        contentcontentcontentcontent
                                        contentcontent
                                    </pre>
                                </div>
                            </div>
                            <div class="message-tab mb-3 border-radius-20 pb-1 hover translate-hover w-max-content">
                                <a class="message-header row m-0 p-2 w-max-content" href="#">
                                    <div class="message-image image border-radius-10"></div>
                                    <p class="message-name m-0 pl-1">Name</p>
                                </a>
                                <div class="message-body">
                                    <pre class="message-content p-2 m-0">contentcontentcontent
                                        contentcontentcontentcontent
                                        contentcontent
                                    </pre>
                                </div>
                            </div>
                            <div class="message-tab mb-3 border-radius-20 pb-1 hover translate-hover w-max-content">
                                <a class="message-header row m-0 p-2 w-max-content" href="#">
                                    <div class="message-image image border-radius-10"></div>
                                    <p class="message-name m-0 pl-1">Name</p>
                                </a>
                                <div class="message-body">
                                    <pre class="message-content p-2 m-0">contentcontentcontent
                                        contentcontentcontentcontent
                                        contentcontent
                                    </pre>
                                </div>
                            </div>
                            <div class="message-tab mb-3 border-radius-20 pb-1 hover translate-hover w-max-content">
                                <a class="message-header row m-0 p-2 w-max-content" href="#">
                                    <div class="message-image image border-radius-10"></div>
                                    <p class="message-name m-0 pl-1">Name</p>
                                </a>
                                <div class="message-body">
                                    <pre class="message-content p-2 m-0">contentcontentcontent
                                        contentcontentcontentcontent
                                        contentcontent
                                    </pre>
                                </div>
                            </div>
                            <div class="message-tab mb-3 border-radius-20 pb-1 hover translate-hover w-max-content">
                                <a class="message-header row m-0 p-2 w-max-content" href="#">
                                    <div class="message-image image border-radius-10"></div>
                                    <p class="message-name m-0 pl-1">Name</p>
                                </a>
                                <div class="message-body">
                                    <pre class="message-content p-2 m-0">contentcontentcontent
                                        contentcontentcontentcontent
                                        contentcontent
                                    </pre>
                                </div>
                            </div>
                        </div>
                        <div class="channel-footer">
                            <div class="d-flex m-3">
                                <input type="text" class="flex-grow-1 form-control bg-transparent border-radius-15"
                                    placeholder="your text">
                                <div class='btn btn-danger ml-2 border-radius-15'>
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-3 p-0 h-100'>
                    <div class='global-chat-container d-flex flex-column h-100 border-radius-30'>
                        <div class="global-chat-header d-flex align-items-center flex-column p-1">
                            <div class="room-image image border-radius-20 mt-5"></div>
                            <h4 class="room-name font-weight-bold p-1">Room name</h4>
                        </div>
                        <div class="global-chat-body p-3">
                            <p>option 1</p>
                            <p>option 2</p>
                            <p>option 3</p>
                            <p>option 4</p>
                        </div>
                        <div class="global-chat-footer flex-grow-1 overflow-auto">
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                            <div class="block image m-2 d-inline-block border-radius-15"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </iv>
</body>

</html>
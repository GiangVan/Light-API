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
    .tab {
        width: 150px;
        height: 150px;
        background-color: blue;
        border: 3px solid whitesmoke;
        border-radius: 30px;
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

    .room-joined-image {
        width: 100%;
        height: 110px;
    }

    .room-tab {
        background-color: white;
    }

    .room-image {
        width: 80px;
        height: 80px;
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

    .w-max-content {
        width: max-content;
        max-width: 100%;
    }

    pre {
        white-space: pre-wrap;
        word-break: break-all;
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
                        <div class='channel-header'>
                            <div class="mx-4 mt-5 mb-1 d-flex align-items-center">
                                <div class="border-radius-15 p-1 border">
                                    <select class="custom-select custom-select-sm rounded bg-transparent border-0">
                                        <option value="1">HearthStone</option>
                                        <option value="2" selected>Battlefield 4</option>
                                        <option value="3">Contra</option>
                                    </select>
                                </div>
                                <p
                                    class='py-1 px-3 border-radius-20 ml-auto font-weight-bold text-danger hover white-text-hover pink-bg-hover'>
                                    Tạo phòng</p>
                            </div>
                        </div>
                        <div class='room-joined-list overflow-auto'>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="d-inline-block">
                                <div
                                    class="room-joined-tab my-3 ml-4 hover translate-hover border-radius-20 d-block light-border">
                                    <a href="/dev/layout/2">
                                        <div class="room-joined-image image"></div>
                                        <h4 class="room-joined-name bg-danger text-white">Room name</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='room-header'>
                            <div class="d-flex align-items-center mb-1 ml-4 mr-4 mt-3">
                                <div class="seacher d-flex align-items-center border border-radius-20">
                                    <input type="text" class="flex-grow-1 border-0 bg-transparent pl-2 py-1"
                                        placeholder="Tìm phòng">
                                    <div class='px-3'>
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <select class="custom-select custom-select-sm border-radius-20 bg-transparent ml-auto">
                                    <option value="1">Sắp xếp theo tên</option>
                                    <option value="2" selected>Sắp xếp theo số phòng</option>
                                    <option value="3">Sắp xếp theo số người</option>
                                </select>
                            </div>
                        </div>
                        <div class='flex-grow-1 overflow-auto mx-3 mb-3'>
                            <div class="room-list">
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="room-tab p-3 m-2 border-radius-20 light-border hover translate-hover">
                                    <a href="/dev/layout/2" class="row m-0">
                                        <div class="room-image image border-radius-20"></div>
                                        <div class="ml-2">
                                            <h5 class="room-name">Room name</h5>
                                            <div class="status d-flex align-items-center">
                                                <i class="p-2 fas fa-globe-asia"></i>
                                                <i class="p-2 fas fa-lock"></i>
                                                <div class="p-2">
                                                    <i class="fas fa-users"></i>
                                                    3/100
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-md-3 p-0 h-100'>
                    <div class='global-chat-container d-flex flex-column h-100 border-radius-30'>
                        <div class='global-chat-title'>
                            <h3 class="global-chat-title px-5 pt-5">Global chat</h3>
                        </div>
                        <div class='global-chat-content flex-grow-1 overflow-auto'>
                            <div class="message-list px-5 py-2">
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                                <div class="message-tab mb-2 border-radius-20 pb-1 hover translate-hover">
                                    <a class="message-header row m-0 p-2 w-max-content" href="#">
                                        <div class="message-image image border-radius-10"></div>
                                        <p class="message-name m-0 pl-1">Name</p>
                                    </a>
                                    <div class="message-body">
                                        <pre class="message-content p-2 m-0">conawdawdawdawd
                                            aw
                                            daw
                                            dtent</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='global-chat-textbox mx-5 my-3'>
                            <div class="row m-0">
                                <div class="d-flex">
                                    <input type="text" class="flex-grow-1 form-control border-0 border-radius-15"
                                        placeholder="your text">
                                    <div class='btn btn-danger ml-2 border-radius-15'>
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </iv>
</body>

</html>
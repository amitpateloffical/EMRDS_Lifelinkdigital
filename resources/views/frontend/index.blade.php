<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eMRDS</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>



<style>
    body {
        font-family: 'Roboto', sans-serif;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        background: #002240;
    }

    .w-100 {
        width: 100%;
    }

    .h-100 {
        height: 100%;
    }

    a,
    a:hover {
        text-decoration: none;
        color: white;
    }

    .link {
        text-align: center;
    }

    .link a {
        display: inline-block;
        transition: all 0.2s ease-in;
        position: relative;
        overflow: hidden;
        z-index: 1;
        color: #090909;
        padding: 0.7em 1.7em;
        border-radius: 0.5em;
        background: #e8e8e8;
        border: 1px solid #e8e8e8;
        box-shadow: 6px 6px 12px #c5c5c5,
            -6px -6px 12px #ffffff;
    }

    .link a:before {
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%) scaleY(1) scaleX(1.25);
        top: 100%;
        width: 140%;
        height: 180%;
        background-color: rgba(0, 0, 0, 0.05);
        border-radius: 50%;
        display: block;
        transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
        z-index: -1;
    }

    .link a:after {
        content: "";
        position: absolute;
        left: 55%;
        transform: translateX(-50%) scaleY(1) scaleX(1.45);
        top: 180%;
        width: 160%;
        height: 190%;
        background-color: #006fbf;
        border-radius: 50%;
        display: block;
        transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
        z-index: -1;
    }

    .link a:hover {
        color: #ffffff;
        border: 1px solid #006fbf;
    }

    .link a:hover:before {
        top: -35%;
        background-color: #006fbf;
        transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
    }

    .link a:hover:after {
        top: -45%;
        background-color: #006fbf;
        transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
    }

    .main-container {
        width: 100%;
        height: calc(100vh - 4px);
        position: relative;
    }

    .main-container .main-image {
        width: 100%;
        height: calc(100vh - 4px);
    }

    .main-container .main-image img {
        object-fit: cover;
        object-position: center;
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .overlay-container .form-container {
        max-width: 500px;
        width: 100%;
        margin-left: 7rem;
        background: #ffffffc4;
        backdrop-filter: blur(6.5px);
        padding: 20px;
        box-shadow: #ffffffbd 0px 4px 12px;
    }

    .overlay-container .logo-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .overlay-container .logo-container .logo {
        width: 150px;
    }

    .overlay-container .head {
        margin-bottom: 40px;
        font-weight: bold;
        text-align: center;
        font-size: 1.1rem;
    }


    {{-- ----------------------------------------- --}} #main-container {
        margin-top: 2%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30%;
        margin-left: 4%;
    }

    .dashboard_img {
        height: 270px;
    }

    .dashboard_img img {
        width: 110%;
        border: 12px solid black;
        border-top-left-radius: 11px;
        border-top-right-radius: 11px;
    }

    .dashboard_view {
        border-bottom: 45px solid lightgray;
        width: 375px;
        margin-top: -4px;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px
    }

    .dashboard_container {
        padding-left: 40%;
    }

    .hr_card {
        width: fit-content;
        padding-left: 10%;
        display: flex;
        gap: 20%;
    }

    .hr_icon {
        width: fit-content;
        border: 5px solid lightblue;
        padding: 47px 66px;
        background: #f1fcff;
        border-radius: 100px;
    }

    .hr_name {
        font-size: 20px;
        padding-top: 20px;
    }

    .computer_stand {
        box-shadow: 5px 5px 11px rgba(0, 0, 0, 0.25);
        position: relative;
        z-index: 0;
        margin: 0 96px;
        height: 75px;
        width: 200px;
        background-color: #EEEEEE;
        clip-path: polygon(5% 0%, 95% 0%, 100% 100%, 0% 100%);
    }

    .computer_stand_bottom {
        box-shadow: 5px 5px 11px rgba(0, 0, 0, 0.25);
        margin: 0 69px;
        height: 25px;
        width: 250px;
        background-color: #F5F5F5;
        border-top-right-radius: 2rem;
        border-top-left-radius: 2rem;
    }

    .superadmin_icon {
        width: fit-content;
        border: 5px solid lightblue;
        background: #f1fcff;
        border-radius: 100px;
        padding: 59px 18px;
        text-align: center;
        padding-top: 38px;
    }

    .superadmin_name {
        font-size: 20px;
        padding-top: 20px;
    }

    .nurse_card {
        width: fit-content;
        padding-left: 10%;
        display: flex;
        gap: 18%;
    }

    .nurse_icon {
        width: fit-content;
        border: 5px solid lightblue;
        padding: 46px 45px;
        background: #f1fcff;
        border-radius: 100px;
        text-align: center;
    }

    .nurse_name {
        font-size: 20px;
        padding-top: 20px;
    }

    .admin_icon {
        width: fit-content;
        border: 5px solid lightblue;
        padding: 47px 48px;
        background: #f1fcff;
        border-radius: 100px;
        text-align: center;
    }

    .admin_name {
        padding-top: 20px;
        font-size: 20px;
    }

    #main-container {}

    .superadmin_login {
        padding: 10px;
    }

    .superadmin_login button {
        padding: 15px 44px;
        border: 1px solid #c000ff;
        border-radius: 30px;
        background: #c000ff;
        color: white;
        cursor: pointer;
    }

    .admin_login {
        padding: 10px;
    }

    .admin_login button {
        padding: 15px 83px;
        border: 1px solid #00c059f5;
        border-radius: 30px;
        background: #00c059f5;
        color: white;
        cursor: pointer;
    }

    .hr_login {
        padding: 10px;
    }

    .hr_login button {
        padding: 15px 112px;
        border: 1px solid #0089e0;
        border-radius: 30px;
        background: #0089e0;
        color: white;
        cursor: pointer;
    }

    .nurse_login {
        padding: 10px;
    }

    .nurse_login button {
        padding: 15px 90px;
        border: 1px solid #949494f0;
        border-radius: 30px;
        background: #949494f0;
        color: white;
        cursor: pointer;
    }

    .login_btn {
        padding-top: 30%;

    }

    .admin_element {
        margin-top: -30px;
    }

    .medofficer_icon {
        width: fit-content;
        border: 5px solid lightblue;
        padding: 43px 47px;
        background: #f1fcff;
        border-radius: 100px;
        text-align: center;
    }

    .medofficer_name {
        font-size: 20px;
        padding-top: 20px;
    }

    .OHC_icon {
        width: fit-content;
        border: 5px solid lightblue;
        padding: 41px 60px;
        background: #f1fcff;
        border-radius: 100px;
        text-align: center;
    }

    .OHC_name {
        font-size: 20px;
        padding-top: 20px;
    }

    .medofficer_element {
        margin-top: 70px;
    }

    .OHC_login {
        padding: 10px;
    }

    .OHC_login button {
        padding: 15px 59px;
        border: 1px solid #00c5bc;
        border-radius: 30px;
        background: #00c5bc;
        color: white;
        cursor: pointer;

    }

    .Medofficer_login {
        padding: 10px;
    }

    .Medofficer_login button {
        padding: 15px 8px;
        border: 1px solid #00e0a4;
        border-radius: 30px;
        background: #00e0a4;
        color: white;
        cursor: pointer;
    }
</style>

<body>

    <div class="main-container">
        <div class="main-image">
            <img src="{{ asset('assets/image/main-screen.jpg') }}" alt="..." class="w-100 h-100">
        </div>
        <div class="overlay-container">
            {{-- <div class="form-container">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{ asset('assets/image/dms.png') }}" alt="...." class="w-100 h-100">
                    </div>
                    <div class="logo">
                        <img src="{{ asset('assets/image/conexo.png') }}" alt="...." class="w-100 h-100">
                    </div>
                </div>
                <div class="head">
                    Electronic Medical Record Documentation System (eMRDS)
                </div>
                <div class="link">
                    <a href="{{ url('login') }}">
                        Login to eMRDS
                    </a>
                </div>
            </div> --}}


            {{-- ---------------------------------------------------- --}}
            <div id ="main-container">
                <div class="login_container">
                    <div class="hr_card">
                        <div class="superadmin_element">
                            <div class="superadmin_icon">
                                <i class="fa-solid fa-user-secret fa-2xl" style="color: #000000;"></i>
                                <div class="superadmin_name">
                                    SUPERADMIN
                                </div>
                            </div>
                        </div>
                        <div class="admin_element">
                            <div class="admin_icon">
                                <i class="fa-solid fa-user-plus fa-2xl" style="color: #000000;"></i>
                                <div class="admin_name">
                                    ADMIN
                                </div>
                            </div>
                        </div>
                        <div class="hr_element">
                            <div class="hr_icon">
                                <i class="fa-solid fa-user-tie fa-2xl" style="color: #000000;"></i>
                                <div class="hr_name">
                                    HR
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_container">
                        <div class="dashboard_img">
                            <img src="{{ asset('assets/image/dashboardview.png') }}" alt="">
                            <div class="dashboard_view"></div>
                            <div class="computer_stand"></div>
                            <div class="computer_stand_bottom"></div>
                        </div>
                    </div>
                    <div class="nurse_card">
                        <div class="nurse_element">
                            <div class="nurse_icon">
                                <i class="fa-solid fa-user-nurse fa-2xl" style="color: #000000;"></i>
                                <div class="nurse_name">
                                    NURSE
                                </div>
                            </div>
                        </div>

                        <div class="medofficer_element">
                            <div class="medofficer_icon">
                                <i class="fa-solid fa-hospital-user fa-2xl" style="color: #000000;"></i>
                                <div class="medofficer_name">
                                    MEDICAL OFFICER
                                </div>
                            </div>
                        </div>

                        <div class="OHE_element">
                            <div class="OHC_icon">
                                <i class="fa-solid fa-user-gear fa-2xl" style="color: #000000;"></i>
                                <div class="OHC_name">
                                    OHC HEAD
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="login_btn">
                    <div class="hr_login">
                        <a href="{{ url('login') }}">
                            <button type="button"> <i class="fa-solid fa-user-tie fa-2xl"
                                    style="color: #ffffff; padding-right: 23px; margin-left: -72px;"></i>HR LOGIN</button></a>
                    </div>
                    <div class="OHC_login">
                        <a href="{{ url('login') }}">
                            <button type="button"> <i class="fa-solid fa-user-gear fa-2xl"
                                    style="color: #ffffff; padding-right: 20px; margin-left: -21px;"></i>OHC HEAD LOGIN</button></a>
                    </div>
                    <div class="Medofficer_login">
                        <a href="{{ url('login') }}">
                            <button type="button"> <i class="fa-solid fa-hospital-user fa-2xl"
                                    style="color: #ffffff; padding-right: 20px; margin-left: 34px;"></i>MEDICAL OFFICER LOGIN</button></a>
                    </div>
                    <div class="nurse_login">
                        <a href="{{ url('login') }}">
                            <button type="button"> <i class="fa-solid fa-user-nurse fa-2xl"
                                    style="color: #ffffff; padding-right: 20px; margin-left: -48px"></i>NURSE LOGIN</button></a>
                    </div>
                    <div class="admin_login">
                        <a href="{{ url('login') }}">
                            <button type="button"><i class="fa-solid fa-user-plus fa-2xl"
                                    style="color: #ffffff; padding-right: 20px; margin-left: -40px;"></i>ADMIN LOGIN</button></a>
                    </div>
                    <div class="superadmin_login">
                        <a href="{{ url('login') }}">
                            <button type="button"> <i class="fa-solid fa-user-secret fa-2xl"
                                    style="color: #ffffff; padding-right: 20px;"></i>SUPERADMIN LOGIN</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ---------------------------------------------------------- --}}


</body>

</html>

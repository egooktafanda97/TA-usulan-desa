<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        html,
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Poppins", sans-serif;
        }

        .group {
            margin: 20px 0px 20px 0px;
        }

        .signin {
            min-height: 300px;
            align-items: center;
            text-align: center;
            padding: 30px 30px 0px 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .forgot-pass-link {
            float: right;
        }

        .group input {
            width: 280px;
            height: 35px;
            border: 0px;
            outline: none;
            font-size: 13px;
            padding: 0px 10px 0px 10px;
            border-bottom: 1px solid #aaa;
            font-family: "Poppins", sans-serif;
            transition: 0.5s;
        }

        .group input:hover {
            border-bottom: 1px solid #000;
        }

        .group button {
            width: 300px;
            height: 45px;
            outline: none;
            border: none;
            background-color: #000000;
            color: #fff;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-size: 16px;
            border-radius: 5px;
        }

        .sign-up-link {
            text-align: center;
            padding-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: gray;
            font-weight: 400;
            cursor: pointer;
            transition: 0.5s;
        }

        a:hover {
            color: #000000;
        }

        label {
            font-weight: 400;
            float: left;
        }

        .head {
            float: left;
            margin-top: 0px;
        }

        .head p {
            margin-top: -20px;
            color: gray;
            font-weight: 400;
            padding-bottom: 20px;
            float: left;
        }

        .field-icon {
            float: right;
            margin-left: -30px;
            margin-top: 8px;
            position: absolute;
            z-index: 2;
        }

        .group button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .group button span:after {
            content: "\00bb";
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .group button:hover span {
            padding-right: 25px;
        }

        .group button:hover span:after {
            opacity: 1;
            right: 0;
        }

        @media screen and (max-width: 400px) {
            .signin {
                border: 0;
                padding: 0px;
                border-radius: 10px;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="signin">
        <div class="group-head">

            <h2>Login</h2>

            <!-- <p>Sign In To Continue</p> -->

        </div>

        <form action="<?= base_url("login/auth_masyarakat") ?>" method="post" autocomplete="off">
            <div class="group">

                <label for="username-field"> Username</label><br>

                <input type="text" name="username" id="username-field" required>

            </div>

            <div class="group">

                <label for="password-field">Password</label><br>

                <input type="password" name="password" id="password-field" required>

                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

            </div>


            <div class="group">

                <button type="submit"><span>Login</span></button>

            </div>

            <div class="group sign-up-link">

                <p>Daftar Sebagai Masyarakat? <a href="<?= base_url("welcome/regis/") ?>">Daftar</a></p>

            </div>



        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!--  -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= base_url("assets/js/axios/dist/axios.min.js") ?>"></script>
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlLww7KS4MQk5IiMmLbBUzbw5ddio12w4&callback=initialize"></script>
    <?php if (!empty($this->session->flashdata("success"))) : ?>
        <script>
            swal({
                title: "Good job!",
                text: "<?= $this->session->flashdata("success") ?>",
                icon: "success",
                button: "ok",
            });
        </script>
    <?php endif ?>
    <?php if (!empty($this->session->flashdata("error"))) : ?>
        <script>
            swal({
                title: "Oops!",
                text: "<?= $this->session->flashdata("error") ?>",
                icon: "error",
                button: "ok",
            });
        </script>
    <?php endif ?>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $($(this).attr("toggle"));

            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
</body>

</html>
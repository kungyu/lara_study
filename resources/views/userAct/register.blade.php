<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form method="post" action="register_act">
                    {!! csrf_field() !!}
                    昵称:<input type="text" name="name" value="">
                    手机:<input type="text" name="phone" value="">
                    邮箱:<input type="text" name="email" value="">
                    密码:<input type="password" name="password" value="">
                    确认密码:<input type="password" name="password_confirmed" value="">
                    <input type="submit" value="确认">
                </form>
            </div>
        </div>
    </body>
</html>

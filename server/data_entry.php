<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Data Entry</title>
        <style media="screen">
            ul {
                text-decoration: none;
                display: block;
            }
            li {
                text-transform: none;
                display: block;
                width: 300px;
                text-decoration: none;
                border: 1px solid red;
                text-align: right;
            }
            input {
                text-align: right;
            }
            label {
                text-align: left;
            }
        </style>
        <script type="text/javascript">
            $(function() {
                    $('form').submit(function() {
                        $.ajax({
                            type: 'POST',
                            url: 'insert.php',
                            data: { server_id: $(this).name.value,
                                    server_name: $(this).name.value,
                                    server_address: $(this).name.value,
                                    server_port: $(this).name.value }
                        });
                        return false;
                    });
                    })
        </script>
    </head>
    <body>
        <form class="data_entry" action="" method="post">
            <ul>
                <li><label for="server_id">Server ID</label><input type="text" name="server_id" value=""></li>
                <li><label for="server_name">Server Name</label><input type="text" name="server_name" value=""></li>
                <li><label for="server_address">Server IP Address</label><input type="text" name="server_address" value=""></li>
                <li><label for="server_port">Server Port Number</label><input type="text" name="server_port" value=""></li>
                <li><input type="submit" name="submit" value="Submit"></li>
            </ul>
        </form>
    </body>
</html>

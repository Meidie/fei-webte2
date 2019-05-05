<?php

//index.php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Import CSV File into Jquery Datatables using PHP Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .box
        {
            max-width:600px;
            width:100%;
            margin: 0 auto;;
        }
    </style>
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">Načítanie tabuľky</h3>
    <br />
    <form id="upload_csv" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
            <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
        </div>
        <div class="col-md-5">
            <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
        </div>
        <div style="clear:both"></div>
    </form>
    <br />
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Prihlasovacie meno</th>
                <th>Heslo</th>
                <th>verejná IP</th>
                <th>privátna IP</th>
                <th>ssh</th>
                <th>http</th>
                <th>https</th>
                <th>misc1</th>
                <th>misc2</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
</body>
</html>

<script>

    $(document).ready(function(){
        $('#upload_csv').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"loadfile.php",
                method:"POST",
                data:new FormData(this),
                dataType:'json',
                contentType:false,
                cache:false,
                processData:false,
                success:function(jsonData)
                {
                    $('#csv_file').val('');
                    $('#data-table').DataTable({
                        data  :  jsonData,
                        columns :  [
                            { data : "id" },
                            { data : "name" },
                            { data : "email" },
                            { data : "login" },
                            { data : "heslo" },
                            { data : "verejnaIP" },
                            { data : "privatnaIP" }
                            /*{ data : "ssh" },
                            { data : "http" },
                            { data : "https" },
                            { data : "misc1" },
                            { data : "misc2" }*/
                        ]
                    });
                }
            });
        });
    });

</script>
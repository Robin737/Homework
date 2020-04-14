<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Státy 4IT Samohýl</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="main.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#load_data_cz').click(function() {
                $('#cesko').toggleClass('ukaz_stat');
                $('#load_data_cz').toggleClass('ukaz_barvu');
            });
            $('#load_data_ru').click(function() {
                $('#rusko').toggleClass('ukaz_stat');
                $('#load_data_ru').toggleClass('ukaz_barvu');
            });
            $('#load_data_usa').click(function() {
                $('#usa').toggleClass('ukaz_stat');
                $('#load_data_usa').toggleClass('ukaz_barvu');
            });
            $('#load_data_au').click(function() {
                $('#australie').toggleClass('ukaz_stat');
                $('#load_data_au').toggleClass('ukaz_barvu');
            });
            $('#load_data_bel').click(function() {
                $('#belorusko').toggleClass('ukaz_stat');
                $('#load_data_bel').toggleClass('ukaz_barvu');
            });
            $('#load_data_brz').click(function() {
                $('#brazilie').toggleClass('ukaz_stat');
                $('#load_data_brz').toggleClass('ukaz_barvu');
            });
            $('#load_data_cn').click(function() {
                $('#cina').toggleClass('ukaz_stat');
                $('#load_data_cn').toggleClass('ukaz_barvu');
            });
            $('#load_data_dn').click(function() {
                $('#dansko').toggleClass('ukaz_stat');
                $('#load_data_dn').toggleClass('ukaz_barvu');
            });
            $('#load_data_eg').click(function() {
                $('#egypt').toggleClass('ukaz_stat');
                $('#load_data_eg').toggleClass('ukaz_barvu');
            });
            $('#load_data_fr').click(function() {
                $('#francie').toggleClass('ukaz_stat');
                $('#load_data_fr').toggleClass('ukaz_barvu');
            });
        });

    </script>
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <h1 align="center">Státy 4IT Samohýl</h1>
            <br>
            <div align="center">
                <button type="button" name="load_data" id="load_data_cz" class="btn btn-info">Česká republika</button>

                <button type="button" name="load_data" id="load_data_ru" class="btn btn-info">Rusko</button>

                <button type="button" name="load_data" id="load_data_usa" class="btn btn-info">USA</button>

                <button type="button" name="load_data" id="load_data_au" class="btn btn-info">Australie</button>

                <button type="button" name="load_data" id="load_data_bel" class="btn btn-info">Bělorusko</button>

                <button type="button" name="load_data" id="load_data_brz" class="btn btn-info">Brazilie</button>

                <button type="button" name="load_data" id="load_data_cn" class="btn btn-info">Čína</button>

                <button type="button" name="load_data" id="load_data_dn" class="btn btn-info">Dánsko</button>

                <button type="button" name="load_data" id="load_data_eg" class="btn btn-info">Egypt</button>

                <button type="button" name="load_data" id="load_data_fr" class="btn btn-info">Francie</button>

                <button type="button" name="load_data" id="load_data" class="btn btn-info">Všechny</button>
            </div>
            <br>
            <div id="cesko">
                <?php include 'cr.inc.php'; ?>
            </div>
            <div id="rusko">
                <?php include 'ru.inc.php'; ?>
            </div>
            <div id="usa">
                <?php include 'usa.inc.php'; ?>
            </div>
            <div id="australie">
                <?php include 'au.inc.php'; ?>
            </div>
            <div id="belorusko">
                <?php include 'bel.inc.php'; ?>
            </div>
            <div id="brazilie">
                <?php include 'brz.inc.php'; ?>
            </div>
            <div id="cina">
                <?php include 'cn.inc.php'; ?>
            </div>
            <div id="dansko">
                <?php include 'dn.inc.php'; ?>
            </div>
            <div id="egypt">
                <?php include 'eg.inc.php'; ?>
            </div>
            <div id="francie">
                <?php include 'fr.inc.php'; ?>
            </div>

            <div id="employee_table">
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $('#load_data').click(function() {
            $.ajax({
                url: "employee.csv",
                dataType: "text",
                success: function(data) {
                    var employee_data = data.split(/\r?\n|\r/);
                    var table_data = '<table class="table table-bordered table-striped">';
                    for (var count = 0; count < employee_data.length; count++) {
                        var cell_data = employee_data[count].split(",");
                        table_data += '<tr>';
                        for (var cell_count = 0; cell_count < cell_data.length; cell_count++) {
                            if (count === 0) {
                                table_data += '<th>' + cell_data[cell_count] + '</th>';
                            } else {
                                table_data += '<td>' + cell_data[cell_count] + '</td>';
                            }
                        }
                        table_data += '</tr>';
                    }
                    table_data += '</table>';
                    $('#employee_table').html(table_data);
                }
            });
        });

    });

</script>

<!doctype html>
<html lang="en">

<head>
    <title>Lucky Wheel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- CSS files -->
    <link href="./css/style.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="first-color">
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="row justify-content-center align-items-center g-2 text-center mt-5">
            <div class="col">
                <h1>Lucky Wheel Simulator!!11!</h1>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center g-2 mt-5">
                <div class="col-4 flex-row m-5">
                    <div class="row">
                        <div class="col">
                            <div id="resultPie" style="width: 400px; text-align: center;">
                                <canvas id="PieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <p>This is how your wheel distribution looks like.</p>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center mt-3">
                            <button type="button" class="btn btn-warning" onclick="giraRueda('formRueda')">GO!!</button>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="card third-color">
                        <div class="card-body">
                            <h4 class="card-title">Enter the labels and probabilities</h4>
                            <p class="card-text">The sum of probabilities must be 1</p>
                            <form id="formRueda">
                                <div id="inputContainer">

                                </div>
                                <label for="numero" class="form-label">Number of spins</label>
                                <input type="number" class="form-control text-center" name="numero" id="numero" aria-describedby="helpId" placeholder="0">
                            </form>
                            <div id="addContainer" class="mt-3">
                                <button type="button" class="btn second-color" onclick="agregarInputs()">Add</button>
                                <button type="button" class="btn btn-danger" onclick="eliminarUltimoInput()">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex flex-row justify-content-center align-items-center text-center">
                    <h2>Results</h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                    <div id="resultBar" style="width: 400px; text-align: center;">
                        <canvas id="BarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <!-- Script.js -->
    <script src="./js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</body>

</html>
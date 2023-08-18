function agregarInputs() {
    var contenedor = document.getElementById("inputContainer");

    var divInputGroup = document.createElement("div");
    divInputGroup.classList.add("input-group");
    divInputGroup.classList.add("mb-3");

    var inputLabel = document.createElement("input");
    inputLabel.type = "text";
    inputLabel.name = "labels[]";
    inputLabel.placeholder = "Text";
    inputLabel.classList.add("form-control");

    var inputProb = document.createElement("input");
    inputProb.type = "number";
    inputProb.name = "probs[]";
    inputProb.placeholder = "Ex: 0.50";
    inputProb.classList.add("form-control");
    inputProb.oninput = renderWheel;

    divInputGroup.appendChild(inputLabel);
    divInputGroup.appendChild(inputProb);

    contenedor.appendChild(divInputGroup);
}

function eliminarUltimoInput() {
    var contenedor = document.getElementById("inputContainer");
    var grupos = contenedor.getElementsByClassName("input-group");

    if (grupos.length > 0) {
        contenedor.removeChild(grupos[grupos.length - 1]);
    }
}

function giraRueda(form) {

    $.ajax({
        type: "POST",
        url: "./controllers/spinWheel.php",
        data: $("#" + form).serialize(),
        success: function (response) {
            console.log("Éxito:", response);
            graficaResultados(response);
            /*
            Swal.fire({
                title: "The winner is: " + response,
                width: 600,
                padding: '3em',
                color: '#716add',
                backdrop: `
                  rgba(0,0,123,0.4)
                  url("./images/fireworks.gif")
                  left top
                  no-repeat
                `
              })*/
        },
        error: function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        }
    });
}

function renderWheel() {

    //RECUPERACION VALORES
    let labelsArray = []; // Reiniciar el array
    let probsArray = []; // Reiniciar el array

    let labelsInputs = document.getElementsByName("labels[]");
    let probsInputs = document.getElementsByName("probs[]");

    for (let i = 0; i < labelsInputs.length; i++) {
        labelsArray.push(labelsInputs[i].value);
    }

    for (let i = 0; i < probsInputs.length; i++) {
        probsArray.push(probsInputs[i].value);
    }

    console.log("Labels:", labelsArray);
    console.log("Probabilidades:", probsArray);

    //CHART
    var contenedorPie = document.getElementById('resultPie');
    while (contenedorPie.firstChild) {
        contenedorPie.removeChild(contenedorPie.firstChild);
    }

    canvaPie = document.createElement('canvas');
    contenedorPie.appendChild(canvaPie);
    canvaPie.setAttribute("id", "PieChart");

    var pieCanvas = document.getElementById("PieChart").getContext('2d');

    var data = {
        labels: labelsArray,
        datasets: [
            {
                data: probsArray,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)',
                ]
            }]
    };

    var pieChart = new Chart(pieCanvas, {
        type: 'pie',
        data: data,
        options: {
        }
    });
}

function graficaResultados(values) {
    //preparacion de los datos
    console.log("log " + values);
    var parsedValues = JSON.parse(values);
    var labels = Object.keys(parsedValues);
    var data = Object.values(parsedValues);
    console.log(labels);
    console.log(data);

    //funcion para graficar resultados
    var contenedorBar = document.getElementById('resultBar');

    while (contenedorBar.firstChild) {
        contenedorBar.removeChild(contenedorBar.firstChild);
    }

    //BARCHAART
    canvaBar = document.createElement('canvas');
    contenedorBar.appendChild(canvaBar);
    canvaBar.setAttribute("id", "BarChart");
    //funcion  para mostrar grafica de pastel
    
    var ctx = document.getElementById('BarChart').getContext('2d');

    var myBarChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico de barras
        data: {
            labels: labels,
            datasets: [{
                label: "Data",
                data: data,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)',
                ],
                borderColor: 'rgba(75, 192, 192, 1)', // 
            }]
        },
        options: {
            // Opciones del gráfico (título, leyenda, etc.)
        }
    });
}
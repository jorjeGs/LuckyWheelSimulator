<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["labels"]) && isset($_POST["probs"])) {
        $labels = $_POST["labels"];
        $probs = $_POST["probs"];
        $times = $_POST["numero"];

        //registro de resultados
        $countLabels = [];

        foreach ($labels as $label) {
            $countLabels[$label] = 0;
        }


        // Validar que haya al menos un label y probabilidad
        if (!empty($labels) && !empty($probs) && count($labels) === count($probs)) {
            $totalProbs = array_sum($probs);

            for ($j = 0; $j <= $times; $j++) {
                $randomNumber = mt_rand() / mt_getrandmax();  // Generar un número aleatorio entre 0 y 1

                $cumulativeProbability = 0;
                $selectedLabel = null;

                for ($i = 0; $i < count($labels); $i++) {
                    $cumulativeProbability += $probs[$i] / $totalProbs;
                    if ($randomNumber <= $cumulativeProbability) {
                        $selectedLabel = $labels[$i];
                        $veces = $countLabels[$selectedLabel];
                        $countLabels[$selectedLabel] = $veces + 1;
                        break;
                    }
                }
                
            }


            if ($countLabels !== null) {
                echo json_encode($countLabels);
            } else {
                echo "Error al seleccionar un label.";
            }
        } else {
            echo "Datos de labels y/o probabilidades incorrectos.";
        }
    } else {
        echo "Datos de labels y/o probabilidades no recibidos.";
    }
} else {
    echo "Método no válido para acceder a esta página.";
}

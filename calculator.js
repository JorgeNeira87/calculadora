document.addEventListener("DOMContentLoaded", function () {
    const display = document.getElementById("display");
    const buttons = document.getElementById("buttons");

    buttons.addEventListener("click", function (event) {
        if (event.target.classList.contains("number")) {
            display.value += event.target.textContent;
        } else if (event.target.id === "clear") {
            display.value = "";
        } else if (event.target.id === "equals") {
            try {
                display.value = eval(display.value);
                // Envía la operación a add.php para guardarla en el historial
                saveToHistory(display.value);
            } catch (error) {
                display.value = "Error";
            }
        } else if (event.target.id === "add") {
            display.value += "+";
        } else if (event.target.id === "subtract") {
            display.value += "-";
        } else if (event.target.id === "multiply") {
            display.value += "*";
        } else if (event.target.id === "divide") {
            display.value += "/";
        }
    });

    function saveToHistory(operation) {
        // Envía la operación a add.php para 

        function saveToHistory(operation) {
            // Envía la operación a add.php para guardarla en la base de datos
            fetch("add.php", {
                method: "POST",
                body: new URLSearchParams({ operation: operation }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
            })
                .then((response) => response.text())
                .then((data) => console.log(data))
                .catch((error) => console.error(error));
        }
    });
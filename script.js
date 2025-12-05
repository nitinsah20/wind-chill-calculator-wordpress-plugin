function calculateWindChill() {
    const T = parseFloat(document.getElementById("temp").value);
    const V = parseFloat(document.getElementById("speed").value);
    const resultBox = document.getElementById("result");

    if (isNaN(T) || isNaN(V)) {
        resultBox.innerText = "Enter valid values";
        return;
    }

    const windChill =
        13.12 +
        0.6215 * T -
        11.37 * Math.pow(V, 0.16) +
        0.3965 * T * Math.pow(V, 0.16);

    resultBox.innerText = windChill.toFixed(2);
}

function wccToggleDarkMode() {
    document.body.classList.toggle("wcc-dark");
}


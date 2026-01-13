let inputs = [];
let results = [];

function CreateForm() {
    const matrix = document.getElementById('matrix');
    const button = document.getElementById('button');
    const res = document.getElementById('results');

    for (let i = 0; i < 3; i++) {
        const rows = document.createElement('div');
        inputs[i] = [];
        
        for (let j = 0; j < 4; j++) {
            const input = document.createElement('input');
            input.type = 'text';
            input.size = 5;
            inputs[i][j] = input;
            rows.appendChild(input);

            const label = document.createElement('span');
            if (j < 2) label.innerText = " X" + (j + 1) + " + ";
            else if (j === 2) label.innerText = " X" + (j + 1) + " = ";
            rows.appendChild(label);
        }
        matrix.appendChild(rows);
    }

    const makeButton = document.createElement('button');
    makeButton.innerText = 'Сгенерировать коэффициенты';
    makeButton.onclick = newNums;
    button.appendChild(makeButton);

    res.appendChild(document.createElement('br'));
    for (let i = 0; i < 3; i++) {
        const resDiv = document.createElement('div');
        resDiv.innerText = "X" + (i + 1) + " = ";
        
        const resInput = document.createElement('input');
        resInput.type = 'text';
        resInput.size = 10;
        resInput.readOnly = true;
        results[i] = resInput;
        
        resDiv.appendChild(resInput);
        res.appendChild(resDiv);
    }

    const solveButton = document.createElement('button');
    solveButton.innerText = 'Решение системы';
    solveButton.onclick = Find;
    res.appendChild(solveButton);
}

function newNums() {
    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 4; j++) {
            inputs[i][j].value = Math.floor(Math.random() * 21) - 10;
        }
    }
}

function det(m) {
    return (m[0][0] * m[1][1] * m[2][2] + 
            m[0][1] * m[1][2] * m[2][0] + 
            m[0][2] * m[1][0] * m[2][1]) - 
           (m[0][2] * m[1][1] * m[2][0] + 
            m[0][1] * m[1][0] * m[2][2] + 
            m[0][0] * m[1][2] * m[2][1]);
}

function Find() {
    let A = [];
    let B = [];
    for (let i = 0; i < 3; i++) {
        A[i] = [];
        for (let j = 0; j < 3; j++) {
            A[i][j] = parseFloat(inputs[i][j].value) || 0;
        }
        B[i] = parseFloat(inputs[i][3].value) || 0;
    }

    let delta = det(A);
    if (delta === 0) {
        alert("Система не имеет однозначного решения (Delta = 0)");
        results.forEach(input => input.value = "");
        return;
    }

    for (let i = 0; i < 3; i++) {
        let Am = A.map(row => [...row]);
        for (let row = 0; row < 3; row++) {
            Am[row][i] = B[row];
        }
        
        let deltaI = det(Am);
        results[i].value = (deltaI / delta).toFixed(2);
    }
}
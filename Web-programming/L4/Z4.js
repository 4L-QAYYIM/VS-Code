const m = 10;
        const n = 10;
        let matrix = [];
        function createData() {
            matrix = [];
            for (let i = 0; i < m; i++) {
                let row = [];
                for (let j = 0; j < n; j++) {
                    row.push(Math.floor(Math.random() * 100));
                }
                matrix.push(row);
            }
        }

        function PrintMatrix() {
            const container = document.getElementById('matrix');
            container.innerHTML = '';

            for (let i = 0; i < m; i++) {
                const elements = document.createElement('div');
                for (let j = 0; j < n; j++) {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = matrix[i][j];
                    input.size = 3; // Узкое поле
                    elements.appendChild(input);
                }
                container.appendChild(elements);
            }
        }

        function sortMatrix() {
            for (let i = 0; i < m; i++) {
                let rowNumber = i + 1;
                if (rowNumber % 2 !== 0) {
                    matrix[i].sort((a, b) => a - b);
                } else {
                    matrix[i].sort((a, b) => b - a);
                }
            }
            PrintMatrix();
        }

        function Print() {
            const buttons = document.getElementById('buttons');

            const sort = document.createElement('button');
            sort.textContent = 'Сортировка';
            sort.onclick = sortMatrix;

            const refreshBtn = document.createElement('button');
            refreshBtn.textContent = 'Сгенерировать заново';
            refreshBtn.onclick = () => {
                createData();
                PrintMatrix();
            };

            buttons.appendChild(sort);
            buttons.appendChild(refreshBtn);
        }

        createData();
        PrintMatrix();
        Print();
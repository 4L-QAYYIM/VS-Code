let exName = [
"Задание: Дано число. Проверьте, отрицательное оно или нет. Выведите об этом информацию в консоль.",
"Задание: Дано число. Проверьте, четное оно или нет.",
"Задание: Дана некоторая строка. Найдите позицию первого нуля в строке.",
"Задание: Выведите в консоль все числа в промежутке от 1 до 1000, сумма первой и второй цифры которых равна пяти.",
"Задание: Даны два массива удалите из большего массива лишние элементы с конца так, чтобы длины массивов стали одинаковыми.",
"Дан массив. Удалите из массива все пустые строки.",
"Задание: Сделайте функцию, которая вернет текущий день недели словом.",
"Задание: Сделайте функцию, которая параметром будет принимать секунды, а возвращать количество суток, соответствующих этим секундам.",
"Задание: Даны два инпута, абзац и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите в абзац сумму этих чисел.",
"Задание: Дан абзац с числом и кнопка. По нажатию на кнопку возведите текст абзаца в квадрат.",
"Задание: Дана кнопка, пустой список ul и массив. По клику на кнопку заполните список элементами этого массива.",
"Задание: Дана кнопка и пустой список ul. По клику на кнопку заполните список числами от 1 до 10.",
"Дана кнопка и список ul, заполненный числами. По клику на кнопку удалите пункт списка, содержащий самое максимальное число.",
"Задание: Напишите программу, которая сформирует следующий массив:",
"Задание: Выведите на экран следующую пирамидку:",
];
let elementsId = ['ex1', 'ex2', 'ex3', 'ex4', 'ex5', 'ex6', 'ex7', 'ex8', 'ex9', 'ex10', 'ex11', 'ex12', 'ex13', 'ex14', 'ex15'];
let activeEx = 0;
//------------------------------------------------------------------
const input2 = document.getElementById('inputEx2');
const div2 = document.getElementById('div2');
div2.style.display = 'none';
//------------------------------------------------------------------
let el = [];
for(let i = 0; i < 15; i++){
    const obj = document.getElementById(elementsId[i]);
    obj.addEventListener("click", function() {setText(obj);});
    if(i === 4 || i === 8){
        obj.addEventListener("click", function() {
                div2.style.display = 'block';
    });
    }
    else{

        obj.addEventListener("click", function() {
                div2.style.display = 'none';
        });
    }
    el.push(obj);
}
//------------------------------------------------------------------
const button = document.getElementById('button');
button.addEventListener("click", function() {takeInput();});
//------------------------------------------------------------------
function setText(element){
    const text1 = document.getElementById('exNum');
    let it = Number(String(element.id).slice(2));
    text1.innerHTML = exName[it - 1];
    activeEx = it;
}

function takeInput() {
  const input = document.getElementById('inputEx1');
  const input2 = document.getElementById('inputEx2');
  console.log(input.value);
  console.log(input2.value);
  console.log(activeEx);
  if(activeEx != 5 || activeEx != 9){
    exNum(input.value, input2.value);
  }
}

function exNum(text1, text2){
    const output = document.getElementById('answer');
    const out = document.getElementById('input');
    out.innerHTML = "Ввод: " + text1;
    output.innerHTML = "Ответ: ";
    switch(activeEx){
        case 1:
            if (Number(text1) > 0){
                output.innerHTML += "Число " + text1 + " положительное";
            }
            else{
                output.innerHTML = "Число " + text1 + " отрицательное";
            }
            break;
        case 2:
            if(Number(text1) % 2 == 0){
                output.innerHTML += "Число " + text1 + " четное";
            }
            else{
                output.innerHTML += "Число " + text1 + " нечетное";
            }
            break;
        case 3:
            for(let i = 0; i < text1.length; i++){
                if(text1[i] == "0"){
                    output.innerHTML += "Цифра 0 находится на индексе " + i;
                    break;
                }
            }
            break;
        case 4:
            output.innerHTML += "Ответ в консоли";
            for(let i = 1; i < 1001; i++){
                if(i < 10){
                    if(i == 5){
                        console.log(i);
                    }
                }
                else{
                    if(Number(String(i)[0]) + Number(String(i)[1]) == 5){
                        console.log(i);
                    }
                }
            }
            break;
        case 6:
            let V3_2_1 = [];
            console.log(text1);
            v = 0;
            while(v < text1.length){
                if(text1[v] != " "){
                    let t = v;
                    let el = "";
                    while((text1[t] != " ") && (t < text1.length)){
                        el += text1[t];
                        t++;
                        v = t;
                    }
                    V3_2_1.push(Number(el));
                }
                v++;
            }
            console.log("Массив без пустых строк: " + V3_2_1 + " Длина: " + V3_2_1.length);
            output.innerHTML += V3_2_1;
            break;
        case 7:
            output.innerHTML += todayDay();
            break;
        case 8:
            output.innerHTML += "В " + text1 + " секундах содержится примерно: " + countOfDay(text1) + " суток";
            break;
        case 5:
            const output2 = document.getElementById('answer2');
            const out2 = document.getElementById('input2');
            out.innerHTML = "Ввод: " + text1;
            output.innerHTML = "Ответ: ";
            out2.innerHTML = "Ввод: " + text2;
            output2.innerHTML = "Ответ: ";
            let V3_1_1 = [];
            let V3_1_2 = [];
            let i = 0;
                    while(i < text1.length){
                        if(text1[i] != " "){
                            let t = i;
                            let el = "";
                            while((text1[t] != " ") && (t < text1.length)){
                                el += text1[t];
                                t++;
                                i = t;
                            }
                            V3_1_1.push(Number(el));
                        }
                        i++;
                    }
                    console.log("Первый массив: " + V3_1_1 + " Длина: " + V3_1_1.length);
                    console.log(text2);
                    i = 0;
                    while(i < text2.length){
                        if(text2[i] != " "){
                            let t = i;
                            let el = "";
                            while((text2[t] != " ") && (t < text2.length)){
                                el += text2[t];
                                t++;
                                i = t;
                            }
                            V3_1_2.push(Number(el));
                        }
                        i++;
                    }
                    console.log("Второй массив: " + V3_1_2 + " Длина: " + V3_1_2.length);
                    if(V3_1_1.length > V3_1_2.length){
                        V3_1_1.splice(V3_1_2.length, V3_1_1.length - V3_1_2.length);
                    }
                    if(V3_1_2.length > V3_1_1.length){
                        V3_1_2.splice(V3_1_1.length, V3_1_2.length - V3_1_1.length);
                    }
                    output.innerHTML += V3_1_1;
                    output2.innerHTML += V3_1_2;
                    console.log("Первый массив: " + V3_1_1);
                    console.log("Второй массив: " + V3_1_2);
            break;
        case 9:
            const output7 = document.getElementById('answer2');
            const out7 = document.getElementById('input2');
            out.innerHTML = "Ввод: " + text1;
            output.innerHTML = "Ответ: ";
            out7.innerHTML = "Ввод: " + text2;
            output.innerHTML += (Number(text1) + Number(text2));
            break;
        case 10:
            output.innerHTML += String(Number(text1)*Number(text1));
            break;
        case 11:
            let l = 0;
            let mass = [];
            while(l < text1.length){
                if(text1[l] != " "){
                    let t = l;
                    let el = "";
                    while((text1[t] != " ") && (t < text1.length)){
                        el += text1[t];
                        t++;
                        l = t;
                    }
                     mass.push(Number(el));
                }
                l++;
            }
            const ul = document.getElementById('ul');
            ul.innerHTML = '';
            for(let k = 0; k < mass.length; k++){
                const newLI = document.createElement('li');
                newLI.textContent = mass[k];
                ul.appendChild(newLI);
            }
            output.innerHTML += "Ответ снизу";
            break;
        case 12:
            const ul1 = document.getElementById('ul');
            ul1.innerHTML = '';
            for(let k = 0; k < 10; k++){
                const newLI = document.createElement('li');
                newLI.textContent = k + 1;
                ul1.appendChild(newLI);
            }
            output.innerHTML += "Ответ снизу";
            break;
        case 13:
            const ul3 = document.getElementById('ul');
            const listItems = ul3.getElementsByTagName('li');

            let maxNumber = -Infinity;
            let maxElement = null;

            Array.from(listItems).forEach(item => {
            const currentNumber = Number(item.textContent.trim());
        
            if (currentNumber > maxNumber) {
                maxNumber = currentNumber;
                maxElement = item;
            }
            });
            if (maxElement) {
                maxElement.parentNode.removeChild(maxElement);
                output.innerHTML += "Удален элемент: " + maxNumber;
            }
            break;
        case 14:
            const result = createArr();
            console.log(result);
            break;
        case 15:
            output.innerHTML += "Ответ в коноли";
            console.log("x\nxx\nxxx\nxxxx\nxxxxx");
            break
    }
}

function todayDay(){
    const date = new Date();
    let today = "Сегодня: ";
        switch (date.getDay()) {
            case 1:
                today += "Понедельник";
                break;
            case 2:
                today += "Вторник";
                break;
            case 3:
                today += "Среда";
                break;
            case 4:
                today += "Четверг";
                break;
            case 5:
                today += "Пятница";
                break;
            case 6:
                today += "Суббота";
                break;
            case 7:
                today += "Воскресенье";
                break;
        }
    return today;
}

function countOfDay(countOfSeconds){
    return Math.round(((countOfSeconds/60)/60)/24);
}

function createArr() {
    const mainArray = [];
    const size = 3;

    for (let i = 0; i < size; i++) {
        const layer = [];
        for (let j = 0; j < size; j++) {
            const row = [];
            for (let k = 0; k < size; k++) {
                row.push(k + 1); 
            }
            layer.push(row);
        }
        mainArray.push(layer);
    }
    return mainArray;
}

const displayList = document.getElementById('ul2');

const targets = [
    { name: 'window', obj: window },
    { name: 'document', obj: document },
    { name: 'location', obj: location },
    { name: 'navigator', obj: navigator }
];

targets.forEach(target => {
    for (let key in target.obj) {
        const li = document.createElement('li');
        const value = target.obj[key];
        li.textContent = `${key}: ${value}`;
        if(`${key}` == 'window' || `${key}` == 'document' || `${key}` == 'location' || `${key}` == 'navigator'){
            displayList.appendChild(li);
        }
    }
});
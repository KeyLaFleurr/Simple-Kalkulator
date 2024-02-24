<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            padding: 20px;
            max-width: 300px;
            color: #fff;
        }

        .display {
            width: calc(100% - 10px);
            margin-bottom: 10px;
            padding: 10px;
            font-size: 24px;
            background-color: #444;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-align: right;
            float: left;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
            clear: both;
        }

        button {
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #666;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #888;
        }
    </style>
</head>
<body>

<div class="calculator">
    <input type="text" class="display" id="display" readonly>
    <div class="buttons">
        <button onclick="clearDisplay()">C</button>
        <button onclick="backspace()">←</button>
        <button onclick="appendToDisplay('7')">7</button>
        <button onclick="appendToDisplay('8')">8</button>
        <button onclick="appendToDisplay('9')">9</button>
        <button onclick="appendToDisplay('+')">+</button>
        <button onclick="appendToDisplay('4')">4</button>
        <button onclick="appendToDisplay('5')">5</button>
        <button onclick="appendToDisplay('6')">6</button>
        <button onclick="appendToDisplay('-')">-</button>
        <button onclick="appendToDisplay('1')">1</button>
        <button onclick="appendToDisplay('2')">2</button>
        <button onclick="appendToDisplay('3')">3</button>
        <button onclick="appendToDisplay('*')">X</button>
        <button onclick="appendToDisplay('0')">0</button>
        <button onclick="appendToDisplay('.')">.</button>
        <button onclick="calculate()">=</button>
        <button onclick="appendToDisplay('/')">/</button>
    </div>
</div>

<script>
    document.addEventListener('keydown', function(event) {
        const key = event.key;
        if (/\d/.test(key)) {
            appendToDisplay(key);
        } else if (['+', '-', '*', '/', '.', '='].includes(key)) {
            appendToDisplay(key === '=' ? '/' : key);
        } else if (key === 'Enter') {
            calculate();
        } else if (key === 'Escape') {
            clearDisplay();
        } else if (key === 'Backspace') {
            backspace();
        }
    });

    function appendToDisplay(value) {
        document.getElementById('display').value += value;
    }

    function backspace() {
        const display = document.getElementById('display');
        display.value = display.value.slice(0, -1);
    }

    function clearDisplay() {
        document.getElementById('display').value = '';
    }

    function calculate() {
        try {
            const expression = document.getElementById('display').value;
            const result = eval(expression.replace('X', '*'));
            document.getElementById('display').value = result;
        } catch (error) {
            alert('Invalid input!');
        }
    }
</script>
</body>
</html>

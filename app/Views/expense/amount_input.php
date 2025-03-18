<!DOCTYPE html>
<html lang="en">
<head>
    <title>Amount Input</title>
    <style>
        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .keypad button {
            width: 60px;
            height: 60px;
            border: none;
            background-color: #E0E0E0;
            font-size: 24px;
            cursor: pointer;
        }
        .keypad .confirm {
            grid-column: span 3;
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Enter Amount</h1>
    <input type="text" id="amountInput" readonly>

    <div class="keypad">
        <button onclick="addNumber('1')">1</button>
        <button onclick="addNumber('2')">2</button>
        <button onclick="addNumber('3')">3</button>
        <button onclick="addNumber('4')">4</button>
        <button onclick="addNumber('5')">5</button>
        <button onclick="addNumber('6')">6</button>
        <button onclick="addNumber('7')">7</button>
        <button onclick="addNumber('8')">8</button>
        <button onclick="addNumber('9')">9</button>
        <button onclick="addNumber('0')">0</button>
        <button onclick="clearInput()">C</button>
        <button class="confirm" onclick="submitAmount()">✔</button>
    </div>

    <script>
        function addNumber(num) {
            const input = document.getElementById('amountInput');
            input.value += num;
        }

        function clearInput() {
            document.getElementById('amountInput').value = '';
        }

        function submitAmount() {
            alert(`Amount Entered: $${document.getElementById('amountInput').value}`);
        }
    </script>
</body>
</html>

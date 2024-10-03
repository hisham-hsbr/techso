@props(['name', 'code'])
<script>
    function generateCode() {
        let name = document.getElementById('{{ $name }}').value.trim();
        let code = 'X'; // Start with value X

        if (name) {
            let words = name.split(' ');
            let firstWord = words[0];

            // Handle cases based on word length
            if (firstWord.length >= 3) {
                code += firstWord.substring(0, 3);
            } else if (firstWord.length == 2 && words.length > 1) {
                code += firstWord + words[1][0];
            } else if (firstWord.length == 1 && words.length > 1) {
                code += firstWord + words[1].substring(0, 2);
            } else {
                code += firstWord;
            }

            // Ensure the code is exactly 4 characters long
            code = code.substring(0, 4);

            // If the product code is still less than 4 characters, append a random number
            while (code.length < 4) {
                code += Math.floor(Math.random() * 10);
            }
        }

        document.getElementById('{{ $code }}').value = code;
    }
</script>

{{-- <div>
    <label for="item_name">Name</label>
    <input type="text" id="item_name" name="item_name" onkeyup="generateCode()">
</div>

<div>
    <label for="item_code">Code</label>
    <input type="text" id="item_code" name="item_code" readonly>
</div> --}}

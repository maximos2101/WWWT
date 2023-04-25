const inputText = document.querySelector("#inputPrompt")
const outputText = document.querySelector("#outputResult")
const buttonAI = document.querySelector("#buttonAI")

buttonAI.onclick = async function (event) {
    const text = inputText.value;
    console.log("User prompt: ", text);

    const url = "https://api.openai.com/v1/completions";

    await fetch(url, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer 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'
        },
        body: JSON.stringify({
            "model": "text-davinci-003",
            "prompt": text,
            "max_tokens": 100,
            "temperature": 1
        })
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log(data);
        outputText.value = data.choices[0].text;
    })
};
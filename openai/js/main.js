//REMEMBER TO REPLACE BOTH "APIKEY" STRINGS TO YOUR OPENAI API KEY FOR EACH OF THE BUTTONS EVENTS (TEXT AND IMG).
//THE SAME API KEY CAN BE USED TWICE

const inputText = document.querySelector("#inputPrompt")
const outputText = document.querySelector("#outputResult")
const buttonAI = document.querySelector("#buttonAI")

const inputTextIMG = document.querySelector("#inputPromptIMG")
const outputIMG = document.querySelector("#outputResultIMG")
const buttonAIIMG = document.querySelector("#buttonAIIMG")

buttonAI.onclick = async function (event) {
    const text = inputText.value;
    console.log("User prompt: ", text);

    const url = "https://api.openai.com/v1/completions";

    await fetch(url, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer APIKEY'
        },
        body: JSON.stringify({
            "model": "text-davinci-003",
            "prompt": text,
            "max_tokens": 70,
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


buttonAIIMG.onclick = async function (event) {
    const textIMG = inputTextIMG.value;
    console.log("User IMG prompt: ", textIMG);

    const urlIMG = "https://api.openai.com/v1/images/generations";

    await fetch(urlIMG, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer APIKEY'
        },
        body: JSON.stringify({
            "model": "image-alpha-001",
            "prompt": textIMG,
            "n": 1,
            "size": "256x256"
        })
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        console.log(data);
        outputIMG.value = data.data[0].url;
        document.getElementById("outputResultIMG").innerHTML = "<a href='" + data.data[0].url + "' target='_blank'>" + data.data[0].url + "</a>";
    })
};


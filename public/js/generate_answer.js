import { Configuration, OpenAIApi} from 'openai'

function generate_answer(){

    let prompt = document.getElementById("front").textContent;

    const configuration = new Configuration({
    apiKey: "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",
    });

    const openai = new OpenAIApi(configuration);

    async function runCompletion () {
    const completion = await openai.createCompletion({
        model: "text-davinci-003",
        prompt: "Write me a brief answer for the following flashcard: " + prompt,
        temperature: 0.2,
        max_tokens: 125,
    });
    document.getElementById("back").innerHTML = response;
    }
}
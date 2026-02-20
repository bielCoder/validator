export class ValidatorService {

    #baseUrl = "http://localhost:8080";

    async validator(text) {
        const response = await fetch(`${this.#baseUrl}/validate`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ text: text })
        });

        return await response.json();
    }
}

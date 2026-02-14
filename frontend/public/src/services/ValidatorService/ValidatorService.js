export class ValidatorService {

    #baseUrl = "http://localhost:8080";

    async validator() {
        const response = await fetch(`${this.#baseUrl}/validate`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ text: "({})" })
        });

        return await response.json();
    }
}

const instance = new ValidatorService
instance.validator();
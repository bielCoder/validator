export function Component(config) {
    return function (TargetClass) {

        return class extends TargetClass {

            constructor(selector) {
                super();
                this.selector = selector || config.selector;
                this.container = document.querySelector(this.selector);
            }

            async mount() {

                    if (!this.container) return;

                    const response = await fetch(config.templateUrl);
                    let html = await response.text();

                    // 🔥 Interpolação ANTES de renderizar
                    html = html.replace(/\{\{\s*(\w+)\s*\}\}/g, (_, key) => {
                        return this[key] ?? "";
                    });

                    const shadow = this.container.attachShadow({ mode: "open" });

                    let styleContent = "";
                    if (config.styleUrl) {
                        styleContent = await fetch(config.styleUrl).then(r => r.text());
                    }

                    shadow.innerHTML = `
                        <style>${styleContent}</style>
                        ${html}
                    `;

                    if (typeof this.onInit === "function") {
                        this.onInit(shadow);
                    }
                }


        }
    }
}

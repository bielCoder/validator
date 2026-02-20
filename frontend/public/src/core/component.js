export function Component(config) {
    return function (TargetClass) {

        return class extends TargetClass {

            constructor(selector) {
                super();
                this.selector = selector || config.selector;
                this.container = this.selector
                    ? document.querySelector(this.selector)
                    : null;

                this.host = null;
            }

            async mount(externalContainer = null) {

                const host = externalContainer || this.container;
                if (!host) return;

                this.host = host;

                const response = await fetch(config.templateUrl);
                let html = await response.text();

                // 🔥 Interpolação simples
                html = html.replace(/\{\{\s*(\w+)\s*\}\}/g, (_, key) => {
                    return this[key] ?? "";
                });

                let styleContent = "";
                if (config.styleUrl) {
                    styleContent = await fetch(config.styleUrl)
                        .then(r => r.text());
                }

                let renderTarget;

                // 🔥 Shadow ou não
                if (config.shadow !== false) {

                    const shadow = host.shadowRoot || host.attachShadow({ mode: "open" });

                    shadow.innerHTML = `
                        <style>${styleContent}</style>
                        ${html}
                    `;

                    renderTarget = shadow;

                } else {

                    host.innerHTML = `
                        <style>${styleContent}</style>
                        ${html}
                    `;

                    renderTarget = host;
                }

                // 🔥 Lifecycle
                if (typeof this.onInit === "function") {
                    this.onInit(renderTarget);
                }

            
              // 🔥 Auto mount children
                if (config.children && Array.isArray(config.children)) {

                    this.childrenInstances = [];

                    config.children.forEach(child => {

                        const elements = renderTarget.querySelectorAll(child.selector);

                        elements.forEach(el => {

                            const instance = new child.component();
                            instance.mount(el);

                            this.childrenInstances.push({
                                selector: child.selector,
                                instance: instance
                            });

                        });

                    });
                }

            // 🔥 Lifecycle (AGORA DEPOIS DOS FILHOS)
            if (typeof this.onInit === "function") {
                this.onInit(renderTarget);
            }


            }
        }
    }
}

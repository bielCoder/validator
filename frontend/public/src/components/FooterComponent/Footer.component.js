import { Component } from "../../core/component.js";

const FooterComponent = Component({
    selector: "#footer-selector",
    templateUrl: "./src/components/FooterComponent/Footer.component.html",
    styleUrl: "./src/components/FooterComponent/Footer.component.css"
})(class {

    constructor()
    {
         this.date = new Date().getFullYear();
    }

    onInit(container) {
       
    }
});

export default FooterComponent;

import { Component } from "../../core/component.js";
import AsideContent from "../AsideContentComponent/AsideContent.component.js";

const BackgroundLayeredComponent = Component({
    selector: "#background-selector",
    templateUrl: "./src/components/BackgroundLayeredComponent/BackgroundLayered.component.html",
    styleUrl: "./src/components/BackgroundLayeredComponent/BackgroundLayered.component.css",
    shadow: true
})(class {
    onInit(shadow) {

    const asideHost = shadow.querySelector("#aside");

    const aside = new AsideContent();
    aside.mount(asideHost);
}

});

export default BackgroundLayeredComponent;

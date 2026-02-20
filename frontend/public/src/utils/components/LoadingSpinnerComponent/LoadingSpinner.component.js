import { Component } from "../../../core/component.js";


const LoadingSpinnerComponent = Component({
    selector: "app-loading-spinner",
    templateUrl: "./src/utils/components/LoadingSpinnerComponent/LoadingSpinner.component.html",
    styleUrl: "./src/utils/components/LoadingSpinnerComponent/LoadingSpinner.component.css",
    shadow: false
})(class {
    onInit(container) {
      this.hide();
    }

    hide()
    {
        this.host.style.display = "none"
    }

    show()
    {
        this.host.style.display = "flex"
    }
});

export default LoadingSpinnerComponent;

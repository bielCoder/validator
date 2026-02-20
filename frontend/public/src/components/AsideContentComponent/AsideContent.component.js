import { Component } from "../../core/component.js";
import { ValidatorService } from "../../services/ValidatorService/ValidatorService.js";
import LoadingSpinnerComponent from "../../utils/components/LoadingSpinnerComponent/LoadingSpinner.component.js";







const AsideContentComponent = Component({
    selector: "#aside-content-selector",
    templateUrl: "./src/components/AsideContentComponent/AsideContent.component.html",
    styleUrl: "./src/components/AsideContentComponent/AsideContent.component.css",
    shadow: false, 
    children: [
        {
            selector: "app-loading-spinner",
            component: LoadingSpinnerComponent
        }
    ]
})(class {

        constructor()
        {
           
            this.validatorService = new ValidatorService();
            this.object;
            this.validation;
            this.status;
            this.elementRef;
           
        }
    
        onInit(container) {

        const form = container.querySelector("form");
        const input = container.querySelector("#text");
    

        this.elementRef = container.querySelector('#status');    

        this.spinner = this.childrenInstances
        ?.find(child => child.selector === "app-loading-spinner")
        ?.instance;
       
        form.addEventListener("submit", (event) => {
            event.preventDefault();

            const value = input.value.trim();
            this.handleSubmit(value);
        });
        }

     handleSubmit(text) {
        if(text === '' || text === null)
        {
            return
        }
        this.spinner?.show();
        this.validatorService.validator(text).then((data) => {
            this.object = data;
            this.validation = this.object.validation
            this.status = this.validation.validation
            

            const statusElement = this.elementRef;
            statusElement.textContent = this.status ? 'Texto Válido' : 'Texto Inválido';
            statusElement.style.color = this.status ? '#5cb854' : '#b85454';
            statusElement.style.fontWeight = 'bold';


        }).finally(()=> {
            this.spinner?.hide();
        });

       
 
    }


});

export default AsideContentComponent;

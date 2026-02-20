import Header from "./components/HeaderComponent/Header.component.js";
import Footer from "./components/FooterComponent/Footer.component.js";
import BackgroundImage from "./components/BackgroundLayeredComponent/BackgroundLayered.component.js";
import AsideContent from "./components/AsideContentComponent/AsideContent.component.js";

new Header("#header").mount();
new BackgroundImage("#background").mount();
new AsideContent("#content");
new Footer("#footer").mount();



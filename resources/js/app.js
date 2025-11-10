import './bootstrap';

import AOS from "aos";
import "flyonui/flyonui";
import { animate, inView, press, stagger , spring} from "motion";

document.addEventListener('DOMContentLoaded', (e) => {


    window.AOS = AOS;
    window.motion = {
        animate, inView, stagger, spring, press
    };
});

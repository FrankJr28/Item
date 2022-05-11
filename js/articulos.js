const on = (element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if (e.target.closest(selector)) {
            handler(e);
        }
    })
}

on(document, 'click', '.cab', e => {

    alert("hAS PRESIONADO ELEMENT .cab");

});
/*
cables = document.querySelectorAll(".cab");
cables.addEventListener("click", (e) => {
    alert("Has seleccionado: ");
});*/
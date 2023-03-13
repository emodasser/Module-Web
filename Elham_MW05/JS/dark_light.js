//let data_theme=document.document.getElementById("body").getAttribute("data-theme");
let sombre = document.getElementById("dark_light");
sombre.addEventListener('click', dark_light);
function dark_light()
{
    let body = document.getElementById("body");
    let data_theme = body.getAttribute("data-theme");



    if (data_theme=="light")
    {
        body.setAttribute("data-theme", "dark");
        sombre.innerHTML = "Mode Clair";
    }

    else{
        body.setAttribute("data-theme", "light");
        sombre.innerHTML = "Mode Sombre";
    }

}
$(document).ready(function () {
    $("a").click(function (event) {
        event.preventDefault(); // Evitar la navegación predeterminada
        var url = $(this).attr("href");


        // Cargar el contenido desde la URL utilizando AJAX
        $("#contenido-dinamico").load(url);

        /* history.pushState(null, null, url); */
        loadPageAlert();
        renderTable();
    });
});

function loadPageAlert() {
    let timerInterval;
    Swal.fire({
        title: "Cyberhunters Inc",
        html: "Espere un momento",
        timer: 1000,
        timerProgressBar: true,
        imageUrl: "../src/images/cyberhunter_logo.png",
        imageWidth: 250,
        imageHeight: 250,
        imageAlt: "cyberhunterlogo",

        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },

        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {

        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth < 768) {
        const menuToggle = document.querySelector(".menu-toggle");
        console.log(menuToggle);
        const mainMenu = document.querySelector(".main-menu");

        menuToggle.addEventListener("click", function () {
            if (mainMenu.style.display === "block") {
                mainMenu.style.display = "none";
            } else {
                mainMenu.classList.add("swing-in-top-fwd");
                mainMenu.style.display = "block";
            }
        });

        document.addEventListener("click", function (event) {
            if (event.target !== menuToggle && event.target !== mainMenu) {
                mainMenu.style.display = "none";
            }
        });
    }

});

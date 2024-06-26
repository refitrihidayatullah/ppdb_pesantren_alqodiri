const flashData = $(".flash-data").data("flashdata");
const ubahDataUppercase = flashData.toUpperCase();
if (flashData == "success") {
    let timerInterval;
    Swal.fire({
        title: "Success",
        text: ubahDataUppercase,
        html: "I will close in <b></b> milliseconds.",
        icon: "success",
        timer: 1500,
        timerProgressBar: true,

        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 30);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
    });
} else if (flashData == "failed") {
    let timerInterval;
    Swal.fire({
        title: "Something Wrong",
        text: ubahDataUppercase,
        html: "I will close in <b></b> milliseconds.",
        icon: "error",
        timer: 1500,

        timerProgressBar: true,

        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 30);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
    });
} else {
}

// $(".btn-delete").on("click", function (e) {
//     e.preventDefault();
//     const form = $(this).attr("action");
//     Swal.fire({
//         title: "Apa Anda Yakin?",
//         text: "Anda tidak akan dapat mengembalikan ini!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Delete",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             document.location.action = form;
//         }
//     });
// });

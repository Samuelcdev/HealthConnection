document.addEventListener("DOMContentLoaded", () => {
    const editButtons = document.querySelectorAll(".btn-edit-user");

    editButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const user = JSON.parse(button.dataset.user);

            document.getElementById("edit-typeDocument").value =
                user.userDocumentType;
            document.getElementById("edit-numberDocument").value =
                user.userDocument;
            document.getElementById("edit-name").value = user.userName;
            document.getElementById("edit-lastname").value = user.userLastname;
            document.getElementById("edit-email").value = user.userEmail;
            document.getElementById("edit-userStatus").value =
                user.userStatus === "Active" ? 1 : 2;
            document.getElementById("edit-rol").value =
                user.roleName === "Patient"
                    ? 1
                    : user.roleName === "Doctor"
                    ? 2
                    : 3;
            document.getElementById("edit-birthdate").value =
                user.userBirthdate;
            document.getElementById("edit-plan").value =
                user.healthPlanName === "Plan Gratuito"
                    ? 1
                    : user.healthPlanName === "Plan Personal"
                    ? 2
                    : user.healthPlanName === "Plan Personal Plus"
                    ? 3
                    : user.healthPlanName === "Plan Familiar"
                    ? 4
                    : 5;
            document.getElementById("edit-address").value = user.userAddress;
            document.getElementById("edit-phone").value = user.userPhone;
            document.getElementById("edit-gender").value = user.userSex;

            const modal = document.getElementById("my_modal_2");
            if (modal) modal.showModal();
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const tipoSelect = document.getElementById("create-typeDocument");
    const numeroInput = document.getElementById("create-numberDocument");

    numeroInput.addEventListener("blur", function () {
        const tipo = tipoSelect.value;
        const numero = numeroInput.value.trim();

        if (tipo && numero) {
            fetch(
                `<?= BASE_URL ?>/Admin/getUserByDocument?tipo=${tipo}&numero=${numero}`
            )
                .then((response) => response.json())
                .then((data) => {
                    if (data) {
                        document.getElementById("create-name").value =
                            data.name || "";
                        document.getElementById("create-lastname").value =
                            data.lastname || "";
                        document.getElementById("create-email").value =
                            data.email || "";
                    } else {
                        // Puedes limpiar los campos si no hay datos
                        document.getElementById("create-name").value = "";
                        document.getElementById("create-lastname").value = "";
                        document.getElementById("create-email").value = "";
                    }
                })
                .catch((error) =>
                    console.error("Error al obtener usuario:", error)
                );
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const editButtons = document.querySelectorAll(".btn-edit-user");

    editButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const user = JSON.parse(button.dataset.user);

            document.getElementById("edit-typeDocument").value =
                user.userDocumentType;
            document.getElementById("edit-numberDocument").value = user.userDocument;
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
            document.getElementById("edit-birthdate").value = user.userBirthdate;
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

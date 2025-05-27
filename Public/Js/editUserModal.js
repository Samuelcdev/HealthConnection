const planMap = {
    "Plan Gratuito": "1",
    "Plan Personal": "2",
    "Plan Personal Plus": "3",
    "Plan Familiar": "4",
    "Plan Familiar Plus": "5",
};

document.addEventListener("DOMContentLoaded", () => {
    const editButtons = document.querySelectorAll(".btn-edit-user");

    editButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const user = JSON.parse(button.dataset.user);

            document.getElementById("typeDocument").value =
                user.userDocumentType;
            document.getElementById("numberDocument").value = user.userDocument;
            document.getElementById("name").value = user.userName;
            document.getElementById("lastname").value = user.userLastname;
            document.getElementById("email").value = user.userEmail;
            document.getElementById("userStatus").value =
                user.userStatus === "Active" ? 1 : 2;
            document.getElementById("rol").value =
                user.roleName === "Patient"
                    ? 1
                    : user.roleName === "Doctor"
                    ? 2
                    : 3;
            document.getElementById("birthdate").value = user.userBirthdate;
            document.getElementById("plan").value =
                user.healthPlanName === "Plan Gratuito"
                    ? 1
                    : user.healthPlanName === "Plan Personal"
                    ? 2
                    : user.healthPlanName === "Plan Personal Plus"
                    ? 3
                    : user.healthPlanName === "Plan Familiar"
                    ? 4
                    : 5;
            document.getElementById("address").value = user.userAddress;
            document.getElementById("phone").value = user.userPhone;
            document.getElementById("sex").value =
                user.userSex === "F" ? 1 : user.userSex === "M" ? 2 : 3;

            const modal = document.getElementById("my_modal_2");
            if (modal) modal.showModal();
        });
    });
});

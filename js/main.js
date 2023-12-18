const loginForm = document.querySelector("#login-form");

//login form api call
if (loginForm) {
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const submitBtn = document.querySelector("#login-btn");
    const { email, password } = e.target.elements;

    submitBtn.disabled = true;

    // Validate email using a simple regex pattern
    const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;

    // Form input validation
    if (!email.value || !emailPattern.test(email.value) || !password.value) {
      Swal.fire({
        text: "Wrong email and password combination",
        icon: "error",
        timer: 2500,
        confirmButtonColor: "#006b08",
      });

      // Re-enable the submit button after success
      submitBtn.disabled = false;

      return; // Stop processing if validation fails
    }

    const body = {
      email: email.value,
      password: password.value,
    };

    Swal.fire({
      title: "Please wait...",
      allowEscapeKey: false,
      allowOutsideClick: false,
      toast: true,
      showConfirmButton: false,
      loader: "#006b08",
      didOpen: () => {
        Swal.showLoading();
      },
    });

    fetch("api/user_login.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    })
      .then(async (response) => {
        if (!response.ok) throw await response.json();
        return response.json();
      })
      .then((data) => {
        // Handle the response from the PHP script here
        !swal.isLoading();
        Swal.fire({
          text: data.message,
          icon: "success",
          timer: 2500,
          confirmButtonColor: "#006b08",
        }).then((res) => {
          // Reset the form inputs
          loginForm.reset();
          window.location.href = "/web/leave-management-system/application.php";
        });
      })
      .catch((error) => {
        Swal.fire({
          text: error.message,
          icon: "error",
          timer: 2500,
          confirmButtonColor: "#006b08",
        });
      })
      .finally(() => {
        !swal.isLoading();
        // Re-enable the submit button after success
        submitBtn.disabled = false;
      });
  });
}
$(document).ready(function() {
    console.log("AJAX File Loaded"); // Debugging: Check if this appears in Console

    // Edit Customer Details
    $("#editCustomer").click(function() {
        console.log("Edit button clicked"); // Debugging

        var customer_Id = $("#customer_Id").val();
        var name = $("#name").val().trim();
        var email = $("#email").val().trim();
        var phone = $("#phone").val().trim();
        var inst_address = $("#address").val().trim(); // Capture Address

        // Check if AJAX data is captured properly
        console.log("Sending Data:", { customer_Id, name, email, phone, inst_address });

        // Prevent empty fields from being submitted
        if (!name || !email || !phone || !inst_address) {
            $("#responseMessage").text("All fields are required.");
            return;
        }

        $.ajax({
            url: "../control/edit_specific_control.php",
            type: "POST",
            data: {
                customer_Id: customer_Id,
                name: name,
                email: email,
                phone: phone,
                inst_address: inst_address // Include Address Field
            },
            success: function(response) {
                console.log("Response from PHP:", response); // Debugging
                $("#responseMessage").text(response);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                $("#responseMessage").text("An error occurred while updating.");
            }
        });
    });

    // Delete Customer
    $("#deleteCustomer").click(function() {
        console.log("Delete button clicked"); // Debugging

        var customer_Id = $("#customer_Id").val();

        if (confirm("Are you sure you want to delete your account?")) {
            $.ajax({
                url: "../control/delete_specific_control.php",
                type: "POST",
                data: { customer_Id: customer_Id },
                success: function(response) {
                    console.log("Response from PHP:", response); // Debugging
                    alert(response);
                    if (response.trim() === "Customer deleted successfully.") {
                        window.location.href = "../view/customer.php"; // Redirect to registration page
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert("An error occurred while deleting.");
                }
            });
        }
    });
});

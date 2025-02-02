function updateSellerInfo() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let businessName = document.getElementById("businessName").value.trim();
    let businessType = document.getElementById("businessType").value.trim();
    let location = document.getElementById("location").value.trim();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../control/seller_information_update.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("message").innerHTML = xhr.responseText;
        }
    };

    let params = `seller_Id=${sellerId}&name=${name}&email=${email}&businessName=${businessName}&businessType=${businessType}&location=${location}`;
    xhr.send(params);
}

function deleteSeller() {
    if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../control/seller_information_update.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                if (xhr.responseText.includes("deleted")) {
                    window.location.href = "login.php";
                }
            }
        };

        xhr.send(`delete=true&seller_Id=${sellerId}`);
    }
}

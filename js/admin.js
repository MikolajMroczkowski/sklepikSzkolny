function closeModal(modalName) {
    const modal = document.getElementById(modalName);
    modal.style.display = "none";
}

function openModal(modalName) {
    const modal = document.getElementById(modalName);
    modal.style.display = "flex";
}

var isNew = true;
var id = -1;

function saveProduct() {
    if(document.getElementById("title").value===""||document.getElementById("price").value===""){
        alert("Nazwa nie może być pusta!")
        return;
    }
    if (isNew == true) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'productNew.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("zapisano");
                location="editProduct.php?id="+this.responseText
            }
        }
        xhr.send("title=" + document.getElementById("title").value + "&price=" + document.getElementById("price").value + "&photo=" +
            document.getElementById("photo").src +"&about="+easyMDE.value());
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'productSave.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert("zapisano");
            }
        }
        xhr.send("title=" + document.getElementById("title").value + "&price=" + document.getElementById("price").value + "&photo=" +
            document.getElementById("photo").src +"&id="+id+"&about="+easyMDE.value());
    }
}

function killProduct() {
    if (isNew) {
        location = "products.php";
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'productKill.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                location = "products.php";            }
        }
        xhr.send("id="+id);
    }
}
function deleteProduct() {
    let id = document.getElementById("id").value ;
    let description = document.getElementById("description").value ;
    $('#modal_delete #id').val(id);
    $('#modal_delete').modal('show');
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "deleteProduct.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Produto " + description + " foi excluido com sucesso!");
        }
    };
    xhr.send("action=delete&id=" + id);
    
    window.location.replace("index.php");

}


function setModalData(id, description) {
    document.getElementById("id").value = id;
    document.getElementById("description").value = description;
    const productDescription = document.getElementById('description');
    productDescription.textContent = description;
    
}
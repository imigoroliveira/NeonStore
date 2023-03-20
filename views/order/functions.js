function deleteProduct() {
    let id = document.getElementById("id").value ;
    $('#modal_delete #id').val(id);
    $('#modal_delete').modal('show');
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "deleteOrder.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Pedido foi excluido com sucesso!");
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


const idsProducts = [id,quantity];

function addProduct(id){
    const countElement = document.getElementById("count");
    let count = parseInt(countElement.textContent);
    count++;
    countElement.textContent = count;
    addProductToCart(id);
}

function addProductToCart(id) {
    const qnt = document.getElementById("qnt");
    let quantity = parseInt(qnt.textContent);
    quantity.textContent = id;
    idsProducts.push(id);
}

function createOrder(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actionToCreateOrder.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Pedido criado com sucesso!");
        }
    };
    xhr.send("action=delete&id=" + idsProducts);
}
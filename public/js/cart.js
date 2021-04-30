function incrementQtdProducts(string) {

    var qtd_products = document.getElementById('qtd-products').innerText;

    var intValue = parseInt(qtd_products);
    var intSum = intValue + 1;

    document.getElementById('qtd-products').innerText = intSum;
}
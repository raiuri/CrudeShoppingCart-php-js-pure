// selectors
const itemsList = document.getElementById('items-list');
const appendCartList = document.querySelector('#cart-list tbody');

function eventListeners() {

    itemsList.addEventListener('click', addToCart);
}

// functions
function addToCart(e) {
    e.preventDefault();
    
    if(e.target.classList.contains('add-to-cart')) {
        const item = e.target.parentElement.parentElement;

        readItemsData(item);
    }
}

function readItemsData(item) {
    const items = {
        image: item.querySelector('img').src,
        name: item.querySelector('.card-body h5').textContent,
        price: item.querySelector('.card-body p').textContent,
        code: item.querySelector('strong').textContent,
    }
    insertInCart(items);
};

function insertInCart(items) {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>
            <img src="${items.image}" width=100>
        </td>
        <td>${items.name}</td>
        <td>${items.preco}</td>
        <td>${items.code}</td>
        <td>
            <a href="#" class="borrar-curso" data-id="${items.id}">X</a>
        </td>
    `;

    appendCartList.appendChild(row);
}

function incrementQtdProducts() {

    var qtd_products = document.getElementById('qtd-products').innerText;

    var intValue = parseInt(qtd_products);
    var intSum = intValue + 1;

    document.getElementById('qtd-products').innerText = intSum;
}

// exec
eventListeners();
addToCart();
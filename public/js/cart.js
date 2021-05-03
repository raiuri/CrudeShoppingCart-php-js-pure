// selectors
const itemsList = document.getElementById('items-list');
const appendCartList = document.querySelector('#cart-list tbody');
const clearCart = document.getElementById('clear-cart');

function eventListeners() {

    itemsList.addEventListener('click', addToCart);
    clearCart.addEventListener('click', clearCartItems);
}

// add items in cart
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

function insertInCart(item) {
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>
            <img src="${item.image}" width=100>
        </td>
        <td>${item.name}</td>
        <td>${item.preco}</td>
        <td>${item.code}</td>
        <td>
            <a href="#" class="borrar-curso" data-id="${item.id}">X</a>
        </td>
    `;

    appendCartList.appendChild(row);
    saveToLocalStorage(item);
}

function saveToLocalStorage(item) {
    let items;
    items = getFromLocalStorage();
    items.push(item);

    localStorage.setItem('items', JSON.stringify(items));


}

function getFromLocalStorage() {
    let itemsLS;

    if (localStorage.getItem('items') === null) {
        itemsLS = [];
    } else {
        itemsLS = JSON.parse( localStorage.getItem('items') );
        console.log(itemsLS, 'e cu');
    }
    return itemsLS;
}

// clear cart
function clearCartItems(e) {
    e.preventDefault();
    while(appendCartList.firstChild) {
        appendCartList.removeChild(appendCartList.firstChild);
    }
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
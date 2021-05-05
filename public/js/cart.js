// selectors
const cart = document.getElementById('cart');
const itemsList = document.getElementById('items-list');
const appendCartList = document.querySelector('#cart-list tbody');
const clearCart = document.getElementById('clear-cart');
const qtdProducts = document.getElementById('qtd-products');
const incrementCount = document.getElementById('increment-count');

function eventListeners() {
    itemsList.addEventListener('click', addToCart);
    clearCart.addEventListener('click', clearCartItems);
    cart.addEventListener('click', removeItem);
    document.addEventListener('DOMContentLoaded', insertInCartFromLS);
    document.addEventListener('DOMContentLoaded', incrementQtdProductsLS);
}

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
        <td>${item.price}</td>
        <td>${item.code}</td>
        <td>
            <a href="#" class="remove-item btn btn-danger" data-id="${item.code}">X</a>
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
    }
    return itemsLS;
}

function insertInCartFromLS() {
    let itemLS = getFromLocalStorage();
    itemLS.map(data => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
            <img src="${data.image}" width=100>
            </td>
            <td>${data.name}</td>
            <td>${data.price}</td>
            <td>${data.code}</td>
            <td>
                <a href="#" class="remove-item btn btn-danger" data-id="${data.code}">X</a>
            </td>
        `;
        appendCartList.appendChild(row);
    });
}

function removeItem(e) {
    e.preventDefault();
    let item, itemId;

    if(e.target.classList.contains('remove-item')) {
        e.target.parentElement.parentElement.remove();
        item = e.target.parentElement.parentElement;
        itemId = item.querySelector('a').getAttribute('data-id');
    }
    
    const items = document.getElementById('qtd-products').children[0];
    
    if( items.innerText > 0) {
        items.innerText -= 1;
    } 

    removeItemFromLS(itemId);

}

function removeItemFromLS(item) {
    let itemLS = getFromLocalStorage();
   
    filteredItem = itemLS.filter(data => data.id !== item.id);

    localStorage.setItem('items', JSON.stringify(filteredItem));
}
// clear cart
function clearCartItems(e) {
    e.preventDefault();
    while(appendCartList.firstChild) {
        appendCartList.removeChild(appendCartList.firstChild);
    }

    localStorage.clear();
    const resetCartQtd = document.getElementById('qtd-products').children[0];
    resetCartQtd.innerText = 0;

    return false;
}

function incrementQtdProductsLS() {
    const items = document.getElementById('qtd-products').children[0];
    const itemsLS = getFromLocalStorage();

    items.innerText = itemsLS.length;
}

function incrementQtdProducts() {
    const items = document.getElementById('qtd-products').children[0];
    const itemsLS = getFromLocalStorage();

    if(!itemsLS[0]) {
        items.innerText = 1;
    } else {
        items.innerText = itemsLS.length + 1;
    }
}

// exec
eventListeners();
addToCart();
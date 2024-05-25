document.querySelector('#btn-food').addEventListener('click', e => {
    location.href = '/index.php/?type=food';
    
});

document.querySelector('#btn-drink').addEventListener('click', e => {
    location.href = '/index.php/?type=drink';
});

document.querySelector('#btn-dessert').addEventListener('click', e => {
    location.href = '/index.php/?type=dessert';
});

document.querySelector('#btn-snack').addEventListener('click', e => {
    location.href = '/index.php/?type=snack';
});




/* 
    This function is to add the menu to order panel

*/

let addProductToOrderpanel = document.querySelectorAll('#add_product_orderpanel');

let productName = document.querySelectorAll('#product_name');
let productPrice = document.querySelectorAll('#product_price');
let productQuantity = document.querySelectorAll('#product_quantity');

addProductToOrderpanel.forEach((element, index) => {
  element.addEventListener('click', function(event) {

    if(parseInt(productQuantity[index].innerHTML) > 0)
    {
        addToOrderPanel(productName[index].innerHTML, productQuantity[index].innerHTML, productPrice[index].innerHTML);
    }

    productQuantity[index].innerHTML = 0;
  });
});


function addToOrderPanel(name, quantity, price) {
    let wrapper = document.querySelector('#orderPanel');

    let container = document.createElement('div');
    container.classList.add('orderList');

    let productName = document.createElement('h4');
    productName.innerHTML = name;

    let productQuantity = document.createElement('div');
    productQuantity.innerHTML = quantity;

    let sum = parseInt(quantity) * parseInt(price);

    let productPrice = document.createElement('div');
    productPrice.id = "product_price"
    productPrice.innerHTML = "P " + sum + ".00";


    let buttonContainer = document.createElement('div');
    buttonContainer.classList.add('order_action');
    let cancelActionButton = document.createElement('button');
    cancelActionButton.id = "order_action_button";
    cancelActionButton.innerHTML = "Cancel";

    container.appendChild(productName);
    container.appendChild(productQuantity);
    container.appendChild(productPrice);
    container.appendChild(buttonContainer);
    buttonContainer.appendChild(cancelActionButton);
    
    wrapper.appendChild(container);


    /* 
        Display the sum of all the product list order
    */
    displayTotal( sum );


/* 
    This function action of button order list remove the order
    if order is remove deduct the total price

*/
    cancelActionButton.addEventListener('click', e => {
        deductTotal( sum );
        container.remove();
    });

}




/* 
    This function action of button in menu increment and decrement quantity

*/

let actionFeild = document.querySelectorAll('#action');
let decrement = document.querySelectorAll('#decrement_button');
let increment = document.querySelectorAll('#increment_button');


decrement.forEach((element, index) => {
    element.addEventListener('click', e => {
        let quantity = parseInt(productQuantity[index].innerHTML, 10); // Convert the innerHTML to an integer

        // Decrement the quantity and update the innerHTML
        if (quantity > 0) productQuantity[index].innerHTML = quantity - 1;
        
    });
});

increment.forEach((element, index) => {
    element.addEventListener('click', e => {
        let quantity = parseInt(productQuantity[index].innerHTML, 10); // Convert the innerHTML to an integer

        // Decrement the quantity and update the innerHTML
        productQuantity[index].innerHTML = quantity + 1;
        
    });
});



/* 
    This function is to display Total Amount and deduct
*/

let displayTotalAmountElement = document.querySelector('#Total_amount');

function displayTotal( sum ) {

    
    let newValue = parseInt(displayTotalAmountElement.innerHTML, 10) + sum;
    displayTotalAmountElement.innerHTML = newValue;

}

function deductTotal( sum ) {

    let newValue = parseInt(displayTotalAmountElement.innerHTML, 10) - sum;
    displayTotalAmountElement.innerHTML = newValue;

}



/* 
    send data to backend
*/

function getRequest( file )
{
    const xhttp = new XMLHttpRequest();
    
    xhttp.open("POST", "/index.php/");
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify(file));

}
const food = document.querySelector('#btn-food');
const drinks = document.querySelector('#btn-drink');
const dessert = document.querySelector('#btn-dessert');
const snack = document.querySelector('#btn-snack');

food.addEventListener('click', e => {
    location.href = '/index.php/?type=food';
    
});

drinks.addEventListener('click', e => {
    location.href = '/index.php/?type=drink';
    drinks.classList.add(".current_page_button_click");
    
});

dessert.addEventListener('click', e => {
    location.href = '/index.php/?type=dessert';
    
});

snack.addEventListener('click', e => {
    location.href = '/index.php/?type=snack';
    
});

document.querySelector('#btn-logout').addEventListener('click', e => {
    location.href = '/index.php/destroy';
    
});


/* 
    send data to backend
*/

async function getRequest( file = {} )
{
    const xhttp = new XMLHttpRequest();
    
    xhttp.open("POST", "/index.php/");
    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.onreadystatechange = function() {

        if (xhttp.readyState === 4 && xhttp.status === 200) { // The request is done

                console.log("Response received: ", xhttp.responseText);
                const response = JSON.parse(xhttp.responseText);
                console.log(response);
                // Do something with the response

        }else console.error("Error in request: ", xhttp.statusText);

    };


    xhttp.send(JSON.stringify(file));

}




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
    productName.id = "product_name_list"
    productName.innerHTML = name;

    let productQuantity = document.createElement('div');
    productQuantity.id = "product_quantity_list";
    productQuantity.innerHTML = quantity;

    let sum = parseInt(quantity) * parseInt(price);

    let productPrice = document.createElement('div');
    productPrice.id = "product_price_list"
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
    modal

*/

let checkOutButton = document.querySelector('#check_out_button');
let modal = document.querySelector('#modal');
let wrapper = document.querySelector('.container');

checkOutButton.addEventListener('click', e => {
    let totalAmout = parseInt(displayTotalAmountElement.innerHTML, 10);

    if(totalAmout > 0)
    {
        let modal = document.querySelector('#modal');
    
        modal.style.display = 'block';

        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.bottom = '0';
        modal.style.left = '0';
        modal.style.right = '0';

        modal.style.display = 'grid';
        modal.style.aligncontent = 'center';
        modal.style.justifycontent = 'center';

        
        wrapper.style.filter = 'blur(8px)';
        wrapper.style.webkitFilter = 'blur(8px)';

        document.querySelector('#modal_display_total').value = displayTotalAmountElement.innerHTML;
        document.querySelector('#modal_receipt').value = JSON.stringify(getAllTheOrderList());
        
    }
    
});


document.querySelector('#modal_cancel').addEventListener('click', e => {

    modal.style.display = 'none';


    wrapper.style.filter = 'none';
    wrapper.style.webkitFilter = 'none';
});



function getAllTheOrderList() {
    let receipt = [];
    let product_names = document.querySelectorAll('#product_name_list');
    let product_quantities = document.querySelectorAll('#product_quantity_list');
    let product_total_prices = document.querySelectorAll('#product_price_list');

    console.log(product_names.length);

    // Assuming product_names, product_quantities, and product_total_prices have the same length
    product_names.forEach((element, index) => {
        receipt.push({
            "product_name": product_names[index].innerHTML,
            "product_quantity": product_quantities[index].innerHTML,
            "product_total_price": product_total_prices[index].innerHTML
        });
    });

    return receipt;
}

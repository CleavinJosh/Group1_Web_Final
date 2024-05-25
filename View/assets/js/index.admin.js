document.querySelector('#btn-food').addEventListener('click', e => {
    location.href = '/index.php/admin?type=food';
    
});

document.querySelector('#btn-drink').addEventListener('click', e => {
    location.href = '/index.php/admin?type=drink';
});

document.querySelector('#btn-dessert').addEventListener('click', e => {
    location.href = '/index.php/admin?type=dessert';
});

document.querySelector('#btn-snack').addEventListener('click', e => {
    location.href = '/index.php/admin?type=snack';
});
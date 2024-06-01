document.querySelector('#reports').addEventListener('click', () => {

    location.href = '/index.php/reports?type=REPORT';

});

document.querySelector('#suggestion').addEventListener('click', () => {

    location.href = '/index.php/reports?type=SUGGESTION';

});

document.querySelector('#add_to_menu').addEventListener('click', () => {

    location.href = '/index.php/reports?type=MENU';

});

document.querySelector('#back_to_admin').addEventListener('click', () => {

    location.href = '/index.php/admin';

});


let viewModalButton = document.querySelectorAll('#view_report');

viewModalButton.forEach((element, index) => {
    element.addEventListener('click', () => {
        
        displayModal();
        contents( index );
        
    });
});

function displayModal() {

    const modal_container = document.querySelector('#modal_container');
    

    modal_container.style.display = 'block';

    modal_container.style.position = 'fixed';
    modal_container.style.top = '0';
    modal_container.style.bottom = '0';
    modal_container.style.left = '0';
    modal_container.style.right = '0';

    modal_container.style.display = 'grid';
    modal_container.style.aligncontent = 'center';
    modal_container.style.justifycontent = 'center';

    modal_container.style.backdropFilter = 'blur(3px)';

}

function contents ( index ){

    let text = document.querySelectorAll('p');
    document.querySelector('.content').innerHTML = text[index].innerHTML;

}

let removeModal = document.querySelectorAll('#remove_modal');

removeModal.forEach(element => {

    element.addEventListener('click', () => {

        modal_container.style.display = 'none';
        modal_container.style.backdropFilter = '';

    });

})


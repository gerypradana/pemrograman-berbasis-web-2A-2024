const textInput = document.getElementById('textInput');
const addButton = document.getElementById('add-button');
const todosContainer = document.querySelector('.todos-container');


addButton.addEventListener('click', () => {
    if (textInput.value.trim().length == '')
        return;

    //  buat div tambahkan kelas TodoItem
    const todoItem = document.createElement('div');
    todoItem.classList.add('todoItem');

    todosContainer.appendChild(todoItem);

    // buat elemen p tambahkan id
    const todoText = document.createElement('p');
    todoText.id = 'todo-text';
    todoText.innerText = textInput.value;
    todoItem.appendChild(todoText);

    // untuk menyelesaikan list tugas double clink
    todoText.addEventListener('dblclick', () => {
        todoText.classList.add('line-through');
    })



    // buat tombol Edit dan gambar
    const editButton = document.createElement('button');
    editButton.id = 'edit-button';
    const editImage = document.createElement('img');
    editImage.src = 'edit.svg';
    editButton.appendChild(editImage);
    todoItem.appendChild(editButton);
    
    //  menambahkan pembaruan edit 
    editButton.addEventListener('click', () => {
        textInput.value = todoText.innerText;
        const parent = editButton.parentElement;
        parent.parentElement.removeChild(parent);
    });


    // buat tombol hapus dan gambar
    const deleteButton = document.createElement('button');
    deleteButton.id = 'delete-button';
    const deleteImage = document.createElement('img');
    deleteImage.src = 'delete.svg';
    deleteButton.appendChild(deleteImage);
    todoItem.appendChild(deleteButton);

    // hasil dengan tombol hapus
    deleteButton.addEventListener('click', () => {
        const parent = deleteButton.parentElement;
        parent.parentElement.removeChild(parent);
    });

//Output setelah melakukan edit maupun hapus    
textInput.value = "";
});


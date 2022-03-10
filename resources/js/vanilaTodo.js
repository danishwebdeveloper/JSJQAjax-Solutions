// JS and JQ Based on 3 things (Selectors , Events and Functions)

// querySelectors
const todoInput = document.querySelector('.todo-input');
const todoButton = document.querySelector('.todo-button');
const todoList = document.querySelector('.todo-list');
const selectTodo = document.querySelector('.todo-actions');

// Events -- addEventListener
todoButton.addEventListener('click', toDoAdd);
todoList.addEventListener('click', deleteCheck);
selectTodo.addEventListener('click', selectFilter);

// Functions
function toDoAdd(event) {
    // browser is refresing, so we will make it as default
    event.preventDefault();

    //make div and give them class
    const todoDiv = document.createElement('div');
    todoDiv.classList.add('todo');

    // make li and make them as child of todoDiv
    const todoLi = document.createElement('li');
    todoLi.classList.add('todolist');
    todoLi.innerText = todoInput.value;
    todoDiv.appendChild(todoLi);

    //no make check sign
    const completedButton = document.createElement('button');
    completedButton.innerHTML = '<li class="fas fa-check"></li>';
    completedButton.classList.add('complete-btn');
    todoDiv.appendChild(completedButton);

    // Make trash Button
    const trashButtom = document.createElement('button');
    trashButtom.innerHTML = "<li class='fas fa-trash'></li>";
    trashButtom.classList.add('trash-btn');
    todoDiv.appendChild(trashButtom);

    // Append to List
    todoList.appendChild(todoDiv);
    // after append clear the input
    todoInput.value = "";
}

// delete function
function deleteCheck(e) {
    const item = e.target;
    if (item.classList[0] == "trash-btn") {
        // jo first we call to the parent item and then delete that whole
        const newItem = item.parentElement;
        newItem.remove();
    }
    // for check mark
    if (item.classList[0] == "complete-btn") {
        const takeItem = item.parentElement;
        takeItem.classList.toggle('completed'); //apply function on that class of completed
    }
}

function selectFilter(e) {
    const todos = selectTodo.childNodes;

    console.log(todos);
    todos.forEach(function(todo) {
        switch (e.target.value) {
            case "all":
                todo.style.display = "flex";
                break;
            case "completed":
                if (todo.classList.contains("completed")) {
                    todo.style.display = "flex";
                } else {
                    todo.style.display = "none";
                }
                break;
            case "uncompleted":
                if (!todo.classList.contains('completed')) {
                    todo.style.display = "flex";
                } else {
                    todo.style.style = "none";
                }
                break;
        }
    });
}
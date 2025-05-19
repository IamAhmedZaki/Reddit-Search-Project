@extends('web.master.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header EB-theme text-white">
                    <h4 class="mb-0">Send Email</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class= "alert alert-success" id="sentSuccess">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('send.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="to" class="form-label">To</label>
                            <input type="email" class="form-control" id="to" name="to" required>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Message</label>
                            <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btnEmail">Send Email</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
    @endsection
    @section('script')
        <script>
            // $(document).ready(function() {
            //     //Only needed for the filename of export files.
            //     //Normally set in the title tag of your page.
    
            //     // DataTable initialisation
            //     $('#example').DataTable({
            //         "dom": '<"dt-buttons"Bf><"clear">lirtp',
            //         "paging": true,
            //         "autoWidth": true,
            //         "buttons": [
    
            //         ]
            //     });
            // });
    
            function copyLink(link) {
                // Create a temporary input element to copy the text
                const tempInput = document.createElement('input');
                tempInput.value = link; // Set the link as the input value
                document.body.appendChild(tempInput); // Add the input to the DOM
                tempInput.select(); // Select the text in the input
                document.execCommand('copy'); // Execute the copy command
                document.body.removeChild(tempInput); // Remove the input element from the DOM
    
                // Optionally, show a success message
                alert('Link copied to clipboard: ' + link);
            }
            
    
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                
                
                
                document.querySelectorAll(".todo-btn").forEach(button => {
                const designId = button.getAttribute("data-design-id");
                updateIncompleteCount(designId);
            });
    
                
        
                // Todo list functionality
        document.querySelectorAll(".todo-btn").forEach(button => {
            button.addEventListener("click", function () {
                const designId = this.getAttribute("data-design-id");
                const designName = this.getAttribute("data-design-name");
    
                document.getElementById("designId").value = designId;
                name=document.getElementById("designName").textContent = "Name: " + designName;
                name.Color='White'
                
    
    
                // Load existing todos for this design
                loadTodos(designId);
    
                const modal = new bootstrap.Modal(document.getElementById("todoListModal"));
                modal.show();
    
            });
        });
    
        // Add new todo item
        document.getElementById("addTodoBtn").addEventListener("click", function () {
            const designId = document.getElementById("designId").value;
            const todoText = document.getElementById("newTodoInput").value.trim();
    
            if (todoText !== "") {
                saveTodo(designId, todoText);
                document.getElementById("newTodoInput").value = "";
            }
        });
    
        // Allow pressing Enter to add todo
        document.getElementById("newTodoInput").addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                document.getElementById("addTodoBtn").click();
            }
        });
    
        
        function updateIncompleteCount(designId) {
            fetch(`/todos/${designId}`)
                .then(response => response.json())
                .then(data => {
                    
                    let incompleteCount = 0;
                    if (data.todos && data.todos.length > 0) {
                        incompleteCount = data.todos.filter(todo => !todo.completed).length;
                    }
                    // Update the counter badge
                    const countElement = document.getElementById(`incompleteCount-${designId}`);
                    if (countElement) {
                        countElement.textContent = incompleteCount;
                    }
                })
                .catch(error => {
                    console.error("Error loading initial todo count:", error);
                });
        }
        
        
        
    
    
    
    function loadTodos(designId) {
        const todoItems = document.getElementById("todoItems");
        todoItems.innerHTML = "";
    
        fetch(`/todos/${designId}`)
            .then(response => response.json())
            .then(data => {
                let incompleteCount = 0;
                
                if (data.todos.length > 0) {
                    
                    
                    data.todos.forEach(todo => {
                        console.log(todo);
                        
                        addTodoToList(todo);
                        if (!todo.completed) {
                            incompleteCount++;  
                        }
                    });
                } else {
                    todoItems.innerHTML = '<li class="list-group-item text-center">No revision tasks yet. Add your first task!</li>';
                }
    
                // Update the counter badge
                const incompleteCountElem = document.getElementById(`incompleteCount-${designId}`);
                if (incompleteCountElem) {
                    incompleteCountElem.textContent = incompleteCount;
                }
            })
            .catch(error => {
                console.error("Error loading todos:", error);
                todoItems.innerHTML = '<li class="list-group-item text-danger">Error loading tasks. Please try again.</li>';
            });
    }
    
    
        function saveTodo(designId, todoText) {
        fetch("/save-todo", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify({ design_id: designId, todo_text: todoText }),
        })
        .then(response => response.json())
        .then(data => {
            // Add the new todo to the list
            addTodoToList(data.todo);
            
            // Explicitly update the incomplete count for this specific design
            const incompleteCountElem = document.getElementById(`incompleteCount-${designId}`);
            if (incompleteCountElem) {
                let currentCount = parseInt(incompleteCountElem.textContent);
                incompleteCountElem.textContent = currentCount + 1;
            }
            
            // Update the global todo counter
            updateTodoCounter();
        })
        .catch(error => {
            console.error("Error saving todo:", error);
            alert("Error saving task. Please try again.");
        });
    }
    
    
        function addTodoToList(todo) {
        const todoItems = document.getElementById("todoItems");
    
        const todoItem = document.createElement("li");
        todoItem.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
        todoItem.setAttribute("data-todo-id", todo.id);
    
        const todoContent = document.createElement("div");
        todoContent.classList.add("todo-item-content", "d-flex", "align-items-center");
    
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.classList.add("todo-checkbox", "mr-2", "form-check-input", "me-2");
    
        const span = document.createElement("span");
        span.classList.add("todo-text", "flex-grow-1");
    
        // Apply completed styling immediately
        if (todo.completed) {
            checkbox.checked = true;
            span.classList.add("text-decoration-line-through", "text-muted");
            todoContent.classList.add("text-muted");
        }
    
        span.textContent = todo.text;
    
        const deleteButton = document.createElement("button");
        deleteButton.classList.add("btn", "btn-sm", "btn-outline-danger", "delete-todo-btn");
        deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
    
        todoContent.appendChild(checkbox);
        todoContent.appendChild(span);
        todoItem.appendChild(todoContent);
        todoItem.appendChild(deleteButton);
        todoItems.appendChild(todoItem);
    
        // If the list only has the "no items" message, clear it first
        if (todoItems.children.length === 1 && todoItems.firstChild.textContent.includes("No revision tasks yet")) {
            todoItems.innerHTML = "";
        }
    
        // Add event listener for checkbox toggle
        checkbox.addEventListener("change", function () {
            toggleTodoCompletion(todoItem, checkbox);
        });
    
        // Add event listener for delete button
        deleteButton.addEventListener("click", function () {
            deleteTodo(todoItem);
        });
    
        return todoItem;
    }
    
    
    
    function toggleTodoCompletion(todoItem, checkbox) {
        const todoId = todoItem.getAttribute("data-todo-id");
        const completed = checkbox.checked;
        const designId = document.getElementById("designId").value;
        const todoText = todoItem.querySelector(".todo-text");
        const todoContent = todoItem.querySelector(".todo-item-content");
        let incompleteCountElem = document.getElementById(`incompleteCount-${designId}`);
    
        fetch(`/update-todo/${todoId}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify({ completed: completed }),
        })
        .then(() => {
            // Toggle completed styling
            if (completed) {
                todoText.classList.add("text-decoration-line-through", "text-muted");
                todoContent.classList.add("text-muted");
            } else {
                todoText.classList.remove("text-decoration-line-through", "text-muted");
                todoContent.classList.remove("text-muted");
            }
    
            // Update incomplete count
            let count = parseInt(incompleteCountElem.textContent);
            incompleteCountElem.textContent = completed ? count - 1 : count + 1;
            updateTodoCounter();
        })
        .catch(error => {
            console.error("Error updating todo status:", error);
            // Revert checkbox if there's an error
            checkbox.checked = !completed;
            alert("Error updating task status. Please try again.");
        });
    }
    
        // Handle todo deletion
        function deleteTodo(todoItem) {
        const todoId = todoItem.getAttribute("data-todo-id");
        const designId = document.getElementById("designId").value;
        let incompleteCountElem = document.getElementById(`incompleteCount-${designId}`);
    
        if (confirm("Are you sure you want to delete this task?")) {
            fetch(`/delete-todo/${todoId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            })
            .then(() => {
                if (!todoItem.querySelector("input[type='checkbox']").checked) {
                    let count = parseInt(incompleteCountElem.textContent);
                    incompleteCountElem.textContent = count - 1;
                }
    
                todoItem.remove();
                updateTodoCounter();
    
                // If no items left, show the "no items" message
                if (document.getElementById("todoItems").children.length === 0) {
                    document.getElementById("todoItems").innerHTML = '<li class="list-group-item text-center">No revision tasks yet. Add your first task!</li>';
                }
            })
            .catch(error => {
                console.error("Error deleting todo:", error);
                alert("Error deleting task. Please try again.");
            });
        }
    }
    
    
    function updateTodoCounter() {
                fetch("/get-incomplete-task")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("todoCounter").textContent = data.count;
                })
                .catch(error => console.error("Error fetching incomplete todos count:", error));
        }
    
        updateTodoCounter();
    
    
    
        
        let cloneButtons = document.querySelectorAll(".cloneButton");
    
        cloneButtons.forEach(button => {
            button.addEventListener("click", function () {
                let designId = this.getAttribute("data-design-id");
                cloneDesign(designId);
            });
        });
        
        function cloneDesign(designId) {
        if (!confirm("Are you sure you want to clone this design?")) {
            return;
        }
    
        fetch(`/clone-design/${designId}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Design cloned successfully!");
                location.reload();
            } else {
                alert("Failed to clone design.");
            }
        })
        .catch(error => {
            console.error("Error cloning design:", error);
            alert("Error cloning design.");
        });
    }
    
    
    });


    let sentSuccess=document.getElementById('sentSuccess')
    if (sentSuccess) {
        setTimeout(() => {
        sentSuccess.style.display='none';    
        }, 5000);
        
    }
        </script>
    @endsection
    
const apiUrl = "http://localhost/coding-test/1/index.php";

function login() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // Send login request to the backend
  fetch(`${apiUrl}/login`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ username, password }),
  })
    .then((data) => {
      if (data.status == 200) {
        document.getElementById("login-form").style.display = "none";
        document.getElementById("crud-form").style.display = "block";
        document.getElementById("logout-btn").style.display = "block";
        // Additional actions on successful login
      } else {
        alert("Login failed. Please check your credentials.");
      }
    })
    .catch((error) => console.error("Error:", error));
}

function logout() {
  // Send logout request to the backend
  fetch(`${apiUrl}/logout`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ logout: true }),
  })
    .then((data) => {
      if (data.status == 200) {
        document.getElementById("login-form").style.display = "block";
        document.getElementById("crud-form").style.display = "none";
        document.getElementById("logout-btn").style.display = "none";
        // Additional actions on successful logout
      } else {
        console.error("Logout failed.");
      }
    })
    .catch((error) => console.error("Error:", error));
}

function loadItems() {
  // Fetch items from the backend
  fetch(`${apiUrl}/items`, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => response.json())
    .then((items) => {
      const itemsList = document.getElementById("items");
      itemsList.innerHTML = "";

      items.forEach((item) => {
        const listItem = document.createElement("li");
        listItem.innerHTML = `<strong>${item.name}</strong>: ${item.description} 
                              <button onclick="editItem(${item.id})">Edit</button>
                              <button onclick="deleteItem(${item.id})">Delete</button>`;
        itemsList.appendChild(listItem);
      });
    })
    .catch((error) => console.error("Error:", error));
}

function addItem() {
  const itemName = document.getElementById("itemName").value;
  const itemDescription = document.getElementById("itemDescription").value;

  // Send add item request to the backend
  fetch(`${apiUrl}/items`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      addItem: true,
      name: itemName,
      description: itemDescription,
    }),
  })
    .then((data) => {
      if (data.status == 200) {
        loadItems(); // Refresh the item list after adding an item
        // Additional actions on successful item addition
      } else {
        console.error("Failed to add item.");
      }
    })
    .catch((error) => console.error("Error:", error));
}

function editItem(itemId) {
  // Implement edit functionality (Update item details)
  // You can use a modal or update the form fields for editing
  // This is a simplified example, and you may need to customize it
  const newName = prompt("Enter new name:");
  const newDescription = prompt("Enter new description:");

  // Send update item request to the backend
  fetch(`${apiUrl}/items`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      updateItem: true,
      id: itemId,
      name: newName,
      description: newDescription,
    }),
  })
    .then((data) => {
      if (data.status == 200) {
        loadItems(); // Refresh the item list after updating an item
        // Additional actions on successful item update
      } else {
        console.error("Failed to update item.");
      }
    })
    .catch((error) => console.error("Error:", error));
}

function deleteItem(itemId) {
  // Confirm the deletion before proceeding
  const confirmDeletion = confirm("Are you sure you want to delete this item?");

  if (confirmDeletion) {
    // Send delete item request to the backend
    fetch(`${apiUrl}/items`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        deleteItem: true,
        id: itemId,
      }),
    })
      .then((data) => {
        if (data.status == 200) {
          loadItems(); // Refresh the item list after deleting an item
          // Additional actions on successful item deletion
        } else {
          console.error("Failed to delete item.");
        }
      })
      .catch((error) => console.error("Error:", error));
  }
}

// Load items when the page is loaded
loadItems();

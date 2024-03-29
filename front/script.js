fetch("http://localhost:8100/Product")
    .then(response => response.json())
    .then(data => {
        console.log(data)
        let items = data["data"]
        const product_list = document.getElementById("product-list");
        items.forEach(item => {
            const product = document.createElement("a");
            product.href = "product.html?id=" + item.id;
            const product_div = document.createElement("div");
            const product_img = document.createElement("img");
            product_img.src = item.url;
            const product_name = document.createElement("p");
            product_name.innerText = item.name;
            const product_price = document.createElement("p");
            product_price.innerText = item.price + "€";
            product_div.appendChild(product_img);
            product_div.appendChild(product_name);
            product_div.appendChild(product_price);
            product.appendChild(product_div);
            product_list.appendChild(product);
        });
    }
    );

// get from my local storage item devops-token
let token = localStorage.getItem("devops-token");
fetch("http://localhost:8100/user/getinfo", {
    method: 'POST',
    mode: 'cors',
    body: JSON.stringify({ session_id: token })
})
    .then(response => response.json())
    .then(data => {
        let user = data["data"]
        console.log(user.user_data)
        if (user === "Not logged") {
            const nav_header = document.getElementById("nav-header");
            const nav_li1 = document.createElement("li");
            const nav_li2 = document.createElement("li");
            const nav_li3 = document.createElement("li");
            const nav_a1 = document.createElement("a");
            const nav_a2 = document.createElement("a");
            const nav_a3 = document.createElement("a");
            nav_a1.href = "index.html";
            nav_a1.innerText = "Nos produits";
            nav_a2.href = "login.html";
            nav_a2.innerText = "Connexion";
            nav_a3.href = "register.html";
            nav_a3.innerText = "Inscription";
            nav_li1.appendChild(nav_a1);
            nav_li2.appendChild(nav_a2);
            nav_li3.appendChild(nav_a3);
            nav_header.appendChild(nav_li1);
            nav_header.appendChild(nav_li2);
            nav_header.appendChild(nav_li3);
        } else if (user.user_data) {
            const nav_header = document.getElementById("nav-header");
            const nav_li1 = document.createElement("li");
            const nav_li2 = document.createElement("li");
            const nav_li3 = document.createElement("li");
            const nav_a1 = document.createElement("a");
            const nav_a2 = document.createElement("a");
            const nav_a3 = document.createElement("a");
            nav_a1.href = "index.html";
            nav_a1.innerText = "Nos produits";
            nav_a2.href = "profile.html";
            nav_a2.innerText = "Profil";
            nav_a3.innerText = "Deconnexion";
            nav_a3.id = "logout";
            nav_li1.appendChild(nav_a1);
            nav_li2.appendChild(nav_a2);
            nav_li3.appendChild(nav_a3);
            nav_header.appendChild(nav_li1);
            nav_header.appendChild(nav_li2);
            nav_header.appendChild(nav_li3);
            nav_a3.addEventListener("click", () => {
                // remove the token from the local storage
                localStorage.removeItem("devops-token");
                // redirect to the index page
                window.location.href = "index.html";
            });
        }
    }
    );
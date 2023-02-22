fetch("http://localhost:8184/api/auth")
        .then(response => response.json())
        .then(data => {
            const product_list = document.getElementById("product-list");
            data.forEach(item => {
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
        });
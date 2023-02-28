fetch('https://dummyjson.com/products')
    .then((response) => response.json())
    .then((data) => {
        for(i=0; i<data["products"].length; i++) {
            p = data["products"][i];


            card = document.createElement('div');
            card.className = 'result';
            card.innerHTML = 
            '<div class="card">'
            + '<div class="imgBox">'
            + '     <img src="' + p["images"][0] +  '" alt="' + p["description"] +  '" class="mouse">'
            + ' </div>'
            + ' <div class="contentBox">'
            + '   <h3>' + p["title"] +  '</h3>'
            + '   <h2 class="price">' + p["price"] + ' USD</h2>'
            + '   <a href="#" class="buy">Buy now</a>'
            + ' </div>'
            + ' </div>'
            ;

            document.getElementsByClassName('container')[0].appendChild(card);
        }
    })
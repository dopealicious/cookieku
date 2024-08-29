const title = 'data-cart'

function Delete(index) {
  let $isAvailable = localStorage.getItem("data-cart");
  $isAvailable = JSON.parse($isAvailable);

  $isAvailable.splice(index, 1);

  localStorage.setItem("data-cart", JSON.stringify($isAvailable));
  location.reload();
}

function IncreaseQuantity(index) {
  let $isAvailable = localStorage.getItem("data-cart");
  $isAvailable = JSON.parse($isAvailable);

  $isAvailable[index].kuantitas += 1;

  localStorage.setItem("data-cart", JSON.stringify($isAvailable));
  location.reload();
}

function DecreaseQuantity(index) {
  let $isAvailable = localStorage.getItem("data-cart");
  $isAvailable = JSON.parse($isAvailable);

  if ($isAvailable[index].kuantitas > 1) {
    $isAvailable[index].kuantitas -= 1;

    localStorage.setItem("data-cart", JSON.stringify($isAvailable));
    location.reload();
  }
}

// ordering
window.addEventListener("load", () => {
  if ('data-cart' in localStorage) {
    document.getElementById('payment').style.display = 'block';
    let tableData = '';
    tableData += '<tr><th>No.</th><th>Item Name</th><th>Quantity</th><th>Price</th><th></th></tr>';
    if (JSON.parse(localStorage.getItem('data-cart'))[0] === null) {
      tableData += '<tr><td colspan="5">No items found</td></tr>'
    } else {
      JSON.parse(localStorage.getItem("data-cart")).map((_item, index) => {
        tableData +=
          "<tr><th>" +
          _item.id_kue +
          "</th><th>" +
          _item.nama_kue +
          "</th><th><button onclick='DecreaseQuantity(" +
          index +
          ")'>-</button>&nbsp;<span id='itemQuantity-" +
          index +
          "'>" +
          _item.kuantitas +
          "</span>&nbsp;<button onclick='IncreaseQuantity(" +
          index +
          ")'>+</button></th><th>" +
          _item.harga_kue +
          '</th><th><a href="#" onclick="Delete(' +
          index +
          ');"><i class="fas fa-times"></i></a></th></tr>';
      });
    }
    document.getElementById('payment').innerHTML = tableData;
  } else {
    XMLDocument
    document.getElementById('payment').style.display = 'none';
  }
  
  let kuantitas = 0;
  let totalPrice = 0;
  JSON.parse(localStorage.getItem(title)).map(_item=>{
    kuantitas = kuantitas + _item.kuantitas;
    stok = _item.stok_kue - kuantitas;
    totalPrice = totalPrice + _item.kuantitas * _item.harga_kue;
  });
  const totalItemsElement = document.getElementById("total-items");
  const totalPriceElement = document.getElementById("total-price");
      
  totalItemsElement.innerHTML = kuantitas;
  totalPriceElement.innerHTML = totalPrice;
});


// checkout index
window.addEventListener("load", () => {
  // console.log('reload');
  if ("data-cart" in localStorage) {
    if( document.getElementById('hasil'))
      document.getElementById('hasil').style.display = 'block';
    let tableData = '';
    tableData += '<tr><th>No.</th><th>Item Name</th><th>Quantity</th><th>Price</th><th></th></tr>';
    if(JSON.parse(localStorage.getItem('data-cart'))[0] === null){
      tableData += '<tr><td colspan="5">No items found</td></tr>'
    }else{
      JSON.parse(localStorage.getItem("data-cart")).map((_item, index) => {
        tableData +=
          "<tr><th>" +
          _item.id_kue +
          "</th><th>" +
          _item.nama_kue +
          "</th><th><button onclick='DecreaseQuantity(" +
          index +
          ")'>-</button>&nbsp;<span id='itemQuantity-" +
          index +
          "'>" +
          _item.kuantitas +
          "</span>&nbsp;<button onclick='IncreaseQuantity(" +
          index +
          ")'>+</button></th><th>" +
          _item.harga_kue +
          '</th><th><a href="#" onclick="Delete(' +
          index +
          ');"><i class="fas fa-times"></i></a></th></tr>';
      });
    }
    if(document.getElementById('hasil'))
      document.getElementById('hasil').innerHTML = tableData;
  } else {
    // XMLDocument
    if(document.getElementById('hasil'))
      document.getElementById('hasil').style.display = 'none';
  }
    // const isThereAnyCarts = localStorage.getItem(title)

    // if(isThereAnyCarts){
    //   console.log("from store", JSON.parse(isThereAnyCarts))
    // }
   
    const addCartButtons = document.getElementsByClassName('cart-nambah');
    if(addCartButtons){
      for (let i = 0; i < addCartButtons.length; i++) {
        addCartButtons[i].addEventListener("click", (e) => {

          const $newData = JSON.parse(event.target.getAttribute('data-cart'))
          // JSON itu string isinya data
          // untuk baca data asli JSON pake JSON.parse()
          // untuk menjadikan data asli ke JSON pakai JSON.stringify()

          let $isAvailable = localStorage.getItem(title) // JSON string

          $isAvailable = JSON.parse($isAvailable) // JData Asli Dari JSON, berupa []

          let $isProductExists = $isAvailable && $isAvailable.find(_item => _item.id_kue == $newData.id_kue) // object atau undefined

          let $bodyBaru = {
              ...$newData,
            kuantitas: 1
            }
          if($isAvailable) { // undefined atau string
            // ada array
              if($isProductExists){
                // item sudah pernah ditambahkan
                $isProductExists.kuantitas += 1
                $bodyBaru = $isProductExists
              }

              // [1, 2, 3]

              // 4

              // [...[1, 2, 3], 4] => [1, 2, 3, 4]
              // [...[1, 2, 3], 3] => [1, 2, 3, 3]
              // [...[1, 2, 3], 3] [...[1, 2], 3] => [1, 2, 3]

              // [1. 2. 3. [4]]

              // 

              // [1, 2, 3, 4]
              localStorage.setItem(title, JSON.stringify([...$isAvailable.filter(_item => _item.id_kue !== $bodyBaru.id_kue), $bodyBaru]))
              location.reload();
          } else {
            // buat array
            localStorage.setItem(title, JSON.stringify([$bodyBaru]))
            location.reload();
          }
           	//adding cartbox data in table
        }) 
      }
  }
        // adding data to shopping cart 
        const iconShoppingP = document.querySelector('.cart-icons p');
        let kuantitas = 0;
        let totalPrice = 0;
        JSON.parse(localStorage.getItem(title)).map(_item=>{
          kuantitas = kuantitas + _item.kuantitas;
          totalPrice = totalPrice + _item.kuantitas * _item.harga_kue;
        });
        iconShoppingP.innerHTML = kuantitas;
        const totalItemsElement = document.getElementById("total-items");
        const totalPriceElement = document.getElementById("total-price");
            
        totalItemsElement.innerHTML = kuantitas;
        totalPriceElement.innerHTML = totalPrice;
      

});


// window.addEventListener("DOMContentLoaded", () => {
//   const addedDataParam =
//     "<?php echo isset($_GET['data']) ? $_GET['data'] : '' ?>";
//   const addedData = addedDataParam
//     ? decodeURIComponent(addedDataParam).split(",")
//     : [];

//   let totalItems = 0;
//   let totalPrice = 0;

//   if (addedData && addedData.length > 0) {
//     let tableData = "";

//     addedData.forEach((item, index) => {
//       const itemData = item.split("|");
//       const itemName = itemData[0];
//       const itemNo = itemData[1];
//       const itemPrice = parseFloat(itemData[2]);

//       if (!isNaN(itemPrice)) {
//         totalItems += 1;
//         totalPrice += itemPrice;

//         tableData += `<tr><td>${
//           index + 1
//         }</td><td>${itemName}</td><td>${itemNo}</td><td>${itemPrice.toFixed(
//           2
//         )}</td></tr>`;
//       }
//     });

//     document.getElementById("hasil").style.display = "block";
//     document.getElementById("hasil").innerHTML += tableData;
//   } else {
//     document.getElementById("hasil").style.display = "none";
//     document.getElementById("hasil").innerHTML =
//       "<tr><td colspan='4'>No items found.</td></tr>";
//   }

//   // Menampilkan total items dan total price
//   document.getElementById("total-items").textContent = totalItems.toString();
//   document.getElementById("total-price").textContent = totalPrice
//     .toFixed(2)
//     .toString();
// });
  
            // localStorage.setItem(title, JSON.stringify([JSON.parse()]));
            // let newCart = localStorage.setItem(title, JSON.parse.target.getAttribute('data-cart'));
            // let existingCarts = JSON.parse(localStorage.getItem(title)) || [];
  
            // console.log(newCart);
            // console.log(existingCart);
  
            // // Check if the new cart's ID already exists in the existing carts
            // const existingCartIndex = existingCarts.findIndex(cart => cart.id === newCart.id);
  
            // if (existingCartIndex > -1) {
            //   const existingCart = existingCarts[existingCartIndex];
            //   if (existingCart.items && Array.isArray(existingCart.items)) {
            //     // If existingCart.items is defined and an array, push newCart.items to it
            //     existingCart.items.push(...newCart.items);
            //   } else {
            //     // If existingCart.items is not defined or not an array, create a new array with newCart.items
            //     existingCart.items = Array.isArray(newCart.items) ? newCart.items : [newCart.items];
            //   }
            // } else {
            //   // If the ID doesn't exist, add the new cart as a separate entry
            //   existingCarts.push(newCart);
            // }
  
            // localStorage.setItem(title, JSON.stringify(existingCarts));
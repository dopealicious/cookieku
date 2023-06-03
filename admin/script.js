var adminInfo = document.querySelector(".admin-info");
var dropdownMenu = document.querySelector(".dropdown-menu");

adminInfo.addEventListener("click", function () {
  dropdownMenu.classList.toggle("show");
});

// ----------------------STOK KUE ------------------------------------
let cakes = [
  {
    id: "001",
    name: "Kue Coklat",
    price: 10000,
    stock: 10,
    detail: "Kue coklat lezat dengan lapisan ganache.",
    image: "coklat.jpg",
  },
  {
    id: "002",
    name: "Kue Keju",
    price: 12000,
    stock: 15,
    detail: "Kue keju dengan topping gurih dan manis.",
    image: "keju.jpg",
  },
  {
    id: "003",
    name: "Kue Strawberry",
    price: 15000,
    stock: 5,
    detail: "Kue dengan rasa segar dan manisnya buah strawberry.",
    image: "strawberry.jpg",
  },
];

let selectedCakeIndex = null;

// Menampilkan data kue pada tabel
function renderCakes() {
  const cakeTable = document.querySelector("#cakeList tbody");
  cakeTable.innerHTML = "";

  cakes.forEach((cake, index) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${cake.id}</td>
      <td>${cake.name}</td>
      <td>${cake.price}</td>
      <td>${cake.stock}</td>
      <td>${cake.detail}</td>
      <td><img src="${cake.image}" width="100" height="100"></td>
      <td><button class="btn" onclick="editCake(${index})">Edit</button></td>
      <td><button class="btn" onclick="deleteCake(${index})">Hapus</button></td>
    `;

    cakeTable.appendChild(row);
  });
}

// Menambahkan kue baru
function addCake() {
  const cakeID = document.querySelector("#cakeID").value;
  const cakeName = document.querySelector("#cakeName").value;
  const cakePrice = document.querySelector("#cakePrice").value;
  const cakeStock = document.querySelector("#cakeStock").value;
  const cakeDetail = document.querySelector("#cakeDetail").value;
  const cakeImage = document.querySelector("#cakeImage").value;

  if (cakeID && cakeName && cakePrice && cakeStock && cakeDetail && cakeImage) {
    const newCake = {
      id: cakeID,
      name: cakeName,
      price: parseInt(cakePrice),
      stock: parseInt(cakeStock),
      detail: cakeDetail,
      image: cakeImage,
    };

    cakes.push(newCake);
    renderCakes();
    clearForm();
  }
}

// Menghapus kue
function deleteCake(index) {
  cakes.splice(index, 1);
  renderCakes();
}

// Menampilkan form edit kue
function editCake(index) {
  selectedCakeIndex = index;
  const cake = cakes[index];
  document.querySelector("#editCakeID").value = cake.id;
  document.querySelector("#editCakeName").value = cake.name;
  document.querySelector("#editCakePrice").value = cake.price;
  document.querySelector("#editCakeStock").value = cake.stock;
  document.querySelector("#editCakeDetail").value = cake.detail;
  document.querySelector("#editCakeImage").value = cake.image;
  document.querySelector("#addCakeForm").style.display = "none";
  document.querySelector("#editCakeForm").style.display = "block";
}

// Mengupdate data kue yang diedit
function updateCake() {
  const newID = document.querySelector("#editCakeID").value;
  const newName = document.querySelector("#editCakeName").value;
  const newPrice = document.querySelector("#editCakePrice").value;
  const newStock = document.querySelector("#editCakeStock").value;
  const newDetail = document.querySelector("#editCakeDetail").value;
  const newImage = document.querySelector("#editCakeImage").value;

  if (newID && newName && newPrice && newStock && newDetail && newImage) {
    const updatedCake = {
      id: newID,
      name: newName,
      price: parseInt(newPrice),
      stock: parseInt(newStock),
      detail: newDetail,
      image: newImage,
    };

    cakes[selectedCakeIndex] = updatedCake;
    renderCakes();
    cancelEdit();
  }
}

// Membatalkan edit kue
function cancelEdit() {
  selectedCakeIndex = null;
  clearEditForm();
  document.querySelector("#addCakeForm").style.display = "block";
  document.querySelector("#editCakeForm").style.display = "none";
}

// Mengosongkan form tambah kue
function clearForm() {
  document.querySelector("#cakeID").value = "";
  document.querySelector("#cakeName").value = "";
  document.querySelector("#cakePrice").value = "";
  document.querySelector("#cakeStock").value = "";
  document.querySelector("#cakeDetail").value = "";
  document.querySelector("#cakeImage").value = "";
}

// Mengosongkan form edit kue
function clearEditForm() {
  document.querySelector("#editCakeID").value = "";
  document.querySelector("#editCakeName").value = "";
  document.querySelector("#editCakePrice").value = "";
  document.querySelector("#editCakeStock").value = "";
  document.querySelector("#editCakeDetail").value = "";
  document.querySelector("#editCakeImage").value = "";
}

// Memanggil fungsi renderCakes saat halaman dimuat
window.onload = renderCakes;

window.addEventListener("load", () => {
  document.getElementById("order").addEventListener("click", async () => {
    if ("data-cart" in localStorage) {
      var id_customer = Number(String(document.getElementById("id_customer").innerHTML).trim());
      var name_customer = String(document.getElementById("name_customer").innerHTML).trim();
      var bukti = document.getElementById("ProofOfPayment").files[0];
      const bukti_pembayaran = await new Promise((resolve, _) => {
        var reader = new FileReader();
        reader.onloadend = () => resolve(reader.result)
        reader.readAsDataURL(new Blob([bukti], { type: bukti.type }));
      })


      const $body = JSON.parse(localStorage.getItem("data-cart"))?.map(
        (_item, _idx) => ({
          id_customer,
          id_kue: _item.id_kue,
          name_customer,
          nama_kue: _item.nama_kue,
          harga_kue: Number(_item.harga_kue),
          total_pesanan: _item.kuantitas,
          stok: Number(_item.stok_kue||0),
          total_harga: Number(_item.kuantitas) * Number(_item.harga_kue),
          tanggal_pesanan: new Date().toISOString().split("T")[0],
          bukti_pembayaran,
        })
      );
      var httpc = new XMLHttpRequest(); // simplified for clarity
      httpc.open("POST", "test.php", true); // sending as POST
    
      httpc.onreadystatechange = function () {
        //Call a function when the state changes.
        
        if (httpc.readyState == 4 && httpc.status == 200) {
          localStorage.clear();
          location.href = "http://localhost/a/customer-index.php"
          alert(httpc.responseText);
        } else if(httpc.status == 400) {
          alert(httpc.responseText);
        }
      };
      httpc.send(JSON.stringify($body));
    }
  });
});

function callPHP(params) {
  var httpc = new XMLHttpRequest(); // simplified for clarity
  var url = "get_data.php";
  httpc.open("POST", url, true); // sending as POST

  httpc.onreadystatechange = function () {
    //Call a function when the state changes.
    if (httpc.readyState == 4 && httpc.status == 200) {
      // complete and no errors
      alert(httpc.responseText); // some processing here, or whatever you want to do with the response
    }
  };
  httpc.send(params);
}

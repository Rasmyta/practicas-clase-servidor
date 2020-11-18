document.addEventListener("DOMContentLoaded", async () => {
  await getProducts();

  document.querySelectorAll(".add-product").forEach((product) => {
    product.addEventListener("click", async (e) => {
      await addCartProduct(e);
      await getCartNumItems();
    });
  });
});

async function getProducts() {
  let data = await fetchData({
    actionData: {
      name: "productAction",
      action: "getProducts",
    },
    url: "controller/productsController.php",
  });

  document.getElementById("products-container").innerHTML = data;
}

async function addCartProduct(e) {
  let formData = new FormData();
  formData.append("id", e.currentTarget.dataset.id);
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "addCartProduct",
    },
    formData: formData,
    url: "controller/cartProductsController.php",
  });
}

document.addEventListener("DOMContentLoaded", async () => {
  await getCartNumItems();
});

async function getCartNumItems() {
  let data = await fetchData({
    actionData: {
      name: "cartAction",
      action: "getCartNumItems",
    },
    url: "controller/cartProductsController.php",
  });
  document.getElementById("cart-num-items").textContent = data;
}

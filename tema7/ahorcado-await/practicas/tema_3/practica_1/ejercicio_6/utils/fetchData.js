/**
 * Fetches HTML genereted text from the server
 * @param {string} action Action to perform before getting the data back
 * @param {FormData} formData Data you want to send - default empty FormData
 * @return {string} Returns the data in HTML form or a string with 'error'
 */
async function fetchData({ actionData, formData, url }) {
  if (!formData) {
    formData = new FormData();
  }
  formData.append(actionData.name, actionData.action);

  try {
    let res = await fetch(url, {
      method: "POST",
      body: formData,
    });

    if (res.ok) {
      let data = await res.text();
      return data;
    } else {
      console.log(err);
    }
  } catch (err) {
    console.log(err);
  }

  return "Something went wrong";
}

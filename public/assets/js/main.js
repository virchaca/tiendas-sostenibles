"use strict";

// back to top button
document.addEventListener("DOMContentLoaded", function () {
  const backToTopButton = document.getElementById("backToTop");

  if (backToTopButton) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 300) {
        backToTopButton.classList.remove("hidden");
      } else {
        backToTopButton.classList.add("hidden");
      }
    });
  }
});

// guardar datos contatc-form
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".contact-form-js");

  if(!form) return;
  form.addEventListener("submit", function () {
      const contactName = document.getElementById("name").value;
      const contacEmail = document.getElementById("email").value;

      localStorage.setItem("contact_name", contactName);
      localStorage.setItem("contact_email", contacEmail);
  });
});

//recuperar
document.addEventListener("DOMContentLoaded", function () {
  const contactName = localStorage.getItem("contact_name") || "Usuario";
  const contactEmail = localStorage.getItem("contact_email") || "proporcionado";

  const contactNameElement = document.getElementById("user-name");
  const contactEmailElement = document.getElementById("user-email");

  if(contactNameElement){
    contactNameElement.textContent = contactName;
  }
  if(contactEmailElement){
    contactEmailElement.textContent = contactEmail;
  }

  // Opcional: Limpiar localStorage después de mostrar los datos
  localStorage.removeItem("contact_name");
  localStorage.removeItem("contact_email");
});


//guardar datos new-shop-form
document.addEventListener("DOMContentLoaded", function () {

  const newShopForm = document.querySelector(".new-shop-form-js");
  
  if(!newShopForm) return;
  newShopForm.addEventListener("submit", function () {
    const shopName = document.getElementById("shop-name").value;
    const shopEmail = document.getElementById("shop-email").value;

    localStorage.setItem("shop_name", shopName);
    localStorage.setItem("shop_email", shopEmail);
  });

});

//recuperar datos new-shop-form

document.addEventListener('DOMContentLoaded', function(){

  const shopName = localStorage.getItem('shop_name') || 'indicada en el formulario';
  const shopEmail = localStorage.getItem('shop_email') || 'proporcionado';
  
  const newShopNameElement = document.getElementById("new-shop-name");
  const newShopEmailElement = document.getElementById("new-shop-email");

  if(newShopNameElement) {
    newShopNameElement.textContent = shopName;
  }
  if(newShopEmailElement) {
    newShopEmailElement.textContent = shopEmail;
  }

  localStorage.removeItem("shop_name");
  localStorage.removeItem("shop_email");
});
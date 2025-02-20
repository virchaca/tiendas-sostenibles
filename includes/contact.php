<?php
// session_start();

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $_SESSION["name"] = $_POST["name"] ?? "";
//     $_SESSION["email"] = $_POST["email"] ?? "";
// }
?>


<section class="contact-container">
    <div class="contact-details">
        <h3>Información de contacto</h3>

        <p>correo electrónico: <a href="mailto:virginia.alvarez82@gmail.com" target="_blank">virginia.alvarez82@gmail.com</a> </p>
        <p>Teléfono: <a href="tel:+34680749185">680 749 185</a> </p>
        <p>Github: <a href="https://github.com/virchaca" target="_blank">virchaca</a> </p>
        <p>LinkedIn: <a href="https://www.linkedin.com/in/virginia-alvarezperez/" target="_blank">virginia-alvarezperez</a> </p>
    </div>

    <div class="contact-form-div">
        <form
            action="https://formsubmit.co/virginia.alvarez82@gmail.com"
            method="POST"
            class="contact-form contact-form-js">

            <input
                class="contact-input"
                type="text"
                id="name"
                name="name"
                placeholder="Nombre" required />

            <input
                class="contact-input"
                type="email"
                id="email"
                name="email"
                placeholder="Email" required />

            <textarea
                class="textarea"
                name="message"
                id="textarea"
                cols="15"
                rows="5"
                placeholder="Escribe tu mensaje"></textarea>

            <input class="btnSubmit" type="submit" value="enviar" />

            <input
                type="hidden"
                name="_next"
                value="http://localhost/mapview/index.php?page=contact-reply" />
            <input type="hidden" name="_captcha" value="false" />
        </form>
    </div>
</section>

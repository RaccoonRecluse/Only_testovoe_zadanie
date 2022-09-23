//регистрация
function registration(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/registration",
        data: $('#form').serialize(),
        dataType: "html",
        success: function (response) {
            alert(response);
            //Понимаю что это костыль, но по другому не уверен как сделать
            if (response == "Successed registration") window.location.href = "/profile"
        }
    });

}
//Выход из профиля
function logout() {
    $.ajax({
        type: "POST",
        url: "/logout",
        success: function (response) {
            alert(response);
            window.location.href = "/register"
        }
    });

}
//Авторизация
function auth(e) {
    e.preventDefault();

    let captcha = grecaptcha.getResponse();
    if (!captcha) {
        alert("You didn't pass the captcha")
    } else {
        $.ajax({
            type: "POST",
            url: "/auth",
            data: $('#form').serialize(),
            dataType: "html",
            success: function (response) {
                alert(response);
                if (response == "Successfully login") window.location.href = "/profile"
            }
        });
    }
}
//высвечивает форму изменения
function change(param) {
    let str =
        `<div class="changeForm">
            <form method="post" onsubmit="save('${param}', event)">`
    if (param == "email") str += `<input id="newValue" type="email" placeholder="New email" required>`
    if (param == "phone_number") str += `<input id="newValue" type="tel" minlength="11" maxlength="11" placeholder="New phone number" required pattern="[0-9]{11}">`
    if (param == "name") str += `<input id="newValue" type="text" placeholder="New name" required>`
    if (param == "password") str += `<input id="newValue" type="password" placeholder="New password" required>`
    str += `<button type="submit" >Save</button>
                <button onclick="back()">Back</button>
            </form>
        </div>`;
    document.body.innerHTML += str;
}
//удалаяет форму изменения
function back() {
    document.querySelector('.changeForm').remove();
}
// сохраняет введённые в форму данные
function save(param, e) {
    e.preventDefault();
    let newValue = document.getElementById("newValue").value;
    $.ajax({
        type: "POST",
        url: "/change",
        data: { "param": param, "value": newValue },
        dataType: "html",
        success: function (response) {
            alert(response);
            back()
            //Понимаю что это костыль, но по другому не уверен как сделать
            if (response == "Successfully changed") window.location.href = "/profile"
        }
    });
}
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Groom Room</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/icons-style.css">
</head>

<body>
  <div class="wrapper" id="app">
    <header class="header">
      <div class="header__container">
        <div class="header__logo"><span>GROOMING</span>Service for dogs and cats</div>
        <nav class="header__menu">
          <a href="/" class="header__link icon-home active"><span>ГЛАВНАЯ</span></a>
          <a href="auth.php" class="header__link icon-key"><span>ВХОД</span></a>
        </nav>
      </div>
    </header>
    <main class="main">
      <section class="main__application application">
        <div class="application__container">
          <div class="application__left">
            <h1 class="application__title">Войдите или зарегистрируйтесь</h1>
            <div class="application__text">Чтобы получить возможность<br>добавить заявку</div>
          </div>
          <div class="application__form form form_img">
            <img src="img/cat-dog.png" alt="">
            <div class="form__title">
              <a href="#" class="form__link active" v-on:click="auth">Вход</a>
              <a href="#" class="form__link" v-on:click="reg">Регистрация</a>
            </div>
            <input type="text" name="" class="" placeholder="Введите логин" v-bind:value="login" v-on:input="getLogin">
            <input type="text" name="" class="" placeholder="Введите пароль" v-bind:value="password" v-on:input="getPassword">
            <button class="form__btn" v-on:click="User('LOGIN_USER')">Войти</button>
            <button class="form__btn" style="display:none;" v-on:click="User('REGISTR_USER')">Регистрация</button>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">groom-salon.com 2000-2999</footer>
  </div>
  <script src="js/vue.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
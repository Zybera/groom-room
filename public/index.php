<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Groom Room</title>
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/icons-style.css">
</head>

<body>
  <div class="wrapper" id="app">
    <header class="header">
      <div class="header__container">
      <div class="header__logo"><span>GROOMING</span>Service for dogs and cats</div>
        <nav class="header__menu">
          <a href="/" class="header__link icon-home active"><span>ГЛАВНАЯ</span></a>
          <a href="auth" class="header__link icon-key linkIn"><span>ВХОД</span></a>
          <a href="applications" class="header__link icon-profile linkProfile" style="display: none;"><span>КАБИНЕТ</span></a>
          <a href="#" class="header__link icon-key linkOut" v-on:click="out" style="display: none;"><span>ВЫХОД</span></a>
        </nav>
      </div>
    </header>
    <main class="main">
      <section class="main__application application">
        <div class="application__container">
          <h1 class="application__title">Профессиональная укладка<br>для ваших домашних<br>питомцев</h1>
          <div class="application__form form" >
            <div class="form__title">Создайте заявку</div>
            <input type="text" name="" class="" placeholder="Кличка домашнего животного" v-bind:value="name" v-on:input="getName">
            <select  v-on:input="getCategory">
              <option>Категория заявки</option>
              <option>Стрижка</option>
              <option>Мытье</option>
              <option>Педикюр</option>
            </select>
            <button v-on:click="add">Записаться</button>
          </div>
        </div>
      </section>
      <section class="main__our-works our-works">
        <div class="our-works__container">
          <h2 class="our-works__title">Наши работы</h2>
          <div class="our-works__gallery">
            <div class="our-works__card card" v-for="app in apps">
              <div class="card__img">
                <img :src="app.img" alt="dog">
              </div>
              <div class="card__name">{{app.name}} {{app.category}} {{app.status}}</div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">groom-salon.com 2000-2999</footer>
  </div>
  <script src="public/js/vue.js"></script>
  <script src="public/js/script.js"></script>
</body>

</html>
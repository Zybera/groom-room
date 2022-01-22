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
          <a href="/" class="header__link icon-home"><span>ГЛАВНАЯ</span></a>
          <a href="applications" class="header__link icon-profile active"><span>Кабинет</span></a>
          <a href="#" class="header__link icon-key linkOut" v-on:click="out" style="display: none;"><span>ВЫХОД</span></a>
        </nav>
      </div>
    </header>
    <main class="main">
      <section class="main__application application">
        <div class="application__container">
          <div class="application__left">
            <h1 class="application__title top">Мои заявки</h1>
            <div class="application__card card-application" v-for="app in apps">
              <div class="card-application__img">
                <img :src="app.img" alt="dog">
              </div>
              <div class="card-application__info">
                <div class="card-application__title">Заявка №{{app.id}}</div>
                <div class="card-application__text">{{app.name}} {{app.category}} {{app.status}}</div>
              </div>
            </div>
          </div>
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
    </main>
    <footer class="footer">groom-salon.com 2000-2999</footer>
  </div>
  <script src="public/js/vue.js"></script>
  <script src="public/js/script.js"></script>
</body>

</html>
const app = new Vue({
  el: '#app',
  data: {
    name: "",
    category: "",
    login: "",
    password: "",
    apps: [],
  },
  methods: {
    add: function () {
      if (!sessionStorage.login) {
        window.location.href = "/auth";
      }else {
          if (this.name !== "" && this.category !== "") {
          var data = { type: "ADD_APPLICATIONS", name: this.name, category: this.category };
          var fd = new FormData();
          for (var i in data) {
            fd.append(i, data[i]);
          }
          fetch("http://groom-room/utils/Applications.php", {
            method: "POST",
            body: fd,
          })
            .then((response) => {
              return response.json();
            })
            .then(() => {
              this.getApplications();
              this.apps = [];
            });
        }
      }
    },
    getName: function (event) {
      this.name = event.target.value;
    },
    getCategory: function (event) {
      this.category = event.target.value;
    },
    getLogin: function (event) {
      this.login = event.target.value;
    },
    getPassword: function (event) {
      this.password = event.target.value;
    },
    User: function (type) {
      if (this.login !== "" && this.password !== "") {
        var data = { type: type, login: this.login, password: this.password };
        var fd = new FormData();
        for (var i in data) {
          fd.append(i, data[i]);
        }
        fetch("http://groom-room/utils/User.php", {
          method: "POST",
          body: fd,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data !== 'Invalid data') {
              window.sessionStorage.setItem('login', this.login);
              window.location.href = "/applications";
            }
          });
      }
    },
    getApplications: function () {
      var data = { type: "GET_APPLICATIONS" };
      var fd = new FormData();
      for (var i in data) {
        fd.append(i, data[i]);
      }
      fetch("http://groom-room/utils/Applications.php", {
        method: "POST",
        body: fd,
      })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          for (i in data) {
            this.apps.push(data[i]);
          }
        });
    },
    reg: function () {
      const links = document.querySelectorAll('.form__link');
      links[0].classList.remove('active');
      links[1].classList.add('active');
      const btn = document.querySelectorAll('.form__btn');
      btn[0].style.display = 'none';
      btn[1].style.display = 'block';
    },
    auth: function () {
      const links = document.querySelectorAll('.form__link');
      links[0].classList.add('active');
      links[1].classList.remove('active');
      const btn = document.querySelectorAll('.form__btn');
      btn[0].style.display = 'block';
      btn[1].style.display = 'none';
    },
    out: function() {
      sessionStorage.removeItem('login');
      window.location.href = "/";
    },
    check: function () {
      var data = { type: "CHECK_USER", login: sessionStorage.login };
      var fd = new FormData();
      for (var i in data) {
        fd.append(i, data[i]);
      }
      fetch("http://groom-room/utils/User.php", {
        method: "POST",
        body: fd,
      })
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          if (sessionStorage.login && window.location.href == 'http://groom-room/') {
            const linkIn = document.querySelector('.linkIn');
            linkIn.style.display = 'none';
            const linkProfile = document.querySelector('.linkProfile');
            linkProfile.style.display = 'inline-block';
            const linkOut = document.querySelector('.linkOut');
            linkOut.style.display = 'inline-block';
          }
          if (sessionStorage.login && window.location.href == 'http://groom-room/applications') {
            const linkOut = document.querySelector('.linkOut');
            linkOut.style.display = 'inline-block';
          }
        });
    },
  },
  beforeMount() {
    this.check();
    this.getApplications();
  },
})


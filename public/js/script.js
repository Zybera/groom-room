const app = new Vue({
  el: '#app',
  data: {
    name: "",
    category: "",
    login: "",
    password: "",
    apps: [
      { name: "1", category: "Мыть", status: "Новый", img: "public/img/dog.png" },
      { name: "2", category: "Мыть", status: "Новый", img: "public/img/dog.png" },
      { name: "3", category: "Мыть", status: "Новый", img: "public/img/dog.png" },
      { name: "4", category: "Мыть", status: "Новый", img: "public/img/dog.png" },
      { name: "5", category: "Мыть", status: "Новый", img: "public/img/dog.png" },
    ],
  },
  methods: {
    add: function() {
      if (this.name !== "" && this.category !== "") {
        this.apps.push({
          name: this.name,
          category: this.category,
          status: "Новый",
          img: "public/img/dog.png",
        });
      }
    },
    getName: function (event) {
      this.name = event.target.value;
    },
    getCategory: function (event) {
      this.category = event.target.value;
    },
    auth: function() {
      if (this.login !== "" && this.password !== "") {
        console.log('login - ' + this.login);
        console.log('password - ' + this.password);
      }
    },
    getLogin: function (event) {
      this.login = event.target.value;
    },
    getPassword: function (event) {
      this.password = event.target.value;
    },
  },
})
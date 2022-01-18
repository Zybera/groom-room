const app = new Vue({
  el: '#app',
  data: {
    petName: "",
    category: "",
    apps: [{ timeStamp: "", name: "", category: "", status: "" }],
  },
  methods: {
    add: function () {
      this.apps.push({
        timeStamp: new Data().valueOf,
        name: this.petNameame,
        category: this.category,
        status: "Новая",
      });
      console.log(this.apps);
    },
  },
})
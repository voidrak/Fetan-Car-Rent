import { defineStore } from "pinia";
import router from "@/router";
export const useAuthStore = defineStore("authStore", {
  state: () => {
    return {
      user: null,
      errors: {},
    };
  },
  // getters: {},
  actions: {
    /********************* Get Authenticated User  ********************** */

    async getUser() {
      if (localStorage.getItem("token")) {
        const res = await fetch("/api/user", {
          headers: {
            authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        });
        const data = await res.json();
        if (res.ok) {
          this.user = data;
        }
      }
    },

    /**************** Login and Register  ***************/
    async authenticate(apiRoute, formData) {
      const res = await fetch(`/api/${apiRoute}`, {
        method: "post",
        body: JSON.stringify(formData),
      });

      const data = await res.json();
      if (data.errors) {
        this.errors = data.errors;
      } else {
        console.log(this.user);
        this.errors = {};
        localStorage.setItem("token", data.token);
        this.user = data.user;
        router.push({ name: "Home" });
      }
    },

    /**************** Logout  ***************/

    async logout() {
      const res = await fetch("/api/logout", {
        method: "post",
        headers: {
          authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      const data = await res.json();
      console.log(data);

      if (res.ok) {
        this.user = null;
        this.errors = {};
        localStorage.removeItem("token");
        router.push({ name: "Home" });
      }
    },
  },
});

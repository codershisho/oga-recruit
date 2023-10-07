import { defineStore } from "pinia";
import axios from "axios";
import { Credentials } from "../types/auth";

type User = {
  id: Number;
  name: String;
  mail?: String;
};

export const useAuthStore = defineStore("auth", {
  state: () => ({
    _isAuth: false,
    _user: {} as User,
  }),

  getters: {
    isAuth(state) {
      return state._isAuth;
    },
  },

  actions: {
    async login(credentials: Credentials) {
      await axios.get("/sanctum/csrf-cookie");
      const res = await axios.post("/api/login", credentials);
      if (res.status == 200) {
        const user = await axios.get("/api/user");
        if (user.status == 200) {
          this._isAuth = true;
          this._user = user.data;
        }
      }
    },
  },

  persist: true,
});

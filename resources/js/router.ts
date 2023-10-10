import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "./stores/auth";
import Login from "./pages/Login.vue";
import Entries from "./pages/Entries.vue";
import Entry from "./pages/Entry.vue";
import TopPage from "./pages/TopPage.vue";
import NextPage from "./pages/NextPage.vue";

const routes = [
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/entries",
    name: "Entries",
    component: Entries,
    meta: {
      isAuthenticated: true,
    },
  },
  {
    path: "/entries/:id",
    name: "Entry",
    component: Entry,
    meta: {
      isAuthenticated: true,
    },
  },
  {
    path: "/",
    name: "NextPage",
    component: NextPage,
    meta: {
      isAuthenticated: true,
    },
  },
];
const router = createRouter({
  routes,
  history: createWebHistory("/ogarec/"),
});

// login状態のチェック
router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.isAuthenticated)) {
    const authStore = useAuthStore();
    console.log(authStore.isAuth);

    if (!authStore.isAuth) {
      next({ name: "Login" });
      return;
    }
  }
  next();
  return;
});
export default router;

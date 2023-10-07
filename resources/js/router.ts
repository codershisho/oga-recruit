import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "./stores/auth";
import Login from "./pages/Login.vue";
import TopPage from "./pages/TopPage.vue";
import NextPage from "./pages/NextPage.vue";

const routes = [
  {
    path: "/login",
    name: "Login",
    component: Login,
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
  history: createWebHistory(),
});

// login状態のチェック
router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.isAuthenticated)) {
    const authStore = useAuthStore();
    if (!authStore.isAuth) {
      next({ name: "Login" });
      return;
    }
  }
  next();
  return;
});
export default router;

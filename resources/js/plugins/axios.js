import axios from "axios";
import { useAuthStore } from "@/stores/auth";
// import { useMessageStore } from '@/stores/message'
const axiosPlugin = {
  install(app, options) {
    axios.defaults.baseURL = options.baseURL;

    // store
    const authStore = useAuthStore();
    // const messageStore = useMessageStore()

    // request
    axios.interceptors.request.use((config) => {
      return config;
    });

    // response
    axios.interceptors.response.use(
      (response) => {
        // messageStore.setMessage('', response.data.message, 0)
        return response;
      },
      (error) => {
        let errorMessage = error.message;
        if (error.response.data.message != "") {
          errorMessage = error.response.data.message;
        }
        // messageStore.setMessage('エラー発生！', errorMessage, 1)
        // 認証切れの場合
        if (error.response.status === 401) {
          if (authStore.isAuth) {
            // 認証が生きている場合はクリア（ログアウト）
            authStore.authClear();
            alert("認証切れ");
            window.location.href = "/ogarec/login";
          }
        }
        return Promise.reject(error);
      }
    );

    app.provide("axios", axios);
  },
};
export default axiosPlugin;

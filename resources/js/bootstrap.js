import axios from "axios";
// if window exists (for SSR) then set it to the global window object
if (typeof window !== "undefined") {
    window.axios = axios;
    window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
}

import axios from "axios";

const axiosIns = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL,
});

axiosIns.interceptors.request.use(
    function (config) {
        config.headers = {
            "X-Requested-With": "XMLHttpRequest",
            Accept: "application/json",
            // "Content-Type": "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        };
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);

axiosIns.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error && error.response && 401 === error.response.status
            && !(window.location.href.indexOf('/login') > -1)) {
            localStorage.clear();
            window.location.replace('/login');
        }

        return Promise.reject(error);
    }
);

export default axiosIns;
